<?php
    session_start();
    if (isset($_SESSION["userId"])) {
    } 
    else {
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Maid</title>
    <link rel="stylesheet" href="findMaid.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php
    include('conn.php');
    $userId = $_SESSION["userId"];
    $select = "SELECT * FROM `user_record` where userId=$userId";
    $query = mysqli_query($conn, $select);
    $result = mysqli_fetch_array($query);
    if(isset($_POST['destroy'])){
        $delete = "DELETE FROM `user_record` where userId=$userId";
        $query = mysqli_query($conn, $delete);
        header('location:index.php');
        session_destroy();
    } 
    if(isset($_POST['submit'])){
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $zipCode = $_POST['zipCode'];
        $mobile = $_POST['mobile'];
        $update = "UPDATE `user_record` SET `address`='$address',`city`='$city',`country`='$country',
                    `zipCode`='$zipCode',`mobile`='$mobile' where userId=$userId";
        $query = mysqli_query($conn, $update);
        header('location:profile.php');
    } 
?>
    <div class="container-fluid p-3 nbar">
        <div class="row r1">
            <div class="col cl1">
                <nav class="navbar navbar-expand-lg text-white">
                    <h2 class="navbar-expand-lg">Find Maid</h2>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       <ul class="navbar-nav ms-auto">
                          <li class="nav-item">
                             <a class="nav-link active" href="home.php">Home</a>
                          </li>
                          <li class="nav-item">
                             <a class="nav-link active" href="contact.php">Contact</a>
                          </li>
                          <li class="nav-item">
                             <a class="nav-link active" href="maid.php">Maids</a>
                          </li>
                          <li class="nav-item">
                             <a class="nav-link active" href="about.php">About</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active fw-bold" style="color: rgb(255, 255, 19);" href="profile.php">Profile</a>
                         </li>
                       </ul>
                    </div>
                 </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid p-md-5 c6">
        <div class="row r1">
            <div class="col-lg-4 col-md-6 col-sm-8 col-12 cl">
                <div class="card pt-3 my-3">
                    <div class="card-body">
                        <h5 class="card-title"><strong><?php echo $result['name'] ?></strong></h5>
                        <label class="card-text"><strong>Email: </strong><?php echo $result['email'] ?></label><br>
                        <label class="card-text"><strong>Password: ********</strong></label><br>
                        <button style="width:fit-content; margin-left:88%" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
                <div class="text-center">
                    <a href="logout.php" class="logOut" style="text-decoration: none; padding:10px; width:fit-content;">LogOut</a>
                </div>
            </div>
        </div>
        <form method="post">
        <div class="row pt-5 r2" style="justify-content:center">
            <h2 class="text-center text-muted my-5">Update Your Address</h2>
            <div class="col-lg-4 col-md-6 col-sm-8 col-10 mt-3 cl">
                <label for="" class="text-muted">Street Address</label><br>
                <input type="text" value="<?php echo $result['address'] ?>" required name="address">
            </div>
            <div class="col-lg-2 col-md-6 col-sm-8 col-10 mt-3 cl">
                <label for="" class="text-muted">City / Town</label><br>
                <input type="text" value="<?php echo $result['city'] ?>" required name="city">
            </div>
            <div class="col-lg-2 col-md-4 col-sm-8 col-10 mt-3 cl">
                <label for="" class="text-muted">Country</label><br>
                <input type="text" value="<?php echo $result['country'] ?>" required name="country">
            </div>
            <div class="col-lg-2 col-md-4 col-sm-8 col-10 mt-3 cl">
                <label for="" class="text-muted">Zip Code</label><br>
                <input type="text" value="<?php echo $result['zipCode'] ?>" required name="zipCode">
            </div>
            <div class="col-lg-2 col-md-4 col-sm-8 col-10 mt-3 cl">
                <label for="" class="text-muted">Mobile no</label><br>
                <input type="text" value="<?php echo $result['mobile'] ?>" required name="mobile">
            </div>
            <input class="submit" type="submit" value="save" name="submit">
        </div>
        </form>
    </div>
    <?php
        include('footer.html');
    ?>
    
    <!-- delete Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>If you delete your account, your login information will also be cleared.</p>
            </div>
            <div class="modal-footer">
            <form name="myform" method="POST">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="destroy" value="Delete" class="btn btn-primary" >
            </form>
            </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>