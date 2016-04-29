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
?>
<div class="PageTitle">Search Page</div>

<?php
    if(isset($_POST['submit']))
        $choice = $_POST['searchBy'];
?>
    <form action="search.php?" method="post" >
        <label>search by</label></br>
        <select name="searchBy">
            <option  value="1">Name</option>
            <option  value="2">Priority</option>
            <option  value="3">date</option>
            <option  value="4">status</option>

        </select>
        <?php
            if(isset($_POST['submit']))
            {
                $mid = $_SESSION['mid'];
                if($_POST['searchBy'] ==1){// search by name
                    header("location: searchByName.php");

                }
                else if($_POST['searchBy'] ==2){// search by priority
                   header("location: searchByPriority.php");
                }
                else if($_POST['searchBy'] ==3){//search by date

                }
                else if($_POST['searchBy'] ==4){//search by status
                    header("location: searchByStatus.php");

                }
            }
        ?>
        <br>
        <input type="submit" name="submit" id="submit">
    </form>
<?php include_once('endOfPage.php')?>
</body>
</html>