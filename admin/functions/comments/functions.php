<?php
function print_all_comments(){

global $connection;

if (isset($_SESSION['message'])){
echo "<h4 style='color: #4cae4c'> {$_SESSION['message']}</h4>";
$_SESSION['message']="";
}
$query = "SELECT * FROM comments";

$res = mysqli_query($connection, $query);
if (!$res){
    echo mysqli_error($connection);
}
while($row = mysqli_fetch_assoc($res)){
echo "<tr>";
    echo "<td>{$row['comment_id']}</td>";
    echo "<td>{$row['comment_post_id']}</td>";
    echo "<td>{$row['comment_author']}</td>";
    echo "<td>{$row['comment_email']}</td>";
    echo "<td>{$row['comment_status']}</td>";
    echo "<td>{$row['comment_content']}</td>";
    echo "<td>{$row['comment_date']}</td>";
    echo "<td><a href='comments.php?source=post_all&del={$row['comment_id']}'>Delete</a></td>";
    echo "<td><a href='comments.php?source=post_edit&edit={$row['comment_id']}'>Edit</a></td>";
    echo "<tr>";
    }


    }
?>