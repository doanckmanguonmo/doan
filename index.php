
  <?php session_start() ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Project Management System</title>
    <link rel="stylesheet" type="text/css" href="css\index.css">
  </head>
  <body>
    <?php
    include "config/connect.php";
    include "include/function.php";
    include "classes/db.class.php";
    $db= new Db();
    $username = postIndex('username');
    $password = postIndex('password');
    if ($username!="")
      {
    $stm = $db->select("SELECT * from taikhoan 
      join thanhvien on taikhoan.mathanhvien=thanhvien.mathanhvien
      where tentaikhoan ='$username' and matkhau = '$password'");
          if($db->getRowCount()==0){
              echo "<script>";
              echo "alert('Tài khoản hoặc mật khẩu chưa chính xác !');";
              echo "</script>";
            }
          else{
            $_SESSION['username'] = $username;
            $row_matv = $db->select("select mathanhvien from taikhoan where tentaikhoan = '$username'");
            foreach ($row_matv as $row) {
              # code...
              $mathanhvien = $row['mathanhvien'];
            }
            $row_chucvu = $db->select("SELECT machucvu from thanhvien where mathanhvien = '$mathanhvien' ");
            foreach ($row_chucvu as $row) {
              # code...
              $machucvu = $row['machucvu'];
            }
            $_SESSION['chucvu'] = $machucvu;
            if($machucvu==1) header('Location:trangchu_truongduan.php');
            else if($machucvu==2)   header('Location:trangchu_truongnhom.php');
            else if($machucvu==3)   header('Location:trangchu_thanhvien.php');
            else if($machucvu==0)   header('Location:trangchu_admin.php');

          }
    }
    ?>
  <div id="content">
    <div id="logo">
      <img src="img\logo.png">
    </div>
    <div><hr></div>
    <div id="login">
    <form action="index.php" method="post" enctype="multipart/form-data" id='frm1'>
      Đăng nhập
      <table id="tblogin" width="300">
        <tr>
          <td height="50">Tài khoản *</td>
          <td><input type="text" name="username"></td>
        </tr>
        <tr>
          <td>Mật khẩu *</td>
          <td><input type="password" name="password"></td>
        </tr>
        <tr>
          <td height="50"></td>
          <td>
            <input type="submit" name="submit" value="Đăng nhập"> <a href="#">Tìm lại tài khoản</a>
          </td>
        </tr>
      </table>
    </form>
    </div>
    <div><hr></div>
    <div id="info">
      <div id="contact">
        <div>Trường Đại học Công Nghệ Sài Gòn</div>
        <div>Khoa Công nghệ Thông tin</div>
      </div>
      <div id="pms">
        <div>Hệ thống quản lý dự án</div>
        <div>Phiên bản 1.0.0</div>
      </div>
    </div>
  </div>
  </body>
  </html>