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

        $myId = $_SESSION['mid'];
        $condition = "t_to = $myId and t_from = mid and t_priority = " . $_GET['priority'] . " and t_from = mid";
        printTasksbyCondition($condition);
    }
?>

<?php include_once('endOfPage.php')?>
</body>
</html>