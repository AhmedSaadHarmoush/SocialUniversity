
    <div class="post-container">
                <?php echo anchor("/posts/add", "add post" , "class='btn'");?>
        <table  class="table">
                    <th>ID</th><th>title</th><th>type</th><th>post</th><th>user_id</th><th>group_id</th><th>quiz</th><th>Actions</th>
                    <?php
                    if(isset($po)) :
                    foreach ($po as  $v) {
                        echo '<tr>';
                        echo cell($v['id']);
                        echo cell($v['title']);
                        echo cell($v['type']);
                        echo cell($v['post']);
                        echo cell($v['user_id']);
                        echo cell($v['groupe_id']);
                        echo cell($v['quiz']);
                        echo cell( anchor("/posts/update/".$v["id"], "update" , "class = 'btn'") . " " . anchor("/posts/delete/".$v['id'], "delete", "class = 'btn error'") );
                        echo '<tr>';
                    }
                endif;
                    ?>
                </table>
    </div>
