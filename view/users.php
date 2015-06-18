<table id="user-table">
<tr>
	<th>UserID</th>
	<th>Firstname</th>
	<th>Lastname</th>
</tr>	
<?php
foreach($users as $user)
{
	echo '<tr>
	<td>' . $user["userID"] . '</td>
	<td>' . $user["firstname"] . '</td>
    <td>' . $user["lastname"] . '</td>
    <td><div class="commands"></div></td>
  </tr>';
}
?>
<tr>
	<td></td>
	<td><input type="text" name="user-firstname" placeholder="firstname"></td>
    <td><input type="text" name="user-lastname" placeholder="lastname"></td>
    <td><div class="commands"><button type="button">Add</button></div></td>
</tr>	
</table>