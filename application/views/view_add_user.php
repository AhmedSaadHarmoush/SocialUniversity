
<div class="post-container">
    <?php echo heading("ADD User :", 3,'class="side-title"') ?> <br>
    <?php echo form_open('/users/add'); ?>
    <?php echo heading("Username :",3, 'class="side-title"');?>
    <input name='username' type="text" placeholder="username" value="" class="input"><br>
    <br>
    <?php echo heading("Password :",3, 'class="side-title"');?>
    <input name='password' type="password" placeholder="password" value="" class="input"><br>
    <?php echo heading("Departement :",3, 'class="side-title"');?>
    <select class="input block" name="department_id">
        <option value="0" disabled="true" selected="on">
            Choose Departement
        </option>
        <?php if (!empty($deps)) {
        foreach ($deps as $dep) :?>
        <option value="<?php echo $dep['id']?>" >
            <?php echo $dep['name']?>
        </option>
        <?php endforeach;
        }?>
    </select><br>
    <?php echo heading("Type :",3, 'class="side-title"');?>
    <select name='type' class="input">
        <option value="1">Student</option>
        <option value="2">Doctor</option>
        <option value="3">Admin</option>
    </select><br>
    <input name='go' type="submit" value="add" class="btn">
    <?php echo  anchor("/users", "Back", "class='btn'") ?>
    <div style="clear: both;"></div>
    <?php echo validation_errors(); ?>
    </form>
</div>

