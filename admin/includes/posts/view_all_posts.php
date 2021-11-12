<div class="col-xs-12">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>ID</th>

            <th>TiTle</th>
            <th>Author</th>
            <th>Date</th>
            <th>Images</th>
            <th>Tags</th>
            <th>Comment_count</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query = "SELECT * FROM posts";
        $res = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>{$row['post_id']}</td>";

            echo "<td>{$row['post_title']}</td>";
            echo "<td>{$row['post_author']}</td>";
            echo "<td>{$row['post_date']}</td>";
            echo "<td><img class='img-responsive' src='../images/{$row['post_image']}'style='width: 60px; height: 60px' alt=''></td>";
            echo "<td>{$row['post_tags']}</td>";
            echo "<td>{$row['post_comment_count']}</td>";
            echo "<td>{$row['post_status']}</td>";
            echo "<tr>";
        }
        ?>

        </tbody>
    </table>
</div>