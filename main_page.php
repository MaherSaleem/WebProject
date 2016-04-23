<?php

    include_once ('check_session.php');
    include_once ('connectToDB.php');
?>
<html>
<head>

</head>
<body>

    <?php include_once 'header_and_nav.php';
    $myId = $_SESSION['mid'];
    $sql = "SELECT * FROM `task` where t_to = $myId ";

   $result_Set =  mysql_query($sql);


//    TODO fix the format of printing
    while($row = mysql_fetch_row($result_Set)){
        foreach ($row as $value)
            echo "$value  ";
        echo "<br>";
    }
    ?>
</body>
</html>