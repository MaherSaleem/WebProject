<?php

include_once('check_session.php');
include_once('connectToDB.php');

    //the user try to access this page directly
    if(!isset($_GET['t_id'])){
        header("location: main_page.php");
    }
    $taskId= $_GET['t_id'];
    $sql = "select * from task WHERE t_id=$taskId";
    if(VERBOSE)
        echo $sql;
    $taskData = mysql_fetch_array(mysql_query($sql));
    $status = $taskData['t_status'];

?>
<html>
<head>

</head>
<body>
<?php include_once 'header_and_nav.php';?>
<div class="PageTitle">View Task</div>
<form method="post" action="update_statuses.php">
 <h1>Title : <?php echo $taskData['t_title'];?></h1>
 <h3>from : <?php echo $_GET['senderName'];?></h3>
<h5>Description  : <?php echo $taskData['t_desc'];?></h5>
<h5>start date : <?php echo $taskData['t_start_date'];?></h5>
<h5>due to : <?php echo $taskData['t_due_date'];?></h5>
<h5>Status : <?php

    if ($status != 'LATE') {
        echo "<td><select name='$taskId' size=1 >\n";
        echo $status == "PENDING" ? "<option selected>PENDING</option>\n" : "<option >PENDING</option>\n";
        echo $status == "ACTIVE" ? "<option selected>ACTIVE</option>\n" : "<option >ACTIVE</option>\n";
        echo $status == "FINISHED" ? "<option selected>FINISHED</option>\n" : "<option >FINISHED</option>\n";
        echo "</select></td>\n";
        echo "<input class=\"updateStatus\" type=\"submit\" name=\"submit\" value=\"update Statuses\" >";

    }
    else
        echo "Late";
    ?></h5>
</form>
<br>
<?php include_once('endOfPage.php')?>
</body>
</html>