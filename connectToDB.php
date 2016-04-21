<?php


    define("VERBOSE" , true);
    $db = mysql_connect("localhost" , "root" , "")
        or die("can't connect to Data base " . mysql_errno());

    mysql_select_db("webproject" , $db)
        or die("Could not find database: " . mysql_error());

?>