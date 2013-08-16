<?php

	function fail(){
		echo "No such page.";
		exit(1);
	}

	if(!isset($_GET['name']))
		fail();
	else
		$name = $_GET['name'];

	require_once('config.php');

	$getContent = $db->prepare('SELECT *  FROM `content` WHERE `name` = :name LIMIT 1');
	$getContent->bindParam(':name', $name);
	$getContent->execute();
	$row = $getContent->fetch();
	if(!$row)
		fail();

	eval($row['content']."\r\n"); # Newline for heredoc issues

	echo "<h2>".$row['title']."</h2>";

	require_once('templates/'.$row['template'].'.php');
?>