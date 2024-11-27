<?php
    session_start();
    if (isset($_SESSION["adminId"])){
    }
    else{
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Maid</title>
    <link rel="stylesheet" href="findMaidAdmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php
    include('conn.php');
    $AMselect = " SELECT * FROM contact_record";
    $AMquery = mysqli_query($conn, $AMselect);
    $AMresult = mysqli_num_rows($AMquery);

    $UMselect = " SELECT * FROM contact_record where reply='none'";
    $UMquery = mysqli_query($conn, $UMselect);
    $UMresult = mysqli_num_rows($UMquery);

    $AUselect = " SELECT * FROM user_record";
    $AUquery = mysqli_query($conn, $AUselect);
    $AUresult = mysqli_num_rows($AUquery);

    $AAselect = " SELECT * FROM admin_record";
    $AAquery = mysqli_query($conn, $AAselect);
    $AAresult = mysqli_num_rows($AAquery);
?>
    <div class="container-fluid p-3 nbar">
        <div class="row r1">
            <div class="col-4 offset-1 cl1">
            <h4>Find Maid</h4>
            </div>
            <div class="col-2 offset-5 cl2">
            <li style="margin-top: 10px; width: fit-content; text-align: center; font-size: 19px;"><?php echo $_SESSION["name"] ?> <i class="fa-solid fa-caret-down"></i>
                <ul class="dropdown">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="newAdmin.php">Add admin</a></li>
                <li><a href="logout.php">Log out</a></li>
                </ul>
            </li>
        </div>
    </div>
    </div>
    <div class="container-fluid c2">
        <div class="row r1">
            <div class="col-2 cl1 pt-5">
                <ul>
                    <li><a href="index.php"><i class="fa-solid fa-circle-nodes"></i> Dashboard</a></li>
                    <li><a href="userRecord.php"><i class="fa-solid fa-circle-nodes"></i> User Record</a></li>
                    <li><a href="maidRecord.php"><i class="fa-solid fa-circle-nodes"></i> Maid Record</a></li>
                    <li><a href="adminRecord.php"><i class="fa-solid fa-circle-nodes"></i> Admin Record</a></li>
                    <li><a href="contactRecord.php"><i class="fa-solid fa-circle-nodes"></i> Contact Record</a></li>
                    <li><a href="purchasedRecord.php"><i class="fa-solid fa-circle-nodes"></i> Purchase Record</a></li>
                </ul>
            </div>
            <div class="col-10 cl2 pt-5 text-center">
                <div class="ab">
                    <h1 style="font-size: 35px;">Welcome</h1>
                    <h2 style="font-size: 60px;"><?php echo $_SESSION["name"] ?></h2>
                </div>
                <div class="row rr1 pt-5">
                    <div class="col-3 ccl1">
                        <h4><strong>Total Messages</strong></h4>
                        <a href="contactRecord.php" style="text-decoration: none;">
                        <div class="value">
                            <h2 style="font-size: 60px;"><?php echo $AMresult ?></h2>
                        </div>
                        </a>
                    </div>
                <div class="col-3 ccl1">
                    <h4><strong>Unread Messages</strong></h4>
                    <a href="contactRecord.php" style="text-decoration: none;">
                    <div class="value">
                        <h2 style="font-size: 60px;"><?php echo $UMresult ?></h2>
                    </div>
                    </a>
                </div>
                <div class="col-3 ccl1">
                    <h4><strong>No. of Users</strong></h4>
                    <a href="userRecord.php" style="text-decoration: none;">
                    <div class="value">
                        <h2 style="font-size: 60px;"><?php echo $AUresult ?></h2>
                    </div>
                    </a>
                </div>
                <div class="col-3 ccl1">
                    <h4><strong>No. of Admins</strong></h4>
                    <a href="adminRecord.php" style="text-decoration: none;">
                    <div class="value">
                        <h2 style="font-size: 60px;"><?php echo $AAresult ?></h2>
                    </div>
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>