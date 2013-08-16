<?php

require_once('config.php');
$config = array();
foreach($db->query("SELECT * FROM config") as $row){
	$config[$row['prop']] = $row['value'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $config['title'] ?></title>
	<link rel="stylesheet" type="text/css" href="media/style.css">
</head>
<body>

	<div id="wrapper">
		<div id="leftCol">
			<div id="branding">
				<h1><?= $config['brandingHeader'] ?></h1>
			</div>
			<div id="nav">
				<?php require_once('nav.php') ?>
			</div>
		</div>
	
		<div id="contentWrapper">
			<div id="content">
				<?php
					if(!isset($_GET['name'])){
						$_GET['name'] = "home";
					}
					require('content.php');
				?>
			</div>
		</div>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script type="text/javascript">
		var animSpeed = 250;

		function load(name){
			$.get("content.php?name="+name, function(content){
				$('#content').hide('blind', {direction: 'left'}, animSpeed, function(){
					$('#content').html(content);
					$('#content').show('blind', {direction: 'left'}, animSpeed);
				});
			});
			$('.currentPage').removeClass("currentPage");
			$('a[name="'+name+'"]').addClass("currentPage");
		}

		$(function(){
			$('a[name="<?= $_GET['name'] ?>"]').addClass("currentPage");

			$('a').click(function(event){ event.preventDefault(); load(this.name); });
		});
	</script>
</body>
</html>