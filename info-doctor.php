<?php
include 'config.php';
session_start();



// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    @$dName = $_POST['doctorName'];
    @$spc = $_POST['spc'];
    @$cNmae = $_POST['clinicName'];
    @$cAdress = $_POST['clinicAdrees'];
    @$phone = $_POST['phone'];
    @$email = $_POST['email'];
    @$img = $_POST['img'];
    @$nNumber = $_POST['nationalNumber'];
    @$Permit = $_POST['Permit'];
    @$qual = $_POST['qualification'];
    @$sql = "UPDATE `doctors` SET `DocPhone`='$phone',qualification = '$qual ',Permit = '$Permit' ,nNumber='$nNumber',`DocSpec`='$spc',DocEmail = '$email',`DocClinic`='$cAdress',`DocImageSrc`='$img',`prove`= 0 WHERE DocName = '$dName'";
    @$result = mysqli_query($conn, $sql);

    // Profile Image Upload

    // Save Folder

    @mkdir("imgs/doc/" . $dName);

    $dir = "imgs/doc/" . $dName . "/";

    $targetFile = $dir . basename("Profile-" . $_FILES['img']['name']);

    // Chech If It Is An Image Or Not

    $fileExtention = pathinfo($targetFile, PATHINFO_EXTENSION);

    # Supported Extentions

    $supArr = ['jpg', 'png'];
    if (in_array($fileExtention, $supArr)) {
        if (move_uploaded_file($_FILES['img']['tmp_name'], $targetFile)) {
            echo 'تم حفظ الصورة';
        } else {
            echo 'تحقق من البيانات';
        }
    } else {
        echo 'تحقق من البيانات';
    }


    // ID Image Upload

    // Save Folder


    $dir1 = "imgs/doc/" . $dName . "/";

    $targetFile1 = $dir1 . basename($_FILES['nationalNumber']['name']);

    // Chech If It Is An Image Or Not

    $fileExtention1 = pathinfo($targetFile1, PATHINFO_EXTENSION);

    # Supported Extentions

    $supArr1 = ['jpg', 'png', 'pdf'];
    if (in_array($fileExtention1, $supArr1)) {
        if (move_uploaded_file($_FILES['nationalNumber']['tmp_name'], $targetFile1)) {
            echo 'تم حفظ الصورة';
        } else {
            echo 'تحقق من البيانات';
        }
    } else {
        echo 'تحقق من البيانات';
    }

    // Permit Image Upload

    // Save Folder


    // $dir2 = "imgs/doc/" . $dName . "/";

    // $targetFile2 = $dir2 . basename($_FILES['Permit']['name']);

    // // Chech If It Is An Image Or Not

    // $fileExtention2 = pathinfo($targetFile2, PATHINFO_EXTENSION);

    // # Supported Extentions

    // $supArr2 = ['jpg', 'png', 'pdf'];
    // if (in_array($fileExtention2, $supArr2)) {
    //     if (move_uploaded_file($_FILES['Permit']['tmp_name'], $targetFile2)) {
    //         echo 'تم حفظ الصورة';
    //     } else {
    //         echo 'تحقق من البيانات';
    //     }
    // } else {
    //     echo 'تحقق من البيانات';
    // }

    // qualification Image Upload

    // Save Folder


    $dir3 = "imgs/doc/" . $dName . "/";

    $targetFile3 = $dir3 . basename($_FILES['qualification']['name']);

    // Chech If It Is An Image Or Not

    $fileExtention3 = pathinfo($targetFile3, PATHINFO_EXTENSION);

    # Supported Extentions
    $supArr3 = ['jpg', 'png', 'pdf'];
    if (in_array($fileExtention3, $supArr3)) {
        if (move_uploaded_file($_FILES['qualification']['tmp_name'], $targetFile3)) {
            echo 'تم حفظ الصورة';
        } else {
            echo 'تحقق من البيانات';
        }
    } else {
        echo 'تحقق من البيانات';
    }
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
    <h1><span>تواصل</span> معنا</h1>
    <p class="inf">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النصهذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص</p>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="POST" enctype="multipart/form-data">
            <div class="box">
                <div class="inputRow">
                    <div>
                        <label for="">اسم الطبيب</label>
                        <input type="text" name="doctorName" required>
                    </div>
                    <div>
                        <label for="">التخصص الطبي</label>
                        <input type="text" name="spc" required>
                    </div>
                    <div>
                        <label for="">اسم العيادة</label>
                        <input type="text" name="clinicName" required>
                    </div>
                    <div>
                        <label for="">عنوان العيادة</label>
                        <input type="text" name="clinicAdrees" required>
                    </div>
                    <div>
                        <label for="">رقم الهاتف</label>
                        <input type="text" name="phone" required>
                    </div>
                    <div>
                        <label for="">البريد الإلكتروني</label>
                        <input type="text" name="email" required>
                    </div>
                    <div>
                        <h3>المستندات المطلوبة</h3>
                    </div>
                </div>
                <div class="imgRow">
                    <label for="">صورة البروفايل</label>
                    <input type="file" name="img" id="upload">
                    <div><label for="upload"><i style="position: absolute;top: 50%;transform: translateY(-50%);" class="fas fa-file" for="upload"></i></label></div>
                </div>
            </div>
            <div class="inputFile">
                <div>
                    <label for="">البطاقة الشخصية</label>
                    <div class="fileBox">
                        <input type="file" name="nationalNumber" id="upload">
                        <label for="upload"><i class="fas fa-file" for="upload"></i></label>
                    </div>
                </div>
                <div>
                    <label for="">تصريح مزاولة مهنة</label>
                    <div class="fileBox">
                        <input type="file" name="Permit" id="upload">
                        <label for="upload"><i class="fas fa-file" for="upload"></i></label>
                    </div>
                </div>
                <div>
                    <label for="">المؤهل الأكاديمي</label>
                    <div class="fileBox">
                        <input type="file" name="qualification" id="upload">
                        <label for="upload"><i class="fas fa-file" for="upload"></i></label>
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