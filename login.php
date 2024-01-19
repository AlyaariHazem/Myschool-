<!DOCTYPE html>
<html dir="rtl">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/login.css">

</head>
<body>
    <div class="head">
        <!--star the header-->
        <header>
            <div class="headline">
                <h1>
                    <p>My school</p>
                </h1>
            </div>
            <div class="logo">
                <a href="#"><img src="img/logo.jpg" alt="photo"></a>
            </div>
            <!--star the navagition-->
            <nav class="navhead">
                <ul>
                    <li><a href="#" style="margin-right:11px; top:20px;">الصفحة الرئيسية </i></a>
                    
                    <li><a href="#id01"> <button class="button1"
                                onclick="document.getElementById('id01').style.display='block'"
                                style="width:auto; border:0px solid red; top:8px;"  >تسجيل</button></a></li>
                    <li class="dropdown">
                        <button class="dropbtn"><a href="#">اتصل بنا</a></button>
                        <div class="dropdown-contant">
                            <a href="https://HazemAL-yaari.com" target="_blank"><img
                                    src="fontawesome-free-6.4.2-web/svgs/brands/facebook-f.svg" alt="photo"></a>
                            <a href="https://HazemAL-yaari.com" target="_blank" class="pho"><img
                                    src="fontawesome-free-6.4.2-web/svgs/brands/telegram.svg" alt="photo"></a>
                            <a href="https://HazemAL-yaari.com" target="_blank" class="pho"><img
                                    src="fontawesome-free-6.4.2-web/svgs/brands/twitter.svg" alt="photo"></a>
                            <a href="https://HazemAL-yaari.com" target="_parent" class="pho"><img
                                    src="fontawesome-free-6.4.2-web/svgs/brands/linkedin-in.svg" alt="photo"></a>
                        </div>
                    </li>
                    <li>
                        <a href="#" style="border:0px solid red; top:20px;">عننا</a>
                    </li>
                    
                </ul>
            </nav>
        </header>

    </div>
 <!--button fixed in the bottom #################################################################################################################################-->
    <div class="pointer to top" id="header">
        <button><a href="#" onclick="PointerGoTop(1)">🔝</a></button>
    </div>

    <!-- masage to the user-->
    <div class="marqu">
        <marquee direction="left" >👩‍🎓👨‍🎓 مرحباً بكم في المدرسة الحديثة 👩‍🎓👨‍🎓</marquee>
    </div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<div class="image">
    <img src="img/slide6-min.png" alt="photo">
</div>
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="validation.php" method="GET" style="background-color:rgb(222, 217, 237);">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/٢٠٢٢١٠٠٨_٠٩١٨١٧ (2).jpg" alt="photo" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>اسم المستخدم</b></label>
      <input type="text" text="right" placeholder="ادخل أسم المستخدم " name="uname" required>

      <label for="psw"><b>كلمة السر</b></label>
      <input type="password" placeholder="أدخل كلمة المرور" name="psw" required>
        
      <button type="submit" name="submit">تسجيل</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> حفط كلمة المرور
      </label>
      <!-- <button type="submit">إنشاء حساب</button>
      <label>
      </label> -->
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">الغاء</button>
      <span class="psw"> <a href="#">هل نسيت كلمة السر ؟</a></span>
    </div>
  </form>
</div>
 <!--  footer start      ##################################### -->
 <footer>
        <nav class="navFooter">
            <ul>
                <li class="list1">
                    <div>
                        <p><a href="#" target="_blank">الصفحة الرئيسية</a></p>
                        <p><a href="#" target="_blank"> Vision الرؤية</a></p>
                        <p><a href="#" target="_blank">البرامج والانشطة</a></p>
                        <p><a href="#" target="_blank">اتصل بنا</a></p>
                    </div>
                </li>
                <li class="list2">
                    <div>
                        <p><a href="#" target="_blank"> ما_يميز_مدرستنا</a></p>
                        <p><a href="#" target="_blank">🛂القبول والتسجيل</a></p>
                        <p><a href="#" target="_blank">شروط_القبول_والتسجيل</a></p>
                        <p><a href="#" target="_blank">🌐التواصل معنا</a></p>
                    </div>
                </li>
                <li class="list3">
                    <div>
                        <p><a href="#" target="_blank"> Mission_الرسالة</a></p>
                        <p><a href="#" target="_blank">🎓عن المدرسة</a></p>
                        <p><a href="#" target="_blank"> الاخبار_والاعلانات</a></p>
                        <p><a href="#" target="_blank">👨‍🎓مبرمج الموقع</a></p>
                        
                    </div>
                </li>
            </ul>
        </nav>
    </footer>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>

