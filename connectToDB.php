<?php


define("VERBOSE", false);
$db = mysql_connect("localhost", "root", "")
or die("can't connect to Data base " . mysql_errno());

mysql_select_db("webproject", $db)
or die("Could not find database: " . mysql_error());

function printTasksbyStatus($status)
{

    //printing tables of tasks

    $myId = $_SESSION['mid'];
    //statement to get my tasks
    $sql = "SELECT name,  t_title , t_start_date , t_due_date , t_priority ,\n"
        . " t_from , t_status from task , member where t_to = $myId and $status and t_to = mid";
    if (VERBOSE)
        echo $sql;
    $result_Set = mysql_query($sql) or die("error :" . mysql_error());



    if (mysql_num_rows($result_Set) == 0) {
        echo "no task found !";

    }
    else {

        echo "<table border='1'>";
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
            echo "<tr>";
            echo "<td>" . $row['t_title'] . "</td> ";
            echo "<td>" . $row['t_start_date'] . "</td> ";
            echo "<td>" . $row['t_due_date'] . "</td> ";
            echo "<td>" . $row['t_priority'] . "</td> ";


            $senderName = $row['name'];
            echo "<td>" . "$senderName" . "</td> ";


            echo "<td>" . $row['t_status'] . "</td> ";
            echo "</tr>";

        }
        echo "</table>";
    }
}
function printTasksbyCondition($condition)
{


    $myId = $_SESSION['mid'];
    //statement to get my tasks
    $sql = "SELECT name, t_title , t_start_date , t_due_date , t_priority ,\n"
        . " t_from , t_status from task , member where $condition and t_to = mid";
    if (VERBOSE)
        echo $sql;
    $result_Set = mysql_query($sql) or die("error :" . mysql_error());


    if (mysql_num_rows($result_Set) == 0) {
        echo "no task found !";

    }
    else {
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
        //printing the tasks
        while ($row = mysql_fetch_array($result_Set)) {
            echo "<tr>";
            echo "<td>" . $row['t_title'] . "</td> ";
            echo "<td>" . $row['t_start_date'] . "</td> ";
            echo "<td>" . $row['t_due_date'] . "</td> ";
            echo "<td>" . $row['t_priority'] . "</td> ";


            $senderName = $row['name'];
            echo "<td>" . "$senderName" . "</td> ";


            echo "<td>" . $row['t_status'] . "</td> ";
            echo "</tr>";

        }
        echo "</table>";
    }
}
function setLateTasks(){
    $mid = $_SESSION['mid'];
    $sql = "UPDATE task SET t_status='LATE'
              WHERE CURRENT_DATE() > t_due_date and t_to = $mid";
    if(VERBOSE)
        echo $sql;

    mysql_query($sql) or die ('cant set late statuses');

}

function printAnyTable($sql){
    $result_Set = mysql_query($sql) or die ("cant print the talbe");

    echo "<table border='1'>";
    while ($row = mysql_fetch_row($result_Set)) {
        echo "<tr>";
        foreach($row as $value){
            echo "<td>$value</td>";
        }
        echo "</tr>";

    }
    echo "</table>";
}
?>