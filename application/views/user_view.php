<style> 
.user{
    border: 1px solid #eee;
}
</style>
<div class="user">
<table>
<thead>
<th>
Id
</th>
<th>
user
</th>
<th>
password
</th>
</thead> 
<tbody>
<?php foreach($users as $user): ?>
<th><?php echo $user->id?></th>
<th><?php echo $user->user?></th>
<th><?php echo $user->password?></th>
<?php endforeach ?>
</tbody>
</table>
</div>
