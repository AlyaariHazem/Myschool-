<?php 
 
    //create connection with database
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="myschool";
    $connection=new mysqli($servername,$username,$password,$dbname);
    if($_SERVER['REQUEST_METHOD']=='GET'){
        
    }
    if(isset($_GET["submit"])&& !empty($_GET["search"])){
        $search = $_GET["search"];

        $sql="select * from studnet where student_id='$search'";
        $result=$connection->query($sql);
        $row=$result->fetch_assoc();
    }else{
                
        $sql="select * from studnet where student_id";
        $result=$connection->query($sql);
        $row=$result->fetch_assoc();
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
    <?php include "../admin/index.html"; ?>
    <style>
        .form-control{
            width: 100px;
        }
        .ull{
            float:right;
            list-style-type: none;
        }
        ..modal-content{
            z-index: -2;
        }
        .head header{
            z-index: -1;
            margin-top: -58px;
            height: 50px;
        }
        .modal-content {
            z-index: -2;
        }
        .profile{
            
            background-color:rgb(89, 124, 199,.2);
        }
        .col-form-label{
            width:50px;
        }
        .row label{
            width:27%;
        }
        .imgPtofile{
            top:-20px;
        }
        .imgPtofile img, p {
            float: left;
            width: 10%;
            position: absolute;
            top:22px;
            left:0;
        }
        .imgPtofile p{
            margin-top:4.6rem;
        }
        button.create_submit{
            right:-4rem;
        }
        .search{
        position: absolute;
        top: 0rem;
        width:35%;
        right: 7rem;
        }
        .send{
            position: absolute;
            top: 7px;
        }
        .logo{
            left:43%;
            width:67px;
        }
    </style>
</head>
<body>
<div class="head" >
        <!--star the header-->
        <header style="background-color:rgb(89, 124, 214);">
            <!--star the navagition-->
            <nav class="navhead" >
                <ul>
                   
                </ul>
            </nav>
        </header>
    </div>    
    <form class="search" action="" method="GET">
        <input type="text" name="search" >
        <input class="send" type="submit" value="بحث" name="submit">

    </form>
 <div id="profile" class="profile"style="width: 73%;margin-right: 10%;" >
    <form class="modal-content animate create_form" action="" method="GET"
        style="width:70%;background-color:rgb(222, 217, 237);">
        

        <div class="container">

               <div class="s_number">
                <label class="col-sm-2  s_num">رقم الطالب</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control s_num_input" name="student_id" value="<?php echo $row['student_id'];?>">
                </div>
                </div>
                <div class=" s_name">
                <label class="col-sm-5  s_nam">اسم الطالب</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control s_nam_input" name="student_name" value="<?php echo $row['student_name'];?>">
                </div>
            </div>
            <div class=" s_phone">
                <label class="col-sm-3  s_pho"> الهاتف </label>
                <div class="col-sm-3">
                    <input type="text" class="form-control s_pho_input" name="phone" value="<?php echo $row['phone'];?>">
                </div>
            </div>
               
                
            <div class=" s_age">
                <label class="col-sm-2   s_ag">العمر</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control s_ag_input" name="age" value="<?php echo $row['age'];?>">
                </div>
            </div>
            <div class="s_sex">
                <label class="col-sm-2 s_s">الجنس</label>
                <div class="col-sm-2 s_s">
                    <input type="text" class="form-control s_s" name="gender" value="<?php echo $row['gender'];?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">رقم الصف</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control s_s" name="stud_class_id" value="<?php echo $row['stud_class_id'];?>">
                </div>
            </div>
            
                
            </ul>
            <div class="row mb-3">
                <label class="col-sm-6 col-form-label">رقم الشعبة</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="division_id" value="<?php echo $row['division_id'];?>">
                </div>
            </div>
            <div class="imgPtofile">    
                <img src="up/<?php echo $row['image']; ?>" alt="photo" >
                <p>الصورة</p>

            </div>
            <div class="row mb-3">
                <label class="col-sm-6 col-form-label"> كلمة السر</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $row['password'];?>">
                </div>
            </div>
            
        </div>
    </form>
</div>


    
</body>
</html>


