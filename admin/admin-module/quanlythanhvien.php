
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	include "config/connect.php";
	include "classes/db.class.php";
	include "classes/duan.class.php";



  	$duan = new duan();
  	$db = new Db();
  	$rows = $duan->select("select * from duan");

 ?>
</body>
</html>