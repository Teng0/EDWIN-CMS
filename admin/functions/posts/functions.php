<?php
function add_user_query()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $userImage = $_FILES['user_image']['name'];
        $post_temp_image = $_FILES['user_image']['tmp_name'];
        //$post_date = date('d-m-Y');

        $post_status = 'user';
        move_uploaded_file($post_temp_image, "../images/$userImage");



        $query ="INSERT INTO `users` ( `username`, `firstName`, `lastName`, `email`, `userImage`, `role`, `randSalt`) VALUES ('{$_POST['username']}', '{$_POST['firstName']}', '{$_POST['lastName']}', '{$_POST['email']}', '$userImage', '{$_POST['role']}', 'SuperSecret')";


        //var_dump($_POST);


        $res = mysqli_query($connection, $query);
        if (!$res) {
            echo mysqli_error($connection);
        } else {
            $_SESSION['message'] = "User Added Succesfuly";
            header("Location: posts.php?source=users_all");
        }

    }
}

function print_all_posts(){

    global $connection;

    if (isset($_SESSION['message'])){
        echo "<h4 style='color: #4cae4c'> {$_SESSION['message']}</h4>";
        $_SESSION['message']="";
    }
    $query = "SELECT * FROM users";
    $res = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr>";
        echo "<td>{$row['post_id']}</td>";
        echo "<td>{$row['post_title']}</td>";
        echo "<td>{$row['post_author']}</td>";
        print_cat_title_in_all_posts($row['post_category_id']);
        echo "<td>{$row['post_date']}</td>";
        echo "<td><img class='img-responsive' src='../images/{$row['post_image']}'style='width: 60px; height: 60px' alt=''></td>";
        echo "<td>{$row['post_tags']}</td>";
        echo "<td>{$row['post_comment_count']}</td>";
        if ($row['post_status']=="published"){
            echo "<td><a href='posts.php?source=post_all&unappr={$row['post_id']}'>{$row['post_status']}</a></td>";
        }else {
            echo "<td><a href='posts.php?source=post_all&appr={$row['post_id']}'>{$row['post_status']}</a></td>";
        }
        echo "<td><a href='posts.php?source=post_all&del={$row['post_id']}'>Delete</a></td>";
        echo "<td><a href='posts.php?source=post_edit&edit={$row['post_id']}'>Edit</a></td>";
        echo "<tr>";
    }


}

function del_post(){
    global $connection;
    if ( isset($_GET['del'])){
        $query = "DELETE FROM posts WHERE post_id={$_GET['del']}";
        $res = mysqli_query($connection,$query);

        if (!$res){
            echo mysqli_error($connection);
        }
        else{
            header("Location: posts.php?source=post_all&message=del");
        }
    }

}
function edit_posts_query()
{
    global $connection;
    if (isset($_GET['edit'])) {
        if (isset($_POST['edit'])){
            $post_image = $_FILES['post_image']['name'];
            $post_temp_image = $_FILES['post_image']['tmp_name'];
            if (empty($_FILES['post_image']['name'])){
                $post_image = $_POST['post_image_name'];
            }
            //$post_date = date('d-m-Y');
            $post_commentary_count = 0;
            $post_status = 'draft';
            move_uploaded_file($post_temp_image, "../images/$post_image");

            $update_query = "UPDATE posts SET post_category_id={$_POST['post_category_id']},post_title='{$_POST['post_title']}'";
            $update_query .= ",post_author='{$_POST['post_author']}',post_date=CURDATE(),post_image='{$post_image}',post_content='{$_POST['post_content']}'";
            $update_query .=  ",post_tags='{$_POST['post_tags']}',post_comment_count={$post_commentary_count},post_status='{$post_status}'";
            $update_query .=  "WHERE post_id= {$_GET['edit']}";


            $res = mysqli_query($connection, $update_query);
            if (!$res) {
                echo mysqli_error($connection);
            } else {
                $_SESSION['message']= "Post Updated Succesfuly";
                header("Location: posts.php?source=post_all");
            }
        }
    }
}
function print_all_cat_in_edit(){
    global $connection;
    $query = "SELECT * FROM categories";
    $select_all_cat = mysqli_query($connection,$query);
    while ($row_cat = mysqli_fetch_assoc($select_all_cat)){
        echo " <option value='{$row_cat['cat_id']}'>{$row_cat['cat_title']}</option>";
    }
}
function print_cat_title_in_all_posts($cat_id){
    global $connection;
    $query = "SELECT * FROM categories WHERE cat_id={$cat_id}";
    $select_all_cat = mysqli_query($connection,$query);
    $row_cat = mysqli_fetch_assoc($select_all_cat);
    echo "<td>{$row_cat['cat_title']}</td>";

}
function approve_post(){
    global $connection;
    if (isset($_GET['appr'])){
        $comment_status = 'published';
        $query = "UPDATE posts SET post_status='{$comment_status}' WHERE post_id={$_GET['appr']}";
        $res= mysqli_query($connection,$query);
        if (!$res){
            die(mysqli_error($connection));
        }
        else{
            $_SESSION['message']= "Status Updated Succesfuly";
            header("Location: posts.php?source=post_all");
        }
    }

}
function unapprove_post(){
    global $connection;
    if (isset($_GET['unappr'])){
        $comment_status = 'draft';
        $query = "UPDATE posts SET post_status='{$comment_status}' WHERE post_id={$_GET['unappr']}";
        $res= mysqli_query($connection,$query);
        if (!$res){
            die(mysqli_error($connection));
        }
        else{
            $_SESSION['message']= "Status Updated Succesfuly";
            header("Location: posts.php?source=post_all");
        }
    }

}



?>