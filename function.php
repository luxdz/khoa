<!-- function -->
<?php
// Lấy ds nhân viên có tên của phòng ban
function getEmployees(){
    global $conn;
    $sql = "SELECT * FROM `employees` INNER JOIN departments 
    WHERE department = department_id";
    return $conn->query($sql);
}

// Lấy ds phòng ban
function getDepartments(){
    global $conn;
    $sql = "SELECT * FROM `departments`";
    return $conn->query($sql);
}

// Lấy 1 nhân viên theo id
function getEmployee($id){
    global $conn;
    $sql = "SELECT * FROM `employees` WHERE employee_id = '$id'";
    return $conn->query($sql);
}

// Xác nhận xóa nhân viên
function comfirmDel($id){
    echo "
    <h2>Xóa nhân viên</h2>
    <p>Bạn có chắc muốn xóa không?</p>
    <a href='delete.php?id=$id&comfirm=true'>Có</a>
    <a href='index.php'>Không</a>
    ";
    if(isset($_GET['comfirm'])){
        return true;
    }
}

// Xóa
function delete($id){
    global $conn;
    $sql = "DELETE FROM `employees` WHERE employee_id = '$id'";
    return $conn->exec($sql);
}
?>