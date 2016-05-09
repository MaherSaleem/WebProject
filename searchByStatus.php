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
        $myId = $_SESSION['mid'];
        $sql = "SELECT * from task , member where t_to = $myId and  t_from = mid and t_status = '$stat' ";
        printTasksbySql($sql);
    }
?>

<?php include_once('endOfPage.php')?>
<script>
    document.getElementsByClassName("nav_elm")[2].style.backgroundColor = "#71b874" ;
</script>
</body>
</html>