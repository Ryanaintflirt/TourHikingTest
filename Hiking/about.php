<?php
include('header.php');
include('dbConnect.php');
?>

<div class="content">

<?php
    $query = "select * from hiking";
    $record = mysqli_query($connect,$query);
    while($result = mysqli_fetch_array($record)){
        print("$result[Location]");
    }
?>
</div>

<?php
include('footer.php');
?>