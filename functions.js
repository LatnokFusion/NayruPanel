// init lol
var lastopen = 'none';
var openwindows = '0';
var oldtop = '';
var newtop = '';
var navstat = 'open';

var state = [];
var minmax = [];
var top = [];
var width = [];
var left = [];
var height = [];

function sqlRequest(userid, mode, col, value) 
{
	$.ajax({
	  url: 'database.php',
	  data: {userid: userid, mode: mode, col: col, value: value},
	  type: 'POST'
	  //dataType: 'JSON'
	});
}

function setStyle(color, textcolor, navbg)
{
	//alert(navbg);
	$('#header').css('color', textcolor);
	$('#header').css('background-color', color);
	$('#nav').css('color', textcolor);
	$('#nav').css('background-color', color);
	$('#nav').css('background-image', navbg);
	$('#clock').css('color', textcolor);
	$('#clock').css('background-color', color);
	$('.windowtitle').css('color', textcolor);
	$('.windowtitle').css('background-color', color);
	$('.button').css('color', textcolor);
	$('.button').css('background-color', color);
	
}

function createWindow(window, src) 
{
	c1 = '#b8e356';
	c2 = '#a5cc52';
	document.getElementById("btndiv"+window).align = 'right';
	//$('#btn'+window).css('background', '-webkit-gradient( linear, left top, left bottom, color-stop(0.05, '+c1+'), color-stop(1, '+c2+') );');
	//$('#btn'+window).css('background-color', c1);
	//$('#btn'+window).css('button.style.background', '-moz-linear-gradient( center top, '+c1+' 5%, '+c2+' 100% );');
	//$('#btn'+window).css('button.style.filter', 'progid:DXImageTransform.Microsoft.gradient(startColorstr=\''+c1+'\', endColorstr=\''+c2+'\');');
	
	state[window] = 'hidden';
	minmax[window] = 'restored';
	
	openwindows++;
	
	//alert(openwindows);
	
	//current = document.getElementById('desktop').innerHTML;
	title = document.getElementById('btn'+window).innerHTML;
	var newwindow = '<div class="window outer" id="window-'+window+'" onmousedown="rotateZindex(\''+window+'\')"> <div id="title-'+window+'" class="windowtitle" align="top" ondblclick="resizeWindow(\''+window+'\')">	<center>'+title+' - <button onclick="togglewindow(\''+window+'\')">Hide</button><button id="btnconsole" onclick="closewindow(\''+window+'\')">Close</button><button onclick="runCommand(\'defaultcontent\', \'body-'+window+'\')">Refresh</button></center></div><div id="body-'+window+'" class="windowbody"></div>'
	
	var d1 = document.getElementById('contain');
	d1.insertAdjacentHTML('beforeend', newwindow);

	document.getElementById('window-'+window).style.zIndex = openwindows+'0';
	lastopen = window;
	//alert(lastopen);
	
	$(function() {
		$( "#window-"+window ).draggable({ handle: "#title-"+window });

	});
	$(function() {
		$( "#window-"+window ).resizable();
	});

	runCommand("defaultcontent","body-"+window);
	
}

function closewindow(window)
{
	c1 = '#3d94f6';
	c2 = '#1e62d0';
	document.getElementById("btndiv"+window).align = 'left';
	//$('#btn'+window).css('background', '-webkit-gradient( linear, left top, left bottom, color-stop(0.05, '+c1+'), color-stop(1, '+c2+') );');
	//$('#btn'+window).css('background-color', c1);
	//$('#btn'+window).css('button.style.background', '-moz-linear-gradient( center top, '+c1+' 5%, '+c2+' 100% );');
	//$('#btn'+window).css('button.style.filter', 'progid:DXImageTransform.Microsoft.gradient(startColorstr=\''+c1+'\', endColorstr=\''+c2+'\');');

	//$('#window-'+window).fadeOut('', '', "
	$('#window-'+window).remove();
	//");
	delete state[window];
	openwindows = openwindows-1;
	
}

function rotateZindex(name, top) 
{
	oldwin = 'window-'+lastopen;
	win = 'window-'+name;
	newtop = document.getElementById(win).style.zIndex;
	oldtop = openwindows+'0';
	//alert(newtop+oldtop+lastopen);
	if ( openwindows > '1' && newtop != oldtop ) {
		//alert(oldwin+lastopen+win);
		document.getElementById(win).style.zIndex = oldtop;
		document.getElementById(oldwin).style.zIndex = newtop;
		document.getElementById('nav').style.zIndex = oldtop+10;
		document.getElementById('navmod').style.zIndex = oldtop+10;
		lastopen = name;
	}
}

function resizeWindow(win)
{
	var consolediv = document.getElementById("window-"+win);
	//alert(win);
	
	if ( minmax[win] == 'restored' ) {
		minmax[win] = 'maximized';
		
		navstat='open';navmod();
		
		top[win] = consolediv.style.top;
		left[win] = consolediv.style.left;
		height[win] = consolediv.style.height;
		width[win] = consolediv.style.width;
	
		consolediv.style.top = "0%";
		consolediv.style.left = "0";
		consolediv.style.height = "100%";
		consolediv.style.width = "100%";
		consolediv.style.boxShadow = "0 0 0 0";

		} else {
		minmax[win] = 'restored';
	
		consolediv.style.top = top[win];
		consolediv.style.left = left[win];
		consolediv.style.height = height[win];
		consolediv.style.width = width[win];
		consolediv.style.boxShadow = "0 0 0 15px rgba(255,255,255,0.3)";
	}
}
  
function startTime()
{

var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('clock').innerHTML="<h1>"+h+":"+m+":"+s+" || "+Date()+"</h1>";
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}

function runCommand(input, divout)
{
//if ( !divout ) { var divout = "window"; }
//alert(divout);
current = document.getElementById(divout).innerHTML;
//if ( input == 'zelda wallpaper' ) { var divout = "main"; }

if (input.length==0)
  { 
  return;
  }
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(divout).innerHTML=xmlhttp.responseText;
	//var objDiv = document.getElementById(divout);
	//objDiv.scrollTop = objDiv.scrollHeight;
	//document.getElementById("consoleinput").value="";
    }
  }
xmlhttp.open("GET","console.php?input="+input+"&divout="+divout,true);
xmlhttp.send();
}

function togglewindow(window) 
{ 
	if ( ! state[window] ) {
		createWindow(window);
	}
	if ( state[window] == 'hidden' ) 
	{ 
		state[window] = 'visible';
		//var objDiv = document.getElementById(window);
		//objDiv.scrollTop = objDiv.scrollHeight;
		var consolediv = document.getElementById("window-"+window);
		$("#window-"+window).fadeIn(1000);
		consolediv.style.visibility = state[window];

		$(function() {
			$( "#window-"+window ).resizable();
		});
		$(function() {
			$( "#window-"+window ).draggable({ handle: "#title-"+window });
		});

		//runCommand("defaultcontent","body-"+window);
		
	} else {
		state[window] = 'hidden';
		$("#window-"+window).fadeOut(1000);
	}
}		

function logout() 
{
document.getElementById('body-status').innerHTML=def+'Logging out...'; $('#window-logout').fadeOut(1000);$('#window-status').fadeIn(1000, function() {$('#main').fadeOut(1000); $('#header').fadeOut(1000); $('#clock').fadeOut(1000); $('#navmod').fadeOut(1000);  $('#nav').fadeOut(1000, function () { $('#window-status').fadeOut(1000, function() {window.location = 'login.php';})})})
}

function navmod() 
{
	if ( navstat == 'open' ) {
		navstat = 'closed';
		$("#nav").animate({ left: '-160px' });
		$("#navmod").animate({ left: '0%' });

		$("#clock").animate({ width: '70%', left: '0%' });

	} else {
		navstat = 'open';
		$("#nav").animate({ left: '0%' });
		$("#clock").animate({ width: $("#clock").width() - 160, left: '160px' });
		$("#navmod").animate({ left: '160px' });

	}
}