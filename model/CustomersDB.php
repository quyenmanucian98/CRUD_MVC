<?php


namespace model;


class CustomersDB
{
    public $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function get_All()
    {
        $sql = "SELECT * FROM customers";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetchAll();
        $customers = [];
        foreach ($result as $value) {
            $customer = new Customers($value['name'], $value['email'], $value['address']);
            $customer->setId($value['id']);
            array_push($customers, $customer);
        }
        return $customers;
    }

    public function delete_Customers($id)
    {
        $sql = $this->connect->prepare("DELETE FROM customers WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
    }

    public function add_Customers($customer)
    {

        $sql = $this->connect->prepare("INSERT INTO customers(name,email,address) VALUES(:name,:email,:address)");
        $sql->bindParam(':name', $customer->name);
        $sql->bindParam(':email', $customer->email);
        $sql->bindParam(':address', $customer->address);
        $sql->execute();

    }

    public function customers_By_Id($id)
    {
        $sql = $this->connect->query("SELECT * FROM customers WHERE id =$id");
        $customer = $sql->fetch();
        $customers = new Customers($customer['name'], $customer['email'], $customer['address']);
        return $customers;

    }

    public function update($id, $customers)
    {
        $sql = $this->connect->prepare("UPDATE customers SET name=:name,email=:email,address=:address WHERE id=:id");
        $sql->bindParam(':name', $customers->name);
        $sql->bindParam(':email', $customers->email);
        $sql->bindParam(':address', $customers->address);
        $sql->bindParam(':id', $id);
        $sql->execute();

    }
}