
<table class="table">
    <tr>
        <th>
            Name
        </th>
        <th>
            Code
        </th>
        <th>
            Code old
        </th>
        <th>
            Actions
        </th>
    </tr>
    <?php if (!empty($subjects)) : ?>
        <?php foreach ($subjects as $subject) : ?>
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
                    <?php if (empty($subject['reg'])) : ?>
                    <a id="register"  code='<?= $subject['code'] ?>' group='<?= base_url().'index.php/groups/get/'.$subject['groupid']?>' name='<?= $subject['name']?>' to="<?= base_url().'index.php/subjects/dunregister'.'/'.$subject['groupid']?>" href="<?= base_url().'index.php/subjects/dregister/'.$subject['groupid']?>" class="btn" >Register</a>
                    <?php else : ?>
                    <a id="register"  code='<?= $subject['code'] ?>' group='<?= base_url().'index.php/groups/get/'.$subject['groupid']?>' name='<?= $subject['name']?>' to="<?= base_url().'index.php/subjects/dregister'.'/'.$subject['groupid']?>" href="<?= base_url().'index.php/subjects/dunregister/'.$subject['groupid']?>" class="btn error" >Un Register</a>
                    <?php endif;?>
                </td>
            </tr>
        <?php endforeach;?>
    <?php endif;?>
</table>