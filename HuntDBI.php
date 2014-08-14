<?php
class HuntDBI{
		
		private $con;
		
		public function __construct(){
		}

		public function getGame($gamename){
			//MySQL connect and query for Games
			$qy = "SELECT * FROM Games WHERE game_name = '$gamename';";
			$game = $this->makeQuery($qy);

			//Store game data in response
			$response["game"] = $game;

			$events = $this->getEvents($game["0"]["0"], $game["0"]["4"]);
			$response = array_merge($response, $events);
			echo json_encode($response);
		}

		public static function makeQuery($query){
			$con = mysqli_connect("localhost","root","pass","scavunt") or die(mysql_error());
			$ret = mysqli_query($con, $query);
			while($arr = mysqli_fetch_array($ret)){
				$rows[] = $arr;
			}
			mysqli_free_result($ret);
			mysqli_close($con);
			return $rows;
		}

		public function getEvents($game_id, $numOfEvents){
			//Start Query and store it
			$query = "SELECT * FROM Events WHERE game_id = $game_id;";
			$events = $this->makeQuery($query);

			$i = 0;
			while($i < $numOfEvents){
				$index = 'event'.$i;
				//echo $index;
				$result[$index] = array($events[$i]);
				$tasks = $this->getTasks($events[$i]["0"], $events[$i]["7"], $i);
				$result = array_merge($result, $tasks);
				$i++;
			}
			//echo json_encode($result);
			return ($result);	

		}

		public function getTasks($event_id, $numOfTasks, $num){
			$query = "SELECT * FROM Tasks WHERE event_id = $event_id;";
			$tasks = $this->makeQuery($query);

			$j = 0;
			while($j < $numOfTasks){
				$index = 'event'.$num.'_task'.$j;
				//echo $index;
				$result[$index] = array($tasks[$j]);
				$media = $this->getMedia($tasks[$j]["0"],$tasks[$j]["6"],$num, $j);
				if(!empty($media)){
					$result = array_merge($result, $media);
				}
				$j++;
			}
			return ($result);

		}

		public function getMedia($task_id, $numOfMedia, $numE, $numT){
			$query = "SELECT * FROM Media WHERE task_id = $task_id;";
			$media = $this->makeQuery($query);

			$k = 0;
			while($k < $numOfMedia){
				$index = 'event'.$numE.'_task'.$numT.'_media'.$k;
				//echo $index;
				$result[$index] = array($media[$k]);
				$k++;
			}
			return ($result);
		}
}
?>	
