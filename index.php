<?php
include "config.php";
session_start();
?>
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
            <h3>إحجز طبيبك المختص بكل سهولة!</h3>
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
            <span> استشارة طبية</span>
            <span> خدمات أخرى </span>
        </div>
        <form action="" class="boxForm one ">
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
        <form action="" class="boxForm two">
            <div class="input">
                <div class="row">
                    <label for="">التخصص</label>
                    <select name="" id="">
                        <option value="">علوم</option>
                    </select>
                </div>
                <div class="row">
                    <label for="">التخصص</label>
                    <select name="" id="">
                        <option value="">نساء </option>
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
        <form action="" class="boxForm three">
            <div class="input">
                <div class="row">
                    <label for="">التخصص</label>
                    <select name="" id="">
                        <option value="">بطنه</option>
                    </select>
                </div>
                <div class="row">
                    <label for="">التخصص</label>
                    <select name="" id="">
                        <option value="">قلب مفتوح</option>
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

    <!-- Start Our Services -->

    <div class="our-services">

        <p class="head"><span>خدماتنا</span></p>

        <div class="box">

            <div class="right">
                <div class="icon">
                    <img src="imgs/medical.png" alt="">
                </div>
                <div class="info">
                    <h3>حجز موعد</h3>
                    <p>عرض قائمة بافضل اطباء الموقع في مختلف التخصصات لكي تقوم باختيار احدهم و حجز موعد لدية بطريقة سهلة و بسيطة</p>
                </div>
            </div>

            <div class="left">
                <a href="#"><i class="fa fa-angle-left"></i></a>
            </div>

        </div>

        <div class="box">

            <div class="right">
                <div class="icon">
                    <img src="imgs/loupe.png" alt="">
                </div>
                <div class="info">
                    <h3>استشارة طبية</h3>
                    <p>يمكنك استشارة الاطباء من مختلف التخصصات المتوفرة لدي منصة طبيبي و سيقوم الطبيب بالرد عليك بشكل سريع للغاية</p>
                </div>
            </div>

            <div class="left">
                <a href="#"><i class="fa fa-angle-left"></i></a>
            </div>

        </div>

    </div>

    <!-- End Our Services -->

    <?php include "footer.php" ?>
    <script src='main.js'></script>
</body>

</html>