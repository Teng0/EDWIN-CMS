<?php add_user_query() ?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="username">UserName</label>
        <input type="text" class="form-control" id="username"
               aria-describedby="post_category_id" placeholder="Enter Post Title"
               name="username">
<!--        <small id="post_title" class="form-text text-muted">Post Title</small>-->
    </div>
    <div class="form-group">
        <select class="form-select" aria-label="Select Category" name="role">
            <option selected>Select Category</option>
            <option value='admin'>admin</option>
            <option value='admin'>user</option>
            <option value='admin'>moderator</option>
        </select>

        <!--        <small id="post_category_id" class="form-text text-muted">Category ID</small>-->
    </div>
    <div class="form-group">
        <label for="firstName">FirstName</label>
        <input type="text" class="form-control" id="firstName"
               aria-describedby="post_author" placeholder="Enter firstName"
               name="firstName">
        <!--        <small id="post_title" class="form-text text-muted">Post Title</small>-->
    </div>
    <div class="form-group">
        <label for="lastName">LastName</label>
        <input type="text" class="form-control" id="lastName"
               aria-describedby="post_author" placeholder="Enter LastName"
               name="lastName">
        <!--        <small id="post_title" class="form-text text-muted">Post Title</small>-->
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email"
               aria-describedby="post_tags" placeholder="Enter email"
               name="email">
        <!--        <small id="post_title" class="form-text text-muted">Post Title</small>-->
    </div>
    <!--    <div class="form-group form-check">-->
<!--        <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
<!--        <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
<!--    </div>-->

    <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="user_image">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>