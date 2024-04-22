<!-- index -->
<?php session_start();
require_once "db.php";
require_once "function.php";
// Lấy ds NV
$employees = getEmployees();

if ($employees->rowCount() === 0) {
    $noEm = true;
} else {
    $noEm = false;
    // fetchAll: trả về 1 mảng chứa tất cả hàng trong tập kết quả
    $employees = $employees->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
</head>

<body>
    <?php
    if (isset($_SESSION["username"])) {
        echo "Xin chào, " . $_SESSION["username"];
    } else {
        header("Location: login.php");
    }
    ?>
    <a href="logout.php">Đăng xuất</a>

    <h1>DANH SÁCH NHÂN VIÊN</h1>

        <br>
        <a href="create.php">Thêm mới nhân viên</a>
        <br><br>
    <?php
    if ($noEm) { ?>
        <p>Không có nhân viên nào!</p>
    <?php } else { ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Vị Trí</th>
                <th>Phòng ban</th>
                <th>Thao tác</th>
            </tr>
            <?php foreach($employees as $e){ ?> 
                <tr>
                    <td><?= $e["employee_id"] ?></td>
                    <td><?= $e["employee_name"] ?></td>
                    <td><?= $e["position"] ?></td>
                    <td><?= $e["department_name"] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $e["employee_id"] ?>">Chỉnh sửa</a>
                        <a href="delete.php?id=<?= $e["employee_id"] ?>">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>

    <hr>
    <form action=""method="post">
        <input type="text" name="search" id="">
        <button type="submit" name="submit">Tìm kiếm</button>
    </form>
    <?php
        if(isset($_POST["submit"])){ ?>
            <h2>Kết quả tìm kiếm</h2>
            <table border="1">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Vị Trí</th>
                <th>Phòng ban</th>
                <th>Thao tác</th>
            </tr>
            
            <?php 
            if(!empty($_POST['search'])){
                foreach($employees as $e){ 
                    if(strpos(strtolower($e["employee_name"]),strtolower(trim($_POST['search']))))
                    ?> 
                    <tr>
                        <td><?= $e["employee_id"] ?></td>
                        <td><?= $e["employee_name"] ?></td>
                        <td><?= $e["position"] ?></td>
                        <td><?= $e["department_name"] ?></td>
                        <td>
                            <a href="">Chỉnh sửa</a>
                            <a href="">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <?php }else
            echo "Không tìm thấy kết quả!";
             }
    ?>
</body>

</html>