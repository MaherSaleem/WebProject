<?php

include_once('check_session.php');
include_once('connectToDB.php');
?>
<html>
<head>

</head>
<body>
<?php include_once 'header_and_nav.php'; ?>

<div class="PageTitle">Search by Name</div>


<form method="get" action="searchByName.php">
    <label>Name to search for</label>
    <input class="textBox" type="text" name="NameSearchFor">
    <input class="beautyButton" type="submit" name="submit">
</form>

<?php


//after the user choose a person
if(isset($_GET['id'])){
    $idSearchFor = $_GET['id'];
    $name = $_GET['name'];
    $img = $_GET['path'];
    echo "<h3>$name Tasks</h3>";
    echo "<img class='meduimImage' src='$img'>";
    echo "<br>";

    printTasksbyCondition("t_to = $idSearchFor and t_status = ( 'ACTIVE' or 'PENDING' OR 'LATE' or 'FINISHED') and t_from = mid ");
}

// search for a user
else if(isset($_GET['submit'])){
    //printing tables of tasks

    $myId = $_SESSION['mid'];


    //statement to serch by name
    $sql = "SELECT mid ,  name , pic_path from member where member.name LIKE
    '%" . $_GET['NameSearchFor'] . "%' ";

    if(VERBOSE)
        echo $sql;
    $result_Set = mysql_query($sql) or die("error : ".mysql_error());


    //    TODO fix the format of printing

    if(mysql_num_rows($result_Set) == 0){
        echo "no body found with the name " . $_GET['NameSearchFor'];

    }
    else{
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>image</th>";
        echo "</tr>";
        //printing the tasks
        while ($row = mysql_fetch_array($result_Set)) {
            echo "<tr>";
            $id = $row['mid'];
            $img_path = $row['pic_path'];
            $name = $row['name'];
            echo "<td><a href='searchByName.php?id=$id&name=$name&path=$img_path'>" . $row['name'] . "</a></td> ";
            echo "<td><img class='smallImage' src='$img_path'></td> ";
            echo "</tr>";

        }
        echo "</table>";
    }
}
?>

<?php include_once('endOfPage.php')?>
</body>
</html>