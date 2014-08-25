<html>
<head>
</head>
<body>
<div id="readroot" style="display:none;">
	<h2>Create a new Scavunt game:</h2>
	<label for="title">Game Name:</label>
	<input type="text" name="game_name" size= 30 value="Enter the game name here" required/>
	<br/>
	<label for="desc">Game Description:</label>
	<textarea type="text" rows="5" cols="30" name="game_desc" required>Enter the game description here</textarea>
	<br />
	
</div>

<form method="post" action="dataentry.php">

	<span id="writeroot"></span>

	<input type="button" id="addClusters" onclick="addNewCluster();" value="Add a Cluster" />
	<input type="submit" value="Make Game" />
	
</form>
<script type="text/javascript">
	var counter = 0;
	var clusterCount = 0;
	var eventCount = [];
	var taskCount = [];
	var limit = 3;

	function addGame(){
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

                currentTask = taskCount[clus][eve];

                var newDiv = document.createElement('div');
                newDiv.setAttribute("id", "clus" + clus + "event" + eve + "task" + taskCount[clus][eve]);
                newDiv.innerHTML = "<br>Task " + taskCount[clus][eve]+
                "<br><label for='tname'>Task Name:</label>"+
                "<input type='text' name='task_name"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' for='tname'/>"+
                "<br><label for='acatype'>Activation Type:</label>"+
                "<select name='activation_type"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' for='acatype'>"+
                        "<option value='instant'>Instant</option>"+
                        "<option value='in_range_once'>In Range Once</option>"+
                        "<option value='in_range_only'>In Range Only</option>"+
                "</select>"+
                "<br><label for='actype'>Activity Type:</label>"+
                "<select name='activity_type"+clus+"_"+eve+"_"+currentTask+"' for='actype'"+
                        " onchange='addMedia(this.selectedIndex,"+clus+","+eve+","+currentTask+");'"+
                        " onfocus='this.selectedIndex = -1;'>"+
                        "<option value='receive_text'>Receive Text</option>"+
                //      "<option value='receive_audio'>Receive Audio</option>"+
                //      "<option value='receive_video'>Receive Video</option>"+
                        "<option value='receive_image'>Receive Image</option>"+
                //      "<option value='take_picture'>Take Picture</option>"+
                //      "<option value='record_video'>Record Video</option>"+
                //      "<option value='response_text'>Response Text</option>"+
                //      "<option value='service_receive_audio'>Service Receive Audio</option>"+
                "</select>"+
                "<span id='mediaRoot"+clus+"_"+eve+"_"+taskCount[clus][eve]+"'></span>"+
                "<br><label for='delay'>Delay on Task:</label>"+
                "<input type='number' name='delay"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' for='delay'>"+
                "<br><input type='radio' name='comp"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' value='must_complete'>Must Complete"+
                "&nbsp&nbsp<input type='radio' name='comp"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' value='opt_complete'>Optional Complete";

                document.getElementById('clus'+clus+'event'+eve).appendChild(newDiv);
                addMedia(0, clus, eve, currentTask);
        }

        function addMedia(index, clus, eve, task) {
                console.log(index);

                var mediaRoot = document.getElementById('mediaRoot'+clus+'_'+eve+'_'+task);

                while(mediaRoot.firstChild) {
                        mediaRoot.removeChild(mediaRoot.firstChild);
                }
                
                if(index == 0) {
                        var newDiv = document.createElement('div');
                        newDiv.setAttribute("id", "clus" + clus + "event" + eve + "task" + task + "media");
                        newDiv.innerHTML = "<br><label for='media'>Enter Text:</label>"+
                        "<input type='text' name='media"+clus+"_"+eve+"_"+task+"' for='media'>";
                }
                else if(index == 1) {
                        var newDiv = document.createElement('div');
                        newDiv.setAttribute("id", "clus" + clus + "event" + eve + "task" + task + "media");
                        newDiv.innerHTML = "<br><label for='media'>Select Media:</label>"+
                        "<select name='media"+clus+"_"+eve+"_"+task+"' for='media'>"+
                                "<option value='cityhall'>City Hall</option>"+
                                "<option value='clothespin'>The Clothespin</option>"+
                                "<option value='municipal'>The Municipal Building</option>"+
                        "</select>";
                }

                mediaRoot.appendChild(newDiv);
        }

	window.onload = addGame;

</script>
</body>
</html>
