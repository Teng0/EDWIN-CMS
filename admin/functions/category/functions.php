<?php

function add_category(){

    if(isset($_POST['submit'])){
        global $connection;
        if ($_POST['cat_title'] == "" || empty($_POST['cat_title'])){
            echo "<h3 style='color: red'>Form Must Be filled</h3>";
        }else{

            $query = "INSERT INTO categories( cat_title) VALUE('{$_POST['cat_title']}')";
            $res = mysqli_query($connection,$query);
            if ($res){
                echo "<h3 style='color:greenyellow;'>Category Succesfuly Added</h3>";
            }else{
                echo "Cannot Add category".mysqli_error($connection);
            }
        }
    }
}


function edit_category(){
    if(isset($_POST['edit'])){
        global $connection;
        $edit_query="UPDATE categories SET cat_title = '{$_POST['cat_title']}' WHERE cat_id={$_GET['edit']}";
        $res=mysqli_query($connection,$edit_query);
        if ($res){
            header('location:categories.php?message=edit');
        }else{
            echo "Eroor".mysqli_error($connection);
        }
    }

}

function get_all_cat(){
    global $connection;
    $cat_value='';
    if(isset($_GET['edit'])){

        $get_query = "SELECT cat_title FROM categories WHERE cat_id = {$_GET['edit']}";
        $res = mysqli_query($connection,$get_query);
        if($res){
            $row = mysqli_fetch_assoc($res);
            global $cat_value;
            $cat_value =$row['cat_title'];
        }
    }

}


function print_all_cat(){
    global $connection;
    $query = "SELECT * FROM categories";
    $select_all_cat = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($select_all_cat)){
        echo " <tr>";
        echo "<td> ".$row['cat_id']. "</td>";
        echo "<td> ".$row['cat_title']. "</td>";
        echo "<td><a href='categories.php?delete={$row['cat_id']}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$row['cat_id']}'>Edit</a></td>";
        echo " </tr>";
    }
}

function del_cat(){
    global $connection;
    if (isset($_GET['delete'])){
        $del_query = "DELETE FROM categories WHERE cat_id={$_GET['delete']}";
        $res = mysqli_query($connection,$del_query);
        if ($res){
            header('location:categories.php?message=del');
        }else{
            echo "Eroor".mysqli_error($connection);
        }
    }elseif(isset($_GET['message'])){
        if($_GET['message']=='del'){
            echo "<h3 style='color: #4cae4c'>Category Deleted Successfuly</h3>";
        }
        elseif ($_GET['message']=='edit'){
            echo "<h3 style='color: #4cae4c'>Category Edited Successfuly</h3>";
        }
    }

}

?>