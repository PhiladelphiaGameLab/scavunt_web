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
		
		while($postarr["event_name".$i."_".$j] != null){
			$arrOfEvents[$i][$j] = "".$i."_".$j."";
			$numOfEvents++;
		
			while($postarr["task_name".$i."_".$j."_".$k] != null){
				$arrOfTasks[$i][$j][$k] = "".$i."_".$j."_".$k."";
				$k++;
			}	
			
			$k = 1;
			$j++;
		}
		
		$j = 1;
		$i++;		
	}
	
	var_dump($arrOfEvents);
	var_dump($arrOfTasks);

	$gamequery = "INSERT INTO Games VALUES(null,'".$postarr['game_name']."','".$postarr['game_desc']."',1,".$numOfEvents.");";
	mysqli_query($con, $gamequery);

	$game_idquery = "SELECT id FROM Games WHERE game_name = '".$postarr['game_name']."'";

	$ret = mysqli_query($con, $game_idquery);
	$temp_game = mysqli_fetch_array($ret);

	
	$l = 1;
	$m = 1;
	$n = 1;
	while($arrOfEvents[$l][$m] != null){
		
		while($arrOfEvents[$l][$m] != null){
			$uni_id = $temp_game[0]."_".$arrOfEvents[$l][$m];
			$eventquery = "INSERT INTO Events VALUES(null,".$temp_game[0].",".$l.",".$postarr["lat".$arrOfEvents[$l][$m].""].",".$postarr["log".$arrOfEvents[$l][$m].""].",'".$postarr["event_name".$arrOfEvents[$l][$m].""]."',".$postarr["distance".$arrOfEvents[$l][$m].""].",".sizeOf($arrOfTasks[$l][$m]).",'".$uni_id."' );";
			mysqli_query($con,$eventquery);
			echo $eventquery;

			$event_idquery = "SELECT id FROM Events WHERE uni_id = '".$uni_id."'";
			$ret = mysqli_query($con, $event_idquery);
			$temp_event = mysqli_fetch_array($ret);
		
			while($arrOfTasks[$l][$m][$n] != null){
				if($postarr["comp".$arrOfTasks[$l][$m][$n].""] == "must_complete"){
					$comp = 1;
				}
				else{
					$comp = 0;
				}
				$uni_id = $temp_game[0]."_".$arrOfTasks[$l][$m][$n];
				$taskquery = "INSERT INTO Tasks VALUES(null,".$temp_event[0].",'".$postarr["activity_type".$arrOfTasks[$l][$m][$n].""]."','".$postarr["task_name".$arrOfTasks[$l][$m][$n].""]."','".$postarr["activation_type".$arrOfTasks[$l][$m][$n].""]."',".$postarr["delay".$arrOfTasks[$l][$m][$n].""].",1,".$comp.",'".$uni_id."');";
				mysqli_query($con, $taskquery);
				echo $taskquery;
				$taskid_query = "SELECT id FROM Tasks WHERE uni_id = '".$uni_id."'";
				$ret = mysqli_query($con, $taskid_query);
				$temp_task = mysqli_fetch_array($ret);
				$type = "";
				if($postarr["media".$arrOfTasks[$l][$m][$n].""] == "cityhall"){
					$url = "http://wibblywobblytracker.com/scavunt_web/resources/city_hall.jpg";
					$type="image";
				}
				else if($postarr["media".$arrOfTasks[$l][$m][$n].""] == "clothespin"){
                                        $url = "http://wibblywobblytracker.com/scavunt_web/resources/clothespin.jpg";
					$type="image";
                                }
				else if($postarr["media".$arrOfTasks[$l][$m][$n].""] == "municipal"){
                                        $url = "http://wibblywobblytracker.com/scavunt_web/resources/municipal.jpg";
                                        $type="image";
                                }
				else {
					$url = $postarr["media".$arrOfTasks[$l][$m][$n].""];
					$type="text";
				}
				//$mediaquery = "INSERT INTO Media VALUES(null,'".$url."','image',".$temp_task[0].", null);";
				$mediaquery = "INSERT INTO Media VALUES(null,'".$url."','".$type."',".$temp_task[0].", null);";
				mysqli_query($con, $mediaquery);
				$n++;
 				echo $mediaquery;
			}

			$n = 1;
			$m++;
		}
		
		$m = 1;
		$l++;
		echo $gamequery;
	}
}

function display()
{
    var_dump($postarr);
}
if(isset($_POST['game_name']))
{
   display();
   submitToDB();
} 

?>
