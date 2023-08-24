<?php
include "config.php";
$id = '1';
$comments = [];

$query = "SELECT users.username, comments.content FROM comments join users on comments.poster_id = users.user_id where comments.post_id = '$id'";

$result = mysqli_query($link, $query);

while($row = mysqli_fetch_array($result)){
    $comments[] = [$row['username'],$row['content']];
}

//print_r($comments[0]);

echo json_encode($comments);
// if($_SERVER["REQUEST_METHOD"] === "GET"){
//     if(isset($_GET["post_id"])){
//         $id = $_GET['post_id'];
//         $comments = [];

//         $query = "SELECT users.username, comments.content FROM comments join users on comments.poster_id = users.user_id where comments.post_id = '$id'";

//     }
// }

?>