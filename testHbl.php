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

<?php
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

             printTasksbyStatus ("t_status = 'pending' limit $startIndex , $limit");
?>

<br>


<?php
    if($startIndex > 0)
        echo "<a  href='$prevLink'>&#8678;</a>";
    echo "<a  href='$nextLink'>&#8680;</a>"    ;
?>
<?php include_once('endOfPage.php')?>
</body>
</html>