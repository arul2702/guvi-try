<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST"); // Adjust allowed HTTP methods as needed
    header("Access-Control-Allow-Headers: Content-Type");
// Check if the request is a POST request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        // Do some processing with the data (e.g., save to a database)
        // Here, we're just echoing back a response
        // Database connection parameters
        $host = 'localhost'; // XAMPP usually has MySQL running on localhost
        $dbname = 'guvi-db';
        $username = 'root'; // Default username for XAMPP MySQL
        $password = ''; // Default password for XAMPP MySQL is empty
        
        // Create a connection
        $conn = new mysqli($host, $username, $password, $dbname);
        $sql = "INSERT INTO signup(firstName,last_name)"
    } else {
        // If not a POST request, return an error message
        echo "Error: Invalid request method";
    }
?>
