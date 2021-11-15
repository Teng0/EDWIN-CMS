<?php include "includes/db.php"; ?>
    <!-- Header -->
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<?php include "functions.php"; ?>


    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php if (isset($_SESSION['message'])){
                echo "<h3 style='color: #4cae4c'>{$_SESSION['message']}</h3>";
            }
            ?>
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <?php

                if (isset($_GET['p_id'])) {
                     $query = "SELECT * FROM posts WHERE post_id={$_GET['p_id']}";
                    $res = mysqli_query($connection,$query);
                    $row = mysqli_fetch_assoc($res);
                }else{
                    header("location:javascript://history.go(-1)");
                }
            ?>

                <h2>
                    <?php echo $row['post_title']?>
                </h2>
                <p class="lead">
                    by <?php echo $row['post_author']?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $row['post_date']?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $row['post_image']?>" alt="">
                <hr>
                <p> <?php echo $row['post_content']?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" method="post" action="">
                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input class="form-control" type="text" id="author" name="comment_author">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" id="email" name="comment_email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="comment_content" rows="3"></textarea>
                    </div>
                    <button type="submit" name="comment" class="btn btn-primary">Submit</button>
                </form>
            </div>
<!--            <div class="media">-->
<!--                <a class="pull-left" href="#">-->
<!--                    <img class="media-object" src="http://placehold.it/64x64" alt="">-->
<!--                </a>-->
<!--                <div class="media-body">-->
<!--                    <h4 class="media-heading">Start Bootstrap-->
<!--                        <small>August 25, 2014 at 9:30 PM</small>-->
<!--                    </h4>-->
<!--                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--                </div>-->
<!--            </div>-->

            <!-- Comment -->
            <div class="media">
                <?php print_all_comments($_GET['p_id']); ?>
            </div>
                <!-- /.input-group -->
            </div>
            <!-- Second Blog Post -->



            <!-- Pager -->

        <?php include "includes/sidebar.php"; ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->

        <?php include "includes/footer.php"; ?>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
