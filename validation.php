<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the username and password from the form
    $username = FILTER_VAR ($_GET["uname"], FILTER_SANITIZE_STRING);
    $password = FILTER_VAR($_GET["psw"], FILTER_SANITIZE_STRING);

    // Perform the server-side validation or authentication
    // Here, you can connect to your database and check if the username and password are correct

    // Assuming you have a database named "myschool" with a table named "myschool" containing username and password columns
    $servername = "localhost";
    $dbname = "myschool";
    $dbusername = "root";
    $dbpassword = "";

    try {
        // Create a connection to the database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);

        // Set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement to retrieve the user with the given username and password
        $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $threeChar = substr($password, 0, 3);

        // Query to get password and username of the students
        $sql2 = "SELECT * FROM studnet WHERE student_id = :username AND password = :password";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bindParam(':username', $username);
        $stmt2->bindParam(':password', $password);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll();
        // Check if a matching user is found
        if ($threeChar == "std" && count($result) > 0) {
            $student= $result2[0]['student_id'];
            header("Location:user/index.php?id='$student'");
            exit;
        } elseif (count($result) > 0) {
            // Username and password are correct
            header("Location:teacher/teacher.php");
            exit;
        }elseif(count($result2)>=0){
            $student= $result2[0]['student_id'];
            header("Location:user/index.php?id='$student'");
            exit;
            
        } 
        
        else {
            // Invalid username or password
            header("Location:login.php");
            exit;
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>