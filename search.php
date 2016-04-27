<?php

include_once('check_session.php');
include_once('connectToDB.php');
?>
<html>
<head>

</head>
<body>
<?php
    include_once 'header_and_nav.php';
    if(isset($_POST['submit']))
        $choice = $_POST['searchBy'];
?>
    <form action="search.php?priority=0" method="post" >
        <label>search by</label></br>
        <select name="searchBy">
            <option <?php if(isset($_POST['submit']) && $choice==1 ) echo "selected";?> value="1">other members Name</option>
            <option <?php if(isset($_POST['submit']) && $choice==2 ) echo "selected";?> value="2">Priority</option>
            <option <?php if(isset($_POST['submit']) && $choice==3 ) echo "selected";?> value="3">date</option>
            <option <?php if(isset($_POST['submit']) && $choice==4 ) echo "selected";?> value="4">status</option>

        </select>
        <?php
            if(isset($_POST['submit']))
            {
                $mid = $_SESSION['mid'];
                if($_POST['searchBy'] ==1){// search by name

                }
                else if($_POST['searchBy'] ==2){// search by priority
                    echo "Priority";
                    echo "<select name='priority'>
                            <option value=\"0\">----</option>
                            <option value=\"1\">1</option>
                            <option value=\"2\">2</option>
                            <option value=\"3\">3</option>
                        </select>" ;
                    if(  $_GET['priority'] != 0 &&  $_POST['priority'] != 0){
                        $priorityChoosed = $_POST['priority'];
                        $sql = "SELECT * FROM `task` WHERE t_priority = $priorityChoosed and t_to = 1";
//                        mysql_query($sql) or die('cant fetch data');
                        printAnyTable($sql);
                    }
                }
                else if($_POST['searchBy'] ==3){//search by date

                }
                else if($_POST['searchBy'] ==4){//search by status
                   echo "<select name='status'>
                            <option value=\"1\">Pending</option>
                            <option value=\"2\">active</option>
                            <option value=\"3\">finished</option>
                            <option value=\"4\">late</option>
                        </select>" ;
                }
            }
        ?>
        <br>
        <input type="submit" name="submit" id="submit">
    </form>
<?php include_once('endOfPage.php')?>
</body>
</html>