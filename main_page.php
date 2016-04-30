<?php

include_once('check_session.php');
include_once('connectToDB.php');


// give inital value for the cookies
if(!isset($_COOKIE['limit']) ) {
    setcookie("limit", 10);//initial value
    header("location: main_page.php");//refresh to make the cookies take effect

}

setLateTasks(); // to check late take and set them late in the db
?>
<html>
<head>

</head>
<body>
<?php include_once 'header_and_nav.php'; ?>
<div class="PageTitle">Home Page</div>

<?php //TODO printTasksbyStatus("t_status = ('Active' or 'PENDING' or 'finished')");?>

<?php
    $myId = $_SESSION['mid'];

    //statement to get my tasks
    $sql = "SELECT name  , mid ,pic_path , t_id ,  t_title , t_start_date , t_due_date , t_priority ,\n"
        . " t_from , t_status from task , member where t_from = mid and  t_to = $myId  and  t_status = ('Active' or 'PENDING' or 'finished')";
    if (count($_COOKIE) > 0) // check the user enable the cookies
        $sql = $sql . " limit ". $_COOKIE['limit'];
    if (VERBOSE)
        echo $sql;
    $result_Set = mysql_query($sql);
?>


<!--to update statuses-->
<form method="post" action="update_statuses.php">
    <table border='1'>
    <tr>
    <th>Task Title</th>
    <th>Start Date</th>
    <th>Due Date</th>
    <th>Priority</th>
    <th>From</th>
    <th>status</th>
    </tr>
<?php
    //    TODO fix the format of printing

    //printing the tasks
    while ($row = mysql_fetch_array($result_Set )) {
        $status = $row['t_status'];
        $taskId = $row['t_id'];
        if($status == 'PENDING')
            echo "<tr class='pending_task'>";
        elseif($status == 'ACTIVE')
            echo "<tr class='active_task'>";
        elseif($status == 'FINISHED')
            echo "<tr class='finished_task'>";
        else
            echo "<tr class='Late_task'>";

        echo "<td>" . $row['t_title'] . "</td> ";
        echo "<td>" . $row['t_start_date'] . "</td> ";
        echo "<td>" . $row['t_due_date'] . "</td> ";
        echo "<td>" . $row['t_priority'] . "</td> ";


        $id = $row['mid'];
        $img_path = $row['pic_path'];
        $name = $row['name'];
        echo "<td><a href='searchByName.php?id=$id&name=$name&path=$img_path'>" . "$name" . "</a></td> ";

        if($status != 'LATE') {
            echo "<td><select name='$taskId' size=1 >\n";
            echo $status == "PENDING" ? "<option selected>PENDING</option>\n" : "<option >PENDING</option>\n";
            echo $status == "ACTIVE" ? "<option selected>ACTIVE</option>\n" : "<option >ACTIVE</option>\n";
            echo $status == "FINISHED" ? "<option selected>FINISHED</option>\n" : "<option >FINISHED</option>\n";
            echo "</select></td>\n";
//        echo "<td>" . $row['t_status'] . "</td> ";

            echo "</tr>\n";
        }
        else // late
        {
            echo "<td>LATE</td>";
        }

    }
    echo "</table>";
    ?>
    <input type="submit" name="submit" value="update Statuses" >

</form>
<?php include_once('endOfPage.php')?>
</body>
</html>