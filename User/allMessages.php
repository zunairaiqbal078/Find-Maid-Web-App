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
    $select = "SELECT * FROM `contact_record` where userId=$userId";
    $query = mysqli_query($conn, $select);
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
                             <a class="nav-link active fw-bold" style="color: rgb(255, 255, 19);" href="contact.php">Contact</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" href="maid.php">Maids</a>
                          </li>
                          <li class="nav-item">
                             <a class="nav-link active" href="about.php">About</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" href="profile.php">Profile</a>
                         </li>
                       </ul>
                    </div>
                 </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3 c10" style="min-height: 535px;">
        <div class="row r1" style="justify-content: center;">
            <h1 style="text-align: center;">Recent Chat</h1>
            <div class="col-lg-4 col-md-6 col-sm-8 col-10 pt-4 mt-3 cl1">
                <?php while($result = mysqli_fetch_array($query)){ ?>
                    <div class="qtn">
                        <strong><?php echo $result['subject']?></strong>
                        <p><?php echo $result['message']?></p>
                    </div>
                    <i class="fa-solid fa-q iconQ"></i>
                    <br>
                    <?php if($result['reply']!="none"){ ?>
                        <i class="fa-solid fa-a iconA"></i>
                        <p class="ans"><?php echo $result['reply']?></p>
                    <?php } ?>
                <?php } ?>
            </div>
            <a href="contact.php" class="chat"><i class="fa-solid fa-envelope"></i> Contact Us</a>   
        </div>
    </div>
    <?php
        include('footer.html');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>