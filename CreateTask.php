<?php
include_once("check_session.php");
include_once("connectToDB.php");
?>

<html>
<head>
</head>
<body>
    <h1>New Task</h1>
    <!--    TODO change this # -->
    <form method="post" action="#">
        <p>Sender: <?php echo $_SESSION['name'] ?> </p>
        <?php
        // $receiver_Id = $_POST['receiverId'];
        $receiver_Id = $_GET['receiverId'];
        $receiverNameQuery = "SELECT name from member where mid = $receiver_Id  ";
        $recevier_name = mysql_fetch_row(mysql_query($receiverNameQuery))[0];
        echo "<p> To : $recevier_name </p> ";
        ?>
        <label for="Ttitle"> Task Title</label> <br>
        <input type="text" name=Ttitle" id="Ttitle" placeholder="Task Ttitle"><br>

        <label for="description"> Task description</label> <br>
        <textarea id="description" name="description" rows="5" cols="30"></textarea><br>

        <label for="Ttitle"> Start Date</label> <br>
        <input type="text" name=Ttitle" id="Ttitle" placeholder="Task Ttitle"><br>

        <label for="Ttitle"> Due date</label> <br>
        <input type="text" name=Ttitle" id="Ttitle" placeholder="Task Ttitle"><br>

        <label for="Ttitle"> Priority </label> <br>
        <select name="priority" size="1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>

        <hidden name="recevier_id" value="<?php echo $_POST['receiverId'] ?>">

        <br>
        <input type="submit" name="submut" value="send Task">

    </form>
</body>
</html>