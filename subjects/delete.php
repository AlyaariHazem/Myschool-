<?php
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $servername="localhost";
    $username="root";
    $password="";
    $database="myschool"; 
    $connection=new mysqli($servername,$username,$password,$database);
    $sql="DELETE FROM subjects WHERE id = $id";
    $connection->query($sql);
}
header("location:students.php");
exit;

?>