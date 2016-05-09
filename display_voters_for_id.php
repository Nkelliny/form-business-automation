<?php
	
	$assistorID = $_GET['_ID'];

	require 'database.php';

	function getAllVotersForAssistor($id){

		//$id should be filtered

		$pdo = Database::connect();

		$sql = "SELECT * FROM assistors_for_voters WHERE assistor_ID=".$id;
		$stmt = $pdo->query($sql);
		$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$voters = array();
		
		for ($i=0; $i < count($resultSet); $i++){
			
			$row = $resultSet[$i];
			array_push($voters, $row['vVANID']);
		}

		Database::disconnect();

		return $voters;

	}

	function getAllVoters(){
		$pdo = Database::connect();

		$sql = "SELECT * FROM voters";
		$stmt = $pdo->query($sql);
		$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

		Database::disconnect();

		return $resultSet;
	}

	function displayVoters($list){

		$pdo = Database::connect();

		if (count($list) < 1){
			echo "No Voters are linked to this assistor<br>";
			Database::disconnect();
			exit();
		}

		//build sql query
		$sql = "SELECT * FROM voters WHERE ";

		for ($i=0; $i < count($list); $i++){
			if ($i != 0){
				$sql .= " OR ";
			}


			$sql .= "VANID=".$list[$i];
		}

		$stmt = $pdo->query($sql);
		$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

		//print_r($resultSet);
		if($resultSet == false || count($resultSet) < 1){
			return "error";
		}

		Database::disconnect();
		return $resultSet;
		/*for($j=0; $j < count($resultSet); $j++){
			print_r($resultSet[$j]);
			echo "<br>";
		}//*/
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">

    function removeRow(rowID, assistorID) {

    	$.post('assistorsController.php', { vanid: rowID, asID: assistorID, action: 'remove' }, function (data, status) {

    		if (status == "success") {
    			if (data == 'ok'){
    				$('#'+rowID)[0].remove();
    				alert("Row was successfully removed!");
    			}
    			else{
    				alert("Database Error: failed to delete!");
    			}
    			
    		}else{
    			alert("Error: server could not be reached!");
    		}//*/

    	});
    }

    function addRow(assistorID){
    	//var inputArray = $('#newRow td input');
    	var selectedVANID = $('#personToAdd option:selected').val();
    	//console.log(selectedVANID);
    	$.post('assistorsController.php', { action: 'add', vanid: selectedVANID, asID: assistorID}, function (data, status) {
    		if (status == "success") {
    			if (data == 'error'){
    				alert("Database Error: failed to add!");
    			}
    			else{
    				data = JSON.parse(data);
    				var newRowString = "<tr id="+data['VANID']+">"+
    								"<td>"+data['VANID']+"</td>"+
    								"<td>"+data['Address']+"</td>"+
    								"<td>"+data['City']+"</td>"+
    								"<td>"+data['State']+"</td>"+
    								"<td>"+data['Zip5']+"</td>"+
    								"<td>"+data['Zip4']+"</td>"+
    								"<td>"+data['Lastname']+"</td>"+
    								"<td>"+data['Firstname']+"</td>"+
    								"<td>"+data['Middlename']+"</td>"+
    								"<td>"+data['Suffix']+"</td>"+
    								"<td>"+data['DOB']+"</td>"+
    								"<td><a class='btn btn-danger' onclick='removeRow("+data['VANID']+", "+assistorID+")'>Remove</a></td>"+
    								"</tr>";
    				$('#myTable > tbody:last-child').append(newRowString);
    				//console.log(data);
    				alert("Row was successfully added!");
    			}
    		}
    		else{
    			alert("Error: server could not be reached!");
    		}
    	});//*/
    }
    </script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid" style="background-color: #2780e3;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Otto</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="create.php" class="btn btn-primary"><img src="https://cdn2.iconfinder.com/data/icons/windows-8-metro-style/26/add_user.png"> Add Voter</a></li>
        <li><a href="assist.php" class="btn btn-primary"><img src="https://cdn0.iconfinder.com/data/icons/users-android-l-lollipop-icon-pack/24/group2-24.png"> Assistors</a></li>
        <li><a href="import.php" class="btn btn-primary"><img src="https://cdn3.iconfinder.com/data/icons/brands-applications/512/Excel_D-24.png"> Import CSV</a></li>
        <li><a href="http://sitelegion.com/devtest/web/software/crudtest/crud/printAll.html" class="btn btn-primary"><img src="https://cdn2.iconfinder.com/data/icons/pittogrammi/142/07-24.png"> Print All</a></li>
      </ul>
      <script>
      // Original JavaScript code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.

function Hilitor2(id, tag)
{

  var targetNode = document.getElementById(search) || document.body;
  var hiliteTag = tag || "EM";
  var skipTags = new RegExp("^(?:" + hiliteTag + "|SCRIPT|FORM)$");
  var colors = ["#ff6", "#a0ffff", "#9f9", "#f99", "#f6f"];
  var wordColor = [];
  var colorIdx = 0;
  var matchRegex = "";
  var openLeft = false;
  var openRight = false;

  this.setMatchType = function(type)
  {
    switch(type)
    {
      case "left":
        this.openLeft = false;
        this.openRight = true;
        break;
      case "right":
        this.openLeft = true;
        this.openRight = false;
        break;
      case "open":
        this.openLeft = this.openRight = true;
        break;
      default:
        this.openLeft = this.openRight = false;
    }
  };

  function addAccents(input)
  {
    retval = input;
    retval = retval.replace(/([ao])e/ig, "$1");
    retval = retval.replace(/\\u00E[024]/ig, "a");
    retval = retval.replace(/\\u00E[89AB]/ig, "e");
    retval = retval.replace(/\\u00E[EF]/ig, "i");
    retval = retval.replace(/\\u00F[46]/ig, "o");
    retval = retval.replace(/\\u00F[9BC]/ig, "u");
    retval = retval.replace(/\\u00FF/ig, "y");
    retval = retval.replace(/\\u00DF/ig, "s");
    retval = retval.replace(/a/ig, "([aàâä]|ae)");
    retval = retval.replace(/e/ig, "[eèéêë]");
    retval = retval.replace(/i/ig, "[iîï]");
    retval = retval.replace(/o/ig, "([oôö]|oe)");
    retval = retval.replace(/u/ig, "[uùûü]");
    retval = retval.replace(/y/ig, "[yÿ]");
    retval = retval.replace(/s/ig, "(ss|[sß])");
    return retval;
  }

  this.setRegex = function(input)
  {
    input = input.replace(/\\([^u]|$)/g, "$1");
    input = input.replace(/[^\w\\\s']+/g, "").replace(/\s+/g, "|");
    input = addAccents(input);
    var re = "(" + input + ")";
    if(!this.openLeft) re = "(?:^|[\\b\\s])" + re;
    if(!this.openRight) re = re + "(?:[\\b\\s]|$)";
    matchRegex = new RegExp(re, "i");
  };

  this.getRegex = function()
  {
    var retval = matchRegex.toString();
    retval = retval.replace(/(^\/|\(\?:[^\)]+\)|\/i$)/g, "");
    return retval;
  };

  // recursively apply word highlighting
  this.hiliteWords = function(node)
  {
    if(node === undefined || !node) return;
    if(!matchRegex) return;
    if(skipTags.test(node.nodeName)) return;

    if(node.hasChildNodes()) {
      for(var i=0; i < node.childNodes.length; i++)
        this.hiliteWords(node.childNodes[i]);
    }
    if(node.nodeType == 3) { // NODE_TEXT
      if((nv = node.nodeValue) && (regs = matchRegex.exec(nv))) {
        if(!wordColor[regs[1].toLowerCase()]) {
          wordColor[regs[1].toLowerCase()] = colors[colorIdx++ % colors.length];
        }

        var match = document.createElement(hiliteTag);
        match.appendChild(document.createTextNode(regs[1]));
        match.style.backgroundColor = wordColor[regs[1].toLowerCase()];
        match.style.fontStyle = "inherit";
        match.style.color = "#000";

        var after;
        if(regs[0].match(/^\s/)) { // in case of leading whitespace
          after = node.splitText(regs.index + 1);
        } else {
          after = node.splitText(regs.index);
        }
        after.nodeValue = after.nodeValue.substring(regs[1].length);
        node.parentNode.insertBefore(match, after);
      }
    };
  };

  // remove highlighting
  this.remove = function()
  {
    var arr = document.getElementsByTagName(hiliteTag);
    while(arr.length && (el = arr[0])) {
      var parent = el.parentNode;
      parent.replaceChild(el.firstChild, el);
      parent.normalize();
    }
  };

  // start highlighting at target node
  this.apply = function(input)
  {
    this.remove();
    if(input === undefined || !(input = input.replace(/(^\s+|\s+$)/g, ""))) return;
    input = convertCharStr2jEsc(input);
    this.setRegex(input);
    this.hiliteWords(targetNode);
  };

  // added by Yanosh Kunsh to include utf-8 string comparison
  function dec2hex4(textString)
  {
    var hexequiv = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F");
    return hexequiv[(textString >> 12) & 0xF] + hexequiv[(textString >> 8) & 0xF] + hexequiv[(textString >> 4) & 0xF] + hexequiv[textString & 0xF];
  }

  function convertCharStr2jEsc(str, cstyle)
  {
    // Converts a string of characters to JavaScript escapes
    // str: sequence of Unicode characters
    var highsurrogate = 0;
    var suppCP;
    var pad;
    var n = 0;
    var outputString = '';
    for(var i=0; i < str.length; i++) {
      var cc = str.charCodeAt(i);
      if(cc < 0 || cc > 0xFFFF) {
        outputString += '!Error in convertCharStr2UTF16: unexpected charCodeAt result, cc=' + cc + '!';
      }
      if(highsurrogate != 0) { // this is a supp char, and cc contains the low surrogate
        if(0xDC00 <= cc && cc <= 0xDFFF) {
          suppCP = 0x10000 + ((highsurrogate - 0xD800) << 10) + (cc - 0xDC00);
          if(cstyle) {
            pad = suppCP.toString(16);
            while(pad.length < 8) {
              pad = '0' + pad;
            }
            outputString += '\\U' + pad;
          } else {
            suppCP -= 0x10000;
            outputString += '\\u' + dec2hex4(0xD800 | (suppCP >> 10)) + '\\u' + dec2hex4(0xDC00 | (suppCP & 0x3FF));
          }
          highsurrogate = 0;
          continue;
        } else {
          outputString += 'Error in convertCharStr2UTF16: low surrogate expected, cc=' + cc + '!';
          highsurrogate = 0;
        }
      }
      if(0xD800 <= cc && cc <= 0xDBFF) { // start of supplementary character
        highsurrogate = cc;
      } else { // this is a BMP character
        switch(cc)
        {
          case 0:
            outputString += '\\0';
            break;
          case 8:
            outputString += '\\b';
            break;
          case 9:
            outputString += '\\t';
            break;
          case 10:
            outputString += '\\n';
            break;
          case 13:
            outputString += '\\r';
            break;
          case 11:
            outputString += '\\v';
            break;
          case 12:
            outputString += '\\f';
            break;
          case 34:
            outputString += '\\\"';
            break;
          case 39:
            outputString += '\\\'';
            break;
          case 92:
            outputString += '\\\\';
            break;
          default:
            if(cc > 0x1f && cc < 0x7F) {
              outputString += String.fromCharCode(cc);
            } else {
              pad = cc.toString(16).toUpperCase();
              while(pad.length < 4) {
                pad = '0' + pad;
              }
              outputString += '\\u' + pad;
            }
        }
      }
    }
    return outputString;
  }

}
</script>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" id="search">
        </div>
        <button type="submit" class="btn btn-primary"><img src="https://cdn1.iconfinder.com/data/icons/free-98-icons/32/search-24.png"</button>
      </form>
    </div>
  </div>
</nav>
    <div class="container">
    		<!--<div class="row">
    			<h3>Voter Form Automation</h3>
    		</div>
			<div class="row">
				<p>
					<a href="create1.php" class="btn btn-primary">Create</a>
				</p>
                                <p>
					<a href="import1.php" class="btn btn-primary"><img src="https://cdn3.iconfinder.com/data/icons/brands-applications/512/Excel_D-24.png"> Import CSV</a>
				</p>-->
				
				<table class="table table-striped table-bordered" id="myTable">
		              <thead>
		                <tr>
		                  	<th>VANID</th>
		                  	<th>Address</th>
		                  	<th>CITY</th>
                          	<th>STATE</th>
		                  	<th>ZIP (5-digit)</th>
		                  	<th>ZIP (4-digit)</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Suffix</th>
							<th>Date Of Birth</th>
							<th>ACTIONS</th>
		                </tr>
		              </thead>
		              <tbody>
		        <?php

					if( isset($assistorID) && $assistorID != ''){
						$voterIDList = getAllVotersForAssistor($assistorID);
						$resultSet = displayVoters($voterIDList);
					}
					else{
						die("Error: No Assistor Selected ".$assistorID);
					}


	 				   foreach ($resultSet as $row) {
						   	echo '<tr id='.$row['VANID'].'>';
							echo '<td>'. $row['VANID'] . '</td>';
							echo '<td>'. $row['Address'] . '</td>';
							echo '<td>'. $row['City'] . '</td>';
							echo '<td>'. $row['State'] . '</td>';
							echo '<td>'. $row['Zip5'] . '</td>';
							echo '<td>'. $row['Zip4'] . '</td>';
							echo '<td>'. $row['Lastname'] . '</td>';
							echo '<td>'. $row['Firstname'] . '</td>';
							echo '<td>'. $row['Middlename'] . '</td>';
                            echo '<td>'. $row['Suffix'] . '</td>';
							   	/*echo '<td>'. $row['CD'] . '</td>';
							   	echo '<td>'. $row['SD'] . '</td>';
                                echo '<td>'. $row['HD'] . '</td>';*/
							echo '<td>'. $row['DOB'] . '</td>';
							echo '<td> <a class="btn btn-danger" onclick="removeRow('.$row['VANID'].', '.$assistorID.')">Remove</a></td>';
							echo '</tr>';
					   }

					  ?>
					  
				      </tbody>
	            </table>
	            
	            	<?php

	            		$listOfAllVoters = getAllVoters();
	            		echo "<select id='personToAdd'>";
	            		if($listOfAllVoters == "error"){
	            			echo "<option> List failed to load from database please reload the page fix this problem </option>";
	            		}
	            		else{
	            			foreach ($listOfAllVoters as $row) {
	            				echo "<option value='".$row['VANID']."'> Lastname: ".$row['Lastname'].", VANID: ".$row['VANID']."</option>";
	            			}
	            		}
	            		echo "</select>";
	            		echo '<td> <a class="btn btn-primary" onclick="addRow('.$assistorID.')">Add</a></td>';
	            	?> 
    	</div>
    </div> <!-- /container -->
  </body>
</html>



