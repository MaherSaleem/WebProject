<?php
    session_start();
    include_once("connectToDB.php");


    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];


        $queryCheckIfExist =
            "SELECT * FROM `member` WHERE username='$username' and password='$password'";
        if(VERBOSE)
            echo $queryCheckIfExist;

       $result =  mysql_query($queryCheckIfExist);
        if(mysql_num_rows($result) > 0) // we found the user
        {
            $arrUserInfo = mysql_fetch_array($result);
            $_SESSION['name'] = $arrUserInfo['name'];
            $_SESSION['mid'] = $arrUserInfo['mid'];

            header("location: main_page.php");//redirection to main page
        }
    }
?>
<html>
<head>

</head>
<body>


    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <p><label for="username">Name</label></p>
        <p><input type="text" name="username" placeholder="username" id="username"></p>

        <p><label for="password">Password</label></p>
        <p><input type="password" name="password" placeholder="password" id="password"></p>


        <p><input type="submit" value="log in" name="submit"></p>
    </form>


</body>
</html>