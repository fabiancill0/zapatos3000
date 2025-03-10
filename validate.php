<?php
session_start();
if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $connection = mysqli_connect('', 'root', '', 'cftcenco');
    if ($connection) {
        $query = "SELECT * FROM zapatos_3k_admin WHERE username='$user' AND password='$pass'";
        $result = mysqli_query($connection, $query);
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['status'] = 0;
            $_SESSION['name'] = $row['name'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['username'] = $row['username'];
            header("Location: home.php");
        } else {
            $_SESSION['status'] = 1;
            header("Location: login.php");
        }
    } else {
        $_SESSION['status'] = 2;
        header("Location: login.php");
    }
} elseif (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
}
