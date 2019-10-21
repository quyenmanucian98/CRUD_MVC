<?php
include_once "controller/CustomerController.php";
include_once "model/database/DBConnect.php";
include_once "model/Customers.php";
include_once "model/CustomersDB.php";
$controllerCustomer = new \controller\CustomerController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
switch ($page) {
    case 'list':
        $controllerCustomer->show_List();
        break;
    case 'delete':
        $controllerCustomer->delete();
        break;
    case 'add':
        $controllerCustomer->add();
        break;
    case 'edit':
        $controllerCustomer->edit();
        break;
    default:
        $controllerCustomer->show_List();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
