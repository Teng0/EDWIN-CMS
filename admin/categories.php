<?php

include "includes/header.php";
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

                        <?php
                        if(isset($_POST['submit'])){
                            if ($_POST['cat_title'] == "" || empty($_POST['cat_title'])){
                                echo "<h3 style='color: red'>Form Must Be filled</h3>";
                            }else{

                                $query = "INSERT INTO categories( cat_title) VALUE('{$_POST['cat_title']}')";
                                $res = mysqli_query($connection,$query);
                                if ($res){
                                    echo "Category Succesfuly Added";
                                }else{
                                    echo "Cannot Add category".mysqli_error($connection);
                                }
                             }
                        }




                        ?>
                        <form action="#" method="post">

                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title" id="">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                            </div>

                        </form>
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                            </tr>
                            <?php
                            $query = "SELECT * FROM categories";
                            $select_all_cat = mysqli_query($connection,$query);
                            ?>
                            </thead>
                            <tbody>

                                   <?php
                                   while ($row = mysqli_fetch_assoc($select_all_cat)){
                                       echo " <tr>";
                                       echo "<td> ".$row['cat_id']. "</td><td> ".$row['cat_title']. "</td>";
                                       echo " </tr>";
                                   }
                                   ?>

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