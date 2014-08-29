<html>
<head>
    <title> Scavunt</title>
    <link rel="stylesheet" href="main_style.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
</head>
<body>
    
    <div class="ground">
            <div id="readroot" style="display:none;">
                <h2>Create a new Scavunt game:</h2>
                <table id = "rootContent">
                    <tr>
                        <td><label for="title" id="GameName">Game Name:</label></td>
                        <td><input type="text" name="game_name" size= 30 value="Enter the game name here" required/></td>
                    </tr>
                    <tr>
                        <td><label for="desc">Description:</label></td>
                        <td><textarea type="text" rows="5" cols="30" name="game_desc" required>Enter the game description here</textarea></td>
                    </tr>
                </table>
            </div>

            <form method="post" action="dataentry.php">

            <span id="writeroot"></span>

            <input type="button" class="add_cluster_button" id="addClusters" onclick="addNewCluster();" value="ADD A CLUSTER" />
            <input type="submit" class="make_game_button" value="MAKE GAME" />

    </form>
    </div>
    
    
    
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
                newDiv.setAttribute("class", "Clusters");
                newDiv.innerHTML = 
                "<span class='title'>Cluster " + clusterCount + "</span>" +
                "<input type='button' class='add_event_button' id='addEventsForClus"+clusterCount+
                    "' onclick='addNewEvent("+clusterCount+");' value='ADD A EVENT' />"+

                    "<input type='button' class='hidebutton' value='Hide'>"+
                    "<input type='button' class='showbutton' value='Show'>"
                    ;		
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
            newDiv.setAttribute("class", "Events");
            newDiv.innerHTML = 
        /*
            "<input type='button' class='hidebutton2' value='Hide'>"+
                    "<input type='button' class='showbutton2' value='Show'>"+
        */
            "<div class='event'>"+
                "<span class='title'>Event "+eventCount[clusNum]+'</span>'+ 
                "<input type='button' class='add_task_button' id='addTasksForEvent"+eventCount[clusNum]+"ForClus"+clusNum+"' onclick='addNewTask("+clusNum+","+eventCount[clusNum]+");' value='ADD A TASK'>"+
            "<table id = 'eventContent'>"+
                "<tr>"+
                     "<td><label for='ename'>Event Name:</label></td>"+
                    "<td><input type='text' name='event_name"+clusNum+"_"+eventCount[clusNum]+"' for='ename' required/></td>"+
                "</tr>"+
                "<tr>"+
                    "<td><label for='latv'>Latitude:</label></td>"+
                    "<td><input type='number' name='lat"+clusNum+"_"+eventCount[clusNum]+"' for='latv' step='any' required/></td>"+
                "</tr>"+
                "<tr>"+
                    "<td><label for='lonv'>Longitude:</label></td>"+
                    "<td><input type='number' name='log"+clusNum+"_"+eventCount[clusNum]+"' for='lonv'step='any'required/></td>"+
                "</tr>"+
                "<tr>"+
                    "<td><label for='distv'>Active Range:</label></td>"+
                    "<td><input type='number' name='distance"+clusNum+"_"+eventCount[clusNum]+"' for='distv'step='any'required/></td>"+
                "</tr>"+
            "</table>"+
            "</div>"
            ;
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
                    newDiv.setAttribute("class", "Tasks");
                    newDiv.innerHTML = "<span class = 'title'>Task " + taskCount[clus][eve]+
                    "</span>"+
                        "<input type='radio' name='comp"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' value='must_complete'>Must Complete"+
                        "&nbsp&nbsp<input type='radio' name='comp"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' value='opt_complete'>Optional"+
                        "<table class='taskContent'>"+
                            "<tr>"+
                                "<td><label for='tname'>Task Name:</label></td>"+
                                "<td><input type='text' name='task_name"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' for='tname'/></td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td><label for='acatype'>Activation:</label></td>"+
                                "<td>"+
                                "<select name='activation_type"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' for='acatype'>"+
                                        "<option value='instant'>Instant</option>"+
                                        "<option value='in_range_once'>In Range Once</option>"+
                                        "<option value='in_range_only'>In Range Only</option>"+
                                "</select>"+
                                "</td>"+
                            "<tr>"+
                                "<td><label for='actype'>Activity Type:</label></td>"+
                                "<td>"+
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
                                "</td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td><label for='delay'>Delay:</label></td>"+
                                "<td><input type='number' name='delay"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' for='delay'></td>"+
                            "</tr>"+
                        "</table>"+
                        "<span id='mediaRoot"+clus+"_"+eve+"_"+taskCount[clus][eve]+"' class='mediaRoot'></span>";

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
                            newDiv.setAttribute("class","mediaTextContent");
                            newDiv.innerHTML = "<table>"+
                                "<tr>"+
                                    "<td><label for='media' class='title'>Enter Text:</label></td>"+
                                    "<td><textarea rows='12' cols='37' name='media"+clus+"_"+eve+"_"+task+"' for='media'></textarea></td>"+
                                "</tr>"+
                                "</table>";
                    }
                    else if(index == 1) {
                            var newDiv = document.createElement('div');
                            newDiv.setAttribute("id", "clus" + clus + "event" + eve + "task" + task + "media");
                            newDiv.setAttribute("class","mediaImageContent");
                            newDiv.innerHTML = "<label for='media'>Select Media:</label>"+
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