<?php
        if ( isset($_POST['submit'])){
           $post_image = $_FILES['post_image']['name'];
           $post_temp_image = $_FILES['post_image']['tmp_name'];
           $post_date = date('y-m-d');
           $post_commentary_count = 5;
           move_uploaded_file($post_temp_image,"../images/$post_image");
        }

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_category_id">Category ID</label>
        <input type="text" class="form-control" id="post_category_id"
               aria-describedby="post_category_id" placeholder="Enter Post Category"
               name="post_category_id">
<!--        <small id="post_category_id" class="form-text text-muted">Category ID</small>-->
    </div>
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" id="post_title"
               aria-describedby="post_category_id" placeholder="Enter Post Title"
               name="post_title">
<!--        <small id="post_title" class="form-text text-muted">Post Title</small>-->
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" id="post_author"
               aria-describedby="post_author" placeholder="Enter Post Author"
               name="post_title">
        <!--        <small id="post_title" class="form-text text-muted">Post Title</small>-->
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <input type="text" class="form-control" id="post_content"
               aria-describedby="post_author" placeholder="Enter Post Content"
               name="post_content">
        <!--        <small id="post_title" class="form-text text-muted">Post Title</small>-->
    </div>
    <div class="form-group">
        <label for="post_content">Post Tags</label>
        <input type="text" class="form-control" id="post_tags"
               aria-describedby="post_tags" placeholder="Enter Post Tags"
               name="post_tags">
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

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>