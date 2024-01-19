<?php
$student = $_GET["id"];

// Create connection with the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myschool";

try {
    // Create a connection to the database using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $sql = "SELECT * FROM studnet WHERE student_id = $student";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            $student_id = $row["student_id"];
            $image = $row["image"];
        } else {
            // Handle the case when no rows are returned
            // For example, display an error message or redirect to an error page
            echo "No student found.";
            exit;
        }

        //change the image if you want --------------------------------------------------------
        if(isset($_GET['image'])){
            $change=$_GET['change'];

            $sql2 = "UPDATE studnet SET image=$change WHERE student_id = $student";
            $stmt = $conn->prepare($sql2);
            $stmt->execute();
        }
        
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<!--<html lang="en" dir="rtl"> change page to arabyc -->
    <html lang="en" dir="ltr">
        
        <head>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/javascript.js"></script>
    <meta charset="UTF-8">
    <meta content="width=device-width,initial=scale=1.0">
    <title>My school</title>
    <link rel="icon" href="icon/school.ico">
    <style>
        .imgprofile{
            position: fixed;
            left:3px;
            z-index: 5;
        }
        .imgprofile img{
            width: 76%;
            height: 83px;
            margin-left:8px;
        }
        .head header {
            margin-top: -2rem !important;
        }
        .marqu{
            margin-top: 8rem;
        }
        .logo img {
    width: 151px;
    top: 9px;
}
    </style>
</head>

<body>
    <?php $student_id=$row['student_id']; ?>
    <a href="?image='$student_id'" onclick="document.getElementById('profileImageInput').click(); return false;">
        <div class="imgprofile"> <img src="../students/up/<?php echo $image ?>" alt="photo"></div>
    </a>
    <!-- Hidden input element for file selection -->
    <input type="file" id="profileImageInput" name="change" style="display: none;">

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
                    <li><a href="#">الصفحة الرئيسية </i></a></li>
                    <li><a href="pages/table_lactures.html">جدول الحصص</a></li>
                    <li><a href="#levels">
                            <button class="buttonLevel"
                                onclick="document.getElementById('level').style.display='block'">المستوى
                                التعليمي</button>
                        </a></li>
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
                    <li><a href="../login.php">تسجيل الخروج</a></li>
                    <li><button type="submit">إرسال</button></li>
                    <li><input class="btnsearch" type="text" value="..ابحث هنا" style="text-align: right; float: right;"
                            name="search"></li>
                </ul>
            </nav>
        </header>

    </div>

    <!--#################################################################################################################################-->
    <!--lever aducation  #######################-->
    <div class="login-you" id="level">
        <form class="login-contentlevel animate">
            <div class="ImgRecordLevel">
                <span onclick="document.getElementById('level').style.display='none'" class="close">&times;</span>
                <!-- <img src="img/57-574351_nursery-school-student-png-transparent-png.png" alt="" width="300"> -->
            </div>

            <div class="information1">
                <label for="name">:اسم الطالب</label><br>
                <input type="text" class="namestudent" name="name" placeholder="الاسم" width="50px">
            </div>
            <div class="information2">
                <label for="age">:العمر</label><br>
                <input type="text" class="agestudent" name="age" placeholder="العمر">
            </div>
            <div class="information3">
                <label for="psw">:كملة السر</label><br>
                <input type="password" class="pswstudent" placeholder="كلمة السر">
            </div>
            <div class="information4">
                <label for="phone">:رقم الهاتف</label><br>
                <input type="number" class="phonestudent" placeholder="رقم الهاتف">
            </div>
            <div class="information3"></div>
            <div class="information3"></div>
        </form>
    </div>
    <div>

    </div>
    <!--button fixed in the bottom #################################################################################################################################-->
    <div class="pointer to top" id="header">
        <button><a href="#" onclick="PointerGoTop(1)">🔝</a></button>
    </div>

    <!-- masage to the user-->
    <div class="marqu">
        <marquee direction="left">👩‍🎓👨‍🎓 مرحباً بكم في المدرسة الحديثة 👩‍🎓👨‍🎓</marquee>
    </div>
    <!-- main list ###########################################-->
    <div class="main_list">
        <div class="Hd1">
            <h6>القائمةالرئيسية</h6>
        </div>
        <p><a href="#header"> الصفحةالرئيسية</a></p>

        <div>
            <p><a href="#wordmanger"> كلمة مديرالمدرسة</a></p>
        </div>
        <div>
            <p><a href="pages/page5.html">التعريف بالمدرسة</a></p>
        </div>
        <div>
            <p><a href="pages/result.html ">النتيجة</a></p>
        </div>
        <div>
            <p><a href="pages/page5.html">لوحةالشرف </a></p>
        </div>
        <div>
            <p><a href="#veiw-photo">معرض الصور</a></p>
        </div>
        <div>
            <p><a href="pages/table_lactures.html">المكتبة</a></p>
        </div>
        <div>
            <p><a href="#lib-computer">معمل الكمبيوتر</a></p>
        </div>
        <div>
            <p><a href="/pages/result.html"> معمل العلوم</a></p>
        </div>
    </div>
    <!-- photo the school -->
    <div class="photo_school">
        <img src="img/slide6-min.png" style="width:49%;" alt="photo">
    </div>

    <!--tacher-->
    <div class="tachers" id="tachers">
        <div class="alText">
            <h6>المعلمين</h6>
        </div>
        <div class="Tacher1">
            <p>
                أ/محمد علي صالح اليعري
                <img class="tchphoto" src="img/DSC_0655-1.jpg" alt="photo" width="100" height="110">
                <br>
                <span>درس في العراق و في امريكا الجنوبية</span>
                <br>الجنسية:يمني
                <br>
                <a href="mailto:mohamed.y@gmaile.com">Gmail</a>
                <br>call to:
                <a href="tel:+967-776-137-120">776137120</a><br>
                العنوان : صنعاء الحيمة الداخلية اليعر
            </p>

        </div>
        <div class="Tacher2">
            <p class="shadow">أ/رزق يحيى صالح اليعري
                <img class="tchphoto" src="img/‏‏DSC_0720-1 - 1.jpg" alt="photo" width="100" height="110"><br>
                <span>درس ودرس في الصين </span>
                الجنسية : يمني<br>
                <a href="mailto:razg@gmail.com">Gmail</a>
                <br>call to: <a href="tel:+967-776-137-120">776137120</a><br>
                العنوان : صنعاء الحيمة الداخلية اليعر

            </p>
        </div>
        <div class="Tacher3">
            <p>أ/حمود أحمد برية
                <img class="tchphoto" src="img/DSC_0686.jpg" alt="photo" width="100" height="110">
                <br>خريج كوريا الشمالية
                <span id="wordmanger">الجنسية : يمني <br>
                    <a href="mailto:Hazem@gmail.com">Gmail</a><br>
                    call to: <a href="tel:+967-776-137-120">776137120</a><br>
                    العنوان : صنعاء الحيمة الداخلية بني السياغ
                </span>
            </p>
        </div>

        <div class="wordman"><a href="#">كلمة مدير المدرسة</a> </div>
    </div>
    <div class="wordmanger">
        <p>السلام عليكم ورحمة الله وبركاته تدأب مدرستُنا قدرَ المُستطَاع، أنْ تُنمِّيَ بأبنائِها بذرةَ الإبدَاع، التي
            أودعَهَا اللهُ –تعالَى- في ثنايَا نفوسِ البَشَر، لتنمُوَ وترتقِي بالجِدِّ وتزدهِر، كما ينمُو بالرّعايةِ
            أفضلُ الشّجَر، فيطرحُ بعدَ حينٍ أطيبَ الثّمَر. لتحقيقِ هذهِ الغايَةِ العَلِيَّة، لم نُوَفّرْ جُهدًا في سبيلِ
            تحقيقِ الامتيَاز، والوصولِ بطلابِنا إلى مستوَى الإنجَاز، ولنَا بذلكَ فيهِم فَخرٌ
            وذُخرٌ واعتزَاز. ولنَا في
            هذا المقامِ شعارٌ نردّدُه: ألا بأسمى الهِمم، نبلغُ أعلَى القِمَم. كما ونسعَى على الدّوَام، لجَعْلِ مدرستِنَا
            منبعَ العلمِ الذي لا ينضبُ لكلِّ أبنائِنا على السّواء. مِنْ مَآثِرِ حِكْمَةِ حُكَمَاءِ الصِّين،
            قَوْلُهُمُ<span id="veiw-photo"></span>
            المعرُوفُ أبَدًا: "إِذا أرَدْتَ أنْ تزرعَ لِسَنَةٍ فَازْرَعْ قَمْحًا، وإذَا أرَدْتَ أنْ تزرعَ لعشرِ سنواتٍ
            فَازرَعْ شَجَرَةً، أمّا إذا أردتَ أنْ تزرعَ لمِائَةِ سنةٍ فَازْرَعْ إِنْسَانًا". لذلكَ أقولُ: إِنَّ
            السَّخاءَ الحقيقيَّ هوَ أنْ تزرعَ إنسَانًا؛ وطُلابُنَا غِرَاسٌ في أرضِ الحياةِ زَرَعَتْهَا أَيدٍ طيِّبَةٌ،
            جادَتْ في رعايتِهَا وسقايتِهَا حتَّى تُؤتِيَ أُكُلَهَا مِنْ طَيِّبِ الأَثمَار:عِلْمًا وأدبًا وأخْلاقًا وفي
            النهاية، لكم منّي أسمى الأمنيات</p>
    </div>

    <div class="photo">
        <p>معرض الصور</p>

        <div class="img2">
            <a href="img/photo student.png" target="_blank"><img src="img/photo student.png" alt="photo"></a>
            <a href="img/world-student-day1.jpg" target="_blank"><img src="img/world-student-day1.jpg" alt="photo"></a>
            <a href="img/Rstudent.png" target="_blank"><img src="img/Rstudent.png" alt="photo"></a>
        </div>
        <div class="img1">
            <a href="img/32ef6a1c-dbef-480d-b798-3a56809db7b3.jpg" target><img
                    src="img/32ef6a1c-dbef-480d-b798-3a56809db7b3.jpg" alt="photo"></a>
            <a href="img/JP-TRACKING-superJumbo.jpg" target="_blank"><img src="img/JP-TRACKING-superJumbo.jpg"
                    alt="photo"></a>
            <a href="img/chap4.jpg" target="_blank"><img src="img/chap4.jpg" alt="photo"></a>
        </div>
        <div class="img3">
            <a href="img/iStock_000006920422Smallhomework_for_young_kids_WlEPYAiNnY_l.png" target="_blank"><img
                    src="img/iStock_000006920422Smallhomework_for_young_kids_WlEPYAiNnY_l.png" alt="photo"></a>
            <a href="img/Children_at_school_8720604364.jpg" target="_blank"><img
                    src="img/Children_at_school_8720604364.jpg" alt="photo"></a>
            <a href="img/banner1.png" target="_blank"><img src="img/banner1.png" alt="photo"></a>
            <span id="difine"></span>
        </div>
    </div>
    <div class="difine-school">
        <p class="titl">التعريف بالمدرسة</p>
        <p id="resulte">بدأ الحفل بالسلام الوطني للمملكة تلاها آيات عطرة من الذكر الحكيم.
            مسيرة الطلاب والطالبات المتفوقين وتم فيها اهداء وردة شكر وتقدير لأولياء الأمور الكرام الذين كان لهم الدور في
            الاهتمام ورعاية الابناء حتى وصلوا الى هذه المراكز المتقدمة.
            كلمة الطلاب والطالبات المتفوقين والتي كانت بمثابة كلمة شكر وعرفان للوالدين ولإدارة المدرسة والمعلمين
            والمعلمات الأفاضل .
            فقرة عن أسرار التفوق والنجاح صاحبها عرض فيديو مصور للطلاب والطالبات المتفوقين يقدمون من خلالها نصائح للتفوق
            وشكر للبيت والمدر سة ودورهم في تحقيق هذا النجاح.
            كلمة القائد التربوي للمدرسة رحب فيها بضيوف الحفل شاكراً لهم تلبية الدعوة وهنأ أبناءه المتفوقين وبارك لهم
            نجاحهم وقدم الشكر الجزيل لأولياء الأمور لأهتمامهم ورعايتهم لأبنائهم وكذلك شكره للمعلمين والمعلمات وما بذلوه
            من الجهد طوال العام الدراسي .
            تفضل سعادة القائم بالأعمال والملحق الثقافي وقائد المدرسة بتكريم الطلاب المتفوقين وتوزيع الجوائز في جو أسري
            عمه الفرح والسرور.</p>
    </div>
    <div class="result">
        <p>النتيجة</p>

        <table>
            <tr>
                <th>المجموع</th>
                <th>قران</th>
                <th>الاسلامية</th>
                <th>اللغة العربية</th>
                <th>رياضيات</th>
                <th>الانجليزي</th>
                <th>الاحياء</th>
                <th>الفيزياء</th>
                <th>الاسم</th>
            </tr>
            <tr>
                <td>500</td>
                <td>100</td>
                <td>92</td>
                <td>98</td>
                <td>99</td>
                <td>89</td>
                <td>98</td>
                <td>88</td>
                <td>
                    <p>حازم_عبدالله_اليعري</p>
                </td>
            </tr>
            <tr>
                <td>500</td>
                <td>100</td>
                <td>92</td>
                <td>98</td>
                <td>99</td>
                <td>89</td>
                <td>98</td>
                <td>88</td>
                <td>حازم عبدالله اليعري</td>
            </tr>
            <tr>
                <td>500</td>
                <td>100</td>
                <td>92</td>
                <td>98</td>
                <td>99</td>
                <td>89</td>
                <td>98</td>
                <td>88</td>
                <td>حازم عبدالله اليعري</td>
            </tr>
            <tr>
                <td>500</td>
                <td>100</td>
                <td>92</td>
                <td>98</td>
                <td>99</td>
                <td>89</td>
                <td>98</td>
                <td>88</td>
                <td>حازم عبدالله اليعري</td>
            </tr>
            <tr>
                <td>500</td>
                <td>100</td>
                <td>92</td>
                <td>98</td>
                <td>99</td>
                <td>89</td>
                <td>98</td>
                <td>88</td>
                <td>حازم عبدالله اليعري</td>
            </tr>
            <tr>
                <td>500</td>
                <td>100</td>
                <td>92</td>
                <td>98</td>
                <td>99</td>
                <td>89</td>
                <td>98</td>
                <td>88</td>
                <td>حازم عبدالله اليعري</td>
            </tr>
            <tr>
                <td>500</td>
                <td>100</td>
                <td>92</td>
                <td>98</td>
                <td>99</td>
                <td>89</td>
                <td>98</td>
                <td>88</td>
                <td>حازم عبدالله اليعري</td>
            </tr>
        </table>

    </div>
    <div class="library">
        <p>المكتبة</p>
        <div class="tabl">
            <!-- <img src="img/office.jpg" alt="photo the office" usemap="#workmap" width="50%" height="600">
            <map name="workmap">
                <area shape="poly" coords="(78% 36%, 86% 41%, 77% 59%, 70% 40%)" href="img/cup.png" alt="">
                <area shape="" coords="" href="img/earphone.png" alt="">
                <area shape="" coords="" href="img/screen.png" alt="">
                <area shape="" coords="" href="img/coffee.png" alt="">
                <area shape="" coords="" href="img/chair.png" alt="">
            </map> -->

        </div>
    </div>
    <div class="table_lactuer">
        <p>جدول الحصص</p>

        <table class="tab2">
            <caption> الصف الاول الثانوي</caption>
            <tr>
                <th>الحصة 6</th>
                <th>الحصة 5</th>
                <th>الحصة 4</th>
                <th>الحصة 3</th>
                <th>الحصة 2</th>
                <th>الحصة 1</th>
                <th>اليوم</th>
            </tr>
            <tr>
                <td>اللغة العربية</td>
                <td>الانجليزي</td>
                <td>الاحياء</td>
                <td>القران</td>
                <td>الرياضيات</td>
                <td>الفيزياء</td>
                <td>السبت</td>
            </tr>
            <tr>
                <td>الانجليزي</td>
                <td>اللغة العربية</td>
                <td>القران</td>
                <td>الاحياء</td>
                <td>الفيزياء</td>
                <td>الرياضيات</td>
                <td>الاحد</td>
            </tr>
            <tr>
                <td>اللغة العربية</td>
                <td>الاحياء</td>
                <td>الانجليزي</td>
                <td>الرياضيات</td>
                <td>القران</td>
                <td>الفيزياء</td>
                <td>الاثنان</td>
            </tr>
            <tr>
                <td>اللغة العربية</td>
                <td>الانجليزي</td>
                <td>الاحياء</td>
                <td>الرياضيات</td>
                <td>القران</td>
                <td>الفيزياء</td>
                <td>الثاثاء</td>
            </tr>
            <tr>
                <td>الانجليزي</td>
                <td>اللغة العربية</td>
                <td>القران</td>
                <td>الاحياء</td>
                <td>الفيزياء</td>
                <td>الرياضيات</td>
                <td>الاربعاء</td>
            </tr>
            <tr>
                <td>اللغة العربية</td>
                <td>القران</td>
                <td>الانجليزي</td>
                <td>الاحياء</td>
                <td>الفيزياء</td>
                <td>الرياضيات</td>
                <td>الخميس</td>
            </tr>
        </table>

        <table class="tab3" id="lib-computer">

            <caption> الصف الثاني الثانوي</caption>
            <tr>
                <th>الحصة 6</th>
                <th>الحصة 5</th>
                <th>الحصة 4</th>
                <th>الحصة 3</th>
                <th>الحصة 2</th>
                <th>الحصة 1</th>
                <th>اليوم</th>
            </tr>
            <tr>
                <td>اللغة العربية</td>
                <td>الانجليزي</td>
                <td>الاحياء</td>
                <td>القران</td>
                <td>الرياضيات</td>
                <td>الفيزياء</td>
                <td>السبت</td>
            </tr>
            <tr>
                <td>الانجليزي</td>
                <td>اللغة العربية</td>
                <td>القران</td>
                <td>الاحياء</td>
                <td>الفيزياء</td>
                <td>الرياضيات</td>
                <td>الاحد</td>
            </tr>
            <tr>
                <td>اللغة العربية</td>
                <td>الاحياء</td>
                <td>الانجليزي</td>
                <td>الرياضيات</td>
                <td>القران</td>
                <td>الفيزياء</td>
                <td>الاثنان</td>
            </tr>
            <tr>
                <td>اللغة العربية</td>
                <td>الانجليزي</td>
                <td>الاحياء</td>
                <td>الرياضيات</td>
                <td>القران</td>
                <td>الفيزياء</td>
                <td>الثاثاء</td>
            </tr>
            <tr>
                <td>الانجليزي</td>
                <td>اللغة العربية</td>
                <td>القران</td>
                <td>الاحياء</td>
                <td>الفيزياء</td>
                <td>الرياضيات</td>
                <td>الاربعاء</td>
            </tr>
            <tr>
                <td>اللغة العربية</td>
                <td>القران</td>
                <td>الانجليزي</td>
                <td>الاحياء</td>
                <td>الفيزياء</td>
                <td>الرياضيات</td>
                <td>الخميس</td>
            </tr>
        </table>
    </div>
    <!--computer laboratory##################################### -->
    <div class="computer-labor">

        <pre>معمل الكمبيوتر </pre>
        <div class="slider">
            <div class="slide-img"><img src="img/12-PROL.jpg" alt="photo"></div>
            <div class="slide-img"><img
                    src="img/image-62957-saudi-arab-gulf-teacher-computer-lab-teaching-students-how-search_large.jpg"
                    alt=""></div>
            <div class="slide-img"><img src="img/computer-new-educ-1.jpg" alt=""></div>
            <a class="prev" onclick="plusSlides(-1)">⏩</a>
            <a class="next" onclick="plusSlides(1)">⏪</a>
        </div>
        <div style="text-align: center;">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>
    <!--  footer start      ##################################### -->
    <footer>
        <nav class="navFooter">
            <ul>
                <li class="list1">
                    <div>
                        <p><a href="#" target="_blank">الصفحة الرئيسية●</a></p>
                        <p><a href="#" target="_blank"> Vision الرؤية●</a></p>
                        <p><a href="#" target="_blank">البرامج والانشطة●</a></p>
                        <p><a href="#" target="_blank">اتصل بنا●</a></p>
                    </div>
                </li>
                <li class="list2">
                    <div>
                        <p><a href="#" target="_blank"> ما_يميز_مدرستنا●</a></p>
                        <p><a href="#" target="_blank">🛂القبول والتسجيل●</a></p>
                        <p><a href="#" target="_blank">شروط_القبول_والتسجيل●</a></p>
                        <p><a href="#" target="_blank">🌐التواصل معنا●</a></p>
                    </div>
                </li>
                <li class="list3">
                    <div>
                        <p><a href="#" target="_blank"> Mission_الرسالة●</a></p>
                        <p><a href="#" target="_blank">🎓عن المدرسة●</a></p>
                        <p><a href="#" target="_blank"> الاخبار_والاعلانات●</a></p>
                        <p><a href="#" target="_blank">👨‍🎓مبرمج الموقع●</a></p>

                    </div>
                </li>
            </ul>
        </nav>
    </footer>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        function currentSlide(n) {
            showSlides(slideIndex = n)
        }
        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("slide-img");
            var dots;
            dots = document.getElementsByClassName("dot");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }

            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
</body>

</html>