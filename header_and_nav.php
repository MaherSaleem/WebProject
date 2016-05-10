<head>
    <link href="commonCSS3.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div id="head">
        <div style="float: left" ><img id="myImage" src="<?php echo  $_SESSION['pic_path'];?>" alt="Maher photo"></div>
        <div id="TextInHeader">
            <span id="MyName""><?php echo  $_SESSION['name'];?><br></span>
            <a class="head_items" href="aboutUs.php">about us</a>
            <a class="head_items" href="mailto:maher1130258@gmail.com">contact us </a>
            <a class="head_items" href="logout.php">Logout </a>

        </div>
    </div>
    <?php
        $mid = $_SESSION['mid'];
        $sql = "SELECT count(*) FROM task WHERE t_status = 'LATE' and t_to=$mid";
        $result= mysql_query($sql) ;
        $row =mysql_fetch_row($result );
        $lateNum =$row[0];
        $sql = "SELECT count(*) FROM task WHERE t_status = 'FINISHED' and t_to=$mid";
        $result= mysql_query($sql) ;
        $row =mysql_fetch_row($result );
        $finishedNum =$row[0];
        $sql = "SELECT count(*) FROM task WHERE t_status = 'PENDING' and t_to=$mid";
        $result= mysql_query($sql) ;
        $row =mysql_fetch_row($result );
        $PENDINGNum =$row[0];
        $sql = "SELECT count(*) FROM task WHERE t_status = 'ACTIVE' and t_to=$mid";
        $result= mysql_query($sql) ;
        $row =mysql_fetch_row($result );
        $ACTIVENum =$row[0];

    ?>

    <div id="nav">
        <div id="nag_content" >
            <ul>
                <a href="main_page.php"><li class="nav_elm" >Home page</li></a>
                <a href="assignTask.php"><li class="nav_elm" >new Task</li></a>
                <a href="search.php"><li class="nav_elm" >search page</li></a>
                <a href="lateTasks.php"><li class="nav_elm" >late tasks <?php echo "<span class='countTasks'>$lateNum</span>";?></li></a>
                <a href="pendingTasks.php"><li class="nav_elm" >pending tasks <?php echo "<span class='countTasks'>$PENDINGNum</span>";?></li></a>
                <a href="activeTasks.php"><li class="nav_elm" >active tasks <?php echo "<span class='countTasks'>$ACTIVENum</span>";?></li></a>
                <a href="finishedTasks.php"><li class="nav_elm" >finished tasks <?php echo "<span class='countTasks'>$finishedNum</span>";?></li></a>
                <a href="setting.php"><li class="nav_elm" >Setting</li></a>

            </ul>
        </div>
    </div>

    <div id="disp">
        <div class="TextInsideDisp">