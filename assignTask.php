<?php
        include("check_session.php");
        include_once("connectToDB.php");
?>

<html>
<head>
</head>
<body>
<?php include_once("header_and_nav.php");?>
<div class="PageTitle">New Task</div>

<table border="1">
            <?php

            $query = "SELECT * FROM member";
            if (VERBOSE)
                echo $query;
            $resultSet = mysql_query($query);
            while ($row = mysql_fetch_array($resultSet)) {
                echo "<tr>";
                // echo "<form method='post' action='CreateTask.php'>";
                $mid = $row['mid'];
                echo "<td>$mid</td>"; // user id
                echo "<td>" . $row['name'] . "</td>"; // user name
                $pic_Path = $row['pic_path'];
                echo "<td>". "<img class='smallImage' src='$pic_Path' >" . "</td>"; // user pic
                // echo "<input type='hidden' name='receiverId' value='$mid'>";
                // echo "<input type='submit' name='submit' value='send Task'>";
                echo  "<td>". "<a href='CreateTask.php?receiverId=$mid'>send Task</a>" . "</td>";//store the id of the receiver at $_GET['receiverId']
                // echo "</form>";
                echo "</tr>";
                echo "\n";

            }
            ?>
    </table>
    <?php include_once('endOfPage.php')?>

</body>
</html>