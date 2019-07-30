<?php
/** @var $user_info \app\models\User[] */
?>

<table class="table table-striped table-bordered"->
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Gender</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($user_info as $index => $item): ?>
            <tr>
                <td><?=$index +1?></td>
                <td><?=$item->name?></td>
                <td><?=$item->gender?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<!--<dl class="dl-horizontal">-->
<!--    <dt>Name: </dt><dd>--><?//=$user_info[0]->name;?><!--</dd>-->
<!--    <dt>Gender: </dt><dd>--><?//=$user_info[0]->gender;?><!--</dd>-->
<!--</dl>-->