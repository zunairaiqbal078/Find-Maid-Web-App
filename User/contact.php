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
    if(isset($_POST['submit'])){
        $name = $result['name'];
        $email = $result['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $reply = "none";
        $insert = "INSERT INTO `contact_record`(`userId`, `name`, `email`, `subject`, `message`, `reply`) 
                                        VALUES ('$userId','$name','$email','$subject','$message','$reply')";
        $query = mysqli_query($conn, $insert);
        header('location:chat.php');
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
    <div class="container-fluid c5 p-3">
        <form method="post">
            <div class="row r1">
                <h1 style="text-align: center;">Contact us</h1>
                <h6 style="color: grey; text-align: center;">Reach out and let's connect! We are just a message away!</h6>
                <div class="col-lg-5 col-md-8 col-sm-10 col-12 mt-5 p-4 cl">
                    <input type="text" required name="name" placeholder="Your Name" class="inp" value="<?php echo $result['name'] ?>"><br>
                    <input type="email" required name="email" placeholder="Your Email" class="inp" value="<?php echo $result['email'] ?>"><br>
                    <input type="text" required name="subject" placeholder="Subject" class="inp" value=""><br>
                    <textarea class="txt" required name="message" placeholder="Message" rows="5"></textarea><br>
                    <div class="text-center">
                        <input type="submit" name="submit" class="submit" value="SEND MESSAGE">
                    </div>
                    <a href="allMessages.php" class="chat"><i class="fa-solid fa-envelope"></i> Chat</a>   
                </div>
            </div>
        </form>
    </div>
    <?php
        include('footer.html');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>