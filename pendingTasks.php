<?php

include_once('check_session.php');
include_once('connectToDB.php');
?>
<html>
<head>

</head>
<body>
<?php include_once 'header_and_nav.php'; ?>
<div class="PageTitle">Pending Tasks</div>

<?php printTasksbyStatus("t_status = 'pending'")?>

<br>
<?php include_once('endOfPage.php')?>
</body>
</html>