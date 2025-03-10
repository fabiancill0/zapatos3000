<?php
session_start();
if (isset($_POST['submit'])) {
    $user = $_POST['new_name'];
    $lname = $_POST['new_lname'];
    $mail = $_POST['new_mail'];
    $pass = $_POST['new_pass'];
    $username = strtolower($user[0] . $lname);
    $connection = mysqli_connect('', 'root', '', 'cftcenco');
    if ($connection) {
        $query = "INSERT INTO zapatos_3k_admin(username,name,lastname,mail,password) VALUES ('$username','$user','$lname','$mail','$pass')";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $_SESSION['status'] = 3;
            header("Location: login.php");
        } else {
            $_SESSION['status'] = 4;
            header("Location: register.php");
        }
    } else {
        $_SESSION['status'] = 2;
        header("Location: register.php");
    }
} else {
    session_unset();
    session_destroy();
    header("Location: login.php");
}
