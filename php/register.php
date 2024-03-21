<?php
    $host = 'localhost'; // XAMPP usually has MySQL running on localhost
    $dbname = 'guvi_arul';
    $username = 'root'; // Default username for XAMPP MySQL
    $password = ''; // Default password for XAMPP MySQL is empty
    echo "helloworld"; // added semicolon here

    // Create a connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "INSERT INTO user (first_name,last_name,phone_number,dob,gender,password, email) VALUES ('$first_name', '$last_name', '$phone_number','$dob',
        '$gender','$password','$email')";
    if ($conn->query($sql) === TRUE) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    
?>
