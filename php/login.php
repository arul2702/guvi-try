<?php
// Connect to Redis server
// $redis = new Redis();
// $redis->connect('127.0.0.1', 6379); // Assuming Redis is running on localhost

// // Function to create a session token
// function createSessionToken($username) {
//     return md5($username . time() . rand());
// }

// // Function to store session information in Redis
// function storeSessionInfo($token, $username) {
//     global $redis;
//     $redis->setex($token, 3600, $username); // Store session info for 1 hour
// }

// // Function to validate session token
// function validateSessionToken($token) {
//     global $redis;
//     return $redis->exists($token);
// }

// Handle login request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Validate username and password (e.g., authenticate against a database)
    // For simplicity, assuming login is successful
    
    // Create session token and store session info in Redis
    // $token = createSessionToken($username);
    // storeSessionInfo($token, $username);
    
    // Return session token to client
    echo $email;
}
?>
