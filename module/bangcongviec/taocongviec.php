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
	$idcv = rand(10000,99999);
	$duan = new duan();
	$da_cv_tv = new Db();
	$congviec = new congviec();
	$db = new Db();
	$maduan_selected = postIndex('chonduan');
  	$username = $_SESSION['username'];
  	$row_matv = $db->select("select mathanhvien from taikhoan where tentaikhoan = '$username'");
  	$row_thanhvien = $db->select("SELECT * from thanhvien");
  	foreach ($row_matv as $row) {
  		# code...
  		$mathanhvien = $row['mathanhvien'];
  	}
  	$row_da_cv_tv = $da_cv_tv->select("select * from dacvtv 
  		join duan on dacvtv.maduan = duan.maduan
  		join congviec on dacvtv.macongviec = congviec.macongviec
  		where dacvtv.mathanhvien= '$mathanhvien' ");
  	$row_da = $duan->select("SELECT * from duan");
  	$sm = postIndex("submit");
	$tencongviec = postIndex("tencongviec");
  	$ngaytao = date("Y/m/d");
  	$nguoidamnhiem = postIndex('chonthanhvien');
		if (isset($_POST["submit"]))
		{
			if($_POST['tencongviec'] == "" ) {
				?>
				<div class="err" style="background-color:#FE2712 ">
				<?php   echo "Tên công việc không được bỏ trống !"; ?>
				</div>
				<?php
				}
			else if($_POST['ngaybd'] == 0000-00-00 || $_POST['ngaykt'] ==0000-00-00) {
				?>
				<div class="err" style="background-color:#FE2712 ">
				<?php   echo "Vui lòng nhập ngày tháng hợp lệ !"; ?>
				</div>
				<?php
				}
		 	else { ?>
		 		<div class="err" style="background-color:#6AA5D7 ">
					<?php   echo "Thêm công việc thành công. Mã số công việc $idcv "; ?>
					</div>
		 	<?php
				$sql="insert into congviec (macongviec,tencongviec,manguoitao,ngaytao,ngaybatdau,ngayketthuc,matrangthai) values(:macongviec,:tencongviec,:manguoitao,:ngaytao,:ngaybatdau,:ngayketthuc,:matrangthai)";
				$arr = array(":macongviec"=>$idcv, ":tencongviec"=>$_POST["tencongviec"],":manguoitao"=>$mathanhvien, ":ngaytao"=>$ngaytao, ":ngaybatdau"=>$_POST['ngaybd'], ":ngayketthuc"=>$_POST['ngaykt'],":matrangthai"=>'1');
				$them = $db->insert($sql,$arr);
				$sql1 = "insert into dacvtv (maduan,macongviec,mathanhvien) values (:maduan,:macongviec,:mathanhvien)";
				$arr1 = array(":maduan"=>$maduan_selected,":macongviec"=>$idcv,":mathanhvien"=>$nguoidamnhiem);
				$them1 = $db->insert($sql1,$arr1);
		}
	}
	 ?>

<fieldset>
		<legend>Tạo mới công việc</legend>
			<form method="post">
				<table align="center">
					<tr>
						<td>Dự án</td>
						<td>
						<select name="chonduan" >
							<?php 
							foreach ($row_da as $row) {
							?>
							<option value="<?php echo $row['maduan']?>"><?php echo $row['tenduan']?></option>
							<?php 
							} 
							?>
						</select>
						</td>
					</tr>
					<tr>
						<td>Tên công việc</td><td><input type="text" name="tencongviec"></td>
					</tr>
					<tr>
						<td>Người tạo </td><td><?php echo $username; ?></td>
					</tr>
					<tr>
						<td>Ngày tạo</td><td><?php echo $ngaytao ; ?></td>
					</tr>
					<tr>
						<td>Ngày bắt đầu dự kiến</td><td><input type="date" name="ngaybd"></td>
					</tr>
					<tr>
						<td>Ngày kết thúc dự kiến</td><td><input type="date" name="ngaykt"></td>
					</tr>
					<tr>
						<td>Người đảm nhiệm</td>
						<td>
							<select name="chonthanhvien">
								<option>Chọn thành viên đảm nhiệm</option>
								<?php foreach ($row_thanhvien as $row) {?>
								<option value="<?php echo $row['mathanhvien'] ?>"><?php echo $row['tenthanhvien']; ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="Tạo"></td>
					</tr>
				</table>
			</form>
	</fieldset>
</body>
</html>