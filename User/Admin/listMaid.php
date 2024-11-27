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
    include ('conn.php');
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $service = $_POST['service'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $status = "free";
        $fileName = $_FILES['image']['name'];
        $file = $_FILES['image']['tmp_name'];
        $adminFolder = "data/".$fileName;    
        $insert = "INSERT INTO `maid_record`(`name`, `service`, `address`, `city`, `country`, `status`, `maidPic`)
                                    VALUES ('$name','$service','$address','$city','$country','$status','$fileName')";
        $query = mysqli_query($conn,$insert);
        if($query){
            move_uploaded_file($file, $adminFolder);
            header('location:maidRecord.php');
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
            <div class="col-10 text-center cl10 pt-4">
                <h1 class="mb-4">List New Maid</h1>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row r2">
                        <div class="col-6 cl text-center">
                            <label class="fs-5">Name</label><br>
                            <input type="text" class="inp" name="name" placeholder="Maid Name" required><br>
                            <label class="fs-5">Service</label><br>
                            <div class="inp ms-5">
                                <label><input type="radio" name="service" value="Cooking"> Cooking</label>
                                <label class="px-3"><input type="radio" name="service" value="Childcare"> Childcare</label>
                                <label><input type="radio" name="service" required value="Cleaning"> Cleaning</label>
                            </div>
                            <label class="fs-5">Maid Image</label><br>
                            <input class="inp" name="image" type="file" required>
                        </div>
                        <div class="col-6 cl text-center">
                            <label class="fs-5">Address</label><br>
                            <input type="text" class="inp" name="address" placeholder="Address" required><br>
                            <label class="fs-5">City</label><br>
                            <input type="text" class="inp" name="city" placeholder="City" required><br>
                            <label class="fs-5">Country</label><br>
                            <input type="text" class="inp" name="country" placeholder="Country" required>
                        </div>
                        <input type="submit" class="btnAdd" value="Add" name="add">
                    </div>
                </form>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>