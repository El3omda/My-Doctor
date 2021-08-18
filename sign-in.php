<?php


// Start Connection to DAtabase

require_once 'config.php';

// Start Session

session_start();

if (isset($_SESSION['UserEmail'])) {
  header("Location:dashboard.php");
}

if (isset($_SESSION['DocEmail'])) {
  header("Location:dashboard.php");
}

// Patient Sign In

if (isset($_POST['submit'])) {
  // Sql For Check Login Datails

  # Get User Entered Data

  $UserEmail = $_POST['UserEmail'];
  $UserPassword = $_POST['UserPassword'];

  $sqlCD = "SELECT * FROM users WHERE UserEmail = '$UserEmail' AND UserPassword = '$UserPassword'";

  $resultCD = mysqli_query($conn, $sqlCD);
  $rowCD = $resultCD->fetch_assoc();
  if ($resultCD->num_rows > 0) {
    $msg = "تم تسجيل الدخول بنجاح سيتم تحويلك بعد 3 ثواني";
    $_SESSION['UserEmail'] = $rowCD['UserEmail'];
    $_SESSION['UserName'] = $rowCD['UserName'];
    $_SESSION['ID'] = $rowCD['ID'];

    if ($_SESSION['UserEmail'] == 'admin@admin.com') {
      $_SESSION['AcountType'] = 'Admin';
    } else {
      $_SESSION['AcountType'] = 'Patient';
    }

    // Change Online Status

    $sqlCSO = "UPDATE users SET Online = 'Yes' WHERE UserEmail = '$UserEmail'";
    mysqli_query($conn, $sqlCSO);

    header('Refresh:3;url=dashboard.php');
  } else {
    $sqlCDD = "SELECT * FROM doctors WHERE DocEmail = '$UserEmail' AND DocPassword = '$UserPassword'";

    $resultCDD = mysqli_query($conn, $sqlCDD);
    $rowCDD = $resultCDD->fetch_assoc();
    if ($resultCDD->num_rows > 0) {
      $msg = "تم تسجيل الدخول بنجاح سيتم تحويلك بعد 3 ثواني";
      $_SESSION['DocEmail'] = $rowCDD['DocEmail'];
      $_SESSION['UserName'] = $rowCDD['DocName'];
      $_SESSION['ID'] = $rowCDD['ID'];
      $_SESSION['AcountType'] = 'Doctor';

      // Change Online Status

      $sqlCSOD = "UPDATE doctors SET Online = 'Yes' WHERE DocEmail = '$UserEmail'";
      mysqli_query($conn, $sqlCSOD);

      header('Refresh:3;url=dashboard.php');
    } else {
      $msg = "البيانات المدخلة غير صحيحة";
    }
  }
}


// echo "<pre> session";
// print_r($_SESSION);
// echo "</pre>";
// echo "<pre> post";
// print_r($_POST);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل الدخول لحسابك</title>
  <link rel="stylesheet" href="css/sign.css">
</head>

<body>


  <!-- Include Nav -->

  <?php include 'nav.php'; ?>


  <!-- Start Sign In -->

  <div style="margin-top: 5px;" class="screen">
    <i class="fa fa-times"></i>
    <span><?php echo @$msg; ?></span>
  </div>

  <div style="margin: 24px auto;" class="sign-in">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

      <div class="input-feild">
        <label for="UserEmail">الايمال</label>
        <input id="UserEmail" name="UserEmail" type="email" placeholder="أكتب ايمالك . . ." autocomplete="off" required>
      </div>

      <div class="input-feild">
        <label for="UserPassword">كلمة المرور</label>
        <input id="UserPassword" name="UserPassword" type="password" placeholder="أكتب كلمة المرور . . ." autocomplete="off" required>
      </div>

      <input type="submit" name="submit" value="تسجيل الدخول">

    </form>

  </div>

  <!-- End Sign In -->

  <!-- Include Footer -->

  <?php include 'footer.php'; ?>

  <script>
    var screen = document.querySelector('.screen');
    var screenSpan = document.querySelector('.screen span');
    var screenClose = document.querySelector('.screen i');

    if (screenSpan.innerHTML == "البيانات المدخلة غير صحيحة") {
      screen.classList.add('faild');
      screen.style.display = 'block';
    } else if (screenSpan.innerHTML == "تم تسجيل الدخول بنجاح سيتم تحويلك بعد 3 ثواني") {
      screen.classList.add('success');
      screen.style.display = 'block';
    } else {
      screen.style.display = 'none';
    }

    screenClose.onclick = function() {
      screen.style.display = 'none';
    }
  </script>
</body>

</html>