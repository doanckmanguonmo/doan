<?php
	$duan = new duan();
	$ac=getIndex("ac", "home");
	if ($ac=="home")
		{
			include ROOT."/module/canhan/home.php";
		}
?>