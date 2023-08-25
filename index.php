<?php
    session_start();

    if((!isset($_SESSION["loggedin"])) || $_SESSION["loggedin"] === false){
        header('location: logform.php?err');
    }

    function fetchComms($id){
        include "config.php";
        $query = "SELECT users.username, comments.content FROM comments join users on comments.poster_id = users.user_id where comments.post_id = '$id'";

        $result = mysqli_query($link, $query);

        $comments = [];
        
        while($row = mysqli_fetch_array($result)){
            $comments[] = [$row['username'],$row['content']];
        }

        return $comments;

    }

    $comments1 = fetchComms('1');
    $comments2 = fetchComms('2');
    $comments3 = fetchComms('3');
    $comments4 = fetchComms('4');
    $comments5 = fetchComms('5');
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
        .post {
            background-color: white;
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
        }
        .post p {
            margin: 0;
        }
        .post .username {
            color: #00acee;
            font-weight: bold;
        }
        .post .timestamp {
            color: #999;
            font-size: 12px;
        }
        .comment {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding: 5px;
            margin-top: 5px;
            border-radius: 3px;
            font-size: 12px;
            text-align: left;
        }
        .comment .username {
            color: #00acee;
            font-weight: bold;
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
        <img src="images/y_logo_small_clear.png", width="100", height="100">
        <div style="float: right;">
            <form id="login" action="account.php" method="post">
                <button type="submit" id="loginButton">Your Account</input>
            </form>
        </div>
        <h1>Welcome to V (formerly Chirper)</h1>
    </header>
    <br>
    <div style="text-align: center;">
        <img src="images/bear_news.png", width="150", height="150", style="border-radius: 50%;">
        <h2>Bear News</h2>
        <p>Welcome to the Bear News' Chirper, your source for the most scientific and trusted news on the web.</p>
    </div>
    <div class="post" id="post1">
        <div style="display: inline-table; text-align: center;">
            <img src="images/bear_news.png", width="50", height="50", style="border-radius: 50%;">
            <p class="username">Bear News</p>
        </div>
        <h4>Breaking: AFROTC attendance down 98%. US military going code-red.</h4>
        <p>Polling during July of 2023 shows that 98% of AFROTC Cadets are not actively participating in AFROTC, a steep decline in just the last 3 months.</p>
        <p class="timestamp">2 hours ago</p>
        <p>---</p>
        <div class="comments" id="comments1">
            <?php
                foreach($comments1 as $comment){
            ?>
                <div class="comment">
                    <p class="username"><?php echo $comment[0]?></p>
                    <p><?php echo $comment[1]?></p>
                </div>
            <?php
                }
            ?>
        </div>
        <form class="commentbox" id="commentbox1" action="add_comment.php" method="post">
            <input type="comment" placeholder="Add a comment" name="comment" required>
            <input type="hidden" name="post_id" value="1" />
            <button type="submit" id="postButton">Post</button>
        </form>
    </div>
    <div class="post" id="post2">
        <div style="display: inline-table; text-align: center;">
            <img src="images/bear_news.png", width="50", height="50", style="border-radius: 50%;">
            <p class="username">Bear News</p>
        </div>
        <h4>Very Anti-Diversity Space Organization Gaining Traction</h4>
        <p>i5 Space has recently released their updated guidelines on membership. Requirements: college students in a US military training program. Yes, that's right. Space is apparently only for soldiers in college.</p>
        <p class="timestamp">10 hours ago</p>
        <p>---</p>
        <div class="comments" id="comments2">
        <?php
                foreach($comments2 as $comment){
            ?>
                <div class="comment">
                    <p class="username"><?php echo $comment[0]?></p>
                    <p><?php echo $comment[1]?></p>
                </div>
            <?php
                }
            ?>
        </div>
        <form class="commentbox" id="commentbox1" action="add_comment.php" method="post">
            <input type="comment" placeholder="Add a comment" name="comment" required>
            <input type="hidden" name="post_id" value="2" />
            <button type="submit" id="postButton">Post</button>
        </form>
    </div>
    <div class="post" id="post3">
        <div style="display: inline-table; text-align: center;">
            <img src="images/bear_news.png", width="50", height="50", style="border-radius: 50%;">
            <p class="username">Bear News</p>
        </div>
        <h4>Inflation Reaches New Heights</h4>
        <p>Inflation of the US dollar isn't the only issue in America. A new report finds that Dining Dollars on college campuses have 12% less purchasing power in 2023 than 2022. Should we switch to Bear Coin?.</p>
        <p class="timestamp">1 day ago</p>
        <p>---</p>
        <div class="comments" id="comments1">
        <?php
                foreach($comments3 as $comment){
            ?>
                <div class="comment">
                    <p class="username"><?php echo $comment[0]?></p>
                    <p><?php echo $comment[1]?></p>
                </div>
            <?php
                }
            ?>
        </div>
        <form class="commentbox" id="commentbox1" action="add_comment.php" method="post">
            <input type="comment" placeholder="Add a comment" name="comment" required>
            <input type="hidden" name="post_id" value="3" />
            <button type="submit" id="postButton">Post</button>
        </form>
    </div>
    <div class="post" id="post4">
        <div style="display: inline-table; text-align: center;">
            <img src="images/bear_news.png", width="50", height="50", style="border-radius: 50%;">
            <p class="username">Bear News</p>
        </div>
        <h4>Invest Now, Bear Coin is the future!</h4>
        <p>Bear Coin up 35% vs. USD as inflation smashes the US dollar into oblivion.</p> required
        <p class="timestamp">2 days ago</p>
        <p>---</p>
        <div class="comments" id="comments1">
        <?php
                foreach($comments4 as $comment){
            ?>
                <div class="comment">
                    <p class="username"><?php echo $comment[0]?></p>
                    <p><?php echo $comment[1]?></p>
                </div>
            <?php
                }
            ?>
        </div>
        <form class="commentbox" id="commentbox1" action="add_comment.php" method="post">
            <input type="comment" placeholder="Add a comment" name="comment" required>
            <input type="hidden" name="post_id" value="4" />
            <button type="submit" id="postButton">Post</button>
        </form>
    </div>
    <div class="post" id="post5">
        <div style="display: inline-table; text-align: center;">
            <img src="images/bear_news.png", width="50", height="50", style="border-radius: 50%;">
            <p class="username">Bear News</p>
        </div>
        <h4>US Military Space Hacking Team Can't Hack a Potato Despite Considerable Effort</h4>
        <p>i5 Space's so called 'cyber-team' apparently can't hack a potato. This is breaking after their recent release of a new training program where potatoes are not shown being hacked.</p>
        <p class="timestamp">3 days ago</p>
        <p>---</p>
        <div class="comments" id="comments1">
        <?php
                foreach($comments5 as $comment){
            ?>
                <div class="comment">
                    <p class="username"><?php echo $comment[0]?></p>
                    <p><?php echo $comment[1]?></p>
                </div>
            <?php
                }
            ?>
        </div>
        <form class="commentbox" id="commentbox1" action="add_comment.php" method="post">
            <input type="comment" placeholder="Add a comment" name="comment" required>
            <input type="hidden" name="post_id" value="5" />
            <button type="submit" id="postButton">Post</button>
        </form>
    </div>
    <!-- More posts can be added here -->

    <script>


        // Function to generate comment HTML

        function generateComment(comment) {
            return `
                <div class="comment">
                    <p class="username">${comment[0]}</p>
                    <p>${comment[1]}</p>
                </div>
            `;
        }
        
        // Function to populate comments
        function populateComments(postId, data) {
            const commentsContainer = document.getElementById(`comments${postId}`);
            const comments = data[`post${postId}`];

            if (comments) {
                comments.forEach(comment => {
                    
                    commentsContainer.innerHTML += generateComment(comment);
                });
            }
        }

        //populateComments(1, commentsData);
    </script>
</body>
<footer>
    <div style="text-align: center;">
        <a href="index.html">Home</a>
        <a href="about.html">About</a>
        <a href="careers.html">Careers</a>
    </div>
    <p style="text-align: center;">© 2023 V Corp.</p>
</footer>
</html>
