<?php
    session_start();
    if(isset($_SESSION["userId"])){
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
    <link rel="stylesheet" href="findMaid.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
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
                                <a class="nav-link active fw-bold" style="color: rgb(255, 255, 19);" href="about.php">About</a>
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
    <div class="conatiner-fluid p-md-5 p-4 mb-3 c9">
        <div class="row r1">
            <div class="col-md-6 offset-md-6 col-12 cl1">
                <h1 style="color: rgb(225, 110, 9); font-size:5vw;">About Us</h1>
                <p>At Find Maid, we're dedicated to simplifying the process of finding reliable and trustworthy maids for your home. 
                    With a passion for connecting families with the perfect domestic help, we strive to make the search for maids effortless and stress-free. 
                    Our mission is to provide a platform where users can confidently find maids who meet their specific needs, 
                    while also empowering domestic workers with opportunities for fair employment. Backed by years of experience in the industry, 
                    our team is committed to revolutionizing the way people find and hire maids, making it a seamless and enjoyable experience. 
                </p>
                <p>We understand the importance of finding a maid who not only meets your household needs but also fits seamlessly into your family's routine. 
                    That's why we're here to help you every step of the way. Transparency, reliability, and customer satisfaction are at the core of everything we do. 
                    You can trust us to connect you with maids who are vetted, experienced, and ready to make a positive impact in your home.
                     At Find Maid, we believe that finding the right maid should be simple, convenient, and stress-free. 
                     Let us handle the search while you focus on what matters most – enjoying quality time with your loved ones.
                </p>
                <p> Whether you're a busy professional, a new parent, or simply in need of extra support around the house, 
                    we're here to match you with maids who are dedicated to making your life easier. 
                    Our platform is designed to prioritize the safety and well-being of both users and maids. 
                    Rest assured that every maid you find through us has been thoroughly vetted and screened to ensure peace of mind. 
                    Join our community of satisfied users who have discovered the convenience and reliability of finding maids through Find Maid. 
                    Say goodbye to the hassle of searching for domestic help and hello to a cleaner, happier home.
                </p>
            </div>
        </div>
    </div>
    <?php
        include('footer.html');
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>