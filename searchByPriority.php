<?php

include_once('check_session.php');
include_once('connectToDB.php');
?>
<html>
<head>

</head>
<body>
<?php include_once 'header_and_nav.php'; ?>

<div class="PageTitle">Search by Priority</div>

<p>please select the priority</p>
<ul>
    <a href="searchByPriority.php?priority=1"><li  >1</li></a>
    <a href="searchByPriority.php?priority=2"><li  >2</li></a>
    <a href="searchByPriority.php?priority=3"><li  >3</li></a>

</ul>

<?php
    if(isset($_GET['priority'])){
        //printing tables of tasks

        echo "<h3>Tasks with priorty " . $_GET['priority'] . "</h3>";
        $myId = $_SESSION['mid'];
        //statement to get my tasks
        $sql = "SELECT name , t_title , t_start_date , t_due_date , t_priority ,\n"
            . " t_from , t_status from task t , member m where t_to = $myId
            and t_to = mid and t_priority = " . $_GET['priority'];
        if (VERBOSE)
            echo $sql;
        $result_Set = mysql_query($sql) or die("error : ".mysql_error());


        //    TODO fix the format of printing

        if(mysql_num_rows($result_Set) == 0){
            echo "no task found with priority " . $_GET['priority'];

        }
        else{
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

                echo "<td>" . $row['name'] . "</td> ";


                echo "<td>" . $row['t_status'] . "</td> ";
                echo "</tr>";

            }
            echo "</table>";
        }
    }
?>

<?php include_once('endOfPage.php')?>
</body>
</html>