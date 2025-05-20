<?php
include("nav.php");
include("DBconnect.php");
?>
<div class="content">
        <?php
        $query = "SELECT * FROM hiking";
        //execute the query
        $record = mysqli_query($connect, $query);
        while($result = mysqli_fetch_array($record)){
            //print the result
            print("$result[Location]");

        }
        ?>

</div>
<?php
include("footer.php");
?>