<?php

include_once('check_session.php');
include_once('connectToDB.php');
?>
<html>
<head>

</head>
<body>
<?php include_once 'header_and_nav.php'; ?>
<?php //TODO printTasksbyStatus("t_status = ('Active' or 'PENDING' or 'finished')");?>
<form method="post" action="update_statuses.php">
    <?php
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Task Title</th>";
    echo "<th>Start Date</th>";
    echo "<th>Due Date</th>";
    echo "<th>Priority</th>";
    echo "<th>From</th>";
    echo "<th>status</th>";
    echo "</tr>";

    $myId = $_SESSION['mid'];
    //statement to get my tasks
    $sql = "SELECT t_id ,  t_title , t_start_date , t_due_date , t_priority ,\n"
        . " t_from , t_status from task where t_to = $myId  and  t_status = ('Active' or 'PENDING' or 'finished')";
    if (VERBOSE)
        echo $sql;
    $result_Set = mysql_query($sql);
    //    TODO fix the format of printing

    //printing the tasks
    while ($row = mysql_fetch_array($result_Set )) {
        $taskId = $row['t_id'];
        echo "<tr>";
        echo "<td>" . $row['t_title'] . "</td> ";
        echo "<td>" . $row['t_start_date'] . "</td> ";
        echo "<td>" . $row['t_due_date'] . "</td> ";
        echo "<td>" . $row['t_priority'] . "</td> ";

        //statement to get the name of the sender
        $sql = "SELECT name from member where mid = " . $row['t_from'] ;
        if (VERBOSE)
            echo $sql;
        $senderName = mysql_fetch_array((mysql_query($sql)))['name'];
        $status = $row['t_status'];
        echo "<td>" . "$senderName" . "</td> ";


        echo "<td><select name='$taskId' size=1 >\n";
        echo $status == "PENDING" ?  "<option selected>PENDING</option>\n" : "<option >PENDING</option>\n";
        echo $status == "ACTIVE" ?  "<option selected>ACTIVE</option>\n" : "<option >ACTIVE</option>\n";
        echo $status == "FINISHED" ?  "<option selected>FINISHED</option>\n" : "<option >FINISHED</option>\n";
        echo "</select></td>\n";
//        echo "<td>" . $row['t_status'] . "</td> ";

        echo "</tr>\n";
    }
    echo "</table>";
    ?>
    <input type="submit" name="submit" value="update Statuses" >
</form>
<?php include_once('endOfPage.php')?>
</body>
</html>