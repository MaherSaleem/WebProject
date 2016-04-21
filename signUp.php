
<!--Sign up form 20-4-2016 -->
<html>

<head>

</head>

<body>
    <?php
        include_once('connectToDB.php');


    ?>
    <h1>Sign up page</h1>
    <form action="signed_up_successfully.php"  method="post" enctype="multipart/form-data">

        <p>
        <label for="name" >Name:</label>
        <input type="text"  name="name" id="name" placeholder="Name" >
        </p>

        <p>
            <!--which is the email-->
            <label for="username" >userName(Email):</label>
            <input type="text"  name="username" id="username" placeholder="Email" >
        </p>

        <p>
            <label for="password" >Password:</label>
            <input type="password"  name="password" id="password" placeholder="Password" >
        </p>

        <p>
            <label for="pic" >image:</label>
            <input type="file"  name="pic" id="pic" >
        </p>

        <p>
            <input type="submit" value="register" name="submit">
        </p>
    </form>



</body>
</html>
