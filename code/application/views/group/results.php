<?php if (!empty($students)) : ?>
<form  method="POST" action="<?= base_url().'index.php/groups/saveresults/'.$group_id?>">
<table class="table">
    
    <tr>
        <th>
            Name
        </th>
        <th>
            Quiz 1
        </th>
        <th>
            Mid Term
        </th>
        <th>
            Quiz 2
        </th>
        <th>
            Oral
        </th>
        <th>
            Practicle
        </th>
        <th>
            Theory
        </th>
        <th>
            Total
        </th>
        <th>
            Actions
        </th>
    </tr>
    <?php foreach($students as $student) : ?>
    <?php $total=(int) ($student['quiz1']+$student['med']+$student['quiz2']+$student['oural']+$student['pract']+$student['thery']);?>
    <tr>
        <td><?= $student['username']?></td>
        <td><input  id='number' val='<?= $student["quiz1"]?>' min="0" max="5" name="<?= $student['user_id'] .'quiz1'?>" value="<?= $student['quiz1']?>" type="number" class="form-control"></td>
        <td><input id='number' val='<?= $student["med"]?>' min="0" max="20" name="<?= $student['user_id'] .'med'?>" value="<?= $student['med']?>" type="number" class="form-control"></td>
        <td><input id='number' val='<?= $student["quiz2"]?>' min="0" max="5" name="<?= $student['user_id'] .'quiz2'?>" value="<?= $student['quiz2']?>" type="number" class="form-control"></td>
        <td><input id='number' val='<?= $student["oural"]?>' min="0" max="10" name="<?= $student['user_id'] .'oural'?>" value="<?= $student['oural']?>" type="number" class="form-control"></td>
        <td><input id='number' val='<?= $student["pract"]?>' min="0" max="10" name="<?= $student['user_id'] .'pract'?>" value="<?= $student['pract']?>" type="number" class="form-control"></td>
        <td><input id='number' val='<?= $student["thery"]?>' min="0" max="70" name="<?= $student['user_id'] .'thery'?>" value="<?= $student['thery']?>" type="number" class="form-control"></td>
        <td id="total"><input min="0" max="100" name="<?= $student['user_id'] .'total'?>" value="<?= $student['total']?>" type="number" val='<?= $total ?>' class="form-control" disabled></td>
        <td ><a  class="btn error" style="margin-top: 0px; margin-left: -1px;" href="<?= base_url().'index.php/groups/banStudent/'.$group_id.'/'.$student['user_id'] ?>">Ban</a></td>
    </tr>
    <?php endforeach; ?>
    
</table>
    <hr>
    <input type="submit" value="Save" class="col-sm-offset-9 btn">
    <input type="submit" value="Done" class="col-sm-offse-8 btn error" name="done">
</form>
<?php endif; ?>
