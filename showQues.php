<?php

session_start();

require_once 'config.php';

$id = $_REQUEST['id'];

$UserEmail = $_SESSION['UserEmail'];

$sqlGetUD = "SELECT * FROM users WHERE UserEmail = '$UserEmail'";
$resultGUD = mysqli_query($conn, $sqlGetUD);
$rowUD = $resultGUD->fetch_assoc();

$UserName = $rowUD['UserName'];

$sqlGQD = "SELECT * FROM questions WHERE ID = '$id' AND SendFrom = '$UserName'";
$resultGQD = mysqli_query($conn, $sqlGQD);
$rowGQD = $resultGQD->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>عرض الاستشارة</title>
  <style>
    body {
      height: 100vh;
      font-family: cairo, arial;
      direction: rtl;
      background-color: #f6fbff;
      color: #0c4a7d;
    }

    .cont {
      background-color: #fff;
      width: 80%;
      margin: 50px auto;
      padding: 50px 20px;
      border-radius: 15px;
      border: 1px solid #ccc;
    }

    .head2 {
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      position: relative;
    }

    .head2:after {
      content: "";
      width: 50px;
      height: 5px;
      background-color: #55c0a2;
      border-radius: 5px;
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
    }

    .question-d {
      margin-top: 50px;
      border-top-right-radius: 15px;
      border-top-left-radius: 15px;
      border-bottom: none;
    }

    .box {
      padding: 10px;
      border-top-right-radius: 15px;
      border-top-left-radius: 15px;
      background-color: #0c4a7d;
      font-size: 15px;
      font-weight: bold;
      color: #fff;
    }

    .question-d .date {
      width: 50%;
      float: left;
      text-align: left;
    }

    .question-d .to {
      width: 50%;
      float: right;
      text-align: right;
    }

    .question-d .from {
      width: 100%;
      clear: both;
      text-align: center;
    }

    .question-d .ques {
      text-align: center;
      background-color: #55c0a2;
      color: #fff;
      font-weight: bold;
      padding: 20px 0;
    }

    .doc-replay {
      border-bottom-right-radius: 15px;
      border-bottom-left-radius: 15px;
      padding: 10px;
      background-color: #0c4a7d;
      color: #fff;
      text-align: center;
      font-weight: bold;

    }

    .rea {
      text-align: right;
    }
  </style>
</head>

<body>

  <?php include 'nav.php'; ?>


  <div class="cont">
    <p class="head2">الاستشارة</p>
    <div class="question-d">
      <div class="box">
        <p class="date"> تاريخ الاستشارة : <?php echo $rowGQD['DateCreated']; ?></p>
        <p class="to">الطبيب : <?php echo $rowGQD['SendTo']; ?></p>
        <p class="from">المرسل : <?php echo $rowGQD['SendFrom']; ?></p>
      </div>
      <p class="ques"><?php echo $rowGQD['Question']; ?></p>
    </div>

    <div class="doc-replay">
      <p class="rea">الاجابة : </p>
      <p class="replay"><?php echo $rowGQD['Answer']; ?></p>
    </div>

  </div>


  <?php include 'footer.php'; ?>

</body>

</html>