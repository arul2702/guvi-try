<?php
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $phonenumber = $_POST['phone_number'];
    $email = $_POST['email'];
    $dob = $_POST['dob_inp'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phone_number'];


    // Do some processing with the data (e.g., save to a database)
    
    // Here, we're just echoing back a response
    echo "Form submitted successfully! <br>";
    echo "Name: $name <br>";
    echo "Email: $email";
} else {
    // If not a POST request, return an error message
    echo "Error: Invalid request method";
}
?>