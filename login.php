<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<html>

<head>
    <title>Login Page</title>
    <style>
        /* CSS code for the login form */
        @font-face { font-family: TitilliumWeb; src: url('fonts/TitilliumWeb-Regular.ttf'); } 
        h1 {
            font-family: TitilliumWeb
        }
        body {
            font-family: TitilliumWeb;
        }
        header {
            background-color: #00acee;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .container {
            width: 300px;
            padding: 16px;
            background-color: #f2f2f2;
            margin: 0 auto;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #00acee;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            font-family: TitilliumWeb;
            font-size: large;
        }

        button:hover {
            opacity: 0.75;
        }
        
        footer {
            font-family: TitilliumWeb;
        }
    </style>

    <script>
        function validateForm() {
            var username = document.querySelector('input[name="username"]').value;
            var password = document.querySelector('input[name="password"]').value;

            // Check username and password (admin/password)
            if (username === "admin" && password === "password") {
                alert("Login successful.");
                // Redirects if successful
                window.location.href = "index.html";
                return false;
            } 
            else {
                alert("Invalid username or password");
                return false;
            }
        }
    </script>

</head>
<header>
    <img src="images/y_logo_small_clear.png", width="100", height="100">
    <h1>Welcome to V (formerly Chirper)</h1>
</header>
<br>
<body>
    <div class="container">
        <form id="loginForm" onsubmit="return validateForm()" method="post">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <form id="Cancel" action="index.html" method="post">
            <button type="submit">Cancel</button>
        </form>
    </div>
</body>
</html>
