<center><h2>Settings</h2>

<div id='window-settings-wallpaper' style="width:90%;height:30px;overflow:auto;font-size='20px';">
<button onclick="wsw = document.getElementById('window-settings-wallpaper'); if ( wsw.style.height == '30px' ) { wsw.style.height = '90%' } else { wsw.style.height = '30px'; };">Change Wallpaper</button>
<?php 
include('database.php');
$sql = "SELECT * FROM wallpapers ORDER BY ID ASC";
foreach ($dbh->query($sql) as $row)
{
	$title = $row['title'];
	$url = $row['url'];
    echo "<center><h3>".$title."</h3><img width='90%' src=\"".$url."\" onclick=\"url='url('+this.src+')';document.getElementById('main').style.backgroundImage = url;\">";
}
?>
</div>

<div id='window-settings-color' style="width:90%;height:30px;overflow:auto;font-size='20px';">
<button onclick="wsc = document.getElementById('window-settings-color'); if ( wsc.style.height == '30px' ) { wsc.style.height = '90%' } else { wsc.style.height = '30px'; };">Change Color Scheme</button>
<?php 
include('database.php');
$sql = "SELECT * FROM colors ORDER BY ID ASC";
foreach ($dbh->query($sql) as $row)
{
	$id = $row['ID'];
	$title = $row['title'];
	$color = $row['color'];
	$navbg = $row['navbg'];
	$textcolor = $row['textcolor'];
    echo "<div onclick='setStyle(\"".$color."\", \"".$textcolor."\", \"".$navbg."\");'><center><h3 style='background-color:".$color."'><font color='".$textcolor."'>".$title."</font></h3></div>";
}
?>
</div>