<?php
$source = '';
if (isset($_GET['source'])) {
    $source = $_GET['source'];
}
switch ($source) {
    case 'post_all';
        include "includes/posts/view_all_posts.php";
        break;
    case 'post_add';
        include "includes/posts/add_post.php";
        break;
    case 'post_edit';
        include "includes/posts/edit_post.php";
        break;
    case 'comments_all';
        include "includes/comments/view_all_comments.php";
        break;
    case 'users_all';
        include "includes/users/view_all_users.php";
        break;
    case 'add_user';
        include "includes/users/add_user.php";
        break;
    case 'dit_edit';
        include "includes/users/edit_user.php";
        break;
    default:'post_all';
}
?>