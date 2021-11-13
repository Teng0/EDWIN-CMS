<?php if(isset($_GET['del'])){ del_post();}
      if(isset($_GET['message']) AND $_GET['message'] =="del" ){
          echo "<h4 style='color: #4cae4c'> Post Deleted Succesfuly</h4>";
      }
?>
<div class="col-xs-12">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>TiTle</th>
            <th>Author</th>
            <th>Category</th>
            <th>Date</th>
            <th>Images</th>
            <th>Tags</th>
            <th>Comment_count</th>
            <th>Status</th>
            <th>DELETE</th>
            <th>EDIT</th>
        </tr>
        </thead>
        <tbody>
        <?php print_all_posts(); ?>
        </tbody>
    </table>
</div>