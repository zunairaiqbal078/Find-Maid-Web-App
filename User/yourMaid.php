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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php
    include('conn.php');
    $userId = $_SESSION["userId"];
    $select = "SELECT * FROM `purchased_record` where userId = '$userId' order by purchasedId desc";
    $query = mysqli_query($conn, $select);
    $data = mysqli_num_rows($query);
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
                                <a class="nav-link active fw-bold" style="color: rgb(255, 255, 19);" href="maid.php">Maids</a>
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
    <div class="container-fluid c13 p-4">
        <div class="row r2">
            <h1 class="text-center"><strong>Your Hired Maids</strong></h1>
            <h3 id="note" class="text-center text-warning"></h3>
            <?php
                while($result = mysqli_fetch_array($query)){
                    $maidId = $result["maidId"];
                    $select1 = "SELECT * FROM `maid_record` where maidId = '$maidId'";
                    $query1 = mysqli_query($conn, $select1);
                    $maid = mysqli_fetch_array($query1);
            ?>
            <div class="col-xl-3 col-md-4 col-sm-6 offset-sm-0 col-12 offset-0 cl1 p-2">
                <div class="card" style="height: 400px;">
                    <img src="Admin/data/<?php echo $maid['maidPic']?>" class="card-img-top ps-3 pt-3 " style="width:130px; height:130px;" alt="...">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $maid['name']?></h4>
                        <h6 class="card-title" style="position: absolute; bottom:36%;">Start Date: <?php echo $result['startDate']?></h6>
                        <h6 class="card-title" style="position: absolute; bottom:31%;">End Date: <?php echo $result['endDate']?></h6>
                        <h6 class="card-title" style="position: absolute; bottom:23%;">Amount Status: <?php echo $result['amountStatus']?></h6>
                        <h6 class="card-title" style="position: absolute; bottom:18%;">Service: <?php echo $maid['service']?></h6>
                        <h6 class="card-title" style="position: absolute; bottom:5%;"><?php echo $maid['address']?>, <?php echo $maid['city']?>,<?php echo $maid['country']?>.</h6>
                    </div>
                </div>
            </div>
            <?php
                } 
            ?>
        </div>
        <div class="row text-center m-4 r1">
            <h1 class="mb-4"><strong>MATCHE BY</strong></h1>
            <div class="col cl1">
                <form method="GET" action="search.php">
                    <select name="service" class="px-2 m-1 py-1" required>
                        <option value="">-Service-</option>
                        <option value="Cleaning">Cleaning</option>
                        <option value="Cooking">Cooking</option>
                        <option value="Childcare">Childcare</option>
                    </select>
                    <select name="city" class="px-2 m-1 py-1" required>
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
                <a href="maid.php" class="btn btn-warning ps-4 pe-4 text-light">Maid List</a>
            </div>
        </div>
    </div>
    <?php
        include('footer.html');
        if($data<=0){
            ?><script>
                document.getElementById("note").innerHTML = "Nothing Here Yet!";
            </script><?php
        }
    ?>

    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>