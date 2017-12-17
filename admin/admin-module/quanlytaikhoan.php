<?php
	include "config/connect.php";
	include "classes/db.class.php";
	$db = new Db();
	$row_taikhoan = $db->select("SELECT * from taikhoan 
		join thanhvien on taikhoan.mathanhvien=thanhvien.mathanhvien");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="background-color: #46AEB1; color: white">
	<?php 
  	if(isset($_POST['xoa']))
  	{
  		if(isset($_POST['cmataikhoan'])){
			$sql ="delete from taikhoan where mataikhoan = :mataikhoan";
			$arr = array(":mataikhoan"=>$_POST['cmataikhoan']);
			$xoa = $db->delete($sql,$arr);
			echo "Xóa thành công !";
		}
		else
			echo "Vui lòng chọn tài khoản cần xóa !";

	}
	?>

	<?php 
		if(isset($_POST['sua'])){ ?>
		<div style="background-color: #20A5C3; color: white;"><h3>Messeger :
		<?php
			if(isset($_POST['cmataikhoan'])){

				$tentaikhoan =$_POST['ten'];
				$matkhau=$_POST['cmatkhau'];
				print_r($tentaikhoan);
				$sql ="UPDATE taikhoan SET tentaikhoan='$tentaikhoan',matkhau=$matkhau where mataikhoan = :mataikhoan";
				$arr = array(":mataikhoan"=>$_POST['cmataikhoan']);
				$sua = $db->update($sql,$arr); 

				echo "Sửa thông tin thành công !"; ?> <button type="button" onclick="tai_lai_trang()">Tải lại trang</button><?php

			} else  echo "Vui lòng chọn tài khoản cần thay đổi thông tin !"; 
			?>
		</h3></div>
			<?php
		}
	 ?>
	</div>
	<fieldset>
		<legend><h3>Danh sách tài khoản</h3></legend>
		<form method="post">
			<table width="950">
				<tr>
					<td>Mã tài khoản</td><td>Tên tài khoản</td><td>Mật khẩu</td><td>Tên thành viên</td><td>Hành động</td>
				</tr>
				<?php foreach ($row_taikhoan as $row) {?>
				<tr>
					<td><input type="radio" name="cmataikhoan" value="<?php echo $row['mataikhoan'] ?>"><?php echo $row['mataikhoan'] ?></td>
					<td><input type="text" name="ten" value="<?php echo $row['tentaikhoan'] ?>"></td>
					<td><input type="password" name="cmatkhau" value="<?php echo $row['matkhau'] ?>"></td>
					<td><?php echo $row['tenthanhvien']; ?></td>
					<td><input type="submit" name="xoa" value="Xóa"> | <input type="submit" name="sua" value="Sửa"></td>
				</tr>

				<?php } ?>
			</table>
		</form>
	</fieldset>
</body>
</html>