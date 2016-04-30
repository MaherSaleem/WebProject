<?php
// $db = mysql_connect("web1130258.studentswebprojects.ritaj.ps", "Maher", "maher123")
// or die("can't connect to Data base " . mysql_errno());
// mysql_select_db("project_1130258", $db)
// or die("Could not find database: " . mysql_error());


define("VERBOSE", false);
$db = mysql_connect("localhost", "root", "")
or die("can't connect to Data base " . mysql_errno());


mysql_select_db("webproject", $db)
or die("Could not find database: " . mysql_error());

function printTasksbyStatus($status)
{
    $pageName = $_SERVER['PHP_SELF'];
    $limit = $_COOKIE['limit'];
    if(!isset($_GET['startIndex'])){//first access to the page
        $startIndex=0;
    }
    else{
        $startIndex = $_GET['startIndex'];
    }
    $nextIndex = $startIndex + $limit;
    $nextLink = $pageName . "?startIndex=$nextIndex&next=1";
    $prevIndex = $startIndex - $limit;
    $prevLink = $pageName . "?startIndex=$prevIndex&prev=1";

    printTasksbyStatus2("$status limit $startIndex , $limit");
    echo "<br>";
    if($startIndex > 0)
        echo "<a  href='$prevLink'>&#8678;</a>";
    echo "<a  href='$nextLink'>&#8680;</a>"    ;
}
function printTasksbyStatus2($status)
{

    //printing tables of tasks

    $myId = $_SESSION['mid'];
    //statement to get my tasks
    $sql = "SELECT mid , pic_path , name,  t_title , t_start_date , t_due_date , t_priority ,\n"
        . " t_from , t_status from task , member where t_to = $myId and  t_from = mid and $status ";
    if (VERBOSE)
        echo $sql;
    $result_Set = mysql_query($sql) or die("error :" . mysql_error());



    if (mysql_num_rows($result_Set) == 0) {
        echo "no task found !";

    }
    else {

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
            echo "<tr>";
            echo "<td>" . $row['t_title'] . "</td> ";
            echo "<td>" . $row['t_start_date'] . "</td> ";
            echo "<td>" . $row['t_due_date'] . "</td> ";
            echo "<td>" . $row['t_priority'] . "</td> ";


            $id = $row['mid'];
            $img_path = $row['pic_path'];
            $name = $row['name'];
            echo "<td><a href='searchByName.php?id=$id&name=$name&path=$img_path'>" . "$name" . "</a></td> ";



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
    $sql = "SELECT  mid , pic_path , name, t_title , t_start_date , t_due_date , t_priority ,\n"
        . " t_from , t_status from task , member where $condition and t_from = mid";
    if (VERBOSE)
        echo $sql;
    $result_Set = mysql_query($sql) or die("error :" . mysql_error());


    if (mysql_num_rows($result_Set) == 0) {
        echo "no task found !";

    }
    else {
    //printing tables of tasks
    echo "<table  border='1'>";
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


            $id = $row['mid'];
            $img_path = $row['pic_path'];
            $name = $row['name'];
            echo "<td><a href='searchByName.php?id=$id&name=$name&path=$img_path'>" . "$name" . "</a></td> ";


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