
<!DOCTYPE html>
<html>
<head>
	<title>Du an</title>
</head>
<body>
<div style="float: left; width: 700px;">
<?php 
	include "config/connect.php";
	include "classes/db.class.php";
	include "classes/duan.class.php";
  	$duan = new duan();
  	$rows = $duan->select("select * from duan")
 ?>
 <table><tr><td>Mã dự án</td><td>Tên dự án </td>
			<td>Trưởng dự án</td><td>Mã tiến độ</td><td>Mã trạng thái</td><td>Mã cấp độ</td></tr>
	<?php
	foreach($rows as $row)
	{
		?>
	    <tr><td><?php echo $row["maduan"];?></td>
	    	<td><?php echo $row["tenduan"];?></td>
	    	<td><?php echo $row["matruongduan"];?></td>
	    	<td><?php echo $row["matiendo"];?></td>
	    	<td><?php echo $row["matrangthai"];?></td>
	    	<td><?php echo $row["macapdo"];?></td>
	        </tr>
	    <?php
	}
	?>
</table>
</div>
</body>
</html>