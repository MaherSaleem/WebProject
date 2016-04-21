<?php
    session_start();

    //if the session is not exist , we return to login page
    if(!isset($_SESSION['name'])){
        header("location: login.php");
    }
?>
<html>
<head>

</head>
<body>

    <?php

     echo $_SESSION['name'] . "  ";
     echo $_SESSION['password'];
    ?>

    <a href="logout.php">Logout </a>

</body>
</html>