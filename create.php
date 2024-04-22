<?php session_start();
require_once "db.php";
require_once "function.php";

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
}

$departments = getDepartments();

$error = "";
if(isset($_POST['submit'])){
    $name = $_POST["name"];
    $pos = $_POST["pos"];
    $depart = $_POST["depart"];

    if(empty($name) || empty($pos) || empty($depart)){
        $error = "Vui lòng nhập trường này!";
    }else{
        $sql = "INSERT INTO `employees`(`employee_name`, `position`, `department`) 
        VALUES ('$name','$pos','$depart')";
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
        Tên <input type="text" name="name" id="">
        <span class="err">* <?= $error ?></span>
        <br><br>
        Vị trị <input type="text" name="pos" id="">
        <span class="err">* <?= $error ?></span>
        <br><br>
        Phòng ban
        <select name="depart" id="">
            <option value="">-- Chọn --</option>
            <?php foreach($departments as $d){ ?>
                <option value="<?= $d['department_id']?>"><?= $d['department_name']?></option>
           <?php } ?>
        </select>
        <span class="err">* <?= $error ?></span>
        <br><br>
        <button type="submit" name="submit">Thêm</button>
    </form>
</body>
</html>