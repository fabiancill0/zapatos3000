<?php
session_start();
date_default_timezone_set('America/Santiago');
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $connection = mysqli_connect('', 'root', '', 'cftcenco');
    if ($connection) {
        $query = "DELETE FROM zapatos_3k_tasks WHERE id='$id'";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $_SESSION['status_task'] = 4;
            header("Location: home.php");
        } else {
            $_SESSION['status_task'] = 2;
            header("Location: home.php");
        }
    } else {
        $_SESSION['status_task'] = 3;
        header("Location: home.php");
    }
}
