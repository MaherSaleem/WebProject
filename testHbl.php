<html>
<head>
</head>
<body>
<head>
    <link href="commonCSS3.css" rel="stylesheet" type="text/css">

<body>


<div id="head">
    <div style="float: left"><img id="myImage" src="img/1.jpg" alt="Maher photo"></div>
    <div id="TextInHeader">
        <span id="MyName"">Maher Saleem<br></span>
        <a href="logout.php">Logout </a>
    </div>
</div>

<div id="nav">
    <div id="nag_content">
        <ul>
            <a href="main_page.php">
                <li class="nav_elm">Home page</li>
            </a>
            <a href="assignTask.php">
                <li class="nav_elm">Add new Task</li>
            </a>
            <a href="search.php">
                <li class="nav_elm">search page</li>
            </a>
            <a href="lateTasks.php">
                <li class="nav_elm">late tasks <span class='countTasks'>4</span></li>
            </a>
            <a href="pendingTasks.php">
                <li class="nav_elm">pending tasks <span class='countTasks'>0</span></li>
            </a>
            <a href="activeTasks.php">
                <li class="nav_elm">active tasks <span class='countTasks'>2</span></li>
            </a>
            <a href="finishedTasks.php">
                <li class="nav_elm">finished tasks <span class='countTasks'>3</span></li>
            </a>
            <a href="setting.php">
                <li class="nav_elm">Setting</li>
            </a>

        </ul>
    </div>
</div>

<div id="disp">
    <div class="TextInsideDisp">
        <div class="PageTitle">New Task</div>

        <table border="1">
            <tr>
                <td>1</td>
                <td>Maher Saleem</td>
                <td><img class='smallImage' src='img/1.jpg'></td>
                <td><a href='CreateTask.php?receiverId=1'>send Task</a></td>
                <br></tr>
            <tr>
                <td>2</td>
                <td>Sala Saleem</td>
                <td><img class='smallImage' src='img/2.jpg'></td>
                <td><a href='CreateTask.php?receiverId=2'>send Task</a></td>
                <br></tr>
            <tr>
                <td>3</td>
                <td>Naseem Saleem</td>
                <td><img class='smallImage' src='img/3.jpg'></td>
                <td><a href='CreateTask.php?receiverId=3'>send Task</a></td>
                <br></tr>
            <tr>
                <td>4</td>
                <td>Hala</td>
                <td><img class='smallImage' src='img/4.jpg'></td>
                <td><a href='CreateTask.php?receiverId=4'>send Task</a></td>
                <br></tr>
            <tr>
                <td>5</td>
                <td>saleem khdeir</td>
                <td><img class='smallImage' src='img/5.jpg'></td>
                <td><a href='CreateTask.php?receiverId=5'>send Task</a></td>
                <br></tr>
            <tr>
                <td>6</td>
                <td>Mohammed Sehweil</td>
                <td><img class='smallImage' src='img/6.jpg'></td>
                <td><a href='CreateTask.php?receiverId=6'>send Task</a></td>
                <br></tr>
            <tr>
                <td>7</td>
                <td>Ameer</td>
                <td><img class='smallImage' src='img/7.jpg'></td>
                <td><a href='CreateTask.php?receiverId=7'>send Task</a></td>
                /tr>
            <tr>
                <td>9</td>
                <td>Saloool</td>
                <td><img class='smallImage' src='img/9.jpg'></td>
                <td><a href='CreateTask.php?receiverId=9'>send Task</a></td>
                <br>
            </tr>
            <tr>
                <td>10</td>
                <td>1</td>
                <td><img class='smallImage' src='img/10.jpg'></td>
                <td><a href='CreateTask.php?receiverId=10'>send Task</a></td>
                <br>
            </tr>
        </table>
    </div>
</div>
</body>
</html>