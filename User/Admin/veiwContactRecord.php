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
    $messageId = $_GET['record'];
    $select2 = " SELECT * FROM contact_record where messageId=$messageId";
    $query2 = mysqli_query($conn, $select2);
    $result2 = mysqli_fetch_array($query2);
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
            <div class="col-10 cl8 pt-2">
                <h1 style="text-align: center;">User Contact Record</h1>
                <hr>
                <div class="row rr1">
                    <div class="col ccl1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><strong>M.Id: <?php echo $result2['messageId']?></strong></h5>
                                <h5 class="card-title"><?php echo $result2['name']?></h5>
                                <p class="card-text">
                                    <strong>Email : </strong><?php echo $result2['email']?><br>
                                    <strong>Reason : </strong><?php echo $result2['subject']?><br>
                                    <strong>Message : </strong><?php echo $result2['message']?><br>
                                    <strong>Reply : </strong><?php echo $result2['reply']?>
                                </p>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Reply Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reply to <?php echo $result2['name']?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form name="myform" method="POST">
      <div class="modal-body">
        <textarea style="padding: 4px;" name="reply" required cols="60" rows="5"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name=submit value="Send" class="btn btn-primary" >
      </div>
    </form>
    </div>
  </div>
 </div>
 
<?php
    if(isset($_POST['submit'])){
        $reply = $_POST['reply'];
        $update = "UPDATE `contact_record` SET `reply`='$reply' WHERE messageId=$messageId";
        $query = mysqli_query($conn, $update);
        if($query){
            // header("Refresh:0");
        }
    } 
?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>