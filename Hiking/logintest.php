<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <table>
            <tr>
                <td>Enter name</td>
                <td><input type="text" name="uname" id="uname"></td>
            </tr>
            <tr>
                <td>Enter Password</td>
                <td><input type="password" name="pwd" id="pwd"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <center><input type="submit" name="sub" id="sub" value="Login"></center>
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['sub'])) {
        // Accept user input
        $name = $_POST['uname'];
        $pass = $_POST['pwd'];

        // Check credentials
        if ($name == "admin" && $pass == "admin123") {
            echo "Login successful";
        } else {
            echo "Login unsuccessful";
        }
    }
    ?>
</body>
</html>