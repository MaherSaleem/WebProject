<?php

include_once('check_session.php');
include_once('connectToDB.php');
?>
<html>
<?php include_once 'header_and_nav.php'; ?>
<div class="PageTitle">Pending Tasks</div>

<?php printTasksbyStatus("t_status = 'pending'")?>

<br>
<?php include_once('endOfPage.php')?>
</body>

<script>
    document.getElementsByClassName("nav_elm")[4].style.backgroundColor = "#71b874" ;
</script>
</html>