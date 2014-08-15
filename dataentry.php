<?php
function submitToDB(){
	$postarr = $_POST;
	$arrOfEvents;
	$arrTask;
	$arrOfTasks;
	$numOfEvents = 0;
	//$numOfTotalTasks = 0;
	$i = 1;
	$j = 1;
	$k = 1;

	$con = mysqli_connect("localhost","root","pass","scavunt") or die(mysql_error());
	
	while($postarr["event_name".$i."_".$j] != null){
		$j = 1;
		
		while($postarr["event_name".$i."_".$j] != null){
			$k = 1;
			$arrOfEvents[] = "".$i."_".$j."";

			while($postarr["task_name".$i."_".$j."_".$k] != null){
				$arrOfTasks[$j][$k] = "".$i."_".$j."_".$k."";
				$k++;
			}	
			
			$j++;
		}
		
		$i++;		
	}
	$numOfEvents = sizeOf($arrOfEvents);
	
	$gamequery = "INSERT INTO Games VALUES(null,".$postarr['game_name'].",".$postarr['game_desc'].",1,".$numOfEvents.");";

	$game_idquery = "SELECT id FROM Games WHERE game_name = '".$postarr['game_name']."'";

	$ret = mysqli_query($con, $game_idquery);
	$temp = mysqli_fetch_array($ret);

	
	$l = 0;
	while($arrOfEvents[$l] != null){
		$clusNum = explode('_', $arrOfEvents[$l]);
		$l2 = $l + 1;
		$eventquery = "INSERT INTO Events VALUES(null,".$temp[0].",".$clusNum[0].",".$postarr["lat".$arrOfEvents[$l].""].",".$postarr["log".$arrOfEvents[$l].""].",'".$postarr["event_name".$arrOfEvents[$l].""]."',".$postarr["distance".$arrOfEvents[$l].""].",".sizeOf($arrOfTasks[$l2])." );";
		echo $eventquery;
		$l++;
	}
	//echo $gamequery;


}
function display()
{
    //var_dump($_POST);
}
if(isset($_POST['game_name']))
{
   display();
   submitToDB();
} 

?>