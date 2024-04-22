<!-- delete -->
<?php session_start();
require_once "db.php";
require_once "function.php";

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
}

// Xử lý khi người dùng xác nhận xóa nhân viên
if(isset($_GET['id'])){
    $id = $_GET['id'];
    //Xác nhận xóa
    if(comfirmDel($id)){
        delete($id);
        header("location: index.php");
    }
}
?>
