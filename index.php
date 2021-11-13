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

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php
                $query = "SELECT * FROM posts";
                $res = mysqli_query($connection,$query);
                while ($row = mysqli_fetch_assoc($res)){ ?>

                <h2>
                    <a href="post.php?p_id=<?php echo $row['post_id']?>"><?php echo $row['post_title']?></a>
                </h2>
                <p class="lead">
                    by <a href="post.php?p_id=<?php echo $row['post_id']?>"><?php echo $row['post_author']?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $row['post_date']?></p>
                <hr>
                    <a href="post.php?p_id=<?php echo $row['post_id']?>"><img class="img-responsive" src="images/<?php echo $row['post_image']?>" alt=""></a>
                <hr>
                <p> <?php echo substr($row['post_content'],0,120)?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $row['post_id']?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php    } ?>
                <!-- Second Blog Post -->



                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include "includes/footer.php"; ?>