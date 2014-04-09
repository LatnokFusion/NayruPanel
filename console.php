<?php

$input = $_GET['input'];
$divout = $_GET['divout'];

//echo $input.$divout;

if ( $input == 'defaultcontent' ) {
	//echo "default content for ".$divout;
	if ( $divout == 'nav' ) {include($divout.'.php');} else {include('window-'.$divout.'.php');}
} elseif ( $input == 'zelda list' ) {
	header('X-Frame-Options: GOFORIT'); 
	echo '<iframe width="100%" height="90%" src="//www.youtube.com/embed/YWZISMBX7Ck?feature=player_detailpage&list=RDYWZISMBX7Ck&rel=0&autoplay=1&wmode=opaque" frameborder="0" allowfullscreen></iframe>';	
} elseif ( $input == 'zelda' ) {
	header('X-Frame-Options: GOFORIT'); 
	echo '<iframe width="100%" height="100%" src="//www.youtube.com/embed/EeLSseTfdXk?feature=player_detailpage&rel=0&autoplay=0&wmode=opaque" frameborder="0" allowfullscreen></iframe>';
} elseif ( $input == 'zelda wallpaper' ) {
	header('X-Frame-Options: GOFORIT'); 
	echo '<iframe width="100%" height="90%" src="//www.youtube.com/embed/nDcyQK4g64U?feature=player_detailpage&rel=0&autoplay=1&wmode=opaque" frameborder="0" allowfullscreen style="z-index:0;"></iframe>';
} elseif ( $input == 'clear' ) {
	echo "<br>";
}
?>