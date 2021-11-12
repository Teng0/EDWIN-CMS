<?php
include "includes/header.php";
include_once "../includes/db.php";
include "funcitons.php";
?>

    <div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/navigation.php";?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Create Category
                        <small></small>
                    </h1>
                    <div class="col-xs-6">

                        <?php add_category(); ?>
                        <form action="#" method="post">

                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title" id="">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                            </div>

                        </form>

                        <?php if(isset($_GET['edit'])){ ?>
                        <?php edit_category(); ?>
                                    <form action="#" method="post">
                                        <?php get_all_cat();?>
                                        <div class="form-group">
                                            <label for="cat_title">Edit Category</label>
                                            <input class="form-control" type="text" name="cat_title" id="" value="<?php echo $cat_value?>">
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-primary" type="submit" name="edit" value="edit">
                                        </div>

                                    </form>
                        <?php } ?>


                    </div>
                    <div class="col-xs-6">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Delete</th>
                                <th>edit</th>
                            </tr>
                            </thead>
                            <tbody>
                                   <?php print_all_cat(); ?>
                                   <?php del_cat(); ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/footer.php";?>