<?php

require_once 'config.php';

session_start();

if (!isset($_SESSION['UserEmail']) && !isset($_SESSION['DocEmail'])) {
  header('Location:404.php');
}


// Change Status Of Online

$ID = $_SESSION['ID'];

if ($_SESSION['AcountType'] == 'Patient') {
  $sqlSO = "UPDATE users SET Online = 'No' WHERE ID = '$ID'";
  mysqli_query($conn, $sqlSO);
}
if ($_SESSION['AcountType'] == 'Doctor') {
  $sqlSOD = "UPDATE doctors SET Online = 'No' WHERE ID = '$ID'";
  mysqli_query($conn, $sqlSOD);
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

session_destroy();
header("Refresh:3;url=index.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>يتم تسجيل خروجك . . .</title>
  <link rel="stylesheet" href="css/sign.css">
</head>

<body>

  <div class="sign-out">
    <div class="image">
      <img src="imgs/logo.png" alt="">
    </div>
    <p class="text">يتم تسجيل خروجك . . .</p>
  </div>

</body>

</html>