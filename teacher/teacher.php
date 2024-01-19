<?php
$teacher_id="";
$teacher_name="";
$teacher_phone="";
$teacher_salary="";
$teacher_sex="";
$teacher_mang_id="";
$subject_name="";
//create connection with database

$servername="localhost";
$username="root";
$password="";
$dbname= "myschool";
$connection=new mysqli($servername,$username,$password, $dbname);
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['send'])){
    $teacher_id=$_POST['teacher_id'];
    $teacher_name=$_POST['teacher_name'];
    $teacher_phone=$_POST['teacher_phone'];
    $teacher_salary=$_POST['teacher_salary'];
    $teacher_sex=$_POST['teacher_sex'];
    $teacher_mang_id=$_POST['teacher_mang_id'];
    $subject_name=$_POST['subject_name'];
    
    $errorMassage="";
    $successMassage="";
 }
 do{
      //check if is not any data empty
    if(empty($teacher_id)||empty($teacher_name)||empty($teacher_phone)||empty($teacher_salary)||empty($teacher_sex)||empty($teacher_mang_id)){
        $errorMassage="يجب أن تملأ جميع الحقول";
        break;
    }

    //add new student to database 
    $sql1="insert into teacher (teacher_id,teacher_name,teacher_phone,teacher_salary,teacher_sex,teacher_mang_id,subject_name)".
    "values('$teacher_id','$teacher_name','$teacher_phone','$teacher_salary','$teacher_sex','$teacher_mang_id','$subject_name')";
    $result=$connection->query($sql1);
    if(!$result){
        $errorMassage="Invalid query".$connection->error;
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
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../admin/styles.css">
    <?php include "../admin/index.html";
    ?>
    <style>
        <?php include "../include/style.css"; ?>
        .table{
            padding-right:2rem;
            margin:2px 17px;
            margin-top:2rem;
            margin-left:5rem !important;
            width:97%;
        }
        .table  tr th{
            background-color:rgb(89, 124, 214);
            color:white;
        }
        .topnav{
            margin-top:-9%;
        }

        </style>
</head>
<body>
    <?php include "../include/varHeaderTeacher.php";  ?>

    <div class="massage">
     <marquee direction="left">👩‍🎓👨‍🎓   عرض جميع المدرسين    👩‍🎓👨‍🎓</marquee>

    </div>
    
    <table class="table table-striped table-hover ">
       
            <tr>
                <th  style="background-color:rgb(89, 124, 214);">رقم</th>
                <th style="background-color:rgb(89, 124, 214);">اسم المدرس</th>
                <th style="background-color:rgb(89, 124, 214);">التلفون</th>
                <th style="background-color:rgb(89, 124, 214);">الراتب</th>
                <th style="background-color:rgb(89, 124, 214);">الجنس</th>
                <th style="background-color:rgb(89, 124, 214);">المادة</th>
                <th style="background-color:rgb(89, 124, 214);"></th>
                
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
               //read all row from database table 
               $sql = "SELECT *
                 FROM teacher";
               $result=$connection->query($sql);
               if(!$result){
                   die("Invalid query : ".$connection->error);
                }

                //read data of each row
                while($row=$result->fetch_assoc()){
                   
                echo "
                <tr>
                <td>$row[teacher_id]</td>
                <td>$row[teacher_name]</td>
                <td>$row[teacher_phone]</td>
                <td>$row[teacher_salary]</td>
                <td>$row[teacher_sex]</td>
                <td>$row[subject_name]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='edit.php?teacher_id=$row[teacher_id]'>تعديل</a>
                    <a class='btn btn-danger btn-sm' href='delete.php?teacher_id=$row[teacher_id]'>حذف</a>
                </td>
             </tr>
                ";
                    }
            ?>
            
    </table>

    <?php  include "create.php" ?>
    <script>
// Get the modal
var modal = document.getElementById('addteacher');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>



    