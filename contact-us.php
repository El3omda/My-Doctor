<?php
include "config.php";
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST'){
 $name =   $_POST['userName'];
 $email =  $_POST['userEmail'];
 $msg = $_POST ['massage'];
 $sql = "INSERT INTO feedback(`name`, `email`, `feedback`,`Regdate`) VALUE ('$name', '$email','$msg' , now())";
 $result = mysqli_query($conn,$sql);
 header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تواصل معنا</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<?php include 'nav.php'?>
    <h1>تواصل معنا</h1>
    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النصهذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص</p>
    <div class="continer">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="input">
                <div class="name">
                    <label for="">الاسم</label>
                    <input type="text" name="userName">
                </div>
                <div class="email">
                    <label for="">البريد الإلكتروني</label>
                    <input type="email" name=" userEmail" id="">
                </div>
            </div>
            <div class="textarea">
                <label for="">الرسالة</label>
                <textarea name="massage" rows="5"></textarea>
            </div>
            <div class="btn">
                <input type="submit" value="ارسال الطلب">
            </div>

        </form>
        <div class="contact">
              <ul>
                  <li>+967 774 274 344<i class="fab fa-whatsapp"></i></li>
                  <li>+967 774 274 344<i class="fas fa-mobile-alt"></i></li>
                  <li>+967 1 821 641<i class="fas fa-phone"></i></li>
                  <li>fidoctor.net@gmail.com<i class="fas fa-envelope-square"></i></li>
              </ul>
        </div>
    </div>
   <?php include 'footer.php'?>
</body>
</html>