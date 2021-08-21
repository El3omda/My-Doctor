<?php
include 'config.php';
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $dName = $_POST['doctorName'];
    $spc = $_POST['spc'];
    $cNmae = $_POST['clinicName'];
    $cAdress = $_POST['clinicAdrees'];
    $phone = $_POST['phone'];
    $email =$_POST['email'];
    $img = $_POST['img'];
    $nNumber = $_POST['nationalNumber'];
    $Permit = $_POST['Permit'];
    $qual = $_POST['qualification'];
    $sql = "UPDATE `doctors` SET `DocPhone`='$phone',qualification = '$qual ',Permit = '$Permit' ,nNumber='$nNumber',`DocSpec`='$spc',DocEmail = '$email',`DocClinic`='$cAdress',`DocImageSrc`='$img',`prove`= 0 WHERE DocName = '$dName'";
    $result = mysqli_query($conn, $sql);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>في دكتور</title>
    <link rel="stylesheet" href="css/info-doctor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <?php include 'nav.php' ?>
    <h1>تواصل معنا</h1>
    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النصهذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص</p>
    <div class="container">
      <form action= "<?php echo  $_SERVER['PHP_SELF'] ;?> " method="POST">
       <div class="box">
        <div class="inputRow"> 
            <div>
                <label for="">اسم الطبيب</label>
                <input type="text" name="doctorName">
            </div>
            <div>
                <label for="">التخصص الطبي</label>
                <input type="text" name="spc">
            </div>
            <div>
                <label for="">اسم العيادة</label>
                <input type="text" name="clinicName">
            </div>
            <div>
                <label for="">عنوان العيادة</label>
                <input type="text" name="clinicAdrees">
            </div>
            <div>
                <label for="">رقم الهاتف</label>
                <input type="text" name="phone">
            </div>
            <div>
                <label for="">البريد الإلكتروني</label>
                <input type="text" name="email">
            </div>
            <div>
                <h3>المستندات المطلوبة</h3>
            </div>
        </div>
        <div class="imgRow">
            <label for="">صورة البروفايل</label>
            <input type="file" name="img" id="upload">
            <div><label for="upload"><i class="fas fa-file" for="upload"></i></label></div>
        </div>
      </div>
      <div class="inputFile">
            <div>
                <label for="">البطاقة الشخصية</label>
                <div class="fileBox">
                        <input type="file" name="nationalNumber" id="upload">
                        <label for = "upload"><i class="fas fa-file" for="upload"></i></label> 
                </div>
            </div>
            <div>
            <label for="">تصريح مزاولة مهنة</label>
                <div class="fileBox">
                        <input type="file" name="Permit" id="upload">
                        <label for = "upload"><i class="fas fa-file" for="upload"></i></label> 
                </div>
            </div>
             <div>
                <label for="">المؤهل الأكاديمي</label>
                <div class="fileBox">
                        <input type="file" name="qualification" id="upload">
                        <label for = "upload"><i class="fas fa-file" for="upload"></i></label> 
                </div>
            </div>
      </div>
      <div class="btn">
         <input type="submit" value="ارسال الطلب">
      </div>
     </form>  
    </div>
    <?php include 'footer.php' ?>
    <!-- <script src="main.js"></script> -->
</body>
</html>