<?php
    session_start();
    if(isset($_SESSION["userId"])){
    } 
    else{
        header('location:index.php');
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
    $maidId = $_GET['maidId'];
    $userId = $_SESSION["userId"];
    include('conn.php');
    if (isset($_POST['submit'])) {
        $password = $_POST['password'];
        if ($password == $_SESSION["password"]) {
            $startDate = gmdate('Y-m-d', strtotime('+2 days'));
            $endDate = gmdate('Y-m-d', strtotime('+32 days'));
            $amount = $_POST['amount'];
            $amountStatus = "pending";
            $fileName = $_FILES['screenshot']['name'];
            $file = $_FILES['screenshot']['tmp_name'];
            $dest = "Admin/data/" . $_FILES['screenshot']['name'];
            $update = "UPDATE `maid_record` SET `status`='hired' where maidId = '$maidId'";
            $query = mysqli_query($conn, $update);
            $insert = "INSERT INTO `purchased_record`(`userId`,`maidId`, `startDate`, `endDate`, `amount`, `amountStatus`, `amountSS`) 
                                            VALUES ('$userId','$maidId','$startDate','$endDate','$amount','$amountStatus','$fileName')";
            $query = mysqli_query($conn, $insert);
            if ($query) {
                move_uploaded_file($file, $dest);
                header('location:yourMaid.php');
            }
        }
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
    <div class="container-fluid c12 pt-4 pb-4" id="top">
        <div class="row r1" style="justify-content: center;">
            <h1 class="text-center my-4"><strong>Meezan Bank</strong></h1>
            <h5 class="text-center fw-bold">IBAN : <span class="fw-normal">PK89MEZN0021050106811299</span></h5>
            <h5 class="text-center fw-bold mb-4">Account : <span class="fw-normal">21050106811299</span></h5>
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-10 p-3 cl1">
                <form action="#" name="myform" method="POST" enctype="multipart/form-data">
                    
                    <div id="femail">
                        <label>Email</label><br>
                        <input type="email" name="email" readonly value="<?php echo $_SESSION["email"] ?>" required class="txt"> <br><br>
                    </div>
                    <div id="fpassword">
                        <label>Password</label><br>
                        <input type="text" name="password" required class="txt"> <br><span class="formerror"></span><br>
                    </div>
                    <div id="famount">
                        <label>$ per month</label><br>
                        <input type="text" name="amount" readonly value="10" required class="txt"> <br><br>
                    </div>
                    <div id="file">
                        <label>Upload Payment Screenshot</label><br>
                        <input type="file" style="width: 100%; margin-top: 10px" name="screenshot" required> <br><br>
                    </div>
                    <button type="submit" class="btn btn-warning ps-4 pe-4 ms-auto text-light" name="submit">Hire</button>
                </form>
            </div>
        </div>
    </div>
    <?php
        include('footer.html');
    ?>

<?php
    if (isset($_POST['submit'])) {
        if ($password != $_SESSION["password"]) {
            ?><script>
                seterror("fpassword", "*Wrong password!");
                function seterror(id, error) {
                    element = document.getElementById(id);
                    element.getElementsByClassName('formerror')[0].innerHTML = error;
                }
            </script><?php
        }
    }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>