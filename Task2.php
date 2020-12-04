<?php
    require_once 'config.php';
    require_once 'Database.class.php';
    $db = new Database($pdo);    
?>

<ul>
	<?php 
		echo $db->getCategory();
	 ?>
</ul>