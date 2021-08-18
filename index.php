<?php
include "config.php";
session_start();
if(isset($_SESSION['UserEmail'])){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحه الرئسيه</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <?php include "nav.php"; ?>
<section class="about">
 <div class="img">
     <img src="imgs/doctor-clinic-illustration_1270-69.jpg" alt="">
 </div>
 <div class="contant">
     <div class="logo">
         <p><span>My</span>Doctor</p>
         <img src="imgs/logo.png" alt="">
         <p>دكتور<span>ي</span></p>
     </div>
     <h3>إحجز طبيبك المختص  بكل سهولة!</h3>
     <p>احصل على استشارة الطبية من أكثر الأطباء خبرة وموثوقية
        لدينا حتي تتمكن ن الحصول على الإجابات والثقة في اتخاذ
        قرارات واضحة بشأن صحةك
    </p>
    <div class="boxTriangle">
        <div class="triangleLeft">
            <div class="empty"></div>
        </div>
        <div class="triangleRight">
            <div class="empty"></div>
        </div>
    </div>
 </div>
</section>
<section class="Book">
    <div class="slide">
        <span class="active">حجز موعد</span>
        <span>حجز موعد</span>
        <span>حجز موعد</span>
    </div>
    <form action=""class="boxForm">
        <div class="input">
            <div class="row">
                <label for="">التخصص</label>
                <select name="" id="">
                    <option value="">اسنان</option>
                </select>
            </div>
            <div class="row">
                <label for="">التخصص</label>
                <select name="" id="">
                    <option value="">اسنان</option>
                </select>
            </div>
            <div class="row">
                <label for="">التخصص</label>
                <select name="" id="">
                    <option value="">اسنان</option>
                </select>
            </div>
        </div>
        <div class="submit">
               <input type="submit" value="في دكتور؟؟">
        </div>
    </form>
</section>   
<section class="servies">
    <h3>خدماتناs</h3>

</section> 
<?php include "footer.php" ?>
    
</body>
</html>
<?php
}else{
    header('location:404.php');
}
?>





