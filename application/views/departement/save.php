
<div class="post-container">
<form method="post" action="<?php echo base_url().'index.php/departements/'.$func ?>">
<?php echo validation_errors();?>
    
    <label class="side-title" for="name" >Name :</label><br>
    <?php if(empty($dep)) : ?>
    <input class="textbox" type="text" name="name" id="name" value="<?= set_value('name')?>"><br><br>
    <?php else : ?>
    <input class="textbox" type="text" name="name" id="name" value="<?= $dep[0]['name']?>"><br><br>
    <?php endif; ?>
    <label class="side-title" for="manager">Select Manager :</label><br>
    <select class="select textbox" name="manager">
        <?php foreach ($docs as $doc) : ?>
        <option value="<?= $doc['fname_en'].' '.$doc['lname_en']?>"><?php echo $doc['fname_en'].' '.$doc['lname_en']?></option>
        <?php endforeach;?>
    </select><br><br>
    <input class="btn" type="submit" name="submit" value="Save Departement"><div class="clearfix"></div>
</form>
</div>