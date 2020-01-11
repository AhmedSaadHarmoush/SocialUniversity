
<div class="post-container dit floatRight">
    <h3 class="post-title">
        Subject  information :
    </h3>

    <li class="post-title">
        subject : <span style="color : #002166;"> <?= select_gitem("groups", "name", $gro_id) ?>  </span>
    </li>
    <li class="post-title">
        code :<span style="color : #002166;"> <?= select_item("subjects", "code", select_gitem("groups", "subject_id", $gro_id)) ?>  </span>
    </li>
    <?php $admins = $this->mange->query("SELECT fname_en,lname_en FROM users JOIN group_members ON users.id = group_members.user_id WHERE group_members.group_id=$gro_id && users.type = '2' ", TRUE); ?>
    <?php if (!empty($admins)) { ?>
        <li class="post-title">
            Admins :<span style="color : #002166;"> <?php
                foreach ($admins as $admin) {
                    echo $admin['fname_en'] . " " . $admin['lname_en'] . "<br>";
                }
            }
            ?>  </span>
    </li>
    <li class="post-title">
        lecture time  :<span style="color : #002166;"> mon 9-11 modarag 2 shatpy </span>
    </li>

</div>
<div style="clear:both"></div>
<br>
<div role="tabpanel" class="tab-pane active" style="max-width: 63%;" >
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"> 
            <a href="#post" aria-controls='post' data-toggle ='tab'>Post</a>
        </li>
        <li role="presentation"> 
            <a href="#photo" aria-controls='photo' data-toggle ='tab'>Photo</a>
        </li>
        <li role="presentation" > 
            <a href="#fiile" aria-controls='file' data-toggle ='tab'>File</a>
        </li>
        <?php if ($_SESSION['usci']['user_data']['type']==2) : ?>
            <li role="presentation" > 
                <a href="<?= base_url ('index.php/groups/results/'.$gro_id)?>">Results</a>
            </li>
        <?php endif; ?>
    </ul>
</div>
<div class="tab-content" >
    <div class="tab-pane active" id="post">
        <div class=" post post-container ">
            <h3 class="post-title">Add post :</h3>
            <form action="<?= base_url('index.php/groups/add') ?>" method="POST">
                <input name='id' type="hidden" value="<?= $_SESSION['usci']['user_data']['id']; ?>">
                <input name='goid' type="hidden" value="<?= $gro_id; ?>">
                <textarea class="post-txt input" name="post" style="width: 100%"></textarea>
                <input type="submit" class="btn floatRight" value="post">
                <div style="clear:both"></div>
            </form>
        </div>
    </div>
    <div class="tab-pane" id="photo" >
        <div class=" post post-container ">
            <h3 class="post-title">Add photo :</h3>
            <?php
            $this->load->helper('form');
            echo form_open_multipart(base_url("index.php/groups/addphoto"));
            ?>
            <input name='id' type="hidden" value="<?= $_SESSION['usci']['user_data']['id']; ?>"> 
            <input type="file" name="userfile" size="20" class=" input" style="width: 100%" /><br>
            <input name='goid' type="hidden" value="<?= $gro_id; ?>">
            <textarea class="post-txt input" name="post" style="width: 100%"></textarea>
            <input type="submit" class="btn floatRight" value="post">
            <div style="clear:both"></div>
            <?php if (isset($error)) echo $error ?>
            </form>
        </div>
    </div>
    <div class="tab-pane" id="fiile">
        <div class=" post post-container ">
            <h3 class="post-title">Add file :</h3>
            <?php
            $this->load->helper('form');
            echo form_open_multipart(base_url("index.php/groups/addfile"));
            ?>
            <input name='id' type="hidden" value="<?= $_SESSION['usci']['user_data']['id']; ?>"> 
            <input type="file" name="userfile" size="20" class=" input" style="width: 100%" /><br>
            <input name='goid' type="hidden" value="<?= $gro_id; ?>">
            <textarea class="post-txt input" name="post" style="width: 100%"></textarea>
            <input type="submit" class="btn floatRight" value="post">
            <div style="clear:both"></div>
            <?php if (isset($error)) echo $error ?>
            </form>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="all-posts">
    <?php
    if (isset($posts) && !empty($posts)):
        $uid = $_SESSION['usci']['user_data']['id'];
        foreach ($posts as $post) : $p = $post['id'];
            ?>

            <div class="post-container post" id="<?= $post['id'] ?>">
                <div class="user-img floatLeft" style="width: 57.5px; height: 57.5px;">
                    <img src="<?= base_url() . select_item('users', 'profile_url', $post['user_id']); ?>" style="width: 50px; height: 50px;"><!-- user img-->
                </div>
                <div class="user_info floatLeft">
                    <p class="user-name block"><?php echo "<a href='" . base_url("index.php/msg/get/$uid/" . $post['user_id']) . "' >" . select_item('users', 'username', $post['user_id']) . "</a>";
            ?></p><!--user name-->
                    <p class="post-date"><?= $post['created']; ?><?php
                        if ($_SESSION['usci']['user_data']['id'] == $post['user_id']) {
                            echo " <a href='" . base_url() . "index.php/groups/delete/$gro_id/$p" . "' class = 'post-date error '> Delete </a>" . "<br>";
                        }
                        ?></p> <!--date--> 
                </div>
                <div style="clear:both"></div>
                <div class=" input">
                    <p> <?= $post['post']; ?> </p>
                    <?php
                    if (!empty($post['img_url']) && $post['type'] == 1) {
                        echo "<center><img src='" . base_url($post['img_url'] . "' style='max-width:100%;'></center>");
                    } else if (!empty($post['img_url']) && $post['type'] == 2) {
                        echo "<center><a href='" . base_url($post['img_url'] . "' style='max-width:100%;' class='input'> Dowenload file</a></center>");
                    }
                    ?>
                    <div style="clear:both"></div>
                </div><!--text-->
                <div class="add-comment">

                    <span class="like" p="<?= $p ?>" to="<?= base_url("index.php/posts/like/" . $post['id']) ?>"><?php
                        if ($this->mange->query("SELECT id FROM likes WHERE (user_id = $uid && post_id = $p)") == 1) {
                            echo'Unlike';
                        } else {
                            echo 'Like';
                        }
                        ?>
                    </span>
                    (<span id="likes<?= $p ?>"><?php
                        $s = $this->mange->query("SELECT id FROM likes WHERE post_id= $p");
                        if ($s > 0) {
                            echo $s;
                        } else {
                            echo '0';
                        }
                        ?></span>)
                    . 
                    <span class="comment" p="<?= $p ?>"  to="<?= base_url("index.php/posts/comment/$p") ?>">Comment</span <br>
                    <div>
                        <div class="comments<?= $p ?>">    
                        </div>
                    </div>
                </div>
                <div style="clear:both"></div>
            </div>
            <?php
        endforeach;
    else :
        echo heading("Sorry no posts to show :\ ", 1, "class='post-title'");
    endif;
    ?>
</div>


