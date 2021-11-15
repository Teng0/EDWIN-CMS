<?php if(isset($_GET['del'])){ del_post();}
      if(isset($_GET['message']) AND $_GET['message'] =="del" ){
          echo "<h4 style='color: #4cae4c'> Post Deleted Succesfuly</h4>";
      }
      if (isset($_GET['appr'])){approve_post();}
      if (isset($_GET['unappr'])){unapprove_post();}
?>
<div class="col-xs-12">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>username</th>
            <th>firstName</th>
            <th>lastName</th>
            <th>email</th>
            <th>userImage</th>
            <th>role</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php print_all_users(); ?>
        </tbody>
    </table>
</div>