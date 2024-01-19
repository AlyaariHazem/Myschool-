<?php
$student_id="";
$student_name="";
$phone="";
$grade="";
$gender="";
$age="";
$stud_class_id="";
$division_id="";
$gender="";
$password="";

//create connection with database
$servername="localhost";
$username="root";
$password="";
$dbname="myschool";
$connection=new mysqli($servername,$username,$password,$dbname);
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['send'])){
    $student_id=$_POST['student_id'];
    $student_name=$_POST['student_name'];
    $phone=$_POST['phone'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $stud_class_id=$_POST['stud_class_id'];
    $division_id=$_POST['division_id'];
    // $gender=$_POST['appreciation'];
    $password=$_POST['password'];
    
    $errorMassage="";
    $successMassage="";
    // uploud image 
    if(isset($_POST['send'])){
    
        $name=$_FILES['img']['name'];
        $type=$_FILES['img']['type'];
        $tmp_name=$_FILES['img']['tmp_name'];
        $error=$_FILES['img']['error'];
        $size=$_FILES['img']['size'];
        
        $img_type=array("png","jpg");
        
        $ext=explode(".",$name);
        $ext=strtolower(end($ext)) ;
        if(in_array($ext,$img_type)&&$size<=2000000){
        move_uploaded_file($tmp_name,"up/$name");
            
        }
        else
        {
            echo "invalid type";
            echo "maximum size 2m";
        }
        
        }else{
            echo "choose pacture to load ";
        }
 }
 do{
      //check if is not any data empty
    if(empty($student_id)||empty($student_name)||empty($phone)||empty($age)||empty($gender)||empty($stud_class_id)||empty($gender)){
        $errorMassage="يجب أن تملأ جميع الحقول";
        break;
    }

    //add new student to database 
    $sql1="insert into studnet (student_id,student_name,phone,age,gender,stud_class_id,division_id,password, image)".
    "values('$student_id','$student_name','$phone','$age','$gender','$stud_class_id','$division_id','$password','$name')";
    $result=$connection->query($sql1);
    if(!$result){
        $errorMassage="Invalid query";
        break;
    }
    
 $successMassage="تم إضافة الطالب بنجاح ";
 // 
  }while(false);



}
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myschool</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"> -->
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js">
    
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../admin/styles.css">
    <?php include "../admin/index.html"; ?>
    <style>
        
        .table  tr th{
            background-color:rgb(89, 124, 214);
            color:white;
        }
        .massage{
           margin-top:70px;

       }
       /* form */
     .s_number,.s_phone,.s_age{
        width:38%;
        margin-right:3rem;
     }
     .s_number label {
    width: 57px;
    margin-right: 1rem;
    margin-bottom: -8px;
    }
    .s_name{
        width:70%;
        margin-right:3rem;
     }
     .s_name label {
    width: 57px;
    margin-right: 1rem;
    margin-bottom: -8px;
    }
    .image{
        position: absolute;
        left:0px;
        top:4px;
    }

    input[type="file"] {
            color: transparent;
        }
        .container-fluid{
            margin-top:-6rem;
        }
       .navhead{
        margin-top: -5rem;
       }

    .form-image{
        padding:44px;
        margin-top:1.2rem;
        margin-left:1.2rem;
        font-size:0px;
        text-align: none;
        border: 2px solid red;
    }
    .custom-file-label{
        position:absolute;
        top:-2rem;
        left:42px;
        margin-top:10rem;
    }
    .s_sex {
        position: relative;
        right: 35%;
        margin-top: -55px;
        margin-bottom: 8%;
    }
    .ss {
        position: relative;
        right: 38%;
        margin-top: -197px;
        margin-bottom: 18%;
    }
    .ss2 {
        position: relative;
        right: 70%;
        margin-top: -234px;
        margin-bottom: 115px;
    }
    .ss3 {
        position: relative;
        right: 65%;
        margin-top: -88px;
        margin-bottom: 82px;
    }
    <?php include "../include/style.css"; ?>
    .table{
            padding-right:2rem;
            margin:2px 17px;
            margin-left:5rem !important;
            width:97%;
         
        }
    .navhead ul {
    padding-right: 5rem;
    padding-top: 2rem;
    }
    .navbar-expand-lg{
        position: fixed;
        top: 0.7rem;
        right: 19rem;
        font:bold;
        z-index: 2;
    }
    ul li .dropdown-toggle{
        color:white !important;

    }
    </style>
    <link href="../teacher/sidebars.css" rel="stylesheet">
</head>
<body>
    <?php 
     $servername='localhost';
     $username='root';
     $password='';
     $database='myschool';
     //create connection
     $connection=new mysqli($servername,$username,$password,$database);
     if($connection->connect_error){
      die("connection failed: ".$connection->connect_error);
     }
      $sql1="select * from class";
      $result=$connection->query($sql1);
      echo '<nav class="navbar navbar-expand-lg navbar-blue">
      <ul class="navbar-nav">
      <li class="nav-item dropdown">
           <button class="btn btn-blue dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
           إختار الصف
           </button>
           <ul class="dropdown-menu dropdown-menu-blue">';
           //read data of each row
           while($row1=$result->fetch_assoc()){
               $class_id=$row1['class_id'];
               $class_name=$row1['class_name'];
        if(!empty($row1['class_id'])){
           echo "<li>
           <a class='dropdown-item' href='?serch=$class_name && $class_id'>$row1[class_name]</a>
            </li>";
            $row1['class_id']='';
        }
    }
        echo '</ul>
        </li>
      </ul>
  </nav>';
    ?>

   <?Php include "../include/navHeader.php"; ?>
    <table class="table table-striped table-hover ">
       
            <tr>
                <th  style="background-color:rgb(89, 124, 214);">رقم</th>
                <th style="background-color:rgb(89, 124, 214);">اسم الطالب</th>
                <th style="background-color:rgb(89, 124, 214);">التلفون</th>
                <th style="background-color:rgb(89, 124, 214);">العمر</th>
                <th style="background-color:rgb(89, 124, 214);">الجنس</th>
                <th style="background-color:rgb(89, 124, 214);">رقم الفصل</th>
                <th  style="background-color:rgb(89, 124, 214);">رقم الشعبة</th>
                <th  style="background-color:rgb(89, 124, 214);"> كلمة السر</th>
                <th  style="background-color:rgb(89, 124, 214);">  </th>
            </tr>

            <?php
               $servername='localhost';
               $username='root';
               $password='';
               $database='myschool';
               //create connection
               $connection=new mysqli($servername,$username,$password,$database);
               if($connection->connect_error){
                die("connection failed: ".$connection->connect_error);
               }
               if(isset($_GET['serch'])){
                $search=$_GET['serch'];
                $sql1="select * from class where class_name='$search'";
                $result=$connection->query($sql1);
                $row1=$result->fetch_assoc();
                $class_id=$row1['class_id'];
                echo $class_id;
                if(!$result){
                    die("Invalid query : ".$connection->error);
                 }

                 $sql2="select * from studnet where stud_class_id='$class_id'";
                 $result2=$connection->query($sql2);
                 
                 //read data of each row
                 while($row=$result2->fetch_assoc()){
                 echo "
                 <tr>
                 <td>$row[student_id]</td>
                 <td>$row[student_name]</td>
                 <td>$row[phone]</td>
                 <td>$row[age]</td>
                 <td>$row[gender]</td>
                 <td>$row1[class_name]</td>
                 <td>$row[division_id]</td>
                 <td>$row[password]</td>
                 <td>
                     <a class='btn btn-primary btn-sm' href='editStudents.php?student_id=$row[student_id]'>تعديل</a>
                     <a class='btn btn-danger btn-sm' href='delete.php?student_id=$row[student_id]'>حذف</a>
                 </td>
              </tr>
                 ";
                }

            }else{
               //read all row from database table 
               $sql1="select * from studnet join class on class_id=stud_class_id";
               $result=$connection->query($sql1);
               if(!$result){
                   die("Invalid query : ".$connection->error);
                }
                
                //read data of each row
                while($row=$result->fetch_assoc()){
                echo "
                <tr>
                <td>$row[student_id]</td>
                <td>$row[student_name]</td>
                <td>$row[phone]</td>
                <td>$row[age]</td>
                <td>$row[gender]</td>
                <td>$row[class_name]</td>
                <td>$row[division_id]</td>
                <td>$row[password]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='editStudents.php?student_id=$row[student_id]'>تعديل</a>
                    <a class='btn btn-danger btn-sm' href='delete.php?student_id=$row[student_id]'>حذف</a>
                </td>
             </tr>
                ";
               }
            }
            ?>
            
    </table>

    <?php  include "create.php" ?>
    <script>
// Get the modal
var modal = document.getElementById('addstudent');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>
