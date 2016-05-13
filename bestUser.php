<?php

include_once('check_session.php');
include_once('connectToDB.php');
?>
<html>
<head>

</head>
<body>
<?php include_once 'header_and_nav.php'; ?>

<div class="PageTitle">Best user this month</div>


<?php

        $sumOfLates = "SELECT m.mid , m.pic_path , m.name , count(*) as sumOfLates FROM member m , task t where m.mid=t.t_to AND t.t_status='late'  and MONTH(t.t_due_date) = MONTH(now()) GROUP by m.mid";
        $sumOfFinished = "SELECT m.mid , m.pic_path , m.name , count(*) as sumOfFinished FROM member m , task t where m.mid=t.t_to AND t.t_status='finished'   and MONTH(t.t_due_date) = MONTH(now()) GROUP by m.mid ";

        $result=  mysql_query($sumOfFinished);
        $finishedArray = Array();
        //convert the result set to array
        while($row = mysql_fetch_array($result)){
        		$finishedArray[$row['mid']] = $row['sumOfFinished'];
        }

        $result=  mysql_query($sumOfLates);
        $lateArray = Array();

        //convert the result set to array
        while($row = mysql_fetch_array($result)){
        		$lateArray[$row['mid']] = $row['sumOfLates'];
        }
        // print_r($finishedArray);
        echo "<br>";

        // the user lose point for each late 
        foreach ($lateArray as $id => $late) {
        	if(isset($finishedArray[$id])){
        		$finishedArray[$id] -= $lateArray[$id];
        	}
        }
          // print_r($lateArray);

        //get best user(have high score)
        $best = NULL;
	        foreach ($finishedArray as $id => $score) {
	        	$best = $id;// get the first user as initaion value
	        	break;
	        }

	        foreach ($finishedArray as $id => $score) {
	        	if($score > $finishedArray[$best])
	        		$best = $id;
	        }
    	


        $bestSql = "SELECT * FROM member where mid=$best";
        $result = mysql_query($bestSql);
        $bestData = mysql_fetch_array($result);
        echo "<h1>best user is " . $bestData['name'] . "<h1>";
        $imgPath = $bestData['pic_path'];
        echo "<img style=\"width:400px\" src=\"$imgPath\">";
	?>

<?php include_once('endOfPage.php')?>
<script>
    document.getElementsByClassName("nav_elm")[2].style.backgroundColor = "#71b874" ;
</script>
</body>
</html>