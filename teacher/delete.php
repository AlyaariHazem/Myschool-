<?php
if(isset($_GET["teacher_id"])){
    $id=$_GET["teacher_id"];
    $servername="localhost";
    $username="root";
    $password="";
    $database="myschool"; 
    $connection=new mysqli($servername,$username,$password,$database);
    $sql="DELETE FROM teacher WHERE teacher_id = $id";
    $connection->query($sql);
}
header("location:teacher.php");
exit;

?>