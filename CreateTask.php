<?php
include_once("check_session.php");
include_once("connectToDB.php");
?>

<html>

<?php include_once('header_and_nav.php')?>
<body>

    <?php
    if(isset($_POST['submit'])){
        $t_title = $_POST['Ttitle'];
        $t_des = $_POST['description'];
        $t_dueDate = $_POST['dueDate'];
        $t_priority = $_POST['priority'];
        $receiver_idd = $_POST['recevier_id'];
        $sender_id = $_SESSION['mid'];

        $sql = "INSERT INTO `task` (`t_id`, `t_title`, `t_desc`, `t_start_date`, `t_due_date`, `t_priority`,
     `t_to`, `t_from` , t_status) VALUES (NULL, '$t_title', '$t_des',
    NOW(), '$t_dueDate', '$t_priority ', '$receiver_idd', '$sender_id' , 'PENDING')";

        if(VERBOSE)
            echo $sql;
        mysql_query($sql) or die ("can't insert this task");

        //query to get messege email
        $sql = "select * from member where mid=$receiver_idd";
        $result= mysql_query($sql) ;
        $row =mysql_fetch_array($result );
        $receiverEmail =$row['username'];
//        sendMail($_SESSION['name'] ,$receiverEmail ); //TODO enable email
        header("location: assignTask.php");

    }
    ?>
    <h1>New Task</h1>
    <form method="post" action="CreateTask.php">
        <fieldset>
            <legend>New Task</legend>
        <p>Sender: <?php echo $_SESSION['name'] ?> </p>
        <?php
        // $receiver_Id = $_POST['receiverId'];
        $receiver_Id = $_GET['receiverId'];
        $receiverNameQuery = "SELECT name from member where mid = $receiver_Id  ";
        $result= mysql_query($receiverNameQuery) ;
        $row =mysql_fetch_array($result );
        $recevier_name =$row['name'];
        echo "<p> To : $recevier_name </p> ";
        ?>
        <label for="Ttitle"> Task Title</label> <br>
        <input class="textBox" type="text" name="Ttitle" id="Ttitle" placeholder="Task Ttitle " required><br>

        <label for="description"> Task description</label> <br>
        <textarea  id="description" name="description" rows="5" cols="30"></textarea><br>

        <label for="dueDate"> Due date</label> <br>
        <input class="textBox" type="datetime-local" name="dueDate" id="dueDate" required><br>

        <label for="prioriy"> Priority </label> <br>
        <select name="priority" id="prioriy" size="1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>

        <input type='hidden' name="recevier_id" value="<?php echo $_GET['receiverId']; ?>">

        <br>
        <input class="beautyButton" type="submit" name="submit" value="send Task">
            </fieldset>

    </form>
<?php include_once('endOfPage.php')?>
    <script>
        document.getElementsByClassName("nav_elm")[1].style.backgroundColor = "#71b874" ;
    </script>
</body>
</html>
