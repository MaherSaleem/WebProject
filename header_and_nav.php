<head>
    <link href="commonCSS3.css" rel="stylesheet" type="text/css">
<body>



    <div id="head">
        <div style="float: left" ><img id="myImage" src="<?php echo  $_SESSION['pic_path'];?>" alt="Maher photo"></div>
        <div id="TextInHeader">
            <span id="MyName""><?php echo  $_SESSION['name'];?><br></span>
            <a href="logout.php">Logout </a>
        </div>
    </div>
    <div id="nav">
        <div id="nag_content" >
            <ul>
                <a href="main_page.php"><li class="nav_elm" >Home page</li></a>
                <a href="assignTask.php"><li class="nav_elm" >Add new Task</li></a>
                <a href="search.php"><li class="nav_elm" >search page</li></a>
                <a href="lateTasks.php"><li class="nav_elm" >late tasks</li></a>
                <a href="pendingTasks.php"><li class="nav_elm" >pending tasks</li></a>
                <a href="activeTasks.php"><li class="nav_elm" >active tasks</li></a>

            </ul>
        </div>
    </div>

    <div id="disp">
        <div class="TextInsideDisp">