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
    include 'conn.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $insert = "INSERT INTO `admin_record`(`name`, `email`, `password`) VALUES('$name', '$email','$password')";
        $result = mysqli_query($conn, $insert);
        if($result){
            header('location:adminRecord.php');
        }
           
    } 
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
            <div class="col-4 offset-3 pt-2 mt-2 mb-2 text-center cl4">
                <form name="myform" method="POST" onsubmit="return validateForm()" >
                <h1 style="margin-bottom: 25px;">Add Admin</h1>
                <div id="fname">
                    <label style="margin-left: -165px;">Name</label><br>
                    <input type="text" name="name" required class="txt"> <br><span class="formerror"></span><br>
                </div>
                <div id="femail">
                    <label style="margin-left: -170px;">Email</label><br>
                    <input type="email" name="email" required class="txt"> <br><span class="formerror"></span><br>
                </div>
                <div id="fpassword">
                    <label style="margin-left: -145px;">Password</label><br>
                    <input type="text" name="password" required class="txt"> <br><span class="formerror"></span><br>
                </div>
                <div id="fcpassword">
                    <label style="margin-left: -90px;">Confirm Password</label><br>
                    <input type="text" name="cpassword" required class="txt"> <br><span class="formerror"></span><br>
                </div>
                <input class="submit" type="submit" name="submit" value="Sign Up">
                </form>
            </div>
        </div>
    </div>


<script src="validation.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>