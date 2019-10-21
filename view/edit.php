
<form method="post">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $customers->name ?>" placeholder="Enter Name Again"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $customers->email?>" placeholder="Enter Email Again"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo $customers->address ?>" placeholder="Enter Address Again"></td>
            <td><button type="submit">UPDATE</button> </td>
        </tr>
    </table>
</form>
