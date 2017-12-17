<?php
if (!defined("ROOT"))
{
	echo "You don't have permission to access this page!"; exit;	
}
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
	//include "index.php";
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
  	$row_duan = $duan->select("select * from duan ");
  	$row_congviec = $congviec->select("select * from congviec 
  		join dacvtv on congviec.macongviec = dacvtv.macongviec
  		join trangthai on congviec.matrangthai=trangthai.matrangthai
  		where dacvtv.maduan ='$maduan_selected'");

	?>
	Chọn dự án : 
	<form method="post" enctype="multipart/form-data" id="chonduan">
	<select name="chonduan" >
		<option value="deafault">Chọn dự án</option>
		<?php 
		foreach ($row_duan as $row) {
		?>
		<option value="<?php echo $row['maduan']?>"><?php echo $row['tenduan']?></option>
		<?php 
		} 
		?>
	</select>
	
	<input type="submit" name="submit" value="Xác nhận">
		
	</form>
	<fieldset>
		<legend>Danh sách công việc trong dự án</legend>
		<form method="post">
			<table width="975">
			<tr>
				<td>Mã công việc</td><td>Tên công việc</td><td>Mã nhân viên tạo</td><td>Ngày tạo</td><td>Ngày bắt đầu</td><td>Ngày kết thúc</td><td>Trạng thái</td><td>Tiến độ</td><td>Đảm nhiệm</td>
			</tr>
			<?php foreach ($row_congviec as $row){ ?>
			<tr>
				<td>
					<?php echo $row['macongviec']; ?>
				</td>
				<td>
					<?php echo $row['tencongviec']; ?>
				</td>
				<td>
					<?php echo $row['manguoitao']; ?>
				</td>
				<td>
					<?php echo $row['ngaytao']; ?>
				</td>
				<td>
					<?php echo $row['ngaybatdau']; ?>
				</td>
				<td>
					<?php echo $row['ngayketthuc']; ?>
				</td>
				<td>
					<?php echo $row['tentrangthai']; ?>
				</td>
				<td>
					<?php echo $row['tiendo']; ?>%
				</td>
				<td>
					<?php echo $row['mathanhvien']; ?>
				</td>
				
			</tr>
				<?php } ?>
			</table>
		</form>
	</fieldset>
	<hr>

	<a href="trangchu_truongnhom.php?mod=taocongviec">Tạo công việc</a>
</body>
</html>