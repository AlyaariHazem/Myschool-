
<?php
$servername='localhost';
$userName='root';
$password='';
$database='myschool';
$connection=new mysqli($servername,$userName,$password,$database);

if($_SERVER['REQUEST_METHOD']=='GET'){
 if(!isset($_GET['student_id'])){
    header("location:/php/myschool/teacher/students.php");
    exit;
 }

 $student_id=$_GET["student_id"];
 //read the row of students from database 
 $sql="select * from studnet  where student_id= $student_id";
 $result=$connection->query($sql);
 $row1=$result->fetch_assoc();
 if(!$row1){
    //to exit if it's empty 
    header("location:/php/myschool/teacher/studnet.php");
    exit;
  }
  $student_name=$row1["student_name"];
  $phone=$row1["phone"];
  $age=$row1["age"];
  $gender=$row1["gender"];
  $stud_class_id=$row1["stud_class_id"];
  $division_id=$row1["division_id"];
  $appreciation=$row1['appreciation'];
  $password=$row1["password"];

}
else{
    $student_id=$_POST["student_id"];
    $student_name=$_POST["student_name"];
    $phone=$_POST["phone"];
    $age=$_POST["age"];
    $gender=$_POST["gender"];
    $stud_class_id=$_POST["stud_class_id"];
    $division_id=$_POST["division_id"];
    $appreciation=$_POST["appreciation"];
    $password=$_POST["password"];

    do{
        if(empty($student_id)||empty($student_name)||empty($phone)||empty($age)||empty($gender)||empty($stud_class_id)||empty($division_id)||empty($appreciation)||empty($password)){
            echo "All the Files are required";
            break;
        }
        $sql="UPDATE studnet ".
        "set student_name='$student_name',phone='$phone',age='$age',gender='$gender',stud_class_id='$stud_class_id',division_id='$division_id',appreciation='$appreciation',password='$password' ".
        " where student_id=$student_id";
        $result=$connection->query($sql);
        if(!$result){
            $errorMassage="Invalid query:".$connection->error;
            break;
        }
        $successMassage="student update correctly";
        header("location:/php/myschool/teacher/students.php");
        exit;
    }while(false);
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
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">رقم الطالب</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="student_id" value="<?php echo $student_id;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">اسم الأستاذ</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="student_name" value="<?php echo $student_name;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label"> رقم الهاتف </label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">العمر</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="age" value="<?php echo $age;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">الجنس</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="gender" value="<?php echo $gender;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">رقم الصف</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="stud_class_id" value="<?php echo $stud_class_id;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">رقم الشعبة </label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="division_id" value="<?php echo $division_id;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label"> الترتيب </label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="appreciation" value="<?php echo $appreciation;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label"> كلمة السر</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="password" value="<?php echo $password;?>">
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
          <a class="btn btn-danger" role="bottun" href="students.php">إالغاء</a>
        </div>
    </form>
    
</body>
</html>


    