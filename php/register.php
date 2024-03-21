<?php
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


    $sql = "INSERT INTO user (first_name, last_name, phone_number, dob, gender, password, email) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Check if preparation succeeded
    if (!$stmt) {
        die("Error: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("sssssss", $first_name, $last_name, $phone_number, $dob, $gender, $password, $email);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
?>
