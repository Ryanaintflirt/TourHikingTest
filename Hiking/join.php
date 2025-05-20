<?php

use Dom\Mysql;

include("nav.php");
include("DBconnect.php");
?>
<div class="register">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td>Date of Birth:</td>
            <td><input type="date" name="dob" id="dob"></td>
        </tr>
        <tr>
            <td>Hiking Location:</td>
            <td>
                <select name="location" id="location">
                    <option value="A">Mountain A</option>
                    <option value="B">Mountain B</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td><input type="text" name="phone" id="phone"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" id="email"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" name="sub" id="sub" value="Login">
                <input type="reset" name="reset" id="reset" value="Reset">
            </td>
        </tr>
    </table>
</div>
<?php
include("footer.php");
?>