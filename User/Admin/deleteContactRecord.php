<?php
    include ('conn.php');
    $messageId = $_GET['record'];
    $delete = " DELETE FROM `contact_Record` WHERE messageId=$messageId";
    $query = mysqli_query($conn, $delete);
    header('location:contactRecord.php');
?>