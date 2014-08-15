<html>
<head>
</head>
<body>
<div id="readroot" style="display:none;">

	<input type="button" value="Remove review"
		onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br /><br />

	<label for="title">Name of the Game:</label>
	<input type="text" name="gamen" value="title" />
	<br/>
	<label for="desc">Game Description:</label>
	<textarea type="text" rows="5" cols="20" name="gamed" value="desc">Enter game description here.</textarea>
	<br />
	
</div>

<form method="post" action="/cgi-bin/show_params.cgi">

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
				newField[i].name = theName + counter;
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
		eventCount[clusNum]++;
        taskCount.push([clusNum,eventCount[clusNum]]);
		var newDiv = document.createElement('div');
		newDiv.setAttribute("id","clus"+ clusNum +"event"+eventCount[clusNum]);
		newDiv.innerHTML = 
		"<br>Event "+eventCount[clusNum]+"<input type='button' id='addTasksForEvent"+eventCount[clusNum]+"ForClus"+clusNum+"' onclick='addNewTask("+clusNum+","+eventCount[clusNum]+");' value='Add a Task'>"
		"<br><label for='ename'>Event Name:</label>"+
		"<input type='text' name='"+clusNum+"eventn"+eventCount[clusNum]+"' for='ename'/>"+
		"<br><label for='latv'>Latitude:</label>"+
		"<input type='number' name='"+clusNum+"latitude"+eventCount[clusNum]+"' for='latv'/><br>"+
		"<label for='lonv'>Longitude:</label>"+
		"<input type='number' name='"+clusNum+"longitude"+eventCount[clusNum]+"' for='lonv'/>";
		
		document.getElementById('clus'+clusNum).appendChild(newDiv);
	}

	function addNewTask(clus, eve){
		if(taskCount[clus][eve] == null){
			taskCount[clus][eve] = 0;
        }
        taskCount[clus][eve]++;
        var newDiv = document.createElement('div');
        newDiv.setAttribute("id", "clus" + clus + "event" + eve + "task" + taskCount[clus][eve]);
        newDiv.innerHTML = "<br>Task " + taskCount[clus][eve];

        document.getElementById('clus'+clus+'event'+eve).appendChild(newDiv);

	}
	
	window.onload = addFields;
</script>
</body>
</html>
