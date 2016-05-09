<?php

include_once('check_session.php');
include_once('connectToDB.php');
?>
<html>
<body>
<?php include_once 'header_and_nav.php'; ?>


<div class="PageTitle">Late Tasks</div>

<?php printTasksbyStatus("t_status = 'LATE'")?>

<?php include_once('endOfPage.php')?>
</body>
<script>
    document.getElementsByClassName("nav_elm")[3].style.backgroundColor = "#71b874" ;
</script>
</html>