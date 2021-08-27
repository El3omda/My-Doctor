<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/fixed.css">
<nav>
  <div class="bars">
    <span class="long"></span>
    <span class="short"></span>
    <span class="shorter"></span>
  </div>
  <ul>
    <li><a href="index.php">الرئيسية</a></li>
    <li><a href="info-doctor.php">طبيب</a></li>
    <li><a href="about-us.php">من نحن</a></li>
    <li><a href="contact-us.php">تواصل معنا</a></li>
    <li><a href="my-acount.php">حسابي</a></li>
  </ul>
  <div class="logo">
    <img src="imgs/logo.png" alt="My Doctor Logo">
  </div>
</nav>
<div class="sd-nav">
  <div class="close">
    <i class="fa fa-times"></i>
  </div>
  <ul>
    <li><a href="index.php">الرئيسية</a></li>
    <li><a href="info-doctor.php">طبيب</a></li>
    <li><a href="about-us.php">من نحن</a></li>
    <li><a href="contact-us.php">تواصل معنا</a></li>
    <li><a href="my-acount.php">حسابي</a></li>
  </ul>
</div>
<script src="js/jquery.main.js"></script>
<script>
  $('.bars').click(function() {
    $('.sd-nav').fadeToggle()
  })
  $('.sd-nav .close').click(function() {
    $('.sd-nav').fadeOut();
  })
</script>