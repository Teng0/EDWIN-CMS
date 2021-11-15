<?php
function confirm_users_query()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $post_image = $_FILES['post_image']['name'];
        $post_temp_image = $_FILES['post_image']['tmp_name'];
        //$post_date = date('d-m-Y');
        $post_commentary_count = 5;
        $post_status = 'draft';
        move_uploaded_file($post_temp_image, "../images/$post_image");


        $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status) ";
        $query .= "VALUES({$_POST['post_category_id']},'{$_POST['post_title']}','{$_POST['post_author']}',CURDATE(), ";
        $query .= "'{$post_image}','{$_POST['post_content']}', '{$_POST['post_tags']}' ,{$post_commentary_count},'{$post_status}' )";

        $res = mysqli_query($connection, $query);
        if (!$res) {
            echo mysqli_error($connection);
        } else {
            $_SESSION['message'] = "Post Added Succesfuly";
            header("Location: posts.php?source=post_all");
        }

    }
}

function print_all_users(){

    global $connection;

    if (isset($_SESSION['message'])){
        echo "<h4 style='color: #4cae4c'> {$_SESSION['message']}</h4>";
        $_SESSION['message']="";
    }
    $query = "SELECT * FROM users";
    $res = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($res)){
        echo "<tr>";
        echo "<td>{$row['user_id']}</td>";
        echo "<td>{$row['username']}</td>";
        echo "<td>{$row['firstName']}</td>";
        echo "<td>{$row['lastName']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['userImage']}</td>";
        echo "<td>{$row['role']}</td>";
        echo "<td><a href='posts.php?source=post_all&userDel={$row['user_id']}'>Delete</a></td>";
        echo "<td><a href='posts.php?source=post_edit&edit={$row['user_id']}'>Edit</a></td>";
        echo "<tr>";
    }


}

function del_user(){
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
function edit_user_query()
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
function print_all_user_cat_in_edit(){
    global $connection;
    $query = "SELECT * FROM categories";
    $select_all_cat = mysqli_query($connection,$query);
    while ($row_cat = mysqli_fetch_assoc($select_all_cat)){
        echo " <option value='{$row_cat['cat_id']}'>{$row_cat['cat_title']}</option>";
    }
}
function print_cat_title_in_all_users($cat_id){
    global $connection;
    $query = "SELECT * FROM categories WHERE cat_id={$cat_id}";
    $select_all_cat = mysqli_query($connection,$query);
    $row_cat = mysqli_fetch_assoc($select_all_cat);
    echo "<td>{$row_cat['cat_title']}</td>";

}
function approve_user(){
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
function unapprove_user(){
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