<?php
    include_once  'connectToDB.php';

    unset($_POST['submit']);// to remove it from the list of statuses
    foreach ($_POST as $taskid=>$status){
        $sql ="UPDATE task SET  t_status = '$status' WHERE t_id=$taskid";
        mysql_query($sql);
    }

    $requestPage = $_SERVER['HTTP_REFERER']; // from where the request come
    header("location: $requestPage");
?>