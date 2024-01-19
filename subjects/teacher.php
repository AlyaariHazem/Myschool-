<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myschool</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/css.css">
    <?php include "../admin/index.html"; ?>
    <?php include "insert pepole.html"; ?>
    <style>
       
        .edit:hover{
            background-color:rgb(89, 124, 214)!important;
            border-radius:10px;
            color:white!important;
            
        }
        .table{
            padding-right:2rem;
        }
        <?php include "../include/style.css"; ?>
    </style>
</head>
<body>

<div class="massage">
     <marquee direction="left">👩‍🎓👨‍🎓   عرض جميع الطلاب    👩‍🎓👨‍🎓</marquee>

    </div>
    <table class="table table-striped table-hover ">
       
            <tr>
                <th  style="background-color:rgb(89, 124, 214);">الرقم</th>
                <th style="background-color:rgb(89, 124, 214);">الاسم</th>
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
               $sql="select * from teacher";
               $result=$connection->query($sql);
               if(!$result){
                   die("Invalid query : ".$connection->error);
                }
                
                //read data of each row
                while($row=$result->fetch_assoc()){
                    $sql2="select subject_name,subject_id from subject";
                    $result=$connection->query($sql2);
                    while($row2=$result->fetch_assoc()){

                    
                echo "
                <tr>
                <td>$row[teacher_id]</td>
                <td>$row[teacher_name]</td>
                <td>$row[teacher_phone]</td>
                <td>$row[teacher_salary]</td>
                <td>$row[teacher_sex]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='edit.php?teacher_id=$row[teacher_id]'>تعديل</a>
                    <a class='btn btn-danger btn-sm' href='delete.php?teacher_id=$row[teacher_id]'>حذف</a>
                </td>
             </tr>
                ";
               }
            }

            ?>
    </table>
</body>
</html>