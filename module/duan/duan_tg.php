<?php 

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <?php 
	include "config/connect.php";
	include "classes/db.class.php";
	include "classes/congviec.class.php";
	include "classes/duan.class.php";
  	$duan = new duan();
	$da_cv_tv = new Db();
	$congviec = new congviec();
	$db = new Db();
	$maduan_selected = postIndex('chonduan');
  	$username = $_SESSION['username'];
  	$row_matv = $db->select("select mathanhvien from taikhoan where tentaikhoan = '$username'");
  	foreach ($row_matv as $row) {
  		# code...
  		$mathanhvien = $row['mathanhvien'];
  	}
  	$row_da_cv_tv = $da_cv_tv->select("SELECT * from duan ");
 ?>
 <h3 align="center">Danh sách dự án</h3>
 <table border="1" style="width: 1000px;"><tr bgcolor="#004A5B" style="color: white"><td>Mã dự án</td><td>Tên dự án </td>
			<td>Trưởng dự án</td><td>Mã tiến độ</td><td>Mã trạng thái</td><td>Mã cấp độ</td><td>Hành động</td></tr>
	<?php
	foreach($row_da_cv_tv as $row)
	{
		?>
	    <tr><td><input type="checkbox" name="" value="C_maduan"><?php echo $row["maduan"];?></td>
	    	<td><?php echo $row["tenduan"];?></td>
	    	<td><?php echo $row["matruongduan"];?></td>
	    	<td><?php echo $row["tiendo"];?></td>
	    	<td><?php echo $row["matrangthai"];?></td>
	    	<td><?php echo $row["macapdo"];?></td>
	    	<td><a href="#">Xem chi tiết</a></td>
	        </tr>
	    <?php
	}
	?>
</table>
 </body>
 </html>