<?php
$name="";
$subject_name="";
$degree="";
$phone="";
$appreciation="";
$OrderLevel="";
 
//create connection with database
$servername="localhost";
$username="root";
$password="";
$dbname= "myschool";
$connection=new mysqli($servername,$username,$password,$dbname);
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['send'])){
    $name=$_GET['name'];
    $subject_name=$_GET['subject_name'];
    $degree=$_GET['degree'];
    $phone=$_GET['phone'];
    $appreciation=$_GET['appreciation'];
    $OrderLevel=$_GET['OrderLevel'];
    
    //check if is not any data empty
    $errorMassage="";
    $successMassage="";
    }
  do{
    if(empty($name)||empty($subject_name)||empty($degree)||empty($phone)||empty($appreciation)||empty($OrderLevel)){
        $errorMassage="يجب أن تملأ جميع الحقول";
        break;
    }

    //add new student to database 
    $sql="insert into subjects (name,subject_name,degree,phone,appreciation,OrderLevel)".
    "values('$name','$subject_name','$degree','$phone','$appreciation','$OrderLevel')";
    $result=$connection->query($sql);
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
    <?php include "../admin/index.html"; ?>
    <style>
        .table{
            padding-right:2rem;
            margin:2px 17px;
            margin-left:5rem !important;
            width:97%;
        }
        .table  tr th{
            background-color:rgb(89, 124, 214);
            color:white;
        }
        <?php include "../include/style.css"; ?>
    </style>
</head>
<body>
<div class="topnav">
      <a style="margin-bottom: 5px;"  href="#add" > <button class="bttn1"
        onclick="document.getElementById('add').style.display='block'"
        style=" width:auto; border:none; top:8px; "  >إضافة طالب</button></a>
      <a href="#"class="edit" >حذف مدرس</a>
      <a href="#" class="edit">إرسال رسالة لمدرس</a>
      
    </div>
    <div class="massage">
     <marquee direction="left">👩‍🎓👨‍🎓   عرض جميع الطلاب    👩‍🎓👨‍🎓</marquee>

    </div>
    
    <table class="table table-striped table-hover ">
        
            <tr>
                <th  >الرقم</th>
                <th  >الاسم</th>
                <th  >اسم المادة</th>
                <th  >الدرجة</th>
                <th  >التلفون</th>
                <th  >التقدير</th>
                <th  >الترتيب</th>
                <th  ></th>
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
               $sql="select * from subjects";
               $result=$connection->query($sql);

               if(!$result){
                die("Invalid query : ".$connection->error);
               }

               //read data of each row
               while($row=$result->fetch_assoc()){
                echo "
                <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[subject_name]</td>
                <td>$row[degree]</td>
                <td>$row[phone]</td>
                <td>$row[appreciation]</td>
                <td>$row[OrderLevel]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>تعديل</a>
                    <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>حذف</a>
                </td>
             </tr>
                ";
               }

            ?>
          
    </table>

    <?php  include "create.php" ?>
    <script>
// Get the modal
var modal = document.getElementById('add');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>