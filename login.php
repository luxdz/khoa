<!-- login -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="username" id="">
        <input type="text" name="pass" id="">
        <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <?php

    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $pass = $_POST["pass"];

        if ($username == "PH123456" && $pass = "PH123456") {
            $_SESSION["username"] = $username;
            header("location: index.php");
        } else {
            echo "Nhập sai!";
        }
    }
    ?>
</body>

</html>