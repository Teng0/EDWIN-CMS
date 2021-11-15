<?php
if (isset($_POST['comment'])){
    create_comment();
}
function create_comment(){
    global $connection;

    $status = "unapproved";
    $query = "INSERT INTO comments (comment_post_id,comment_author,	comment_email,comment_content,comment_status,comment_date) ";
    $query .= "VALUES({$_GET['p_id']},'{$_POST['comment_author']}','{$_POST['comment_email']}','{$_POST['comment_content']}','$status',CURDATE())";

    $query_get_posc_com_count = "SELECT post_comment_count FROM posts WHERE post_id={$_GET['p_id']}";
    $res_com_count = mysqli_query($connection,$query_get_posc_com_count);
    $post_com_counts=mysqli_fetch_assoc($res_com_count);
    $post_com_count=$post_com_counts['post_comment_count'];
    $update_count = $post_com_count+1;
    $query_update_post_com_count = "UPDATE posts SET post_comment_count={$update_count} WHERE post_id ={$_GET['p_id']}";
    mysqli_query($connection,$query_update_post_com_count);

    $res = mysqli_query($connection,$query);
    if (!$res){
        echo mysqli_error($connection);
    }else{

       // $_SESSION['message'] = "Comment Added Succesfuly";
      //  header("Location: post.php?p_id={$_GET['p_id']}");
    }
}

function print_all_comments($p_id){
    global $connection;

    if (isset($_SESSION['message'])){
        echo "<h4 style='color: #4cae4c'> {$_SESSION['message']}</h4>";
        $_SESSION['message']="";
    }
    $query = "SELECT * FROM comments WHERE comment_post_id =$p_id AND comment_status ='published' ORDER BY comment_id DESC";

    $res = mysqli_query($connection, $query);
    if (!$res){
        echo mysqli_error($connection);
    }
    while($row = mysqli_fetch_assoc($res)){ ?>
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $row['comment_author']?>
                    <small><?php echo $row['comment_date']?></small>
                </h4>
                    <p><?php echo $row['comment_content']?></p>
                <!-- Nested Comment -->
<!--                <div class="media">-->
<!--                    <a class="pull-left" href="#">-->
<!--                        <img class="media-object" src="http://placehold.it/64x64" alt="">-->
<!--                    </a>-->
<!--                    <div class="media-body">-->
<!--                        <h4 class="media-heading">Nested Start Bootstrap-->
<!--                            <small>August 25, 2014 at 9:30 PM</small>-->
<!--                        </h4>-->
<!--                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--                    </div>-->
<!--                </div>-->
                <!-- End Nested Comment -->
            </div>
        </div>
<?php
    }
}
?>