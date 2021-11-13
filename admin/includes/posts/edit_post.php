<?php // edit_query()
if (isset($_GET['edit'])) {

    $select_query = "SELECT * FROM posts WHERE post_id={$_GET['edit']}";
    $res =  mysqli_query($connection,$select_query);
    if($res){
        $row = mysqli_fetch_assoc($res);
       // var_dump($row);
    }else{
        echo mysqli_error($connection);
    }

    edit_query();

}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_category_id">Category ID</label>
        <input type="text" class="form-control" id="post_category_id"
               aria-describedby="post_category_id" placeholder="Enter Post Category"
               name="post_category_id" value="<?php echo $row['post_category_id']  ?>">
        <!--        <small id="post_category_id" class="form-text text-muted">Category ID</small>-->
    </div>
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" id="post_title"
               aria-describedby="post_category_id" placeholder="Enter Post Title"
               name="post_title" value="<?php echo $row['post_title']  ?>">
        <!--        <small id="post_title" class="form-text text-muted">Post Title</small>-->
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" id="post_author"
               aria-describedby="post_author" placeholder="Enter Post Author"
               name="post_author" value="<?php echo $row['post_author']  ?>">
        <!--        <small id="post_title" class="form-text text-muted">Post Title</small>-->
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <input type="text" class="form-control" id="post_content"
               aria-describedby="post_author" placeholder="Enter Post Content"
               name="post_content" value="<?php echo $row['post_content']?>">
        <!--        <small id="post_title" class="form-text text-muted">Post Title</small>-->
    </div>
    <div class="form-group">
        <label for="post_content">Post Tags</label>
        <input type="text" class="form-control" id="post_tags"
               aria-describedby="post_tags" placeholder="Enter Post Tags"
               name="post_tags" value="<?php echo $row['post_tags'] ?>">
        <!--        <small id="post_title" class="form-text text-muted">Post Title</small>-->
    </div>



    <!--    <div class="form-group form-check">-->
    <!--        <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
    <!--        <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
    <!--    </div>-->

    <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="post_image">
    </div>

    <button type="submit" class="btn btn-primary" name="edit">Submit</button>
</form>