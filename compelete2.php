<?php

require_once 'config.php';

session_start();

@$id = $_REQUEST['id'];
if (!isset($id)) {
  header("Refresh:1;url=index.php");
}

$sqlGO = "SELECT * FROM doctors WHERE ID = '$id'";
$resultGO = mysqli_query($conn, $sqlGO);
$rowGO = $resultGO->fetch_assoc();

if (isset($_SESSION['UserEmail'])) {
  $UserEmail = $_SESSION['UserEmail'];
  $sqlGUD = "SELECT * FROM users WHERE UserEmail = '$UserEmail'";
  $resultGUD = mysqli_query($conn, $sqlGUD);
  $rowGUD = $resultGUD->fetch_assoc();
}



if (isset($_POST['Submit'])) {
  $PatientName = $rowGUD['UserName'];
  $DocName = $rowGO['DocName'];
  $Question = $_POST['patientQues'];
  $AdditionalData = $_POST['additionalInfo'];

  $sqlInsertOrder = "INSERT INTO questions (Question,SendFrom,SendTo,AdditionalData)
   VALUES ('$Question','$PatientName','$DocName','$AdditionalData')";
  if (mysqli_query($conn, $sqlInsertOrder)) {
    $msg = "تم ارسال الاستشارة بنجاح";
    header("Refresh:3;url=index.php");
  } else {
    $msg = "تاكد من ادخال البيانات بشكل صحيح";
  }
}

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>طلب استشارة</title>
  <link rel="stylesheet" href="css/order.css">
  <link rel="stylesheet" href="css/booking-questions.css">
</head>

<body>

  <?php include 'nav.php'; ?>

  <?php


  if (!isset($_SESSION['UserEmail'])) {
    echo '
    <p class="register">
    <i class="fa fa-times"></i>
      انت غير مسجل بالموقع اضغط <a href="my-acount.php">تسجيل</a> حتي تسطيع استشارة الطبيب
    </p>
    ';
  } else {
    echo '
    <p class="register">
    <i class="fa fa-times"></i>
      ' . @$msg . '
    </p>
    ';
  }


  ?>

  <div class="com-cont">
    <p class="sec">تفاصيل الطبيب</p>
    <div class="doc-info">
      <div class="order-info">
        <p class="name">اسم الطبيب : <span><?php echo $rowGO['DocName']; ?></span></p>
        <p class="details">تخصص الطبيب : <span><?php echo $rowGO['DocSpec']; ?></span></p>
        <p class="address">عنوان العيادة : <span><?php echo $rowGO['DocClinic']; ?></span></p>
      </div>
      <div class="doc-img">
        <img src="imgs/doc/d1.jpg" alt="">
      </div>
    </div>

    <?php

    if (isset($_SESSION['UserEmail']) && $_SESSION['AcountType'] != 'Doctor') {
      echo '
      <p class="sec">استشارة الطبيب</p>
    <div class="chat-box">
      <div class="ques"></div>
      <div class="replay"></div>
      <form action="" method="POST">
        <div class="send-chat">
          <div class="patient-question">
            <label for="patientQues">أكتب الاستشارة . . .</label>
            <textarea name="patientQues" id="patientQues" required></textarea>
          </div>
          <div class="additional-info">
            <label for="additionalInfo">معلومات اضافية عن الحالة . . . (اختياري)</label>
            <textarea name="additionalInfo" id="additionalInfo"></textarea>
          </div>
          <div class="send">
            <input type="submit" name="Submit" value="ارسال الاستشارة">
          </div>
        </div>
      </form>
    </div>
      ';
    } else {
      echo '';
    }

    ?>
  </div>

  <?php include 'footer.php'; ?>
  <script>
    $('.register i').click(function() {
      $('.register').fadeOut('slow')
    })
  </script>
</body>

</html>