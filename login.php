<?php
	$foundFlag = true;
    session_start();
    include_once("connectToDB.php");

    //if the user is logged in
    if(isset($_SESSION['mid']))
        header("location: main_page.php");

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $foundFlag - true;
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
            $_SESSION['pic_path'] = $arrUserInfo['pic_path'];

            header("location: main_page.php");//redirection to main page
        }
        else
        	$foundFlag = false;
    }
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="commonCSS3.css"/>

</head>
<body style="background-color: #333333">
    <form  class="login" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <div class="formDiv">
    <h1>Login page</h1>
    <hr>
        <p><label for="username">Email</label></p>
        <p><input  required type="text" name="username" placeholder="Email" id="username"></p>

        <p><label for="password">Password</label></p>
        <p><input required type="password" name="password" placeholder="password" id="password"></p>


        <p><input class="beautyButton2" type="submit" value="Login" name="submit">
        <a class="beautyButton2 " href="signUp.php">Register</a>
        </p>
        <?php if($foundFlag == false) echo "<div style='color: red;font-size: 20px;'>wrong userName or password</div>";?>
        </div>
    </form>




</body>
</html>