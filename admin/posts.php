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
                       All Posts
                        <small></small>
                    </h1>
                    <div class="col-xs-12">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>TiTle</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Images</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                        <td>6</td>
                                        <td>7</td>
                                        <td>8</td>
                                        <td>9</td>
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