<!doctype html>
<html>
<head>
	<?php include("functions.php"); ?>
</head>

<body onload="startTime()">
<div class="contain" id='contain'>
	<div class="nav" id="nav" >
		<?php include("nav.php"); ?>
	</div>
	
	<div id='navmod'>
		<a href='#' onclick='navmod()'>
		<img src='navi.gif'>
		</a>
	</div>
	
	<div class="header" id="header">
		<?php include("header.php"); ?>
	</div>
	
	<div id="clock" class='clock'>
		Loading Clock...
	</div>
	
	<div class="main" id='main'>
		<?php include("window-main.php"); ?>
	</div>

</div>

</body>
</html>