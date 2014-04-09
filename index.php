<!doctype html>
<html>
<head>
	<title>Dynamic Panel - Silverelitez Netowrks</title>
	<?php include("functions.php"); ?>
</head>

<body onload="startTime()">
<div class="contain" id='contain'>

	<div class="status outer ui-draggable ui-resizable" style='display:block;visibility: visible;z-index:999;top:24%;' id="window-status" > 
		<div id="title-status" class="windowtitle" align="top">	
			<center>Please wait...</center>
		</div>	
		<div id="body-status" class="windowbody">
			<center><img src='http://fc03.deviantart.net/fs71/f/2011/168/c/6/hyrule__s_royal_family_crest_id_by_yiggdrasile-d3j4sd5.gif'>
		</div>
	</div>

<script>
	//alert('freeze');
	close="<br><button onclick=\"$('#window-status').css('visibility', 'hidden');\">Close</button>";

	def="<center><br><img src='http://fc03.deviantart.net/fs71/f/2011/168/c/6/hyrule__s_royal_family_crest_id_by_yiggdrasile-d3j4sd5.gif'><br><br>";

	document.getElementById('body-status').innerHTML=def+"Preparing your desktop...";
</script>
	
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
	
<script>
//alert($('#main').width());

if ($('#main').width() >= 1024 ) { document.write('<link  rel="stylesheet" type="text/css" href="userpanel.css">');
} else { 
document.write('<link rel="stylesheet" type="text/css" href="smartphone.css">');
}

	$("#main").fadeIn(1500, function () {
		$("#navmod").fadeIn("slow", function () {
			$("#navmod").animate({ left: "160px" });
			$("#nav").fadeIn("slow", function () {
				$("#header").fadeIn();
				$("#clock").fadeIn();
				$("#window-status").fadeOut();
			});
		});
	});
</script>

	
</div>

</body>
</html>