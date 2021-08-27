<?php

require_once "config.php";

$id = $_REQUEST['id'];

$sqlGO = "SELECT * FROM offers WHERE ID = '$id'";
$resultGO = mysqli_query($conn, $sqlGO);
$rowGO = $resultGO->fetch_assoc();

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
  <title><?php echo $rowGO['OffName']; ?></title>
  <link rel="stylesheet" href="css/order.css">
</head>

<body>

  <!-- Include Nav -->
  <?php include 'nav.php'; ?>

  <div class="off-cont">

    <div class="head">

      <!-- Show Offer Cover -->

      <img src="<?php echo $rowGO['OffImageSrc']; ?>" alt="">

      <!-- Show Offer Name -->

      <h1><?php echo $rowGO['OffName']; ?></h1>
    </div>

    <div class="main">
      <ul class="price">
        <li><?php echo $rowGO['OffOPrice']; ?><br> EGP</li>
        <li><?php echo $rowGO['OffNPrice']; ?><br> EGP</li>
      </ul>
      <div class="details">

        <p class="off-info">
          <span>وصف العرض</span>
          <?php echo $rowGO['OffDetails']; ?>
        </p>

        <p class="clinic">
          <span>عنوان العيادة</span>
          <?php echo $rowGO['OffClinicAddress']; ?>
        </p>

        <p class="off-ava">
          <span>هل العرض متوفر !؟</span>
          <?php
          if ($rowGO['OffAvaliable'] == 'Yes') {
            echo 'أيــوة';
          } else {
            echo 'العرض خلص بس لسة في عروض تانية كتير';
          }
          ?>
        </p>
      </div>
    </div>

    <div class="submit">
      <a href="compelete.php?id=<?php echo $rowGO['ID']; ?>">احجز الان</a>
    </div>
  </div>

  <!-- Include Footer -->
  <?php include 'footer.php'; ?>

</body>

</html>