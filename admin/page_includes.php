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
    default:'post_all';
}
?>