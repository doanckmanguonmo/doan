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

	$username = $_SESSION['username'];
	$idda = rand(10000,99999);
	$duan = new duan();
	$db = new db();
	$ngaytao = date("Y/m/d");
  	$row_matv = $db->select("select mathanhvien from taikhoan where tentaikhoan = '$username'");
  	foreach ($row_matv as $row) {
  		# code...
  		$mathanhvien = $row['mathanhvien'];
  	}
  	$row_trangthai = $db->select("SELECT * from trangthai");
  	$row_capdo = $db->select("SELECT * from capdo");
  	$row_truongduan = $db->select("SELECT tenthanhvien from thanhvien where mathanhvien = $mathanhvien");
  		foreach ($row_truongduan as $row) {
  			# code...
  			$truongduan = $row['tenthanhvien'];
  		}


  	//XỬ LÝ TẠO CÔNG VIỆC
  	if(isset($_POST['submit'])){

			if($_POST['tenduan'] == "" ) {
				?>
				<div class="err" style="background-color:#FE2712 ">
				<?php   echo "Tên dự án không được bỏ trống !"; ?>
				</div>
				<?php
				}
			else if($_POST['ngaybatdau'] == 0000-00-00 || $_POST['ngayketthuc'] ==0000-00-00) {
				?>
				<div class="err" style="background-color:#FE2712 ">
				<?php   echo "Vui lòng nhập ngày tháng hợp lệ !"; ?>
				</div>
				<?php
				}
		 	else { ?>
		 		<div class="err" style="background-color:#6AA5D7 ">
					<?php   echo "Thêm dự án thành công. Mã số dự án $idda "; ?>
					</div>
		 	<?php
				$sql="insert into duan (maduan,tenduan,matruongduan,tiendo,matrangthai,macapdo,ngaytao,ngaybatdau,ngayketthuc,chitiet) values (:maduan,:tenduan,:matruongduan,:tiendo,:matrangthai,:macapdo,:ngaytao,:ngaybatdau,:ngayketthuc,:chitiet)";
				$arr = array(":maduan"=>$idda,":tenduan"=>$_POST['tenduan'],":matruongduan"=>$mathanhvien,":tiendo"=>'0',":matrangthai"=>'1',":macapdo"=>$_POST['capdo'],":ngaytao"=>$ngaytao,":ngaybatdau"=>$_POST['ngaybatdau'],":ngayketthuc"=>$_POST['ngayketthuc'],":chitiet"=>$_POST['chitiet']);
				$them = $db->insert($sql,$arr);
		}
  	}


	?>
	<fieldset>
		<legend>Tạo mới dự án</legend>
		<form method="post">
			<table align="center">
			<tr>
				<td>Mã dự án</td><td><?php echo $idda ?></td>
			</tr>
			<tr>
				<td>Tên dự án</td><td><input type="text" name="tenduan"></td>
			</tr>
			<tr>
				<td>Trưởng dự án</td><td><?php echo $truongduan; ?></td>
			</tr>
			<tr>
				<td>Cấp độ</td>
				<td><select name="capdo">
					<?php foreach ($row_capdo as $row) { ?>
					<option value="<?php echo $row['macapdo'] ?>"><?php echo $row['tencapdo']; ?></option>
					<?php } ?>
				</select></td>
			</tr>
			<tr>
				<td>Ngày bắt đầu</td><td><input type="date" name="ngaybatdau"></td>
			</tr>
			<tr>
				<td>Ngày kết thức dự kiến</td><td><input type="date" name="ngayketthuc"></td>
			</tr>
			<tr>
				<td>Mô tả dự án</td><td><textarea name="chitiet" rows="10" cols="100"></textarea></td>
			</tr>
			<tr>
				<td></td><td><input type="submit" name="submit" value="Tạo"></td>
			</tr>
		</table>
		</form>
	</fieldset>

</body>
</html>