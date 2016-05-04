<?php

include_once('check_session.php');
include_once('connectToDB.php');
?>
<html>
<head>

</head>
<body>
<?php include_once 'header_and_nav.php'; ?>

<div class="PageTitle">Search by Status</div>

<p>please select the priority</p>
<ul>
    <a href="searchByStatus.php?status=pending"><li  class="listAsButton" >Pending</li></a>
    <a href="searchByStatus.php?status=active"><li class="listAsButton" >Active</li></a>
    <a href="searchByStatus.php?status=finished"><li class="listAsButton" >Finished</li></a>
    <a href="searchByStatus.php?status=late"><li class="listAsButton" >Late</li></a>

</ul>
<?php
    if(isset($_GET['status'])){
     $stat = $_GET['status'];
        if($stat == "pending")
            printTasksbyStatus("t_status = 'pending'");
        else if($stat == "active")
            printTasksbyStatus("t_status = 'active'");
        else if($stat == "finished")
            printTasksbyStatus("t_status = 'finished'");
        else  if($stat == "late")
            printTasksbyStatus("t_status = 'late'");
    }
?>

<?php include_once('endOfPage.php')?>
</body>
</html>