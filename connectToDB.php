<?php


define("VERBOSE", false);
$db = mysql_connect("localhost", "root", "")
or die("can't connect to Data base " . mysql_errno());

mysql_select_db("webproject", $db)
or die("Could not find database: " . mysql_error());

function printTasksbyStatus($status)
{

    //printing tables of tasks
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
    $sql = "SELECT t_title , t_start_date , t_due_date , t_priority ,\n"
        . " t_from , t_status from task where t_to = $myId and $status";
    if (VERBOSE)
        echo $sql;
    $result_Set = mysql_query($sql);


    //    TODO fix the format of printing

    //printing the tasks
    while ($row = mysql_fetch_array($result_Set)) {
        echo "<tr>";
        echo "<td>" . $row['t_title'] . "</td> ";
        echo "<td>" . $row['t_start_date'] . "</td> ";
        echo "<td>" . $row['t_due_date'] . "</td> ";
        echo "<td>" . $row['t_priority'] . "</td> ";

        //statement to get the name of the sender
        $sql = "SELECT name from member where mid = " . $row['t_from'];
        if (VERBOSE)
            echo $sql;
        $senderName = mysql_fetch_array((mysql_query($sql)))['name'];
        echo "<td>" . "$senderName" . "</td> ";


        echo "<td>" . $row['t_status'] . "</td> ";
        echo "</tr>";

    }
    echo "</table>";
}
?>