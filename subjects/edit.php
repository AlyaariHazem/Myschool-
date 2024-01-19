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
 if(!isset($_GET['id'])){
    header("location:/myschool/students.php");
    exit;
 }

 $id=$_GET["id"];
 //read the row of students from database 
 $sql="select * from subjects  where id= $id";
 $result=$connection->query($sql);
 $row=$result->fetch_assoc();
 if(!$row){
    //to exit if it's empty 
    header("location:/myschool/students.php");
    exit;
  }
  $name=$row["name"];
  $subject_name=$row["subject_name"];
  $degree=$row["degree"];
  $phone=$row["phone"];
  $appreciation=$row["appreciation"];
  $OrderLevel=$row["OrderLevel"];

}
else{
    
    $id=$_POST["id"];
    $name=$_POST["name"];
    $subject_name=$_POST["subject_name"];
    $degree=$_POST["degree"];
    $phone=$_POST["phone"];
    $appreciation=$_POST["appreciation"];
    $OrderLevel=$_POST["OrderLevel"];

    do{
        if(empty($id)||empty($name)||empty($subject_name)||empty($degree)||empty($phone)||empty($appreciation)||empty($OrderLevel)){
            echo "All the Files are required";
            break;
        }
        $sql="UPDATE subjects ".
        "set name='$name',subject_name='$subject_name',degree='$degree',phone='$phone',appreciation='$appreciation',OrderLevel='$OrderLevel' ".
        " where id=$id";
        $result=$connection->query($sql);
        if(!$result){
            $errorMassage="Invalid query:".$connection->error;
            break;
        }
        $successMassage="student update correctly";
        header("location:/php/myschool/subjects/students.php");
        exit;
    }while(true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My School</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/tables.css">
    <link rel="stylesheet" href="../css/css.css">
    <script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container my-5" style="background:#eee!important;">
    <h2>New Student</h2>
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
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">Subject's Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="subject_name" value="<?php echo $subject_name;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">Degree</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="degree" value="<?php echo $degree;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">Phone</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">appreciation</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="appreciation" value="<?php echo $appreciation;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">Order</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="OrderLevel" value="<?php echo $OrderLevel;?>">
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
            <button type="submit" class="btn btn-primary">submit</button>
         </div>
        </div>

        <div class="col-sm-3 d-grid">
          <a class="btn btn-outline-primary" role="bottun" href="students.php">Cancel</a>
        </div>
    </form>
    
</body>
</html>