<html>
<head>

</head>
<body>

<?php

$pic = $_SESSION['pic_path'];
echo "<img width='100px' height='100px' src='$pic'>";
echo $_SESSION['name'] . "  ";
echo $_SESSION['mid'];
?>

<a href="logout.php">Logout </a>

<ul>
    <li><a href="main_page.php">Home page</a></li>
    <li><a href="assignTask.php">Add new Task</a></li>
    <li><a >search page</a></li>
    <li><a >late tasks</a></li>
    <li><a>pending tasks</a></li>
    <li><a >active task</a></li>
</ul>
</body>
</html>