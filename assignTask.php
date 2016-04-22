<?php
    include ("check_session.php");
?>

<html>
<head>
</head>
<body>
    <?php
        include_once ("header_and_nav.php");
        include_once ("connectToDB.php");

        $query = "SELECT * FROM member";
        if(VERBOSE)
            echo $query;
        $resultSet = mysql_query($query);
        while($row = mysql_fetch_array($resultSet)){
            echo "<form method='post' action='CreateTask.php'>";
            $mid = $row['mid'];
            echo $row['mid'];
            echo $row['name'];
            $pic_Path = $row['pic_path'];
            echo "<img width='40px' height='40px' src='$pic_Path' >";
            echo "<input type='hidden' name='receiverId' value='$mid'>"; //store the id of the receiver
            echo "<input type='submit' name='submit' value='send Task'>";
            echo "</form>";
            echo "\n";

        }
    ?>
</body>
</html>