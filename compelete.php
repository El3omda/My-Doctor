<?php

require_once 'config.php';

session_start();

@$id = $_REQUEST['id'];
if (!isset($id)) {
  header("Refresh:1;url=index.php");
}

$sqlGO = "SELECT * FROM offers WHERE ID = '$id'";
$resultGO = mysqli_query($conn, $sqlGO);
$rowGO = $resultGO->fetch_assoc();

if (isset($_SESSION['UserEmail'])) {
  $UserEmail = $_SESSION['UserEmail'];
  $sqlGUD = "SELECT * FROM users WHERE UserEmail = '$UserEmail'";
  $resultGUD = mysqli_query($conn, $sqlGUD);
  $rowGUD = $resultGUD->fetch_assoc();
}



if (isset($_POST['Submit'])) {
  $PatientName = $_POST['Name'];
  $PatientAge = $_POST['Age'];
  $PatientGender = $_POST['Gender'];
  $PatientPhone = $_POST['Phone'];
  $PatientEmail = $_POST['Email'];
  $OfferId = $_REQUEST['id'];

  $sqlInsertOrder = "INSERT INTO orders (PatientName,PatientEmail,PatientAge,PatientPhone,PatientGender,OfferID)
   VALUES ('$PatientName','$PatientEmail','$PatientAge','$PatientPhone','$PatientGender','$OfferId')";
  if (mysqli_query($conn, $sqlInsertOrder)) {
    $msg = "تم ارسال الطلب و سيتم التواصل معك بالهاتف في اقرب وقت";
    header("Refresh:3;url=index.php");
  } else {
    $msg = "تاكد من ادخال البيانات بشكل صحيح" . mysqli_error($conn);
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
  <title>طلب الحجز</title>
  <link rel="stylesheet" href="css/order.css">
</head>

<body>

  <?php include 'nav.php'; ?>

  <?php


  if (!isset($_SESSION['UserEmail'])) {
    echo '
    <p class="register">
    <i class="fa fa-times"></i>
      انت غير مسجل بالموقع اضغط <a href="my-acount.php">تسجيل</a> لتسجيل حساب في الموقع للوصول السهل و تلقي العروض و متابعة الاطباء و استشارتهم او يمكنك الاكمال بدون الاستمتاع بالمزايا الكاملة التي يقدمها موقع طبيبي
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
    <p class="sec">تفاصيل الطلب</p>
    <div class="order-info">
      <p class="name">العرض : <span><?php echo $rowGO['OffName']; ?></span></p>
      <p class="details">تفاصيل العرض : <span><?php echo $rowGO['OffDetails']; ?></span></p>
      <p class="address">عنوان العيادة : <span><?php echo $rowGO['OffClinicAddress']; ?></span></p>
      <p class="price"> السعر بعد الخصم : EGP <span><?php echo $rowGO['OffNPrice']; ?></span></p>
      <p class="discount">مبلغ الخصم : EGP <span><?php echo (int)$rowGO['OffOPrice'] - (int)$rowGO['OffNPrice']; ?></span></p>
    </div>
    <p class="sec">بيانات العميل</p>

    <div class="patient-info">
      <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="POST">
        <div class="input-feild">
          <label for="">الاسم</label>
          <input type="text" name="Name" value="<?php echo @$rowGUD['UserName']; ?>" required>
        </div>
        <div class="input-feild">
          <label for="">السن</label>
          <input type="text" name="Age" value="<?php echo @$rowGUD['UserAge']; ?>" required>
        </div>
        <div class="input-feild">
          <label for="Gender">النوع</label>
          <select name="Gender" id="Gender" required>

            <?php

            if (isset($_SESSION['UserEmail'])) {
              if (@$rowGUD['UserGender'] == 'male') {
                echo '
                  <option value="Male" selected>ذكر</option>
                  ';
              } else {
                echo '
                  <option value="Female" selected>انثي</option>
                ';
              }
            } else {
              echo '
                  <option value="Male">ذكر</option>
                  <option value="Female">انثي</option>
                  ';
            }

            ?>
          </select>
        </div>
        <div class="input-feild">
          <label for="phone">رقم الهاتف</label>
          <input type="text" name="Phone" id="phone" value="<?php echo @$rowGUD['UserPhone']; ?>">
        </div>
        <div class="input-feild">
          <label for="email">الايمال</label>
          <input type="text" name="Email" id="email" value="<?php echo @$rowGUD['UserEmail']; ?>">
        </div>
        <div class="input-feild">
          <input type="submit" name="Submit" value="ارسال الطلب">
        </div>
      </form>
    </div>
  </div>

  <?php include 'footer.php'; ?>
  <script>
    $('.register i').click(function() {
      $('.register').fadeOut('slow')
    })
    if (document.querySelector('.register i').innerHTML == "") {
      document.querySelector('.register').style.display = "none";
    }
  </script>
</body>

</html>