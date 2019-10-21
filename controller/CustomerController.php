<?php

namespace controller;

use model\Customers;
use model\CustomersDB;
use model\database\DBConnect;

class CustomerController
{
    public $customersDB;

    public function __construct()
    {
        $database = new DBConnect('mysql:host=localhost;dbname=quyen10', 'root', '123456');
        $this->customersDB = new CustomersDB($database->connect());
    }

    public function show_List()
    {
        $customers = $this->customersDB->get_All();
        include "view/list.php";
    }

    public function delete()
    {
        $id = $_GET['id'];
        $this->customersDB->delete_Customers($id);
        header("Location: index.php");
    }

    public function add()
    {
        include "view/add.php";
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $customers = new Customers($name, $email, $address);
            $this->customersDB->add_Customers($customers);
            header('Location: index.php');
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $customers = $this->customersDB->customers_By_Id($id);
        include 'view/edit.php';
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $customers = new Customers($name, $email, $address);
            $this->customersDB->update($id, $customers);
            header('Location: index.php');
        }
    }
}