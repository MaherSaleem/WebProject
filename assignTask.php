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
            echo "<p>";
            echo $row['mid'];
            echo $row['name'];
            $pic_Path = $row['pic_path'];
            echo "<img width='40px' height='40px' src='$pic_Path' >";
            echo "<a href='#'>send task</a>";//TODO replace #
            echo "</p>";

        }
    ?>
</body>
</html>