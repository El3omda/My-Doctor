<?php

session_start();

if (isset($_SESSION['UserEmail']) or isset($_SESSION['DocEmail'])) {
  header("Location:dashboard.php");
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Doctor Account || حساب علي طبيبي</title>
  <link rel="stylesheet" href="css/sign.css">
</head>

<body>
  <?php include 'nav.php'; ?>


  <div class="account-type">
    <p class="head">ماذا تريد ان تفعل</p>
    <div class="btn-container">
      <a href="sign-up.php" class="btn btn-patient">تسجيل حساب جديد</a>
      <a href="sign-in.php" class="btn btn-doctor">تسجيل الدخول</a>
    </div>
  </div>



  <?php include 'footer.php'; ?>
</body>

</html>