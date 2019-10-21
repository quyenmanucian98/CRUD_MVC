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
<a href="index.php?page=add">ADD</a>
<table border="1px">
    <tr>
        <td>STT</td>
        <td>Name</td>
        <td>Email</td>
        <td>Address</td>
    </tr>
    <?php foreach ($customers as $key => $customer):?>
      <tr>
          <td><?php echo ++$key ?></td>
          <td><?php echo $customer->getName() ?></td>
          <td><?php echo $customer->getEmail() ?></td>
          <td><?php echo $customer->getAddress() ?></td>
          <td><a href="index.php?page=delete&id=<?php echo $customer->getId() ?>">DELETE</a></td>
          <td><a href="index.php?page=edit&id=<?php echo $customer->getId() ?>">EDIT</a></td>
      </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
