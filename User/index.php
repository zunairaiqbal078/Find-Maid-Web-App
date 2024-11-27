<?php
    session_start();
    if (isset($_SESSION["userId"])){
        header('location:home.php');
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
                             <a class="nav-link active fw-bold" style="color: rgb(255, 255, 19);" href="home.php">Home</a>
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
                            <a class="nav-link active" href="login.php">Login</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link active" href="register.php">Register</a>
                         </li>
                       </ul>
                    </div>
                 </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid p-md-5 c1">
        <div class="row r1">
            <div class="col-md-6 col-12 cl1">
                <h1>Find a Maid Near You</h1>
                <form method="GET" action="search.php">
                    <select name="service" class="m-1" required>
                        <option value="">-Service-</option>
                        <option value="Cleaning">Cleaning</option>
                        <option value="Cooking">Cooking</option>
                        <option value="Childcare">Childcare</option>
                    </select>
                    <select name="city" class="m-1" required>
                        <option value="">-Your City-</option>
                        <option value="Arif Wala">Arif Wala</option>
                        <option value="Sahiwal">Sahiwal</option>
                        <option value="Lahore">Lahore</option>
                        <option value="Faislabad">Faislabad</option>
                        <option value="Islamabad">Islamabad</option>
                        <option value="Multan">Multan</option>
                        <option value="Karachi">Karachi</option>
                        <option value="Peshawar">Peshawar</option>
                        <option value="Quetta">Quetta</option>
                    </select><br>
                    <button class="btn m-3">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid p-md-5 c2">
        <div class="row text-center r1">
            <h1 class="py-5">Popular Categories</h1>
            <div class="col-md-4 col-12 py-2 cl">
                <div class="card p-3">
                    <div class="card-head"><img src="pics/cook.jfif" width="100%" height="200px" alt=""></div>
                    <div class="card-body">
                        <h3 class="card-title pt-2">Cook</h3>
                        <p class="card-text">From stove to table, taste the difference. Let us serve culinary delights just for you.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 py-2 cl">
                <div class="card p-3">
                    <div class="card-head"><img src="pics/childCare.jfif" width="100%" height="200px" alt=""></div>
                    <div class="card-body">
                        <h3 class="card-title pt-2">Child Care</h3>
                        <p class="card-text">Your child's happiness, our priority. Safe hands, big hearts, happy kids.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 py-2 cl">
                <div class="card p-3">
                    <div class="card-head"><img src="pics/cleaning.jpg" width="100%" height="200px" alt=""></div>
                    <div class="card-body">
                        <h3 class="card-title pt-2">Cleaning</h3>
                        <p class="card-text">Leave the cleaning to us. We scrub, sweep, and shine for your peace of mind.</p>
                    </div>
                </div>
            </div>
            <a href="maid.php">Veiw Employees</a>
        </div>
    </div>      
    <div class="container-fluid p-5 c3">
        <div class="row r1 py-5">
            <div class="col-md-3 col-sm-6 col-12 p-2 cl" >
                <div class="card p-2" style="height: 10rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title pt-4">Professional Maids</h5>
                        <p class="card-text">Our maids are experienced and background-checked</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 p-2 cl">
                <div class="card p-2" style="height: 10rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title pt-4">Security Payment</h5>
                        <p class="card-text">100% security payment</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 p-2 cl">
                <div class="card p-2" style="height: 10rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title pt-4">Flexible Scheduling</h5>
                        <p class="card-text">Choose a time that works for you</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 p-2 cl">
                <div class="card p-2" style="height: 10rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title pt-4">24hr Secure Booking</h5>
                        <p class="card-text">Book with confidence and peace of mind</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-md-5 c4">
        <div class="row r1 p-5">
            <div class="col-md-3 col-sm-6 col-12 p-2 cl">
                <div class="card pt-5 pb-5">
                    <div class="card-body text-center">
                        <i class="fa fa-users fa-4x"></i>
                        <h3 class="card-title pt-3">SATISFIED CUSTOMERS</h3>
                        <h2>263</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 p-2 cl">
                <div class="card pt-5 pb-5">
                    <div class="card-body text-center">
                        <i class="fa fa-users fa-4x"></i>
                        <h3 class="card-title pt-3">QUALITY OF SERVICE</h3>
                        <h2>99%</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 p-2 cl">
                <div class="card pt-5 pb-5">
                    <div class="card-body text-center">
                        <i class="fa fa-users fa-4x"></i>
                        <h3 class="card-title pt-3">QUALITY CERTIFICATES</h3>
                        <h2>33</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 p-2 cl">
                <div class="card pt-5 pb-5">
                    <div class="card-body text-center">
                        <i class="fa fa-users fa-4x"></i>
                        <h3 class="card-title pt-3">AVAILABLE MAIDS</h3>
                        <h2>154</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include('footer.html');
    ?>

    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>