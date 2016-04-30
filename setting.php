<?php

include_once('check_session.php');
include_once('connectToDB.php');

if(!isset($_COOKIE['limit']) ) {
    setcookie("limit", 10);//initial value
    //the cookies need the page to be refreshed to be able to use it
    header("location: setting.php");
}

if(isset($_POST["btnSetlimit"]) ) {
    setcookie("limit", $_POST['limitValue']);
    echo "enter  isset<br>";
    header("location: setting.php");
}
?>
<html>
<head>

</head>
<body>
<?php include_once 'header_and_nav.php'; ?>
<div class="PageTitle">Setting</div>

<!--to set cookies-->
<form action="setting.php" method="post">
    <fieldset>
        <legend>Set task limit</legend>
    <label>limit for daily tasks</label>
    <input type="text"  name="limitValue" value="<?php echo $_COOKIE['limit'];?>">
    <input type="submit" name="btnSetlimit">
    </fieldset>
</form>

<!--update information-->
<form action="signed_up_successfully.php"  method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Update personal Info</legend>
    <p>
        <label for="name" >Name:</label><br>
        <input type="text"  name="name" id="name" placeholder="Name" >
    </p>

    <p>
        <!--which is the email-->
        <label  for="username" >userName(Email):</label><br>
        <input type="text"  name="username" id="username" placeholder="Email" >
    </p>

    <p>
        <label for="password" >Password:</label><br>
        <input type="password"  name="password" id="password" placeholder="Password" >
    </p>

    <p>
        <label for="pic" >image:</label><br>
        <input type="file"  name="pic" id="pic" >
    </p>

    <p>
        <input type="submit" value="update Info" name="submit">
    </p>
    </fieldset>
</form>


<?php include_once('endOfPage.php')?>
</body>
</html>