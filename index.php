<html>
<head>
</head>
<body>
<div id="readroot" style="display:none;">

	<input type="button" value="Remove review"
		onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br /><br />

	<label for="title">Name of the Game:</label>
	<input type="text" name="game_name" value="title" required/>
	<br/>
	<label for="desc">Game Description:</label>
	<textarea type="text" rows="5" cols="20" name="game_desc" required>yay</textarea>
	<br />
	
</div>

<form method="post" action="dataentry.php">

	<span id="writeroot"></span>

	<input type="button" id="addClusters" onclick="addNewCluster();" value="Add a Cluster" />
	<input type="submit" value="Send form" />
	
</form>
<script type="text/javascript">
	var counter = 0;
	var clusterCount = 0;
	var eventCount = [];
	var taskCount = [];
	var limit = 3;

	
	function addFields(){
		counter++;
		console.log("adding more");
		var newFields = document.getElementById('readroot').cloneNode(true);
		newFields.id = 'wr'+counter;
		newFields.style.display = 'block';
		// var clusterName = newFields.getElementsByClassName('clusterName')[0];
		// clusterName.innerHTML = clusterName.innerHTML + " " + cluscounter;
		var newField = newFields.childNodes;
		for (var i=0;i<newField.length;i++) {
			var theName = newField[i].name
			if (theName)
				newField[i].name = theName;
		}
		var insertHere = document.getElementById('writeroot');
		insertHere.parentNode.insertBefore(newFields,insertHere);
	}

	// function addCluster(){
	// 	cluscounter++;
	// 	console.log("adding more");
	// 	var newFields = document.getElementById('eventcluster').cloneNode(true);
	// 	newFields.id = 'clus'+cluscounter;
	// 	newFields.style.display = 'block';
	// 	var dirEvent = document.getElementById('event');
	// 	dirEvent.id = cluscounter + 'event' + eventcounter;
	// 	var clusterName = newFields.getElementsByClassName('clusterName')[0];
	// 	clusterName.innerHTML = clusterName.innerHTML + " " + cluscounter;
	// 	var newField = newFields.childNodes;
	// 	for (var i=0;i<newField.length;i++) {
	// 		var theName = newField[i].name
	// 		if (theName)
	// 			newField[i].name = theName + cluscounter;
	// 	}
	// 	var insertHere = document.getElementById('writeroot');
	// 	insertHere.parentNode.insertBefore(newFields,insertHere);
	// }

	function addNewCluster(){
		clusterCount++;
		if(clusterCount > limit){
			alert("You have reached the limit of adding clusters: can't have" + clusterCount + " clusters");		
		}
		else{
			var newDiv = document.createElement('div');
			newDiv.setAttribute("id","clus"+clusterCount);
			newDiv.innerHTML = 
			"<br> Cluster " + clusterCount + 
			"<input type='button' id='addEventsForClus"+clusterCount+"' onclick='addNewEvent("+clusterCount+");' value='Add a Event' />";		
		}
		var insertHere = document.getElementById('writeroot');
		insertHere.parentNode.insertBefore(newDiv,insertHere);

	}

	function addNewEvent(clusNum){
		if(eventCount[clusNum] == null){
			eventCount[clusNum] = 0;
		}
		taskCount[clusNum] = [];
		eventCount[clusNum]++;
        var newDiv = document.createElement('div');
		newDiv.setAttribute("id","clus"+ clusNum +"event"+eventCount[clusNum]);
		newDiv.innerHTML = 
		"<br>Event "+eventCount[clusNum]+ "<input type='button' id='addTasksForEvent"+eventCount[clusNum]+"ForClus"+clusNum+"' onclick='addNewTask("+clusNum+","+eventCount[clusNum]+");' value='Add a Task'>"+
		"<br><label for='ename'>Event Name:</label>"+
		"<input type='text' name='event_name"+clusNum+"_"+eventCount[clusNum]+"' for='ename' required/>"+
		"<br><label for='latv'>Latitude:</label>"+
		"<input type='number' name='lat"+clusNum+"_"+eventCount[clusNum]+"' for='latv' step='any' required/><br>"+
		"<label for='lonv'>Longitude:</label>"+
		"<input type='number' name='log"+clusNum+"_"+eventCount[clusNum]+"' for='lonv'step='any'required/>"+
		"<br><label for='distv'>Distance to Activate:</label>"+
		"<input type='number' name='distance"+clusNum+"_"+eventCount[clusNum]+"' for='distv'step='any'required/>";
		document.getElementById('clus'+clusNum).appendChild(newDiv);
	}

	function addNewTask(clus, eve){
		if(taskCount[clus][eve] == null){
			taskCount[clus][eve] = 0;
        }
        taskCount[clus][eve]++;
        var newDiv = document.createElement('div');
        newDiv.setAttribute("id", "clus" + clus + "event" + eve + "task" + taskCount[clus][eve]);
        newDiv.innerHTML = "<br>Task " + taskCount[clus][eve]+
        "<br><label for='tname'>Task Name:</label>"+
		"<input type='text' name='task_name"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' for='tname'/>"+
		"<br><label for='actype'>Activity Type:</label>"+
		"<select name='activity_type"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' for='actype'>"+
			"<option value='receive_text'>Receive Text</option>"+
			"<option value='receive_audio'>Receive Audio</option>"+
			"<option value='receive_video'>Receive Video</option>"+
			"<option value='receive_image'>Receive Image</option>"+
			"<option value='take_picture'>Take Picture</option>"+
			"<option value='record_video'>Record Video</option>"+
			"<option value='response_text'>Response Text</option>"+
			"<option value='service_receive_audio'>Service Receive Audio</option>"+
		"</select>"+
		"<br><label for='acatype'>Activation Type:</label>"+
		"<select name='activation_type"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' for='acatype'>"+
			"<option value='instant'>Instant</option>"+
			"<option value='in_range_once'>In Range Once</option>"+
			"<option value='in_range_only'>In Range Only</option>"+
		"</select>"+
		"<br><label for='delay'>Delay on Task:</label>"+
		"<input type='number' name='delay"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' for='delay'>"+
		"<br><input type='radio' name='comp"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' value='must_complete'>Must Complete"+
		"&nbsp&nbsp<input type='radio' name='comp"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' value='opt_complete'>Optional Complete";

        document.getElementById('clus'+clus+'event'+eve).appendChild(newDiv);
	}
	
	window.onload = addFields;
</script>
</body>
</html>
