<?php
    // if((!isset($_SESSION["loggedin"])) || $_SESSION["loggedin"] === false){
    //     header('location: logform.php?err');
    // }
    function fetchMessages($id){
        include "config.php";
        $currentUser = $_SESSION['id'];

        $query1 = "SELECT users.username, messages.content FROM messages join users on messages.sender = users.user_id where (messages.receiver = '$currentUser' and messages.sender = '$id') 
            or (messages.sender = '$currentUser' and messages.receiver = '$id) order by stamp";

        $result = mysqli_query($link, $query1);

        while($row = mysqli_fetch_array($result)){
            $messages[] = [$row['username'],$row['content']];
        }

        return json_encode($comments);

        

    }

    // $messages1 = fetchMessages('1');
    // $messages2 = fetchMessages('2');
    // $messages3 = fetchMessages('3');
    // $messages4 = fetchMessages('4');
    // $messages5 = fetchMessages('5');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Y (formerly Chirper)</title>
    <style>
        @font-face { font-family: TitilliumWeb; src: url('fonts/TitilliumWeb-Regular.ttf'); } 
        h1 {
            font-family: TitilliumWeb
        }
        body {
            font-family: TitilliumWeb;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        header {
            background-color: #00acee;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .category {
            background-color: white;
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .dm {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding: 5px;
            margin-top: 5px;
            border-radius: 3px;
            font-size: 20px;
            text-align: left;
        }
        .dm p {
            margin: 0;
        }
        .dm .username {
            color: #00acee;
            font-weight: bold;
        }
        .dm .timestamp {
            font-size: 15px;
        }
        .display{
            background-color: white;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            text-align: center;
        }

        #loginButton {
            background-color: #f5f5f5;
            color: black;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            font-family: TitilliumWeb;
            font-size: large;
        }
        .passwordReset {
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
<body>
    <header>
        <div style="float: right;">
            <form id="login" action="logout.php" method="post">
                <button type="submit" id="loginButton">Logout</input>
            </form>
        </div>
        <h1>Your Account</h1>
    </header>
    <br>
    <div class="category" id="dms">
        <h2>Direct Messages</h2>
        <div class="threads" id="threads">
            <div class="dm">
                <p class="username">Bear News</p>
                <p class="timestamp">2 hours ago</p>
                <button type="submit" id="dmOpener">View Conversation</button>
                <div class = "thread">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="category" id="images">
        <h2>Stored Images</h2>
        <div class="display">
            <?php foreach (glob('User1/images/*') as $filename){ ?>
                <a href="User1/images/<?php echo basename($filename); ?>"><?php echo basename($filename); ?></a>
            <?php } ?>
            </div>
    </div>
    <div class="passwordReset">
        <form id="loginForm" action="pwchange.php" method="post">
            <label for="Change Your Password"><b>Change Your Password</b></label>
            <input type="password" placeholder="Enter New Password" name="password" required>
            <button type="submit">Change Password</button>
        </form>
    </div>
</body>
<footer>
    <div style="text-align: center;">
        <a href="index.php">Home</a>
        <a href="about.html">About</a>
        <a href="careers.html">Careers</a>
    </div>
    <p style="text-align: center;">© 2023 V Corp.</p>
</footer>
<script>

    temp = {
        user1:['admin','2 hours ago'],
        user2:['PoeTAto','1 day ago']
    };


    // Function to generate comment HTML

    function generateDM(comment) {
        return `
            <div class="dm">
                <p class="username">${user[0]}</p>
                <p class="timestamp">${user[1]}</p>
            </div>
        `;
    }
    
    // Function to populate comments
    function populateDMs(data) {
        const commentsContainer = document.getElementById(`threads`);
        data.forEach(user => {
            commentsContainer.innerHTML += generateDM(user);
        })
    }

    populateDMs(temp);
</script>
</html>
