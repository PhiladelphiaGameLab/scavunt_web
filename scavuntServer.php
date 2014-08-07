<? php

$con = mysqli_connect("localhost","PGL","pass","scavunt") or die(mysql_error());
$que = "SELECT * FROM Users WHERE username = test";
$result = mysqli_query($con, $que);
echo $result;

class ScavuntServer
{
	
	public function __construct(){

	}


}

?>