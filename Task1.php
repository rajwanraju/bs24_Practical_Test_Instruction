<?php
    require_once 'config.php';
    require_once 'Database.class.php';
    $db = new Database($pdo);    
?>

<table>
	<tr>
		<th>Category Name</th>
		<th>Total Items</th>
	</tr>

	<?php
	    $rows = $db->getCategory();
	    foreach ($rows as $value) {
	    
	?>
	
	<tr>
		<td>$value->Category</td>
		<td>$value->Total</td>
	</tr>



<?php } ?>



</table>