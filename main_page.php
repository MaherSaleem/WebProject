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
    <h3>Today Jobs</h3>
<?php //TODO printTasksbyStatus("t_status = ('Active' or 'PENDING' or 'finished')");?>

<?php
    $myId = $_SESSION['mid'];

    //statement to get my tasks
    $sql = "SELECT * from task , member where t_from = mid and
        t_to = $myId  and  t_status = ('Active' or 'PENDING' or 'finished') and Date(task.t_due_date) = CURRENT_DATE() ORDER by t_due_date DESC  ";
    if (count($_COOKIE) > 0) // check the user enable the cookies
        $sql = $sql . " limit ". $_COOKIE['limit'];
    if (VERBOSE)
        echo $sql;
    $result_Set = mysql_query($sql) or die("error :" .mysql_error());
?>


<!--to update statuses-->

<?php
    //    TODO fix the format of printing

    if (mysql_num_rows($result_Set) == 0) {
        echo "<h3>no jobs for today !<h3>";

    }
    else {
        echo "<form method=\"post\" action=\"update_statuses.php\">";
        echo "<table   border='1'>";
        echo "<tr>";
        echo "<th>Task Title</th>";
        echo "<th>Start Date</th>";
        echo "<th>Due Date</th>";
        echo "<th>Priority</th>";
        echo "<th>From</th>";
        echo "<th>status</th>";
        echo "</tr>";
        //printing the tasks
        while ($row = mysql_fetch_array($result_Set)) {
            $status = $row['t_status'];
            $taskId = $row['t_id'];
            $senderName = $row['name'];
            if ($status == 'PENDING')
                echo "<tr class='pending_task'>";
            elseif ($status == 'ACTIVE')
                echo "<tr class='active_task'>";
            elseif ($status == 'FINISHED')
                echo "<tr class='finished_task'>";
            else
                echo "<tr class='Late_task'>";

            echo "<td><a href='TaskFull.php?t_id=$taskId&senderName=$senderName'>" . $row['t_title'] . "</a></td>";
            echo "<td>" . $row['t_start_date'] . "</td> ";
            echo "<td>" . $row['t_due_date'] . "</td> ";
            echo "<td>" . $row['t_priority'] . "</td> ";


            $id = $row['mid'];
            $img_path = $row['pic_path'];
            echo "<td><a href='searchByName.php?id=$id&name=$senderName&path=$img_path'>" . "$senderName" . "</a></td> ";

            if ($status != 'LATE') {
                echo "<td><select name='$taskId' size=1 >\n";
                echo $status == "PENDING" ? "<option selected>PENDING</option>\n" : "<option >PENDING</option>\n";
                echo $status == "ACTIVE" ? "<option selected>ACTIVE</option>\n" : "<option >ACTIVE</option>\n";
                echo $status == "FINISHED" ? "<option selected>FINISHED</option>\n" : "<option >FINISHED</option>\n";
                echo "</select></td>\n";
//        echo "<td>" . $row['t_status'] . "</td> ";

                echo "</tr>\n";
            } else // late
            {
                echo "<td>LATE</td>";
            }

        }
        echo "</table>";
        echo "<input class=\"updateStatus\" type=\"submit\" name=\"submit\" value=\"update Statuses\" >";
        echo "</form>";
    }
    ?>

<?php include_once('endOfPage.php')?>

</body>
</html>