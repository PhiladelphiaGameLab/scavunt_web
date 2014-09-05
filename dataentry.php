<?php

function submitToDB() {
	$postarr = $_POST;
	$arrOfEvents;
	$arrTask;
	$arrOfTasks;
	$numOfEvents = 0;

    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    $allowedImageExtensions = array("gif", "jpeg", "jpg", "png");
    $allowedVideoExtensions = array("3gp", "mp4");
    $allowedAudioExtensions = array("3gp", "mp4", "mp3", "m4a", "flac", "ogg", "wav");
    $maxSize = 50000;

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
				
                $type = $postarr["activity_type".$arrOfTasks[$l][$m][$n].""];
				echo "Type:".$type;
                		if($type == "receive_text") {
                    			$url = $postarr["media".$arrOfTasks[$l][$m][$n].""];
                    			$type = "text";
                		}
                		else if($type == "receive_image") {
                    			$type = "image";

                                foreach ($blacklist as $item) {
                                    if(preg_match("/$item$/i", $_FILES["media".$arrOfTasks[$l][$m][$n].""]['name'])) {
                                        echo "Invalid file type";
                                        exit;
                                    }
                                }

                                $canLoad = false;
                                foreach ($allowedImageExtensions as $item) {
                                    if($_FILES["media".$arrOfTasks[$l][$m][$n].""]["type"] == "image/".$item) {
                                        $canLoad = true;
                                    }
                                }

                                if($_FILES["media".$arrOfTasks[$l][$m][$n].""]["size"] > $maxSize) {
                                    $canLoad = false;
                                    echo "Image file to large";
                                }


                                $extension = end(explode(".", $_FILES["media".$arrOfTasks[$l][$m][$n].""]["name"]));
                                if(!in_array($extension, $allowedExts)) {
                                    $canLoad = false;
                                    echo "Not valid image file type";
                                }

                                if($canLoad) {
                                    if ($_FILES["file"]["error"] > 0) {
                                        echo "Return Code: " . $_FILES["media".$arrOfTasks[$l][$m][$n].""]["error"] . "<br>";
                                    } else {
                                        echo "Upload: " . $_FILES["media".$arrOfTasks[$l][$m][$n].""]["name"] . "<br>";
                                        echo "Type: " . $_FILES["media".$arrOfTasks[$l][$m][$n].""]["type"] . "<br>";
                                        echo "Size: " . ($_FILES["media".$arrOfTasks[$l][$m][$n].""]["size"] / 1024) . " kB<br>";
                                        echo "Temp file: " . $_FILES["media".$arrOfTasks[$l][$m][$n].""]["tmp_name"] . "<br>";
                                        if (file_exists("resources/" . $_FILES["media".$arrOfTasks[$l][$m][$n].""]["name"])) {
                                            echo $_FILES["media".$arrOfTasks[$l][$m][$n].""]["name"] . " already exists. ";
                                        } else {
                                            move_uploaded_file($_FILES["media".$arrOfTasks[$l][$m][$n].""]["tmp_name"], "resources/".
                                                $_FILES["media".$arrOfTasks[$l][$m][$n].""]["name"]);
                                            echo "Stored in: " . "upload/" . $_FILES["media".$arrOfTasks[$l][$m][$n].""]["name"];
                                        }
                                        $url = "http://wibblywobblytracker.com/scavunt_web/resources/".$_FILES["media".$arrOfTasks[$l][$m][$n].""]["name"];
                                    }
                                }
                                else {
                                    echo "Error loading file";
                                    exit;
                                }

                                /*
                    			if($postarr["media".$arrOfTasks[$l][$m][$n].""] == "cityhall") {
                        			$url = "http://wibblywobblytracker.com/scavunt_web/resources/city_hall.jpg";
                    			}		
                    			else if($postarr["media".$arrOfTasks[$l][$m][$n].""] == "clothespin") {
                        			$url = "http://wibblywobblytracker.com/scavunt_web/resources/clothespin.jpg";
                    			}
                    			else if($postarr["media".$arrOfTasks[$l][$m][$n].""] == "municipal"){
                       	 			$url = "http://wibblywobblytracker.com/scavunt_web/resources/municipal.jpg";
                                }
                                */

                		}
                		else if($type == "receive_audio") {
                    			$type = "audio";

                    			$url = "http://wibblywobblytracker.com/scavunt_web/resources/sameer_audio_15th_and_jfk.mp3";
                		} 
                		else if($type == "receive_video") {
                    			$type = "video";
                    			$url = "http://wibblywobblytracker.com/scavunt_web/resources/drummer_on_15th_between_market_and_jfk.mp4";
                		}

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
