<?php

include ('conn.php');
$adminId = $_GET['record'];
$deletequery = " DELETE FROM `admin_record` WHERE adminId=$adminId";
$query = mysqli_query($conn, $deletequery);
header('location:adminRecord.php');
?>