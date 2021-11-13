<?php include "includes/db.php"; ?>
    <!-- Header -->
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>


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
            if (!isset($_GET['c_id'])){

                header("location:javascript://history.go(-1)");

            }else{
            $query = "SELECT * FROM posts WHERE post_category_id={$_GET['c_id']}";
            $res = mysqli_query($connection,$query);
            if (mysqli_num_rows($res) == 0){
                echo "<h3>Sorry No Post in this category</h3>";
            }


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
                <p> <?php echo $row['post_content']?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $row['post_id']?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php   } } ?>
            <!-- Second Blog Post -->



            <!-- Pager -->

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
<?php include "includes/footer.php"; ?>