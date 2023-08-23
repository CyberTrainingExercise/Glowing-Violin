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

</head>
<header>
    <img src="images/y_logo_small_clear.png", width="100", height="100">
    <h1>Welcome to V (formerly Chirper)</h1>
</header>
<br>
<body>
    <div class="container">
        <form id="loginForm" action="login.php" method="post">
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
