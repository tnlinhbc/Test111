<?php
$conn = new mysqli("localhost","root","","tnlinh");
if ($conn -> connect_errno){
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="backgroud">
        <h1>ĐĂNG NHẬP</h1>
        <FOrm method="post" name="frDangKy">
            <div class="fr__tenDangNhap">
                <input type="text" placeholder="Tên đăng nhập" name="tenDangNhap">
            </div>
            <div class="fr__matKhau">
                <input type="password" name="matKhau" placeholder="Mật khẩu">
            </div>
            <div class="fr__nhapLaiMatKhau">
                <input type="password" name="nhapLaiMatKhau" placeholder="Nhập lại mật khẩu">
            </div>
            <div class="dieuKhoang">
                <input type="checkbox" name="dieuKhoang"><label for="dieuKhoang"><i><span>Đồng ý</span> với điều khoảng
                        của chúng
                        tôi</i></label>
            </div>
            <?php 
            if(isset($_POST['dangNhap']))
            {
$tenDangNhap=$_POST['tenDangNhap'];
$matKhau=$_POST['matKhau'];
$nhapLaiMatKhau=$_POST['nhapLaiMatKhau'];
if(empty($tenDangNhap)||empty ($matKhau)||empty ($nhapLaiMatKhau))
{
    echo '<p> style="color:red;text-align:center">Tên đăng nhập hoặc mật khẩu không được để trống!';
}
if($matKhau != $nhapLaiMatKhau){
    echo '<p> style="color:red;text-align:center"> Nhập lại mật khẩu không chính xác!'
}
$result = mysqli_query($conn,"SELECT * from nguoidung where tenND='$tenDangNhap' and  matKhau='$matKhau'");
$row = mysqli_fetch_assoc($result);
if($row){
    echo '<p style="color:green;text-align:center">Bạn đã đăng nhập thành công';
}
else echo '<p style="color:red;text-align:center"> Tên đăng nhập hoặc mật khẩu không đúng!';
            }
            ?>
            <div class="fr__button">
                <input type="submit" name="dangNhap" value="Đăng nhập" onclick="kiemTra()">
                <input type="reset" value="Bỏ qua">
            </div>

        </FOrm>
    </div>
</body>

</html>