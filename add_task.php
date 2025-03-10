<?php
session_start();
date_default_timezone_set('America/Santiago');
if (isset($_POST['add_task'])) {
    $user = $_SESSION['username'];
    $task = $_POST['task'];
    $hora = $_POST['datetask'];
    $min = $_POST['mintask'];
    if ($task == "") {
        $_SESSION['status_task'] = 5;
        header("Location: home.php");
        return;
    } elseif ($hora == 0 && $min == 0) {
        $_SESSION['status_task'] = 6;
        header("Location: home.php");
        return;
    }
    $user = $_SESSION['username'];
    $task = $_POST['task'];
    $start = new DateTime();
    $time = $start->format('Y-m-d H:i:s');
    $duration = $hora . 'H' . $min . 'M';
    $duration_task = $hora . ':' . $min;
    $start->add(new DateInterval('PT' . $duration));
    $end_time = $start->format('Y-m-d H:i:s');
    $connection = mysqli_connect('', 'root', '', 'cftcenco');
    if ($connection) {
        $query = "INSERT INTO zapatos_3k_tasks(created_by,title,start_time,duration,end_time) VALUES ('$user','$task','$time','$duration_task','$end_time')";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $_SESSION['status_task'] = 1;
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
