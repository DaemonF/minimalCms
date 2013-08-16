<?php
	require_once('config.php');

	function buildList($root, $level) {
		global $db;
		echo "<ul>";
		foreach($db->query('SELECT * FROM `nav` WHERE `parent` = '.$db->quote($root).' ORDER BY `order` ASC') as $row){
			echo '<li class="depth'.$level.'"><a href="?name='.$row['name'].'" name="'.$row['name'].'">'.$row['text'].'</a>';
			buildList($row['name'], $level+1);
			echo '</li>';
		}
		echo "</ul>";
	}

	echo buildList('root', 0);
?>