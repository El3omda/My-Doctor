<?php

session_start();

if (!isset($_SESSION['DocEmail']) and !isset($_SESSION['UserEmail'])) {
  header("Location:my-acount.php");
}

// Connect to Database

require_once 'config.php';

// If User Is Patient

if ($_SESSION['AcountType'] == 'Patient' || $_SESSION['AcountType'] == 'Admin') {
  $UserEmail = $_SESSION['UserEmail'];
} else {
  $UserEmail = $_SESSION['DocEmail'];
}

if ($_SESSION['AcountType'] == 'Patient' || $_SESSION['AcountType'] == 'Admin') {
  // Get User Data 
  $sqlUD = "SELECT * FROM users WHERE UserEmail = '$UserEmail'";
  $resultUD = mysqli_query($conn, $sqlUD);
  $rowUD = $resultUD->fetch_assoc();

  // Get Offers DAta

  $UserLocation = $rowUD['UserCountry'];

  $sqlOffD = "SELECT * FROM offers WHERE OffAvaliable = 'Yes' AND GeoLocation = '$UserLocation'";
  $resultOffD = mysqli_query($conn, $sqlOffD);

  // Get Doctors Data
  @$DocName = $_POST['DocName'];
  @$DocSpe = $_POST['DocSpe'];
  @$DocClinic = $_POST['DocClinic'];
  if (!empty($DocName)) {
    $sqlDD = "SELECT * FROM doctors WHERE DocName LIKE '$DocName%' OR DocName LIKE '_$DocName%'
     OR DocName LIKE '__$DocName%' OR DocName LIKE '___$DocName%' OR DocName LIKE '_____$DocName%'
     OR DocName LIKE '__$DocName%' OR DocName LIKE '___$DocName%' OR DocName LIKE '_____$DocName%'
     OR DocName LIKE '_________$DocName%' OR DocName LIKE '__________$DocName%' OR DocName LIKE '___________$DocName%'
     ";
    $resultDD = mysqli_query($conn, $sqlDD);
  }
  if (!empty($DocSpe)) {
    $sqlDD = "SELECT * FROM doctors WHERE DocSpec LIKE '$DocSpe%' OR DocSpec LIKE '_$DocSpe%'
    OR DocSpec LIKE '__$DocSpe%' OR DocSpec LIKE '___$DocSpe%' OR DocSpec LIKE '_____$DocSpe%'
    OR DocSpec LIKE '______$DocSpe%' OR DocSpec LIKE '_______$DocSpe%' OR DocSpec LIKE '_______$DocSpe%'
    OR DocSpec LIKE '________$DocSpe%' OR DocSpec LIKE '_________$DocSpe%' OR DocSpec LIKE '__________$DocSpe%'
    ";
    $resultDD = mysqli_query($conn, $sqlDD);
  }
  if (!empty($DocClinic)) {
    $sqlDD = "SELECT * FROM doctors WHERE DocClinic LIKE '$DocClinic%' OR DocClinic LIKE '_$DocClinic%'
    OR DocClinic LIKE '__$DocClinic%' OR DocClinic LIKE '___$DocClinic%' OR DocClinic LIKE '_____$DocClinic%'
    OR DocClinic LIKE '______$DocClinic%' OR DocClinic LIKE '_______$DocClinic%' OR DocClinic LIKE '_______$DocClinic%'
    OR DocClinic LIKE '________$DocClinic%' OR DocClinic LIKE '_________$DocClinic%' OR DocClinic LIKE '__________$DocClinic%'
    ";
    $resultDD = mysqli_query($conn, $sqlDD);
  }

  // Get Doctors Data
  @$DocName1 = $_POST['DocName1'];
  @$DocSpe1 = $_POST['DocSpe1'];
  @$DocClinic1 = $_POST['DocClinic1'];
  if (!empty($DocName1)) {
    $sqlDD1 = "SELECT * FROM doctors WHERE DocName LIKE '$DocName1%' OR DocName LIKE '_$DocName1%'
     OR DocName LIKE '__$DocName1%' OR DocName LIKE '___$DocName1%' OR DocName LIKE '_____$DocName1%'
     OR DocName LIKE '__$DocName1%' OR DocName LIKE '___$DocName1%' OR DocName LIKE '_____$DocName1%'
     OR DocName LIKE '_________$DocName1%' OR DocName LIKE '__________$DocName1%' OR DocName LIKE '___________$DocName1%'
     ";
    $resultDD1 = mysqli_query($conn, $sqlDD1);
  }
  if (!empty($DocSpe)) {
    $sqlDD1 = "SELECT * FROM doctors WHERE DocSpec LIKE '$DocSpe1%' OR DocSpec LIKE '_$DocSpe1%'
    OR DocSpec LIKE '__$DocSpe1%' OR DocSpec LIKE '___$DocSpe1%' OR DocSpec LIKE '_____$DocSpe1%'
    OR DocSpec LIKE '______$DocSpe1%' OR DocSpec LIKE '_______$DocSpe1%' OR DocSpec LIKE '_______$DocSpe1%'
    OR DocSpec LIKE '________$DocSpe1%' OR DocSpec LIKE '_________$DocSpe1%' OR DocSpec LIKE '__________$DocSpe1%'
    ";
    $resultDD1 = mysqli_query($conn, $sqlDD1);
  }
  if (!empty($DocClinic)) {
    $sqlDD1 = "SELECT * FROM doctors WHERE DocClinic LIKE '$DocClinic1%' OR DocClinic LIKE '_$DocClinic1%'
    OR DocClinic LIKE '__$DocClinic1%' OR DocClinic LIKE '___$DocClinic1%' OR DocClinic LIKE '_____$DocClinic1%'
    OR DocClinic LIKE '______$DocClinic1%' OR DocClinic LIKE '_______$DocClinic1%' OR DocClinic LIKE '_______$DocClinic1%'
    OR DocClinic LIKE '________$DocClinic1%' OR DocClinic LIKE '_________$DocClinic1%' OR DocClinic LIKE '__________$DocClinic1%'
    ";
    $resultDD1 = mysqli_query($conn, $sqlDD1);
  }

  // Start Edit Profile

  if (isset($_POST['update'])) {
    @$UserName = $_POST['UserName'];
    @$UserEmail = $_POST['UserEmail'];
    @$UserPassword = $_POST['UserPassword'];
    @$UserAge = $_POST['UserAge'];
    @$UserGender = $_POST['UserGender'];
    @$UserEmailCh = $_SESSION['UserEmail'];
    @$sqlUP = "UPDATE users SET UserName = '$UserName', UserEmail = '$UserEmail',UserPassword = '$UserPassword',UserAge = '$UserAge',UserGender = '$UserGender' WHERE UserEmail = '$UserEmailCh' WHERE DocName = '$DocName'";
    if (mysqli_query($conn, $sqlUP)) {
      $msg = "تم تعديل البيانات بنجاح";
      echo $msg;
    } else {
      $msg = "لم يتم تعديل البيانات حاول مجدداً و تأكد من ادخال كافة البيانات" . mysqli_error($conn);
      echo $msg;
    }
  }

  // Get Doctor Numbers 
  $sqlDN = "SELECT COUNT(DocNAme) AS DN FROM doctors";
  $resultDN = mysqli_query($conn, $sqlDN);
  $rowDN = $resultDN->fetch_assoc();
  // Get Doctor Online No 
  $sqlDNO = "SELECT COUNT(DocNAme) AS DNO FROM doctors WHERE Online = 'Yes'";
  $resultDNO = mysqli_query($conn, $sqlDNO);
  $rowDNO = $resultDNO->fetch_assoc();
  // Get Users Numbers 
  $sqlUN = "SELECT COUNT(UserName) AS UN FROM users WHERE UserEmail != 'admin@admin.com'";
  $resultUN = mysqli_query($conn, $sqlUN);
  $rowUN = $resultUN->fetch_assoc();
  // Get Users Online No 
  $sqlUNO = "SELECT COUNT(UserName) AS UNO FROM users WHERE Online = 'Yes' AND UserEmail != 'admin@admin.com'";
  $resultUNO = mysqli_query($conn, $sqlUNO);
  $rowUNO = $resultUNO->fetch_assoc();
  // Get Offers No
  $sqlOffNo = "SELECT COUNT(ID) AS ID FROM offers";
  $resultON = mysqli_query($conn, $sqlOffNo);
  $rowOffNo = $resultON->fetch_assoc();
  // Get ALL Doctor Data
  $sqlGAD = "SELECT * FROM doctors";
  $resultGAD = mysqli_query($conn, $sqlGAD);
  // Delete Selected Doctor By ID 
  if (isset($_POST['delete'])) {
    $DoId = $_POST['id'];
    $sqlDeDo = "DELETE FROM doctors WHERE ID = '$DoId'";
    mysqli_query($conn, $sqlDeDo);
  }
  // Get ALL Users Data
  $sqlGAU = "SELECT * FROM users";
  $resultGAU = mysqli_query($conn, $sqlGAU);
  // Delete Selected User By ID 
  if (isset($_POST['deleteUser'])) {
    $UiId = $_POST['idUser'];
    $sqlDeUs = "DELETE FROM users WHERE ID = '$UiId'";
    mysqli_query($conn, $sqlDeUs);
  }
}

// If User IS Doctor 

if ($_SESSION['AcountType'] == 'Doctor') {
  // Get Doctor Data
  $sqlGDD = "SELECT * FROM doctors WHERE DocEmail = '$UserEmail'";
  $resultGDD = mysqli_query($conn, $sqlGDD);
  $rowGDD = $resultGDD->fetch_assoc();

  // Get Doctor Data For Staticss
  # Get New Booking Data
  $DocName = $rowGDD['DocName'];
  $sqlGNB = "SELECT COUNT(*) AS NB FROM orders WHERE DocName = '$DocName' AND Aproved = 'No'";
  $resultGNB = mysqli_query($conn, $sqlGNB);
  $rowGNB = $resultGNB->fetch_assoc();
  # Get New Questions Data
  $sqlGNQ = "SELECT COUNT(*) AS NQ FROM questions WHERE SendTo = '$DocName' AND Answer = 'لم يتم الرد بعد'";
  $resultGNQ = mysqli_query($conn, $sqlGNQ);
  $rowGNQ = $resultGNQ->fetch_assoc();
  # Get All Questions Count
  $sqlGNQT = "SELECT COUNT(*) AS NQT FROM questions WHERE SendTo = '$DocName'";
  $resultGNQT = mysqli_query($conn, $sqlGNQT);
  $rowGNQT = $resultGNQT->fetch_assoc();
  # Get All Booking Count
  $sqlGNBT = "SELECT COUNT(*) AS NBT FROM orders WHERE DocName = '$DocName'";
  $resultGNBT = mysqli_query($conn, $sqlGNBT);
  $rowGNBT = $resultGNBT->fetch_assoc();
  // Get Not Aproved Booking
  $sqlGNAB = "SELECT * FROM orders WHERE DocName = '$DocName' AND Aproved = 'No'";
  $resultGNAB = mysqli_query($conn, $sqlGNAB);
  // Get Aproved Booking
  $sqlGAB = "SELECT * FROM orders WHERE DocName = '$DocName' AND Aproved = 'Yes'";
  $resultGAB = mysqli_query($conn, $sqlGAB);
  // Get New Questions
  $sqlGNQ2 = "SELECT * FROM questions WHERE SendTo = '$DocName' AND Answer = 'لم يتم الرد بعد'";
  $resultGNQ2 = mysqli_query($conn, $sqlGNQ2);
  // Get Old Questions
  $sqlGOQ2 = "SELECT * FROM questions WHERE SendTo = '$DocName' AND Answer != 'لم يتم الرد بعد'";
  $resultGOQ2 = mysqli_query($conn, $sqlGOQ2);

  if (isset($_POST['updateD'])) {

    @$UserName = $_POST['UserName'];
    @$UserEmail = $_POST['UserEmail'];
    @$UserPassword = $_POST['UserPassword'];
    @$UserAge = $_POST['UserAge'];
    @$UserGender = $_POST['UserGender'];
    @$DocPhone = $_POST['DocPhone'];
    @$DocSpec = $_POST['DocSpec'];
    @$DocClinic = $_POST['DocClinic'];
    $docEmail2 = $_SESSION['DocEmail'];
    // Sql Update Doc Data
    $sqlUDD = "UPDATE doctors SET DocName = '$UserName',DocEmail = '$UserEmail',DocPassword = '$UserPassword',DocPhone = '$DocPhone',DocGender = '$UserGender',DocAge = '$UserAge',DocSpec = '$DocSpec',DocClinic = '$DocClinic' WHERE DocEmail = '$docEmail2'";
    if (mysqli_query($conn, $sqlUDD)) {
      $msg = "تم تحديث البيانات بنجاح";
    } else {
      $msg = "خطا حاول مجدداً";
    }
  }
}
@$Aprove = $_REQUEST['Ap'];
if ($_SERVER['QUERY_STRING'] == "Ap=" . $Aprove) {
  $sqlMIA = "UPDATE orders SET Aproved = 'Yes' WHERE ID = '$Aprove'";
  mysqli_query($conn, $sqlMIA);
}

@$Del = $_REQUEST['De'];
if ($_SERVER['QUERY_STRING'] == "De=" . $Del) {
  $sqlDI = "DELETE FROM orders WHERE ID = '$Del'";
  mysqli_query($conn, $sqlDI);
}


// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// echo $_SERVER['QUERY_STRING'];
// echo $_REQUEST['Ap'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>الصفحة الرئيسية</title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>


  <!-- Start Main Nav -->
  <nav>
    <div class="sd-nav">
      <i class="fa fa-angle-right"></i>
    </div>
    <div class="main-nav-cont">
      <div class="logo">
        <img src="imgs/logo.png" alt="">
      </div>
      <ul>
        <?php

        if ($_SESSION['AcountType'] == 'Patient') {
          echo '
    
        <li class="active staticsbtn"><a href="#">احصائيات</a></li>
        <li class="offersbtn"><a href="#">العروض المتاحة</a></li>
        <li class="bookingbtn"><a href="#">احجز طبيب</a></li>
        <li class="questionbtn"><a href="#">طلب استشارة</a></li>
        <li class="editbtn"><a href="#">تعديل بيانات</a></li>

    ';
        } elseif ($_SESSION['AcountType'] == 'Admin') {
          echo '
   
        <li class="active staticsbtn"><a href="#">احصائيات</a></li>
        <li class="offersbtn"><a href="#">العروض</a></li>
        <li class="bookingbtn"><a href="#">الاطباء</a></li>
        <li class="questionbtn"><a href="#">الاعضاء</a></li>

    ';
        } elseif ($_SESSION['AcountType'] == 'Doctor') {
          echo '
          <li class="active staticsbtn"><a href="#">احصائيات</a></li>
        <li class="offersbtn"><a href="#">الحجوزات</a></li>
        <li class="bookingbtn"><a href="#">الاستشارات</a></li>
        <li class="questionbtn"><a href="#">تعديل بيانات</a></li>
          ';
        }

        ?>
        <li><a href="sign-out.php">تسجيل الخروج</a></li>

      </ul>
    </div>
  </nav>
  <!-- End Main Nav -->

  <!-- Start Main Content -->


  <div class="main-content">

    <div class="header">
      <p class="name">
        <?php
        if ($_SESSION['AcountType'] == 'Patient' || $_SESSION['AcountType'] == 'Admin') {
          echo $rowUD['UserName'];
        } else {
          echo $rowGDD['DocName'];
        }
        ?>
      </p>
      <p class="date"><?php echo date("D d-m-Y"); ?></p>
    </div>

    <div style="margin-top: 20px;" class="screen">
      <i class="fa fa-times"></i>
      <span><?php echo @$msg; ?></span>
    </div>

    <!-- Start Statics -->

    <?php

    if ($_SESSION['AcountType'] == 'Patient') {
      echo '

      <div class="statics">

        <div class="box">
          <p><i class="fa fa-id-card-o fa-fw fa-3x"></i></p>
          <div class="seperator"></div>
          <p class="info">الحجوزات</p>
          <p class="number">' . $rowUD['BookingNo'] . '</p>
        </div>

        <div class="box">
          <p><i class="fa fa-thermometer-empty fa-fw fa-3x"></i></p>
          <div class="seperator"></div>
          <p class="info">الاستشارات</p>
          <p class="number">' . $rowUD['QuestionNo'] . '</p>
        </div>

        <div class="box">
          <p><i class="fa fa-calendar fa-fw fa-3x"></i></p>
          <div class="seperator"></div>
          <p class="info">عضو منذ</p>
          <p class="number">' . $rowUD['RegDate'] . '</p>
        </div>

        <div class="box">
          <p><i class="fa fa-globe fa-fw fa-3x"></i></p>
          <div class="seperator"></div>
          <p class="info">المحافظة</p>
          <p class="number">' . $rowUD['UserCountry'] . '</p>
        </div>

        <div class="box contact">
          <p><i class="fa fa-envelope fa-fw fa-3x"></i></p>
          <div class="seperator"></div>
          <p class="info">الايمال</p>
          <p class="number">' . $rowUD['UserEmail'] . '</p>
        </div>

      </div>
    ';
    } elseif ($_SESSION['AcountType'] == 'Admin') {
      echo '

        <div class="statics">
      
          <div class="box">
            <p><i class="fa fa-id-card-o fa-fw fa-3x"></i></p>
            <div class="seperator"></div>
            <p class="info">الحجوزات</p>
            <p class="number">' . $rowUD['BookingNo'] . '</p>
          </div>
      
          <div class="box">
            <p><i class="fa fa-thermometer-empty fa-fw fa-3x"></i></p>
            <div class="seperator"></div>
            <p class="info">الاستشارات</p>
            <p class="number">' . $rowUD['QuestionNo'] . '</p>
          </div>
      
          <div class="box">
            <p><i class="fa fa-envelope fa-fw fa-3x"></i></p>
            <div class="seperator"></div>
            <p class="info">عدد الاطباء</p>
            <p class="number">' . $rowDN['DN'] . '</p>
          </div>

          <div class="box">
            <p><i class="fa fa-envelope fa-fw fa-3x"></i></p>
            <div class="seperator"></div>
            <p class="info">اطباء اونلاين</p>
            <p class="number">' . $rowDNO['DNO'] . '</p>
          </div>

          <div class="box">
            <p><i class="fa fa-envelope fa-fw fa-3x"></i></p>
            <div class="seperator"></div>
            <p class="info">عدد الاعضاء</p>
            <p class="number">' . $rowUN['UN'] . '</p>
          </div>

          <div class="box">
            <p><i class="fa fa-envelope fa-fw fa-3x"></i></p>
            <div class="seperator"></div>
            <p class="info">اعضاء اونلاين</p>
            <p class="number">' . $rowUNO['UNO']  . '</p>
          </div>

          <div class="box">
            <p><i class="fa fa-envelope fa-fw fa-3x"></i></p>
            <div class="seperator"></div>
            <p class="info">عدد العروض</p>
            <p class="number">' . $rowOffNo['ID']  . '</p>
          </div>
      
        </div>
        ';
    } elseif ($_SESSION['AcountType'] == 'Doctor') {
      echo '

        <div class="statics">
      
          <div class="box">
            <p><i class="fa fa-id-card-o fa-fw fa-3x"></i></p>
            <div class="seperator"></div>
            <p class="info">حجوزات جديدة</p>
            <p class="number">' . $rowGNB['NB'] . '</p>
          </div>
      
          <div class="box">
            <p><i class="fa fa-thermometer-empty fa-fw fa-3x"></i></p>
            <div class="seperator"></div>
            <p class="info" style="font-size:18px"> استشارات جديدة</p>
            <p class="number">' . $rowGNQ['NQ'] . '</p>
          </div>
      
          <div class="box">
            <p><i class="fa fa-thermometer-empty fa-fw fa-3x"></i></p>
            <div class="seperator"></div>
            <p class="info">حجوزات كلي</p>
            <p class="number">' . $rowGNBT['NBT'] . '</p>
          </div>

          <div class="box">
            <p><i class="fa fa-thermometer-empty fa-fw fa-3x"></i></p>
            <div class="seperator"></div>
            <p class="info">استشارات كلي</p>
            <p class="number">' . $rowGNQT['NQT'] . '</p>
          </div>
      
          <div class="box">
          <p><i class="fa fa-calendar fa-fw fa-3x"></i></p>
          <div class="seperator"></div>
          <p class="info">عضو منذ</p>
          <p class="number">' . $rowGDD['RegDate'] . '</p>
        </div>

        <div class="box">
          <p><i class="fa fa-globe fa-fw fa-3x"></i></p>
          <div class="seperator"></div>
          <p class="info">المحافظة</p>
          <p class="number">' . $rowGDD['DocCountry'] . '</p>
        </div>

        </div>
        ';
    }

    ?>

    <!-- End Statics -->


    <!-- Start Offers -->

    <?php

    if ($_SESSION['AcountType'] == 'Patient') {
      echo '
    <div class="offers">

        <p class="head">العروض المتاحة حالياً</p>

      ';


      if ($resultOffD->num_rows > 0) {
        while ($rowOffD = $resultOffD->fetch_assoc()) {
          echo '
            <div class="box">
              <div class="image">
                <img src="' . $rowOffD['OffImageSrc'] . '" alt="">
              </div>
              <div class="info">
                <div class="datails">
                  <p class="name">' . $rowOffD['OffName'] . '</p>
                  <p class="price"><span class="new">' . $rowOffD['OffNPrice'] . '</span>EGP | <span class="old">' . $rowOffD['OffOPrice'] . '</span>EGP</p>
                </div>
                <div class="show-more">
                  <a href="order.php?id=' . $rowOffD['ID'] . '"><i class="fa fa-angle-left"></i></a>
                </div>
              </div>
            </div>
          ';
        }
      }
      echo '
    </div>
      ';
    } elseif ($_SESSION['AcountType'] == 'Admin') {

      echo '
      <div class="offers">

        <p class="head">العروض المتاحة حالياً</p>

      ';


      if ($resultOffD->num_rows > 0) {
        while ($rowOffD = $resultOffD->fetch_assoc()) {
          echo '
            <div class="box">
              <div class="image">
                <img src="' . $rowOffD['OffImageSrc'] . '" alt="">
              </div>
              <div class="info">
                <div class="datails">
                  <p class="name">' . $rowOffD['OffName'] . '</p>
                  <p class="price"><span class="new">' . $rowOffD['OffNPrice'] . '</span>EGP | <span class="old">' . $rowOffD['OffOPrice'] . '</span>EGP</p>
                </div>
                <div class="show-more">
                  <a href="order.php?id=' . $rowOffD['ID'] . '"><i class="fa fa-angle-left"></i></a>
                </div>
              </div>
            </div>
          ';
        }
      }
      echo '
      </div>
      ';
    } elseif ($_SESSION['AcountType'] == 'Doctor') {
      echo '
      <div class="offers" style="background-color:#FFF;color:#0c4a7d;margin:20px;padding:50px;border-radius:10px">

        <p class="head" style="font-size:20px">حجوزات للمراجعة</p>
        
          
      ';
      if ($resultGNAB->num_rows > 0) {
        echo '
        <table class="bt">
        <tr>
            <th>اسم المريض</th>
            <th>رقم الهاتف</th>
            <th>ايمال المريض</th>
            <th>تاريخ الحجز</th>
            <th>تاريخ انشاء الطلب</th>
            <th>قبول</th>
            <th>حذف</th>
          </tr>
        ';
        while ($rowGNAB = $resultGNAB->fetch_assoc()) {
          echo '
            <tr>
              <td>' . $rowGNAB['PatientName'] . '</td>
              <td>' . $rowGNAB['PatientPhone'] . '</td>
              <td>' . $rowGNAB['PatientEmail'] . '</td>
              <td>' . $rowGNAB['WantDate'] . '</td>
              <td>' . $rowGNAB['DateCreated'] . '</td>
              <td>
                <a href="' . $_SERVER['HTTP_REFERER'] . '?Ap=' . $rowGNAB['ID'] . '"><i class="fa fa-check"></i></a>
              </td>
              <td>
                <a href="' . $_SERVER['HTTP_REFERER'] . '?De=' . $rowGNAB['ID'] . '"><i class="fa fa-times"></i></a>
              </td>
            </tr>
          ';
        }
      } else {
        echo '<p class="head" style="color:#55c0a2">لا يوجد حجوزات بانتظار الموافقة</p>';
      }


      echo '
        </table>
        <hr style="margin:40px 0;border:2px solid #0c4a7d;border-radius:10px;"/>        
        ';

      if ($resultGAB->num_rows > 0) {
        echo '<p class="head" style="font-size:20px">الحجوزات المقبولة</p>';
        echo '
        <table class="bt">
        <tr>
            <th>اسم المريض</th>
            <th>رقم الهاتف</th>
            <th>ايمال المريض</th>
            <th>تاريخ الحجز</th>
            <th>تاريخ انشاء الطلب</th>
          </tr>
        ';
        while ($rowGAB = $resultGAB->fetch_assoc()) {
          echo '
            <tr>
              <td>' . $rowGAB['PatientName'] . '</td>
              <td>' . $rowGAB['PatientPhone'] . '</td>
              <td>' . $rowGAB['PatientEmail'] . '</td>
              <td>' . $rowGAB['WantDate'] . '</td>
              <td>' . $rowGAB['DateCreated'] . '</td>
            </tr>
          ';
        }
        echo '
        </table>
        <hr style="margin:40px 0;border:2px solid #0c4a7d;border-radius:10px;"/>
        ';
      }

      echo '
      </div>
      ';
    }

    ?>

    <!-- End Offers -->

    <!-- Start Booking -->

    <?php

    if ($_SESSION['AcountType'] == 'Patient') {
      echo '
          <div class="booking">
            <p class="head">حجز موعد طبيب</p>
            <form class="doctor-filter" action="' . $_SERVER['PHP_SELF'] . '?P=Booking' . '" method="POST">
              
              <div class="input-feild">
                <label for="DocName">الطبيب</label>
                <input name="DocName" value="' . $DocName . '" id="DocName" type="text">
              </div>

              <div class="input-feild">
                <label for="DocSpe">التخصص</label>
                <input name="DocSpe" id="DocSpe" value="' . $DocSpe . '" type="text">
              </div>

              <div class="input-feild">
                <label for="DocClinic">العيادة او المستشفي</label>
                <input name="DocClinic" value="' . $DocClinic . '" id="DocClinic" type="text">
              </div>

              <div class="input-feild">
                <input type="submit" name="submit" value="بحث">
              </div>
            </form>

          ';
      echo '
            <div class="doc-result">
              ';
      if (@$resultDD->num_rows > 0) {
        echo '
              <p class="head">نتائج البحث</p>
              ';
        while ($rowDD = $resultDD->fetch_assoc()) {
          echo '
              <div class="box">
                <img src="' . $rowDD['DocImageSrc'] . '" alt="">
                <p class="name">' . $rowDD['DocName'] . '</p>
                <p class="spe">' . $rowDD['DocSpec'] . '</p>
                <div class="btn">
                  <a href="compelete.php?id=' . $rowDD['ID'] . '"><i class="fa fa-angle-left"></i> حجز موعد</a>
                </div>
              </div>
                ';
        }
      }

      echo '
      </div>
          ';
    } elseif ($_SESSION['AcountType'] == 'Admin') {
      echo '
        <div class="booking">
          <p class="head">جميع الاطباء</p>
          <br>
            <table>
              <tr>
                <th>معرف</th>
                <th>اسم الطبيب</th>
                <th>التخصص</th>
                <th>المحافظة</th>
                <th>العيادة</th>
                <th>متصل</th>
              </tr>';

      while ($rowGAD = $resultGAD->fetch_assoc()) {
        echo '
            <tr>
              <td>' . $rowGAD['ID'] . '</td>
              <td>' . $rowGAD['DocName'] . '</td>
              <td>' . $rowGAD['DocSpec'] . '</td>
              <td>' . $rowGAD['DocCountry'] . '</td>
              <td>' . $rowGAD['DocClinic'] . '</td>
              <td>';
        if ($rowGAD['Online'] == 'Yes') {
          echo 'متصل';
        } else {
          echo 'غير متصل';
        }
        echo '
              </td>
            </tr>
            ';
      }

      echo '
          </table>

          <p class="head">حذف طبيب</p>
          <br>
            <form action="' . $_SERVER['PHP_SELF'] . '" method="POST" class="deletDoc">
            <input type="text" name="id" placeholder="اكتب معرف الطبيب">
            <input type="submit" name="delete" value="حذف">
          </form>
       ';
    } elseif ($_SESSION['AcountType'] == 'Doctor') {

      echo '
      <div class="booking">
      <p class="head">الاستشارات الجديدة</p>
      <br>
      ';

      if ($resultGNQ2->num_rows > 0) {
        echo '
          
          <table class="bt">
          <tr>
            <th>السؤال</th>
            <th>اسم المريض</th>
            <th>معلومات</th>
            <th>تاريخ الاستشارة</th>
            <th>ارسال اجابة</th>
          </tr>
        ';
        while ($rowGNQ2 = $resultGNQ2->fetch_assoc()) {
          echo '
            <tr>
              <td>' . $rowGNQ2['Question'] . '</td>
              <td>' . $rowGNQ2['SendFrom'] . '</td>
              <td>' . $rowGNQ2['AdditionalData'] . '</td>
              <td>' . $rowGNQ2['DateCreated'] . '</td>
              <td>
                <a href="replay.php?id=' . $rowGNQ2['ID'] . '"><i class="fa fa-paper-plane"></i></a>
              </td>
            </tr>
          ';
        }

        echo '
        </table>
        ';
      } else {
        echo '
        <p class="head" style="color:#55c0a2">لا يوجد استشارات جديدة</p>
        ';
      }

      echo '
      <hr style="margin:40px 0;border:2px solid #0c4a7d;border-radius:10px;"/>        
      <p class="head">الاستشارات السابقة</p>
      <br>
      ';

      if ($resultGOQ2->num_rows > 0) {
        echo '
          
          <table class="bt">
          <tr>
            <th>السؤال</th>
            <th>اسم المريض</th>
            <th>معلومات اضافية</th>
            <th>تاريخ الاستشارة</th>
            <th>الاجابة</th>
          </tr>
        ';
        while ($rowGOQ2 = $resultGOQ2->fetch_assoc()) {
          echo '
            <tr>
              <td>' . $rowGOQ2['Question'] . '</td>
              <td>' . $rowGOQ2['SendFrom'] . '</td>
              <td>' . $rowGOQ2['AdditionalData'] . '</td>
              <td>' . $rowGOQ2['DateCreated'] . '</td>
              <td>' . $rowGOQ2['Answer'] . '</td>
              
            </tr>
          ';
        }

        echo '
        </table>
        ';
      } else {
        echo '
        <p class="head" style="color:#55c0a2">لم تقم بالاجابة علي استشارات بعد</p>
        ';
      }
    }

    ?>
  </div>

  <!-- End Booking -->

  <!-- Start Questions -->

  <?php

  if ($_SESSION['AcountType'] == 'Patient') {
    echo '
    <div class="question">
    ';

    // Get USer OLD Questions
    $patientName = $rowUD['UserName'];
    $sqlGUOQ = "SELECT * FROM questions WHERE SendFrom = '$patientName'";
    $resultGUOQ = mysqli_query($conn, $sqlGUOQ);

    if ($resultGUOQ->num_rows > 0) {
      echo '
      <div class="old-questions">
    <p class="head">استشاراتك السابقة</p>
    <table style="margin:30px 0;">
      <tr>
        <th>السؤال</th>
        <th>الطبيب</th>
        <th>التاريخ</th>
        <th>الاجابة</th>
      </tr>
    ';
      while ($rowGUOQ = $resultGUOQ->fetch_assoc()) {
        echo '
          <tr>
            <td>' . $rowGUOQ['Question'] . '</td>
            <td>' . $rowGUOQ['SendTo'] . '</td>
            <td>' . $rowGUOQ['DateCreated'] . '</td>
            <td><a href="showQues.php?id=' . $rowGUOQ['ID'] . '">عرض</a></td>
          </tr>
        ';
      }
    }
    echo '
      </table>
    </div>
      <p class="head">استشارة طبيب</p>
        <form class="doctor-filter" action="' . $_SERVER['PHP_SELF'] . '?P=Question' . '" method="POST">
          
          <div class="input-feild">
            <label for="DocName">الطبيب</label>
            <input name="DocName1" id="DocName" value="' . $DocName1 . '" type="text">
          </div>

          <div class="input-feild">
            <label for="DocSpe">التخصص</label>
            <input name="DocSpe1" id="DocSpe" value="' . $DocSpe1 . '" type="text">
          </div>

          <div class="input-feild">
            <label for="DocClinic">العيادة او المستشفي</label>
            <input name="DocClinic1" value="' . $DocClinic1 . '" id="DocClinic" type="text">
          </div>

          <div class="input-feild">
            <input type="submit" name="submit" value="بحث">
          </div>

        </form>

    ';

    echo '<div class="doc-result">';

    if (@$resultDD1->num_rows > 0) {
      echo '<p class="head">نتائج البحث</p>';

      while ($rowDD1 = $resultDD1->fetch_assoc()) {
        echo '
      <div class="box">
        <img src="' . $rowDD1['DocImageSrc'] . '" alt="">
        <p class="name">' . $rowDD1['DocName'] . '</p>
        <p class="spe">' . $rowDD1['DocSpec'] . '</p>
        <div class="btn">
          <a href="compelete2.php?id=' . $rowDD1['ID'] . '"><i class="fa fa-angle-left"></i> استشارة</a>
        </div>
      </div>
    ';
      }
    }

    echo '
      </div>
  </div>
    ';
  } elseif ($_SESSION['AcountType'] == 'Admin') {
    echo '
      <div class="question">
        <p class="head">جميع الاعضاء</p>
        <br>
        <table>
          <tr>
            <th>معرف</th>
            <th>اسم العضو</th>
            <th>الايمال</th>
            <th>المحافظة</th>
            <th>الاستشارات</th>
            <th>الحجوزات</th>
            <th>متصل</th>
          </tr>';

    while ($rowGAU = $resultGAU->fetch_assoc()) {
      echo '
        <tr>
          <td>' . $rowGAU['ID'] . '</td>
          <td>' . $rowGAU['UserName'] . '</td>
          <td>' . $rowGAU['UserEmail'] . '</td>
          <td>' . $rowGAU['UserCountry'] . '</td>
          <td>' . $rowGAU['QuestionNo'] . '</td>
          <td>' . $rowGAU['BookingNo'] . '</td>
          <td>';
      if ($rowGAU['Online'] == 'Yes') {
        echo 'متصل';
      } else {
        echo 'غير متصل';
      }
      echo '
          </td>
        </tr>
        ';
    }

    echo '
        </table>

      <p class="head">حذف عضو</p>
      <br>
        <form action="' . $_SERVER['PHP_SELF'] . '" method="POST" class="deletDoc">
          <input type="text" name="idUser" placeholder="اكتب معرف العضو">
          <input type="submit" name="deleteUser" value="حذف">
        </form>
      </div>
      ';
  } elseif ($_SESSION['AcountType'] == 'Doctor') {
    echo '
      <div class="question">
      <p class="head" style="text-align: center;font-weight:bold;margin-bottom:20px">تعديل بيانات الحساب</p>
      <div class="edit-box">
        <form action="' . $_SERVER['PHP_SELF'] . '?P=ED' . '" method="POST">

          <div class="input-feild">
            <label for="UserName">الاسم</label>
            <input name="UserName" id="UserName" value="' . $rowGDD['DocName'] . '" type="text" placeholder="أكتب اسمك . . ." autocomplete="off">
          </div>

          <div class="input-feild">
            <label for="UserEmail">الايمال</label>
            <input name="UserEmail" id="UserEmail" value="' . $rowGDD['DocEmail'] . '" type="email" placeholder="أكتب ايمالك . . ." autocomplete="off">
          </div>

          <div class="input-feild">
            <label for="UserPassword">كلمة المرور</label>
            <input name="UserPassword" id="UserPassword" value="' . $rowGDD['DocPassword'] . '" type="text" placeholder="أكتب كلمة المرور . . " autocomplete="off">
          </div>

          <div class="input-feild">
            <label for="UserAge">السن</label>
            <input name="UserAge" id="UserAge" type="number" value="' . $rowGDD['DocAge'] . '" placeholder="أكتب كم عمرك . . " autocomplete="off">
          </div>

          <div class="input-feild">
            <label for="UserGender">النوع</label>
            <select name="UserGender" id="UserGender" required>
              <option value="male">ذكر</option>
              <option value="female">انثي</option>
            </select>
          </div>

          <div class="input-feild">
          <label for="DocPhone">الهاتف</label>
          <input name="DocPhone" id="DocPhone" value="' . $rowGDD['DocPhone'] . '" type="text" placeholder="أكتب رقم هاتفك . . " autocomplete="off" required>
        </div>

        <div class="input-feild">
          <label for="DocSpec">تخصصك</label>
          <input name="DocSpec" id="DocSpec" value="' . $rowGDD['DocSpec'] . '" type="text" placeholder="أكتب تخصصك . . " autocomplete="off" required>
        </div>

        <div class="input-feild">
          <label for="DocClinic">العيادة</label>
          <input name="DocClinic" id="DocClinic" value="' . $rowGDD['DocClinic'] . '" type="text" placeholder="أكتب عنوان عيادتك . . " autocomplete="off" required>
        </div>


          <input type="submit" name="updateD" value="حفظ التعديل">

        </form>

      </div>
        ';


    echo '
          </div>
        ';
  }

  ?>

  <!-- End Questions -->

  <!-- Start Edit -->

  <?php

  if ($_SESSION['AcountType'] == 'Patient') {

    echo '
    <div class="edit">
      <p class="head" style="text-align: center;font-weight:bold;margin-bottom:20px">تعديل بيانات الحساب</p>
      <div class="edit-box">
        <form action="' . $_SERVER['PHP_SELF'] . '?P=Edit' . '" method="POST">

          <div class="input-feild">
            <label for="UserName">الاسم</label>
            <input name="UserName" id="UserName" value="' . $rowUD['UserName'] . '" type="text" placeholder="أكتب اسمك . . ." autocomplete="off">
          </div>

          <div class="input-feild">
            <label for="UserEmail">الايمال</label>
            <input name="UserEmail" id="UserEmail" value="' . $rowUD['UserEmail'] . '" type="email" placeholder="أكتب ايمالك . . ." autocomplete="off">
          </div>

          <div class="input-feild">
            <label for="UserPassword">كلمة المرور</label>
            <input name="UserPassword" id="UserPassword" value="' . $rowUD['UserPassword'] . '" type="text" placeholder="أكتب كلمة المرور . . " autocomplete="off">
          </div>

          <div class="input-feild">
            <label for="UserAge">السن</label>
            <input name="UserAge" id="UserAge" type="number" value="' . $rowUD['UserAge'] . '" placeholder="أكتب كم عمرك . . " autocomplete="off">
          </div>

          <div class="input-feild">
            <label for="UserGender">النوع</label>
            <select name="UserGender" id="UserGender" required>
              <option value="male">ذكر</option>
              <option value="female">انثي</option>
            </select>
          </div>

          <input type="submit" name="update" value="حفظ التعديل">

        </form>

      </div>
    </div>
    ';
  }

  ?>

  <!-- End Edit -->


  <!-- End Main Content -->

  </div>

  <script src="js/jquery.main.js"></script>
  <script>
    $('nav ul li').click(function() {
      $(this).addClass('active').siblings().removeClass('active');
    });

    if (!window.location.search == "?P=Booking") {

      window.onload = function() {
        $(document).ready(function() {
          $('.statics').delay(500).fadeIn('slow');
        })
      }
    }

    if (window.location.search == "?P=Booking") {
      document.querySelector('.statics').style.display = "none";
    }

    $('.staticsbtn').click(function() {
      $('.offers').fadeOut('slow');
      $('.booking').fadeOut('slow');
      $('.edit').fadeOut('slow');
      $('.question').fadeOut('slow');
      $('.statics').delay(500).fadeIn('slow');
    })

    $('.offersbtn').click(function() {
      $('.statics').fadeOut('slow');
      $('.question').fadeOut('slow');
      $('.edit').fadeOut('slow');
      $('.booking').fadeOut('slow');
      $('.offers').delay(500).fadeIn('slow');
    })
    $('.bookingbtn').click(function() {
      $('.statics').fadeOut('slow');
      $('.question').fadeOut('slow');
      $('.edit').fadeOut('slow');
      $('.offers').fadeOut('slow');
      $('.booking').delay(500).fadeIn('slow');
    })
    $('.questionbtn').click(function() {
      $('.statics').fadeOut('slow');
      $('.offers').fadeOut('slow');
      $('.booking').fadeOut('slow');
      $('.edit').fadeOut('slow');
      $('.question').delay(500).fadeIn('slow');
    })
    $('.editbtn').click(function() {
      $('.statics').fadeOut('slow');
      $('.offers').fadeOut('slow');
      $('.booking').fadeOut('slow');
      $('.question').fadeOut('slow');
      $('.edit').delay(500).fadeIn('slow');
    })
    if (window.location.search == "?P=Booking") {
      $('.booking').delay(500).fadeIn('slow');
      $(document).ready(function() {
        $('nav ul li:first-of-type').removeClass('active');
        $('nav ul li:nth-of-type(3)').addClass('active');
      })
    } else if (window.location.search == "?P=Question") {
      $('.question').delay(500).fadeIn('slow');
      $(document).ready(function() {
        $('nav ul li:first-of-type').removeClass('active');
        $('nav ul li:nth-of-type(4)').addClass('active');
      })
    } else if (window.location.search == "?P=Edit") {
      $('.edit').delay(500).fadeIn('slow');
      $(document).ready(function() {
        $('nav ul li:first-of-type').removeClass('active');
        $('nav ul li:nth-of-type(5)').addClass('active');
      })
    } else if (window.location.search == "?P=ED") {
      $('.edit').delay(500).fadeIn('slow');
      $(document).ready(function() {
        $('nav ul li:first-of-type').removeClass('active');
        $('nav ul li:nth-of-type(4)').addClass('active');
      })
    }

    var screen = document.querySelector('.screen');
    var screenSpan = document.querySelector('.screen span');
    var screenClose = document.querySelector('.screen i');

    if (screenSpan.innerHTML == "لم يتم تعديل البيانات حاول مجدداً و تأكد من ادخال كافة البيانات") {
      screen.classList.add('faild');
      screen.style.display = 'block';
    } else if (screenSpan.innerHTML == "تم تعديل البيانات بنجاح") {
      screen.classList.add('success');
      screen.style.display = 'block';
    } else {
      screen.style.display = 'none';
    }

    screenClose.onclick = function() {
      screen.style.display = 'none';
    }

    var sdNAv = document.querySelector('.sd-nav');
    var Nav = document.querySelector('nav');
    var MainContent = document.querySelector('.main-content');

    sdNAv.onclick = function() {
      Nav.classList.toggle('slide-left');
      MainContent.classList.toggle('fix-left');
      sdNAv.classList.toggle('bg-color')
    }

    if (window.innerWidth <= 721) {
      Nav.classList.add('slide-left');
      MainContent.classList.add('fix-left');
      sdNAv.classList.add('bg-color');
      $('nav ul li').click(function() {
        Nav.classList.toggle('slide-left');
        MainContent.classList.toggle('fix-left');
        sdNAv.classList.toggle('bg-color')
      });
    }
  </script>
</body>

</html>