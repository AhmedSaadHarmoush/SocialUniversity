<div class="post-container">
<?php foreach ($deps as $dep) :?>
<div class="post-container">
<?= heading($dep['name'],1,"class='side-title'") ?><br>
<?php echo anchor(base_url().'index.php/subjects/add/'.$dep['id'], 'Add Subject', 'class="btn"') ?>  
<table class="table">
    <th>Name</th> <th>Code</th><th>Old Code</th><th>Require</th><th>Active</th><th>Options</th>
    <?php if (isset($subjects[0]['name'])) { foreach ($subjects as $subject):?>
    <tr>
        <?php if($subject['departement']==$dep['id']):?>
        <td>
            <?php echo $subject['name']?>
        </td>
         <td>
            <?php echo $subject['code']?>
        </td>
        <td>
            <?php echo $subject['code_old']?>
        </td>
        <td>
            <?php echo $subject['require_id'];?>
        </td>
        <td>
            <?php if ($subject['active_set']==0):?>
            <?php echo anchor(base_url().'index.php/subjects/active/'.$subject['id'],
                    'Active', "to = '".base_url().'index.php/subjects/deactive/'.$subject['id'] 
                    . "' class='btn' id='activation'" ); ?>
            <?php else :?>
            <?php echo anchor(base_url().'index.php/subjects/deactive/'.$subject['id'] ,
                    'Deactive', "to = '".base_url().'index.php/subjects/active/'.$subject['id'] 
                    . "' class='btn error' id='activation'" ) ?>
            <?php endif;?>
        </td>
        <td>
            <?=anchor(base_url().'index.php/subjects/delete/'.$subject['id'], 'Delete',  "id='delete' class = 'btn error'")?>
            <?=anchor(base_url().'index.php/subjects/edit/'.$subject['id'].'/'.$dep['id'], 'Edit', "class = 'btn'")?>
        </td>
        <?php endif;?>
    </tr>
    <?php endforeach;
    } else {?>
        <tr><td colspan="6" class="side-title" style='text-align: center; font-size: 4em;'>No Subjects </td></tr>
    <?php }?>
    </table>
    </div>
<?php endforeach; ?>
</div>
