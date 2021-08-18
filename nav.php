<?php



?>
<script src="https://use.fontawesome.com/4e1b597fe9.js"></script>
<link rel="stylesheet" href="css/fixed.css">
<nav>
  <div class="bars">
    <span class="long"></span>
    <span class="short"></span>
    <span class="shorter"></span>
  </div>
  <ul>
    <li><a href="#">خدماتنا</a></li>
    <li><a href="#">الاطباء</a></li>
    <li><a href="about-us.php">من نحن</a></li>
    <li><a href="#">تواصل معنا</a></li>
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
    <li><a href="#">خدماتنا</a></li>
    <li><a href="#">الاطباء</a></li>
    <li><a href="#">من نحن</a></li>
    <li><a href="#">تواصل معنا</a></li>
    <li><a href="my-acount.php">حسابي</a></li>
  </ul>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('.bars').click(function() {
    $('.sd-nav').fadeToggle()
  })
  $('.sd-nav .close').click(function() {
    $('.sd-nav').fadeOut();
  })
</script>