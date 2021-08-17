<?php

// Start Connection

require_once 'config.php';

if (isset($_POST['patient'])) {
  // Get User Inputs

  $UserName = $_POST['UserName'];
  $UserEmail = $_POST['UserEmail'];
  $UserPassword = $_POST['UserPassword'];
  $UserAge = $_POST['UserAge'];
  $UserGender = $_POST['UserGender'];

  // Get User Country And City From His Ip

  // $clientip = $_SERVER['REMOTE_ADDR'];
  $clientip = '197.55.94.168';
  $scrapIp = file_get_contents("https://ipinfo.io/" . $clientip . '/json');

  $ipData = json_decode($scrapIp);
  $UserCountry = $ipData->country . ',' . $ipData->city;

  // Sql For Insert User Data
  $sqlIU = "INSERT INTO users (UserName,UserEmail,UserPassword,UserAge,UserGender,UserCountry,Online) VALUES ('$UserName','$UserEmail','$UserPassword','$UserAge','$UserGender','$UserCountry','No')";
  if (mysqli_query($conn, $sqlIU)) {
    $msg = 'تم تسجيل الحساب بنجاح اضغط  <a href="sign-in.php">لتسجيل الدخول</a>';
  } else {
    $msg = 'لم يتم تسجيل الحساب بنجاح الايمال مستخدم بالفعل';
  }
}


// Doctor Data

if (isset($_POST['doctor'])) {
  // Get User Inputs

  $UserName = $_POST['UserName'];
  $UserEmail = $_POST['UserEmail'];
  $UserPassword = $_POST['UserPassword'];
  $UserAge = $_POST['UserAge'];
  $UserGender = $_POST['UserGender'];
  $DocPhone = $_POST['DocPhone'];
  $DocSpec = $_POST['DocSpec'];
  $DocClinic = $_POST['DocClinic'];

  // Get User Country And City From His Ip

  // $clientip = $_SERVER['REMOTE_ADDR'];
  $clientip = '197.55.94.168';
  $scrapIp = file_get_contents("https://ipinfo.io/" . $clientip . '/json');

  $ipData = json_decode($scrapIp);
  $UserCountry = $ipData->country . ',' . $ipData->city;

  // Sql For Insert User Data
  $sqlID = "INSERT INTO doctors (DocName,DocEmail,DocPassword,DocPhone,DocGender,DocAge,DocCountry,Online) VALUES ('$UserName','$UserEmail','$UserPassword','$DocPhone','$UserGender','$UserAge','$UserCountry','No')";
  if (mysqli_query($conn, $sqlID)) {
    $msg = 'تم تسجيل الحساب بنجاح اضغط  <a href="sign-in.php">لتسجيل الدخول</a>';
  } else {
    $msg = 'لم يتم تسجيل الحساب بنجاح الايمال مستخدم بالفعل';
  }
}

// echo "<pre>";

// print_r($_POST);

// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل حساب جديد</title>
  <link rel="stylesheet" href="css/sign.css">
</head>

<body>

  <!-- Include Nav.php -->

  <?php include 'nav.php'; ?>

  <!-- Start Sign up -->

  <div class="sign-up">

    <!-- Start Acount Type -->

    <div style="margin-top: -100px;" class="screen">
      <i class="fa fa-times"></i>
      <span><?php echo @$msg; ?></span>
    </div>

    <div class="account-type">
      <p class="head">اختار نوع الحساب</p>
      <div class="btn-container">
        <button class="btn btn-patient">مريض</button>
        <button class="btn btn-doctor">طبيب</button>
      </div>
    </div>

    <!-- End Acount Type -->

    <!-- If Gust Select Patient -->

    <div class="patient-sign-up">

      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

        <div class="input-feild">
          <label for="UserName">الاسم</label>
          <input name="UserName" id="UserName" type="text" placeholder="أكتب اسمك . . ." autocomplete="off" required>
        </div>

        <div class="input-feild">
          <label for="UserEmail">الايمال</label>
          <input name="UserEmail" id="UserEmail" type="email" placeholder="أكتب ايمالك . . ." autocomplete="off" required>
        </div>

        <div class="input-feild">
          <label for="UserPassword">كلمة المرور</label>
          <input name="UserPassword" id="UserPassword" type="password" placeholder="أكتب كلمة المرور . . " autocomplete="off" required>
        </div>

        <div class="input-feild">
          <label for="UserAge">السن</label>
          <input name="UserAge" id="UserAge" type="number" placeholder="أكتب كم عمرك . . " autocomplete="off" required>
        </div>

        <div class="input-feild">
          <label for="UserGender">النوع</label>
          <select name="UserGender" id="UserGender" required>
            <option selected disabled>أكتب نوعك . .</option>
            <option value="male">ذكر</option>
            <option value="female">انثي</option>
          </select>
        </div>

        <input type="submit" name="patient" value="تسجيل الحساب">

      </form>

    </div>

    <!-- If Gust Select Doctor -->

    <div class="doctor-sign-up">

      <form action="" method="POST">

        <div class="input-feild">
          <label for="UserName">الاسم</label>
          <input name="UserName" id="UserName" type="text" placeholder="أكتب اسمك . . ." autocomplete="off" required>
        </div>

        <div class="input-feild">
          <label for="UserEmail">الايمال</label>
          <input name="UserEmail" id="UserEmail" type="email" placeholder="أكتب ايمالك . . ." autocomplete="off" required>
        </div>

        <div class="input-feild">
          <label for="UserPassword">كلمة المرور</label>
          <input name="UserPassword" id="UserPassword" type="password" placeholder="أكتب كلمة المرور . . " autocomplete="off" required>
        </div>

        <div class="input-feild">
          <label for="UserAge">السن</label>
          <input name="UserAge" id="UserAge" type="number" placeholder="أكتب كم عمرك . . " autocomplete="off" required>
        </div>

        <div class="input-feild">
          <label for="UserGender">النوع</label>
          <select name="UserGender" id="UserGender" required>
            <option selected disabled>أكتب نوعك . .</option>
            <option value="male">ذكر</option>
            <option value="female">انثي</option>
          </select>
        </div>

        <div class="input-feild">
          <label for="DocPhone">الهاتف</label>
          <input name="DocPhone" id="DocPhone" type="text" placeholder="أكتب رقم هاتفك . . " autocomplete="off" required>
        </div>

        <div class="input-feild">
          <label for="DocSpec">تخصصك</label>
          <input name="DocSpec" id="DocSpec" type="text" placeholder="أكتب تخصصك . . " autocomplete="off" required>
        </div>

        <div class="input-feild">
          <label for="DocClinic">العيادة</label>
          <input name="DocClinic" id="DocClinic" type="text" placeholder="أكتب عنوان عيادتك . . " autocomplete="off" required>
        </div>

        <input type="submit" name="doctor" value="تسجيل الحساب">

      </form>

    </div>

  </div>

  <!-- End Sign up -->

  <!-- Include Nav.php -->

  <?php include 'footer.php'; ?>


  <script>
    var accountType = document.querySelector('.account-type');
    var patient = document.querySelector('.patient-sign-up');
    var doctor = document.querySelector('.doctor-sign-up');
    var btnpatien = document.querySelector('.btn-patient');
    var btndoctor = document.querySelector('.btn-doctor');

    window.onload = function() {
      patient.style.display = "none";
      doctor.style.display = "none";
    }
    btnpatien.onclick = function() {
      accountType.style.display = "none";
      patient.style.display = "block";
    }
    btndoctor.onclick = function() {
      accountType.style.display = "none";
      doctor.style.display = "block";
    }

    var screen = document.querySelector('.screen');
    var screenSpan = document.querySelector('.screen span');
    var screenClose = document.querySelector('.screen i');

    if (screenSpan.innerHTML == "لم يتم تسجيل الحساب بنجاح الايمال مستخدم بالفعل") {
      screen.classList.add('faild');
      screen.style.display = 'block';
    } else if (screenSpan.innerHTML == "تم تسجيل الحساب بنجاح اضغط  <a href=\"sign-in.php\">لتسجيل الدخول</a>") {
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