<?php

require_once 'config.php';

// Sql Replay To Question

@$answer = $_POST['answer'];
$Id = $_REQUEST['id'];

if (isset($_POST['submit'])) {
  $sqlRTQ = "UPDATE questions SET Answer = '$answer' WHERE ID = '$Id'";
  if (mysqli_query($conn, $sqlRTQ)) {
    header("Location:dashboard.php");
  }
}
print_r($_POST);
// Get Qusetion

$sqlGetQustion = "SELECT * FROM questions WHERE ID = '$Id'";
$resultQ = mysqli_query($conn, $sqlGetQustion);
$rowGQ = $resultQ->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>الرد علي الاستشارات</title>
  <link rel="stylesheet" href="css/fixed.css">
</head>

<body style="background-color: #f6fbff;">

  <div class="cont-box">

    <p class="question"><?php echo $rowGQ['Question']; ?></p>
    <form class="answer" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $rowGQ['ID']; ?>" method="POST">
      <textarea name="answer" placeholder="أكتب الرد هنا . . . " required></textarea>
      <input type="submit" name="submit" value="ارسال الرد">
    </form>
  </div>

</body>

</html>