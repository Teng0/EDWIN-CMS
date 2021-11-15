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
    $query_posts = "SELECT post_title FROM posts WHERE post_id = {$row['comment_post_id']}";
    $res_posts = mysqli_query($connection,$query_posts);
    $post_data = mysqli_fetch_assoc($res_posts);

echo "<tr>";
    echo "<td>{$row['comment_id']}</td>";
    echo "<td>{$row['comment_post_id']}</td>";
    echo "<td><a href='../post.php?p_id={$row['comment_post_id']}'>{$post_data['post_title']}</a></td>";
    echo "<td>{$row['comment_author']}</td>";
    echo "<td>{$row['comment_email']}</td>";
    echo "<td>{$row['comment_status']}</td>";
    echo "<td>{$row['comment_content']}</td>";
    echo "<td>{$row['comment_date']}</td>";
    echo "<td><a href='comments.php?source=comments_all&del={$row['comment_id']}'>Delete</a></td>";
    if ($row['comment_status']=="unapproved"){
        echo "<td><a href='comments.php?source=comments_all&appr={$row['comment_id']}'>Approve</a></td>";
    }else{
        echo "<td><a href='comments.php?source=comments_all&unappr={$row['comment_id']}'>UnApprove</a></td>";
    }
    echo "<tr>";
    }


    }


 function approve_comment($comment_id){
     global $connection;
    $comment_status = 'published';
    $query = "UPDATE comments SET comment_status='{$comment_status}' WHERE comment_id={$comment_id}";
    $res= mysqli_query($connection,$query);
    if (!$res){
        die(mysqli_error($connection));
    }
    else{
        $_SESSION['message']= "Status Updated Succesfuly";
        header("Location: comments.php?source=comments_all");
    }
 }
function unapprove_comment($comment_id){
    global $connection;
    $comment_status = 'unapproved';
    $query = "UPDATE comments SET comment_status='{$comment_status}' WHERE comment_id={$comment_id}";
    $res= mysqli_query($connection,$query);
    if (!$res){
        die(mysqli_error($connection));
    }
    else{
        $_SESSION['message']= "Status Updated Succesfuly";
        header("Location: comments.php?source=comments_all");
    }


}



?>