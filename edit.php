<?php session_start();
require_once "db.php";
require_once "function.php";

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
}

$id = $_GET['id'];
$departments = getDepartments();
$employee = getEmployee($id);
$employee = $employee->fetch(PDO::FETCH_ASSOC);


$error = "";
if(isset($_POST['submit'])){
    $name = $_POST["name"];
    $pos = $_POST["pos"];
    $depart = $_POST["depart"];

    if(empty($name) || empty($pos) || empty($depart)){
        $error = "Vui lòng nhập trường này!";
    }else{
        $sql = "UPDATE `employees` SET `employee_name`='$name',`position`='$pos',`department`='$depart' WHERE employee_id='$id'";
        $conn -> exec($sql);
        header("location: index.php");
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới</title>
    <style>
        .err{
            color: red;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        Tên <input type="text" name="name" value="<?= $employee["employee_name"] ?>">
        <span class="err">* <?= $error ?></span>
        <br><br>
        Vị trị <input type="text" name="pos" value="<?= $employee["position"] ?>">
        <span class="err">* <?= $error ?></span>
        <br><br>
        Phòng ban
        <select name="depart" id="">
            <option value="">-- Chọn --</option>
            <?php foreach($departments as $d){ ?>
                <option value="<?= $d['department_id']?>"
                <?php echo ($d['department_id'] === $employee["department"])? "selected":""; ?>
                ><?= $d['department_name']?></option>
           <?php } ?>
        </select>
        <span class="err">* <?= $error ?></span>
        <br><br>
        <button type="submit" name="submit">Chỉnh sửa</button>
    </form>
</body>
</html>