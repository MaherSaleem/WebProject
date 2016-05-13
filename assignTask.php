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

<table border="1" style="width: 50%;margin: auto">
            <?php

            $query = "SELECT * FROM member";
            if (VERBOSE)
                echo $query;
            $resultSet = mysql_query($query);
            while ($row = mysql_fetch_array($resultSet)) {
                echo "<tr style='text-align: left'>";
                // echo "<form method='post' action='CreateTask.php'>";
                $mid = $row['mid'];
                $pic_Path = $row['pic_path'];
                echo "<td>" ."<img class='smallImage' src='$pic_Path' >"  . " "; // user name
                echo  $row['name'] . "</td>"; // user pic
                echo  "<td>". "<a href='CreateTask.php?receiverId=$mid'>send Task</a>" . "</td>";//store the id of the receiver at $_GET['receiverId']
                // echo "</form>";
                echo "</tr>";
                echo "\n";

            }
            ?>
    </table>
    <?php include_once('endOfPage.php')?>
    <script>
        document.getElementsByClassName("nav_elm")[1].style.backgroundColor = "#71b874" ;
    </script>
</body>
</html>