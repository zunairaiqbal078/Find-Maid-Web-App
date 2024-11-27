<?php
    session_start();
    if (isset($_SESSION["adminId"])){
        header('location:index.php');
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
    <div class="container-fluid c1">
        <form method="post" name="signInForm">
        <div class="row r1">
            <div class="col-lg-4 col-md-6 col-sm-8 col-10 mt-5 text-center cl">
                <h3 class="my-5">Login Your Account</h3>
                <input type="email" class="input mb-3" placeholder="Email" name="email" required><br>
                <input type="text" class="input mt-3" placeholder="Password" name="password" required><br><span class="error text-danger"></span><br>
                <input type="submit" class="submit mt-4" name="submit" value="Sign In">
            </div>
        </div>
        </form>
    </div>
<?php
    include('conn.php');
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $select = "SELECT * FROM `admin_record` WHERE email='$email' and password='$password' ";
        $query = mysqli_query($conn, $select);
        $result = mysqli_fetch_array($query);
        $data = mysqli_num_rows($query);
 
        if ($data > 0) {
            $_SESSION["adminId"] = $result['adminId'];
            $_SESSION["name"] = $result['name'];
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $result['password'];
            header('location:index.php');
        } 
        else{
            ?><script>
                document.getElementsByClassName("error")[0].innerHTML = '*Wrong email or password!';
            </script><?php
        }
    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>