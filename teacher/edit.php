<?php
$servername="localhost";
$username="root";
$password="";
$database="myschool";
$connection=new mysqli($servername,$username,$password,$database);

//Massages
$errorMassage="";
$successMassage="";
if($_SERVER['REQUEST_METHOD']=='GET'){
 if(!isset($_GET['teacher_id'])){
    header("location:/myschool/students.php");
    exit;
 }

 $teacher_id=$_GET["teacher_id"];
 //read the row of students from database 
 $sql="select * from teacher  where teacher_id= $teacher_id";
 $result=$connection->query($sql);
 $row=$result->fetch_assoc();
 if(!$row){
    //to exit if it's empty 
    header("location:/myschool/teacher/teacher.php");
    exit;
  }

  $teacher_name=$row["teacher_name"];
  $teacher_phone=$row["teacher_phone"];
  $teacher_salary=$row["teacher_salary"];
  $teacher_sex=$row["teacher_sex"];
  $subject_name=$row["subject_name"];
  $teacher_mang_id=$row["teacher_mang_id"];


}
else{
  $teacher_id=$_POST["teacher_id"];
  $teacher_name=$_POST["teacher_name"];
  $teacher_phone=$_POST["teacher_phone"];
  $teacher_salary=$_POST["teacher_salary"];
  $teacher_sex=$_POST["teacher_sex"];
  $subject_name=$_POST["subject_name"];
  $teacher_mang_id=$_POST["teacher_mang_id"];
    do{
        if(empty($teacher_id)||empty($teacher_name)||empty($teacher_phone)||empty($teacher_salary)||empty($teacher_sex)){
            echo "All the Files are required";
            break;
        }
        $sql="UPDATE teacher ".
        "set teacher_name='$teacher_name',teacher_phone='$teacher_phone',teacher_salary='$teacher_salary',teacher_sex='$teacher_sex',teacher_mang_id='$teacher_mang_id',subject_name='$subject_name' ".
        " where teacher_id=$teacher_id";
        $result=$connection->query($sql);
        if(!$result){
            $errorMassage="Invalid query:".$connection->error;
            break;
        }
        $successMassage="student update correctly";
        header("location:/php/myschool/teacher/teacher.php");
        exit;

        
    }while(true);
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدرستي </title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/tables.css">
    <link rel="stylesheet" href="../css/css.css">
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <style>

.create_form{
    margin:55px;
    padding-left:2rem;
}
.btn-danger{
    margin-top:-4rem;
    position:absolute;
    left:12rem;
    padding:.7rem 9rem;
}
.btn-primary{
    padding:.7rem 1px;
    margin-top:-2rem;
}
</style>

</head>
<body class="container my-5" style="background:#eee!important;">
    <h2>  تعديل بيانات الطالب</h2>
     <?php
    if(!empty($errorMassage)){
        echo"
        <div class='alert alert-warning alert-dismissible fade show' role'alert'>
            <strong>$errorMassage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
     }
     ?>
    <form action="" method="POST">
        <input type="hidden" name="teacher_id" value="<?php echo $teacher_id;?>">
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">اسم الأستاذ</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="teacher_name" value="<?php echo $teacher_name;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label"> رقم الهاتف </label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="teacher_phone" value="<?php echo $teacher_phone;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">الراتب</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="teacher_salary" value="<?php echo $teacher_salary;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">الجنس</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="teacher_sex" value="<?php echo $teacher_sex;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">الجنس</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="subject_name" value="<?php echo $subject_name;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">رقم المدير</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="teacher_mang_id" value="<?php echo $teacher_mang_id;?>">
            </div>
        </div>
       
        <?php
        if(!empty($successMassage)){
            echo"<div class='col-md-4'>
            <div class='alert alert-primary alert-missible fade show' role'alert'>
            <strong>$successMassage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
          </div>";
        }
        ?>

        <div class="row mb-3">
         <div class="offset-sm-1 width:3 d-grid">
            <button type="submit" class="btn btn-primary create_submit" name="submit">إرسال</button>
         </div>
        </div>

        <div class="col-sm-3 d-grid">
          <a class="btn btn-danger" role="bottun" href="teacher.php">إالغاء</a>
        </div>
    </form>
    
</body>
</html>