<?php
// $db = mysql_connect("web1130258.studentswebprojects.ritaj.ps", "Maher", "maher123")
// or die("can't connect to Data base " . mysql_errno());
// mysql_select_db("project_1130258", $db)
// or die("Could not find database: " . mysql_error());


define("VERBOSE", false );
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
        echo "<a  id=\"leftArrow\" href='$prevLink'>&#8678;</a>";
    echo "<a id='rightArrow' href='$nextLink'>&#8680;</a>"    ;
}
function printTasksbyStatus2($status)
{

    //printing tables of tasks

    $myId = $_SESSION['mid'];
    //statement to get my tasks
    $sql = "SELECT * from task , member where t_to = $myId and  t_from = mid and $status ";
    if (VERBOSE)
        echo $sql;
    $result_Set = mysql_query($sql) or die("error :" . mysql_error());



    if (mysql_num_rows($result_Set) == 0) {
        echo "no task found !";

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

            $status_ = $row['t_status'];
            $taskId = $row['t_id'];
            if($status_ == 'PENDING')
                echo "<tr class='pending_task'>";
            elseif($status_ == 'ACTIVE')
                echo "<tr class='active_task'>";
            elseif($status_ == 'FINISHED')
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


            $status_ = $row['t_status'];
            if($status_ != 'LATE') {
                echo "<td><select name='$taskId' size=1 >\n";
                echo $status_ == "PENDING" ? "<option selected>PENDING</option>\n" : "<option >PENDING</option>\n";
                echo $status_ == "ACTIVE" ? "<option selected>ACTIVE</option>\n" : "<option >ACTIVE</option>\n";
                echo $status_ == "FINISHED" ? "<option selected>FINISHED</option>\n" : "<option >FINISHED</option>\n";
                echo "</select></td>\n";
                echo "</tr>";
            }
            else //its late
            {
                echo "<td>LATE</td>";
            }
        }
        echo "</table>";
        echo "<input class='updateStatus' type=\"submit\" name=\"submit\" value=\"update Statuses\" >";
        echo "</form>";

    }
}
function printTasksbyCondition($condition)
{


    $myId = $_SESSION['mid'];
    //statement to get my tasks
    $sql = "SELECT * from task , member where $condition and t_from = mid ORDER by t_due_date DESC ";
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

            $status_ = $row['t_status'];
//            $taskId = $row['t_id'];
            if($status_ == 'PENDING')
                echo "<tr class='pending_task'>";
            elseif($status_ == 'ACTIVE')
                echo "<tr class='active_task'>";
            elseif($status_ == 'FINISHED')
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


            echo "<td>" . $row['t_status'] . "</td> ";
            echo "</tr>";

        }
        echo "</table>";
    }
}
function setLateTasks(){
    $mid = $_SESSION['mid'];
    $sql = "UPDATE task SET t_status='LATE'
              WHERE CURRENT_DATE() > t_due_date and t_to = $mid and task.t_status <> 'FINISHED' ";
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