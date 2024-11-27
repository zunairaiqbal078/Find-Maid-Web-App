<?php

include ('conn.php');
$userId = $_GET['record'];
$deletequery = " DELETE FROM `user_record` WHERE userId=$userId";
$query = mysqli_query($conn, $deletequery);
header('location:userRecord.php');
?>