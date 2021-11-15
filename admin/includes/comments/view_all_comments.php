<?php if(isset($_GET['del'])){ del_comment();}
      if(isset($_GET['message']) AND $_GET['message'] =="del" ){
          echo "<h4 style='color: #4cae4c'> Comment Deleted Succesfuly</h4>";
      }
      if (isset($_SESSION['message'])){
          echo "<h4 style='color: #4cae4c'> {$_SESSION['message']}</h4>";
          $_SESSION['message']="";
      }
    if(isset($_GET['appr'])){ approve_comment($_GET['appr']);}
    if(isset($_GET['unappr'])){ unapprove_comment($_GET['unappr']);}
?>
<div class="col-xs-12">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Post ID</th>
            <th>IS response to</th>
            <th>Author</th>
            <th>Email</th>
            <th>Status</th>
            <th>content</th>
            <th>Date</th>
            <th>Delete</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php print_all_comments(); ?>
        </tbody>
    </table>
</div>