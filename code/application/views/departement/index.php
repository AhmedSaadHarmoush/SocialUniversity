<div class="post-container">
    <?= anchor(base_url().'index.php/departements/add', 'Add Departement', 'class =" btn" ');?>
    <table   class="table"  >
        <th style="text-align: center;">
            Name
        </th>
        <th style="text-align: center;">
            Manger
        </th>
        <th style="text-align: center;">
          Actions
        </th>
        <?php if(!empty($data['deps'])) :?>
<?php foreach ($data['deps'] as $dep) :?>
        <tr style='text-align: center;'><td colspan="1">
                <?php echo $dep['name'] ?>
                </td>
                <td colspan="1">
                    <?= $dep['manager']?>
                </td>
                <td colspan="1">
                    <center style='margin:  0 auto ;' >
                    <?= anchor(base_url().'index.php/departements/edit/'.$dep['id'], 'Edit', 'class= "btn"')?>

                    <?= anchor(base_url().'index.php/departements/delete/'.$dep['id'], 'delete', 'class="btn error"')?>
                        <div class="clearfix"></div>
                    </center>
        <div class="clearfix"></div>
                </td>
    </tr>
    
<?php endforeach; ?>
    <?php else : ?>
    <tr>
        <td class="side-title" style="text-align: center; font-size:4em;  " colspan="4">
            No departement to show
        </td>
    </tr>
    <?php endif;?>
</table>
</div>
