<?php
if (!defined("ROOT"))
{
	echo "You don't have permission to access this page!"; exit;	
}
$path =ROOT."/trangchu.php";//mac dinh
	$mod = isset($_GET["mod"])?$_GET["mod"]:"";
	if($mod=="duan")
	{
		include ROOT."/module/duan/duan.php";
	}
	if($mod=="duan_tg")
	{
		include ROOT."/module/duan/duan_tg.php";
	}
	if($mod=="taoduan")
	{
		include ROOT."/module/duan/taoduan.php";
	}
	if ($mod=="tailieu")
	{
		include ROOT."/module/tailieu/content.php";
	}
	if ($mod=="canhan")
	{
		include ROOT."/module/canhan/canhan.php";
	}
	if ($mod=="bangcongviec")
	{
		include ROOT."/module/bangcongviec/bangcongviec.php";
	}
		if ($mod=="quanlycongviec1")
	{
		include ROOT."/module/bangcongviec/quanlycongviec1.php";
	}
			if ($mod=="quanlycongviec2")
	{
		include ROOT."/module/bangcongviec/quanlycongviec2.php";
	}
		if ($mod=="bcv_u")
	{
		include ROOT."/module/bangcongviec/bcv_u.php";
	}
			if ($mod=="bcv_l")
	{
		include ROOT."/module/bangcongviec/bcv_l.php";
	}
	if ($mod=="r_bangcongviec")
	{
		include ROOT."/module/rightmenu/r_bangcongviec.php";
	}
	if ($mod=="taocongviec")
	{
		include ROOT."/module/bangcongviec/taocongviec.php";
	}
	if ($mod=="delete_duan")
	{
		include ROOT."/module/bangcongviec/delete_duan.php";
	}
		if ($mod=="qltk")
	{
		include ROOT."/admin/qltk.php";
	}
	if ($mod=="qltv")
	{
		include ROOT."/admin/qltv.php";
	}
?>