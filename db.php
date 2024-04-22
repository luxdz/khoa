<!-- db -->
<?php
// Thiết lập kết nối đến CSDL bằng cách sử dụng PDO

// Bước 1: Cung cấp các thông tin
// - Tên máy chủ
$servername = "localhost";
// - Tên người dùng/ tên đăng nhập
$username = "root";
// - Mật khẩu đăng nhập
$password = "";
// - Tên Database (CSDL)
$dbname = "db_employee_1";

// Bước 2: Sử dụng TRY - CATCH để kiểm soát và xử lý ngoại lệ
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    // Thiết lập chế độ báo lỗi cho PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "Kết nối Database thành công!";
}catch(PDOException $e){
    echo "Kết nối Database không thành công".$e->getMessage();
}
?>