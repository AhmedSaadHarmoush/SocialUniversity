<div class="container" >

<?php if (!empty($data['success'])) : ?>
    <div class="post-container">
<?= heading( 'Your Passed Subjects',1,"class='side-title'") ?><br>
<table class="table" >
    <tr>
        <th>
            Subject Name
        </th>
        <th>
            Subject Code
        </th>
        <th>
            Gpa
        </th>
        <th>
            Term
        </th>
        <th>
            Total
        </th>
        
    </tr>
    <?php foreach ($data['success'] as $subject) : ?>
    <tr>
        <td>
            <?= $subject['name']?>
        </td>
        <td>
            <?= $subject['code'] ?>
        </td>
        <td>
            <?= $subject['gpa']?>
        </td>
        <td>
            <?= $subject['tearm']?>
        </td>
        <td>
            <?= $subject['total']?>
        </td>
    </tr>
    <?php endforeach;?>
</table>
</div>
<?php endif ?>

<?php if(empty($subjects)) :?>
<center><?= $error ?></center>
<?php else :  ?>
    <?php if (!empty($subjects['registered'])) : ?>
        <div class="post-container">
<?= heading( 'Registered Subjects',1,"class='side-title'") ?><br>
        <table class="table">
            <th>
                Name
            </th>
            <th>
                Code
            </th>
            <th>
                Code Old
            </th>
            <th>
                Actions
            </th>
        <?php foreach ($subjects['registered'] as $subject) :?>
            
            <tr>
                <td>
                    <?= $subject['name'] ?>
                </td>
                <td>
                    <?= $subject['code'] ?>
                </td>
                <td>
                    <?= $subject['code_old'] ?>
                </td>
                <td>
                    <a id="register" code='<?= $subject['code'] ?>' group='<?= base_url().'index.php/groups/get/'.$subject['groupid']?>' name='<?= $subject['name']?>' to="<?= base_url().'index.php/subjects/register/'.$subject['id'].'/'.$subject['groupid']?>"  href="<?= base_url().'index.php/subjects/unregister/'.$subject['id'].'/'.$subject['groupid']?>" class="btn error" >UnRegister</a>
                </td>
            </tr>
        <?php endforeach?>
        </table>
        </div>
    <?php endif;?>
        
    <?php if (!empty($subjects['free'])) : ?>
        <div class="post-container">
<?= heading( 'Free Subjects',1,"class='side-title'") ?><br>
        <table class="table">
            <th>
                Name
            </th>
            <th>
                Code
            </th>
            <th>
                Code Old
            </th>
            <th>
                Actions
            </th>
        <?php foreach ($subjects['free'] as $subject) :?>
            <tr>
                <td>
                    <?= $subject['name'] ?>
                </td>
                <td>
                    <?= $subject['code'] ?>
                </td>
                <td>
                    <?= $subject['code_old'] ?>
                </td>
                <td>
                    <a id="register" code='<?= $subject['code'] ?>' group='<?= base_url().'index.php/groups/get/'.$subject['groupid']?>' name='<?= $subject['name']?>' to="<?= base_url().'index.php/subjects/unregister/'.$subject['id'].'/'.$subject['groupid']?>" href="<?= base_url().'index.php/subjects/register/'.$subject['id'].'/'.$subject['groupid']?>" class="btn" >Register</a>
                </td>
            </tr>
        <?php endforeach?>
        </table>
        </div>
    <?php endif;?>
    <?php if (!empty($subjects['departement'])) : ?>
         <div class="post-container">
<?= heading( 'Departement Subjects',1,"class='side-title'") ?><br>
        <table class="table">
            <th>
                Name
            </th>
            <th>
                Code
            </th>
            <th>
                Code Old
            </th>
            <th>
                Actions
            </th>
        <?php foreach ($subjects['departement'] as $subject) :?>
            
            <tr>
                <td>
                    <?= $subject['name'] ?>
                </td>
                <td>
                    <?= $subject['code'] ?>
                </td>
                <td>
                    <?= $subject['code_old'] ?>
                </td>
                <td>
                    <a id="register" group='<?= base_url().'index.php/groups/get/'.$subject['groupid']?>' name='<?= $subject['name']?>' code='<?= $subject['code'] ?>' to="<?= base_url().'index.php/subjects/unregister/'.$subject['id'].'/'.$subject['groupid']?>" href="<?= base_url().'index.php/subjects/register/'.$subject['id'].'/'.$subject['groupid']?>" class="btn" >Register</a>
                </td>
            </tr>
        <?php endforeach?>
        </table>
         </div>
    <?php endif;?>
<?php  endif;  ?>
</div>

