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
    $select = " SELECT * FROM purchased_record order by purchasedId desc";
    $query2 = mysqli_query($conn, $select);
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
            <div class="col-10 text-center cl6 pt-5">
                <h1>Purchase  Records</h1>
                <hr>
                <div class="col ccl1">
                    <table>
                        <thead style="border-bottom: 10px;">
                        <tr>
                            <th>Purchased_Id</th>
                            <th>User Id</th>
                            <th>Maid Id</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Amount</th>
                            <th>Amount Status</th>
                            <th>Amount SS</th>
                            <th colspan="2">Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($result2 = mysqli_fetch_array($query2)){
                            ?>
                        <tr>
                            <th><?php echo $result2['purchasedId']?></th>
                            <th><?php echo $result2['userId']?></th>
                            <th><?php echo $result2['maidId']?></th>
                            <td><?php echo $result2['startDate']?></td>
                            <td><?php echo $result2['endDate']?></td>
                            <td><?php echo $result2['amount']?></td>
                            <td><?php echo $result2['amountStatus']?></td>
                            <td><?php echo $result2['amountSS']?></td>
                            <td><a href="veiwpurchasedRecord.php?record=<?php echo $result2['purchasedId'] ?>">Veiw</a></td>
                            <td><a href="deletePurchasedRecord.php?record=<?php echo $result2['purchasedId'] ?>">Delete</a></td>
                        </tr>
                            <?php
                            } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>