<?php if(isset($_GET['del'])){ del_comment();}
      if(isset($_GET['message']) AND $_GET['message'] =="del" ){
          echo "<h4 style='color: #4cae4c'> Comment Deleted Succesfuly</h4>";
      }
?>
<div class="col-xs-12">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>post_id</th>
            <th>author</th>
            <th>email</th>
            <th>status</th>
            <th>content</th>
            <th>date</th>
            <th>Delete</th>
            <th>edit</th>
        </tr>
        </thead>
        <tbody>
        <?php print_all_comments(); ?>
        </tbody>
    </table>
</div>