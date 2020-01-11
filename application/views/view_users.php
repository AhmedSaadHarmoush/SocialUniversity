
    <div class="post-container">
                <?php echo anchor("/users/add", "add user" , "class='btn'");?>
        <table  class="table">
                    <th>ID</th><th>username</th><th>type</th><th>Actions</th>
                    <?php
                    foreach ($po as  $v) {
                        echo '<tr>';
                        echo cell($v['id']);
                        echo cell($v['username']);
                        echo cell($v['type']);
                        echo cell( anchor("/users/update/".$v["id"], "update" , "class = 'btn'") . " " . anchor("/users/delete/".$v['id'], "delete", "class = 'btn error'") );
                        echo '<tr>';
                    }
                    ?>
                </table>
    </div>  

