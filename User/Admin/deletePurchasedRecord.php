<?php
    include ('conn.php');
    $purchasedId = $_GET['record'];
    $delete = " DELETE FROM `purchased_Record` WHERE purchasedId=$purchasedId";
    $query = mysqli_query($conn, $delete);
    header('location:purchasedRecord.php');
?>