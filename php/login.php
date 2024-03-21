<?php
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Methods: POST"); // Adjust allowed HTTP methods as needed
   header("Access-Control-Allow-Headers: Content-Type");
   
   // Database connection parameters
    $host = 'localhost'; // XAMPP usually has MySQL running on localhost
    $dbname = 'guvi_arul';
    $username = 'root'; // Default username for XAMPP MySQL
    $password = ''; // Default password for XAMPP MySQL is empty

    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = $conn->query($query)

    if ($result->num_rows ==1) {
        header("Location : profile.html")
        echo "Login in successfully";
    } else {
        echo "Error: " . $result->error;
    }
    $result->close();
    $conn->close();
?>
