<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طبيبي || الصفحة الرئيسية</title>
    <link rel="stylesheet" href="css/splide.min.css">
    <link rel="stylesheet" href="css/index.css">

</head>

<body>
    <?php include "nav.php"; ?>

    <!-- Start About -->

    <section class="about">

        <div class="image">

            <img src="imgs/index.jpg" alt="">
            <div class="circle"></div>
        </div>

        <div class="info">

            <div class="top">
                <span class="ar">طبيبي</span>
                <span class="icon">
                    <img src="imgs/ico.png" alt="">
                </span>
                <span class="en"><span>MY</span>DOCTOR</span>
            </div>

            <div class="center">
                إﺣﺠﺰ ﻃﺒﻴﺒﻚ اﻟﻤﺨﺘﺺ ﺑﻜﻞ ﺳﻬﻮﻟﺔ !
            </div>

            <div class="bottom">
                اﺣﺼﻞ ﻋﻠﻰ الاستشارة اﻟﻄﺒﻴﺔ ﻣﻦ أﻛﺜﺮ اﻷﻃﺒﺎء ﺧﺒﺮة وﻣﻮﺛﻮﻗﻴﺔ ﻟﺪﻳﻨﺎ ﺣﺘﻲ ﺗﺘﻤﻜﻦ من اﻟﺤﺼﻮل ﻋﻠﻰ اﻹﺟﺎﺑﺎت واﻟﺜﻘﺔ ﻓﻲ اﺗﺨﺎذ ﻗﺮارات واﺿﺤﺔ ﺑﺸﺄن صحتك

            </div>

        </div>

    </section>

    <!-- End About -->

    <!-- Start Min Service -->

    <section class="min-service">

        <div class="btn-box">
            <ul>
                <li id="book" class="active">حجز موعد</li>
                <li id="question">استشارة طبية</li>
            </ul>
        </div>

        <div class="box1" id="bx1">
            <form action="" method="POST">
                <div class="input-feild">
                    <label>التخصص</label>
                    <input type="text" name="Spec">
                </div>
                <div class="input-feild">
                    <label>العنوان</label>
                    <input type="text" name="Address">
                </div>
                <div class="input-feild">
                    <label>الطبيب</label>
                    <input type="text" name="DocName">
                </div>
                <div class="submit">
                    <input type="submit" value="في دكتور ؟!">
                </div>
            </form>
        </div>

        <div class="box1" id="bx2">
            <form action="" method="POST">
                <div class="input-feild">
                    <label>التخصص</label>
                    <input type="text" name="Spec">
                </div>
                <div class="input-feild">
                    <label>العنوان</label>
                    <input type="text" name="Address">
                </div>
                <div class="input-feild">
                    <label>الطبيب</label>
                    <input type="text" name="DocName">
                </div>
                <div class="submit">
                    <input type="submit" value="طلب استشارة ؟!">
                </div>
            </form>
        </div>

    </section>

    <!-- End Min Service -->

    <!-- Start Our Services -->

    <div class="our-services">

        <p class="head1"><span>خدماتنا</span></p>

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
                <a href="booking.php"><i class="fa fa-angle-left"></i></a>
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
                <a href="question.php"><i class="fa fa-angle-left"></i></a>
            </div>

        </div>

    </div>

    <!-- End Our Services -->

    <!-- Start Offers -->

    <section class="offers">

        <div class="controls">
            <div class="next">
                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" style="transform: rotate(90deg);">
                    <path stroke="none" fill="#20be86" d="M13.339745962156 8.1843013959279a10 10 0 0 1 17.320508075689 0l10.179491924311 17.631397208144a10 10 0 0 1 -8.6602540378444 15l-20.358983848622 0a10 10 0 0 1 -8.6602540378444 -15"></path>
                </svg>
            </div>
            <div class="head1"><span>عروض</span> في دكتور</div>
            <div class="prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" style="transform: rotate(-90deg);">
                    <path stroke="none" fill="#20be86" d="M13.339745962156 8.1843013959279a10 10 0 0 1 17.320508075689 0l10.179491924311 17.631397208144a10 10 0 0 1 -8.6602540378444 15l-20.358983848622 0a10 10 0 0 1 -8.6602540378444 -15"></path>
                </svg>
            </div>
        </div>
        <div class="splide" id="splide">
            <div class="splide__slider">
                <div class="splide__track">
                    <ul class="splide__list">


                        <?php

                        // Get Offers

                        $sqlGO = "SELECT * FROM offers WHERE OffAvaliable = 'Yes'";
                        $resultGO = mysqli_query($conn, $sqlGO);

                        if ($resultGO->num_rows > 0) {

                            while ($rowGO = $resultGO->fetch_assoc()) {

                                echo '
                                <li class="splide__slide movie-cover">
                                    <div class="box">
                                        <div class="image">
                                            <img src="' . $rowGO['OffImageSrc'] . '" alt="">
                                        </div>
                                        <div class="info">
                                            <div class="datails">
                                                <p class="name">' . $rowGO['OffName'] . '</p>
                                                <p class="price"><span class="new">' . $rowGO['OffNPrice'] . '</span>EGP | <span class="old">' . $rowGO['OffOPrice'] . '</span>EGP</p>
                                            </div>
                                            <div class="show-more">
                                                <a href="order.php?id=' . $rowGO['ID'] . '"><i class="fa fa-angle-left"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                ';
                            }
                        } else {
                            echo '
                                <p class="head1">لا يوجد عروض متاحة في الوقت الحالي</p>
                            ';
                        }

                        ?>
                    </ul>
                </div>
            </div>
        </div>

    </section>

    <section>

    </section>

    <!-- End Offers -->

    <?php include "footer.php" ?>

    <script src="js/jquery.main.js"></script>

    <script src="js/splide.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>