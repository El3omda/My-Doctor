<?php

require_once 'config.php';

// Get Doctors Data
@$DocName = $_POST['DocName'];
@$DocSpe = $_POST['DocSpe'];
@$DocClinic = $_POST['DocClinic'];
if (!empty($DocName)) {
  $sqlDD = "SELECT * FROM doctors WHERE DocName LIKE '$DocName%' OR DocName LIKE '_$DocName%'
   OR DocName LIKE '__$DocName%' OR DocName LIKE '___$DocName%' OR DocName LIKE '_____$DocName%'
   OR DocName LIKE '__$DocName%' OR DocName LIKE '___$DocName%' OR DocName LIKE '_____$DocName%'
   OR DocName LIKE '_________$DocName%' OR DocName LIKE '__________$DocName%' OR DocName LIKE '___________$DocName%'
   OR DocName LIKE '___________$DocName%' OR DocName LIKE '____________$DocName%' OR DocName LIKE '_____________$DocName%'
   OR DocName LIKE '______________$DocName%' OR DocName LIKE '_______________$DocName%' OR DocName LIKE '________________$DocName%'
   OR DocName LIKE '_________________$DocName%' OR DocName LIKE '__________________$DocName%' OR DocName LIKE '___________________$DocName%'
   OR DocName LIKE '____________________$DocName%' OR DocName LIKE '_____________________$DocName%' OR DocName LIKE '______________________$DocName%'
   ";
  $resultDD = mysqli_query($conn, $sqlDD);
}
if (!empty($DocSpe)) {
  $sqlDD = "SELECT * FROM doctors WHERE DocSpec LIKE '$DocSpe%' OR DocSpec LIKE '_$DocSpe%'
  OR DocSpec LIKE '__$DocSpe%' OR DocSpec LIKE '___$DocSpe%' OR DocSpec LIKE '_____$DocSpe%'
  OR DocSpec LIKE '______$DocSpe%' OR DocSpec LIKE '_______$DocSpe%' OR DocSpec LIKE '_______$DocSpe%'
  OR DocSpec LIKE '________$DocSpe%' OR DocSpec LIKE '_________$DocSpe%' OR DocSpec LIKE '__________$DocSpe%'
  OR DocSpec LIKE '___________$DocSpe%' OR DocSpec LIKE '____________$DocSpe%' OR DocSpec LIKE '_____________$DocSpe%'
  OR DocSpec LIKE '______________$DocSpe%' OR DocSpec LIKE '_______________$DocSpe%' OR DocSpec LIKE '________________$DocSpe%'
  OR DocSpec LIKE '_________________$DocSpe%' OR DocSpec LIKE '__________________$DocSpe%' OR DocSpec LIKE '___________________$DocSpe%'
  OR DocSpec LIKE '____________________$DocSpe%' OR DocSpec LIKE '_____________________$DocSpe%' OR DocSpec LIKE '______________________$DocSpe%'
  ";
  $resultDD = mysqli_query($conn, $sqlDD);
}
if (!empty($DocClinic)) {
  $sqlDD = "SELECT * FROM doctors WHERE DocClinic LIKE '$DocClinic%' OR DocClinic LIKE '_$DocClinic%'
  OR DocClinic LIKE '__$DocClinic%' OR DocClinic LIKE '___$DocClinic%' OR DocClinic LIKE '_____$DocClinic%'
  OR DocClinic LIKE '______$DocClinic%' OR DocClinic LIKE '_______$DocClinic%' OR DocClinic LIKE '_______$DocClinic%'
  OR DocClinic LIKE '________$DocClinic%' OR DocClinic LIKE '_________$DocClinic%' OR DocClinic LIKE '__________$DocClinic%'
  OR DocClinic LIKE '___________$DocClinic%' OR DocClinic LIKE '____________$DocClinic%' OR DocClinic LIKE '_____________$DocClinic%'
  OR DocClinic LIKE '______________$DocClinic%' OR DocClinic LIKE '_______________$DocClinic%' OR DocClinic LIKE '________________$DocClinic%'
  OR DocClinic LIKE '_________________$DocClinic%' OR DocClinic LIKE '__________________$DocClinic%' OR DocClinic LIKE '___________________$DocClinic%'
  OR DocClinic LIKE '____________________$DocClinic%' OR DocClinic LIKE '_____________________$DocClinic%' OR DocClinic LIKE '______________________$DocClinic%'
  ";
  $resultDD = mysqli_query($conn, $sqlDD);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>اختيار طبيب لاستشارته </title>
  <link rel="stylesheet" href="css/booking-questions.css">
</head>

<body>
  <?php include 'nav.php'; ?>
  <div class="booking">
    <p class="head">استشارة طبيب</p>
    <form class="doctor-filter" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

      <div class="input-feild">
        <label for="DocName">الطبيب</label>
        <input name="DocName" value="<?php echo $DocName; ?>" id="DocName" type="text">
      </div>

      <div class="input-feild">
        <label for="DocSpe">التخصص</label>
        <input name="DocSpe" id="DocSpe" value="<?php echo $DocSpe; ?>" type="text">
      </div>

      <div class="input-feild">
        <label for="DocClinic">العيادة او المستشفي</label>
        <input name="DocClinic" value="<?php echo $DocClinic; ?>" id="DocClinic" type="text">
      </div>

      <div class="input-feild">
        <input type="submit" name="submit" value="بحث">
      </div>
    </form>

    <div class="doc-result">

      <?php

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
            <a href="compelete2.php?id=' . $rowDD['ID'] . '"><i class="fa fa-angle-left"></i>استشارة</a>
          </div>
        </div>
      ';
        }
      }

      ?>

    </div>

  </div>

  </div>

  <?php include 'footer.php'; ?>

</body>

</html>