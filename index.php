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
	<div id="eventcluster">
		<br/><div class="clusterName">Cluster</div><br>
		<div id="event">
			Event 1<br>
			<label for="ename">Event Name:</label>
			<input type="text" name="eventn" for="ename"/>
			<br>
			<label for="latv">Latitude:</label>
			<input type="number" name="latitude" for="latv"/>
			<br>
			<label for="lonv">Longitude:</label>
			<input type="number" name="longitude" for="lonv"/>

			<input type="button" id="moreEvents" onclick="addEvent();" value="Add a Event" />

		</div>
	</div>
</div>

<form method="post" action="/cgi-bin/show_params.cgi">

	<span id="writeroot"></span>

	<input type="button" id="moreClusters" onclick="addCluster();" value="Add a Cluster" />
	<input type="submit" value="Send form" />

</form>
<script type="text/javascript">
	var counter = 0;
	var cluscounter = 1;
	var eventcounter = 1;
	
	function addFields(){
		counter++;
		console.log("adding more");
		var newFields = document.getElementById('readroot').cloneNode(true);
		newFields.id = 'wr'+counter;
		newFields.style.display = 'block';
		var clusterName = newFields.getElementsByClassName('clusterName')[0];
		clusterName.innerHTML = clusterName.innerHTML + " " + cluscounter;
		var newField = newFields.childNodes;
		for (var i=0;i<newField.length;i++) {
			var theName = newField[i].name
			if (theName)
				newField[i].name = theName + counter;
		}
		var insertHere = document.getElementById('writeroot');
		insertHere.parentNode.insertBefore(newFields,insertHere);
	}

	function addCluster(){
		cluscounter++;
		console.log("adding more");
		var newFields = document.getElementById('eventcluster').cloneNode(true);
		newFields.id = 'clus'+cluscounter;
		newFields.style.display = 'block';
		var clusterName = newFields.getElementsByClassName('clusterName')[0];
		clusterName.innerHTML = clusterName.innerHTML + " " + cluscounter;
		var newField = newFields.childNodes;
		for (var i=0;i<newField.length;i++) {
			var theName = newField[i].name
			if (theName)
				newField[i].name = theName + cluscounter;
		}
		var insertHere = document.getElementById('writeroot');
		insertHere.parentNode.insertBefore(newFields,insertHere);
	}
	
	window.onload = addFields;
</script>
</body>
</html>