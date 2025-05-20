<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admindash.css">
    <title>Document</title>
</head>
<?php

use Dom\Mysql;

include("DBconnect.php");
?>
<body>
    <div class="navbar">
        <table class="navtab">
            <tr>
                <th><a href="index.php">Home</a></th>
                <th><a href="join.php">Join</a></th>
                <th><a href="information.php">Information</a></th>
                <th><a href="content.php">Content</a></th>
                <th><a href="admin.php">Admin</a></th>
                <th><a href="">Logout</a></th>
            </tr>
        </table>
    </div>
    <div class="insert">
        <h1>Insert Hiking Information</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <table>
            <tr>
                <td>Enter Location:</td>
                <td><input type="text" name="location" id="location"></td>
            </tr>
            <tr>
                <td>Enter Description:</td>
                <td><input type="text" name="desc" id="desc"></td>
            </tr>
            <tr>
                <td>Enter Date:</td>
                <td><input type="date" name="date" id="date"></td>
            </tr>
            <tr>
                <td>Enter Fees:</td>
                <td><input type="text" name="fees" id="fees"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" name="sub" id="sub" value="Login">
                    <input type="reset" name="reset" id="reset" value="Reset">
                </td>
            </tr>
        </table>
        </form>
    </div>
</body>
<?php
    if(isset($_POST['sub']))
    {
        $location = $_POST['location'];
        $desc = $_POST['desc'];
        $date = $_POST['date'];
        $fees = $_POST['fees'];

        $query = "INSERT INTO Hiking (Location, Description, Date, Fees) Values('$location', '$desc','$date','$fees')";
        $result_set = mysqli_query($connect,$query);
        //redirection
    }

?>
</html>