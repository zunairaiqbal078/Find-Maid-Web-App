<?php
    include ('conn.php');
    $maidId = $_GET['record'];
    $delete = " DELETE FROM `maid_Record` WHERE maidId=$maidId";
    $query = mysqli_query($conn, $delete);
    header('location:maidRecord.php');
?>