<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php

include_once('connectToDB.php');

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sqlCheckIfExist = "select * from member WHERE username='$username'";
    $result = mysql_query($sqlCheckIfExist) or die(mysql_error());
    if (mysql_num_rows($result) > 0)
        header("location: signUp.php?email='exist'");
    else {
        $insertSqlSt = "INSERT INTO `member` (`mid`, `name`, `username`,
                    `password`, `pic_path`, `date`) VALUES" .
            "(NULL, '$name', '$username', '$password', NULL, CURRENT_DATE())";

        if (VERBOSE)
            echo $insertSqlSt . "<br>";

        mysql_query($insertSqlSt) or die("not added successfully" . mysql_error());
        $currentId = mysql_insert_id();
        $updatePathSt = "UPDATE `member` SET `pic_path` = 'img/$currentId.jpg' WHERE `member`.`mid` = $currentId";
        mysql_query($updatePathSt) or die("error with updating path " . mysql_error());
        if (VERBOSE)
            echo $updatePathSt . "<br>";

        //    TODO uncomment this block to allow uploding images
        $pic_temp = $_FILES['pic']['tmp_name'];
        if (is_uploaded_file($pic_temp))
            if (move_uploaded_file($pic_temp, "img/$currentId.jpg")) ;;


        echo "<h1>you are added succsessfully <br> welcome to the website</h1>";

    }
}
?>
<p> return to <a href="login.php">login page</a></p>

</body>
</html>