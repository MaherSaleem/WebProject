<?php

include_once('check_session.php');
include_once('connectToDB.php');
?>
<html>
<head>

</head>
<body>
<?php include_once 'header_and_nav.php'; ?>

<?php printTasksbyStatus("t_status = 'pending'")?>

<?php include_once('endOfPage.php')?>
</body>
</html>