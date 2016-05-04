<?php

include_once('check_session.php');
include_once('connectToDB.php');
?>
<html>
<head>

</head>
<body>
<?php include_once 'header_and_nav.php'; ?>

<div class="PageTitle">Search by Date</div>

<form method="get" action="searchByDate.php">

    <label for="from">from date</label><br>
    <input required class="textBox" type="datetime-local" name="from" value="<?php if(isset($_GET['submit']))  echo   $_GET['from'] ?>" ><br>
    <label for="from">to date</label><br>
    <input required class="textBox" type="datetime-local" name="to" value="<?php if(isset($_GET['submit']))  echo   $_GET['to'] ?>"  ><br>
    <input class="beautyButton" type="submit" name="submit">

</form>

<?php


//get tasks that theier due_date is in this range
    if(isset($_GET['submit'])){
        $mid = $_SESSION['mid'];
        $condition =" t_to = $mid  and t_due_date > '".$_GET['from'] . "' and t_due_date < '".$_GET['to'] ."' ";
        printTasksbyCondition($condition);
    }
?>

<?php include_once('endOfPage.php')?>
</body>
</html>