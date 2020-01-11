 <form method="post" action="<?php echo base_url().'index.php/subjects/'.$func ?>">
<?php echo validation_errors();?>
    <?= heading('Name :', 3,"class='side-title'")?>
    <?php if(empty($subject)) : ?>
     <input type="text" name="name" placeholder="Type here" id="name" value="<?= set_value('name')?>" class="textbox"><br><br>
    <?= heading('Code :', 3,"class='side-title'")?>
    <input placeholder="Type here" type="text" name="code" class="textbox" value="<?= set_value('code')?>"><br><br>
    <?= heading('Code old :', 3,"class='side-title'")?>
    <input type="text" placeholder="Type here" class="textbox" name="code_old" value="<?= set_value('code_old')?>"><br><br>
    <?php else : ?>
    <input type="text" placeholder="Type here" name="name" class="textbox" id="name" value="<?= $subject[0]['name']?>"><br><br>
    <?= heading('Code :', 3,"class='side-title'")?>
    <input type="text" placeholder="Type here" name="code" class="textbox" value="<?= $subject[0]['code']?>"><br><br>
    <?= heading('Code old :', 3,"class='side-title'")?>
    <input type="text" placeholder="Type here" class="textbox" name="code_old" value="<?= $subject[0]['code_old']?>"><br><br>
    <?php endif; ?>
    <?= heading('Require :', 3,"class='side-title'")?>
    <select class="input block" name="require_id">
        <option value="0" disabled="true" selected="on">
            Choose subject
        </option>
        <?php if (!empty($subjects)) {
        foreach ($subjects as $subject) :?>
        <?php if ($id!=$subject['id']): ?>
        <option value="<?php echo $subject['id']?>" >
            <?php echo $subject['code']?>
        </option>
        <?php endif;?>
        <?php endforeach;
        }?>
    </select>
    <br><input type="submit" name="submit" class="btn" value="Save subject">
</form>