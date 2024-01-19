<?php
if(isset($_GET["student_id"])){
    $id=$_GET["student_id"];
    $servername="localhost";
    $username="root";
    $password="";
    $database="myschool"; 
    $connection=new mysqli($servername,$username,$password,$database);
    $sql="DELETE FROM studnet WHERE student_id = $id";
    $connection->query($sql);
}
header("location:students.php");
exit;

?>