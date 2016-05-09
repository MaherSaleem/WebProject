
<!--Sign up form 20-4-2016 -->
<html>

<head>
    <link rel="stylesheet" type="text/css" href="commonCSS3.css"/>

</head>

<body>
    <?php
        include_once('connectToDB.php');


    ?>

    <form class="login" action="signed_up_successfully.php"  method="post" enctype="multipart/form-data">
        <div class="formDiv">
         <h1>Sign up page</h1>
            <hr>
        <p>
        <label  for="name" >Name:</label>
        <input required type="text"  name="name" id="name" placeholder="Name" >
        </p>

        <p>
            <!--which is the email-->
            <label for="username" >userName(Email):</label>
            <input  required type="text"  name="username" id="username" placeholder="Email" >
        </p>

        <p>
            <label for="password" >Password:</label>
            <input required type="password"  name="password" id="password" placeholder="Password" >
        </p>

        <p>
            <label for="pic" >image:</label>
            <input  type="file"  name="pic" id="pic" required >
        </p>

        <p>
            <input class="beautyButton" type="submit" value="register" name="submit">
            <a class="beautyButton otherColor" href="login.php">login</a>

        </p>
        </div>
    </form>



</body>
</html>
