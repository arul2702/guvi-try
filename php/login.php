<?php
// Allow access from all domains
header("Access-Control-Allow-Origin: *");

require './vendor/autoload.php';
$redis = new Predis\Client();

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from POST data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if user data is available in Redis cache
    $userData = $redis->hgetall($email);
    
    // If user data is not found in Redis cache, fetch it from the database
    if (empty($userData)) {
        // Database connection settings
        $servername = "localhost";
        $db_username = "root"; // Rename the variable to differentiate from user password
        $db_password = "";     // Rename the variable to differentiate from user password
        $dbname = "guvi_arul";

        // Create connection
        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to select user with provided email and password
        $sql = "SELECT * FROM user WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password); // Use two placeholders for two variables

        // Execute SQL statement
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            // User exists, fetch user data from database
            $userData = $result->fetch_assoc();
            
            // Store user data in Redis cache
            $redis->hmset($email, $userData);
        } else {
            // User does not exist or incorrect credentials
            echo "Invalid email or password!";
            exit(); // Terminate script execution
        }

        // Close database connection
        $stmt->close();
        $conn->close();
    }

    // Authenticate user with fetched user data
    if ($userData["password"] === $password) {
        // Authentication successful, redirect to profile page
        echo "Authentication successful!";
        exit(); // Terminate script execution after redirect
    } else {
        // Incorrect password
        echo "Invalid email or password!";
    }
} else {
    // Invalid request method
    echo "Invalid request method!";
}
?>
