<?php
session_start();
?>
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	echo '<ul style="padding:0; color:red;">';
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<li>',$msg,'</li>'; 
	}
	echo '</ul>';
	unset($_SESSION['ERRMSG_ARR']);
}
?>

<title>Log In - Silverelitez Netowrks</title>

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script src="functions.js"></script>

<script>
function loginCheck()
{
//if ( !divout ) { var divout = "window"; }
username = document.getElementById('uname').value;
password = document.getElementById('pword').value;
//if ( input == 'zelda wallpaper' ) { var divout = "main"; }

//alert(username+password);

close="<br><button onclick=\"$('#window-status').css('visibility', 'hidden');\">Close</button>";

def="<center><br><img src='http://fc03.deviantart.net/fs71/f/2011/168/c/6/hyrule__s_royal_family_crest_id_by_yiggdrasile-d3j4sd5.gif'><br><br>";
$('#window-status').css('visibility', 'visible');

document.getElementById('body-status').innerHTML=def+"Checking credentials...";
$("#window-status").fadeIn("slow");

if (username.length==0)
  { 
  return;
  }
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    status = xmlhttp.responseText;
    //alert(status);
	
	if ( status == '0' ) 
	{
		document.getElementById('body-status').innerHTML=def+"Logging in...";
		$("#window-login").fadeOut(1000, function() {
		$('#window-status').css('top', '24%');
		document.getElementById('body-status').innerHTML=def+"Preparing your desktop...";
		$("#login-main").fadeOut(1500, function() {
				window.location = 'index.php';
		}); 
		} );
	}
	if ( status == '1' ) 
	{
		document.getElementById('body-status').innerHTML=def+"<font color='red'>Invalid username or password.</font>"+close;
	}
	if ( status == '2' ) 
	{
		document.getElementById('body-status').innerHTML=def+"Something went wrong."+close;
	}
	//var objDiv = document.getElementById(divout);
	//objDiv.scrollTop = objDiv.scrollHeight;
	//document.getElementById("consoleinput").value="";
    }
  }
  //xmlhttp.open("POST","reg.php?username="+username+"&password="+password,true);
  //xmlhttp.send();
  xmlhttp.open("POST","reg.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("username="+username+"&password="+password);
}

</script>

<body>
<div class="contain" id='contain'>
	<div class="login-main" id="login-main">
	</div>

<script>
//alert($('#login-main').width());

if ($('#login-main').width() >= 1024 ) { document.write('<link  rel="stylesheet" type="text/css" href="userpanel.css">');
} else { 
document.write('<link rel="stylesheet" type="text/css" href="smartphone.css">');
}

</script>
	
	<div class="login outer ui-draggable ui-resizable" id="window-login" > 
		<div id="title-login" class="windowtitle" align="top" ondblclick="resizeWindow('login')">	
			<center>Log In</center>
		</div>

		<div id="body-login" class="windowbody">
			<center>
			
			<img src='http://fc04.deviantart.net/fs71/f/2012/183/f/6/stone_hylian_crest_by_blueamnesiac-d55ospd.png' height='30%'>
			<br>

			<form action="#" onsubmit="loginCheck();" method="POST">
			Username
			<input type="text" id="uname" /><br>
			Password
			<input type="password" id="pword" /><br>
			<input type="button" onclick='loginCheck();' value="Login" />
			<button>Register</button>
			</form>
		</div>
	</div>

	<div class="status outer ui-draggable ui-resizable" id="window-status" > 
		<div id="title-status" class="windowtitle" align="top">	
			<center>Please wait...</center>
		</div>	
		<div id="body-status" class="windowbody">
			<center><img src='http://fc03.deviantart.net/fs71/f/2011/168/c/6/hyrule__s_royal_family_crest_id_by_yiggdrasile-d3j4sd5.gif'>		</div>
	</div>
</div>
<script>

$("#login-main").fadeIn("slow", function() {
$("#window-login").fadeIn("slow"); } );

//alert('startup');


$(function() {
		$( "#window-login" ).draggable({ handle: "#title-login" });

	});
	$(function() {
		$( "#window-login" ).resizable();
	});
	state['login'] = 'restored';
</script>

</body>