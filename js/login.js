$(document).ready(function() {
    $('#loginForm').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6 
            },
        },
        messages: {
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please provide your password",
                minlength: "Your password must be at least 6 characters long"
            }
        }
    });
    $("#loginbtn").click(function(e){
        e.preventDefault();
        console.log("clickcsssss" )
        // Check if the form is valid
        if ($('#loginForm').valid()) {
            console.log("valid")
            $.ajax({
                url : 'http://localhost:8000/login.php',
                method: 'POST',
                data : $("#loginForm").serialize(),
                success : function(res){
                    console.log(res);
                    alert("Login successful!");
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                    alert('Login failed: ' + errorThrown); 
                }
            });
        } else {
            alert("Please fill in all required fields correctly.");
        }
    });
});
