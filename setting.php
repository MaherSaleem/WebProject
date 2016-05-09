<?php

include_once('check_session.php');
include_once('connectToDB.php');
$mid = $_SESSION['mid'];
if(!isset($_COOKIE["limit$mid"]) ) {
    setcookie("limit$mid", 10);//initial value
    //the cookies need the page to be refreshed to be able to use it
    header("location: setting.php");
}


// set the limit value
if(isset($_POST["btnSetlimit"]) ) {
    setcookie("limit$mid", $_POST['limitValue']);
    echo "enter  isset<br>";
    header("location: setting.php");
}

//update information
if(isset($_POST['submit'])){
    $sql = "update member set";
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $email = $_POST['username'];
    $pic_temp = $_FILES['pic']['tmp_name'];
    $id = $_SESSION['mid'];
    if($_FILES['pic']['size'] > 0) // there is a new image
    {
        if(is_uploaded_file($pic_temp))
            if(move_uploaded_file($pic_temp , "img/$id.jpg"));
    }
    if($name != NULL){
        $_SESSION['name'] = $name;
    }
    $sqlGetInfo = "select * from member where mid = $id";
    $userInfo = mysql_fetch_array(mysql_query($sqlGetInfo));
    $sql = sprintf("update member set name='%s' ,
      password='%s' , username='%s' where mid=$id"
    ,   $name==NULL ? $userInfo['name'] : $name
    ,   $pass==NULL ? $userInfo['password'] : $pass
    ,  $email==NULL ? $userInfo['username'] : $email
        );


    if(VERBOSE)
        echo $sql;
    mysql_query($sql) or die("error : " . mysql_error());
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
    <label for="limitValue">limit for daily tasks</label>
    <input type="text"  name="limitValue" id="limitValue" value="<?php echo $_COOKIE["limit$mid"];?>">
    <input type="submit" name="btnSetlimit">
    </fieldset>
</form>

<!--update information-->
<form action="setting.php"  method="post" enctype="multipart/form-data">
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
<script>
    document.getElementsByClassName("nav_elm")[7].style.backgroundColor = "#71b874" ;
</script>
</body>
</html>