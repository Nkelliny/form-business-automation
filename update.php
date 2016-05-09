<?php 
	
	require 'database.php';

	$id = null;
	if ( !empty($_GET['VANID'])) {
		$id = $_GET['VANID'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	}
	
	if ( !empty($_POST['vanid'])) {
		// keep track validation errors
		$vanidError = null;
		$addressError = null;
		$cityError = null;
		$stateError = null;
		$zip5Error = null;
		$zip4eError = null;
        $lnameError = null;
		$fnameError = null;
		$mnameError = null;
        $suffixError = null;
		$cdError = null;
		$sdError = null;
        $hdError = null;
		$dobError = null;
		
		
		// keep track post values
		$vanid = $_POST['vanid'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
                $zip5 = $_POST['zip5'];
                $zip4 = $_POST['zip4'];
                $lname = $_POST['lname'];
                $fname = $_POST['fname'];
                $mname = $_POST['mname'];
                $suffix = $_POST['suffix'];
                $cd = $_POST['cd'];
                $sd = $_POST['sd'];
                $hd = $_POST['hd'];
                $dob = $_POST['dob'];

		// validate input
		$valid = true;
		if (empty($vanid)) {
			$vanidError = 'Please enter VAN ID';
			$valid = false;
 		}
		
		if (empty($address)) {
			$addressError = 'Please enter Address';
			 $valid = false;
		 }
		
		if (empty($city)) {
			$cityError = 'Please enter City';
			 $valid = false;
 		}
                
        if (empty($state)) {
			$stateError = 'Please enter State';
			 $valid = false;
		}
		
		if (empty($zip5)) {
			$zip5Error = 'Please enter Zip5';
			 $valid = false;
		 }
		
		 if (empty($zip4)) {
			 $zip4Error = 'Please enter Zip 4';
			$valid = false;
		 }
                
        if (empty($lname)) {
			$lnameError = 'Please enter Last Name';
			 $valid = false;
		}
                
        if (empty($fname)) {
			$fnameError = 'Please enter First Name';
			$valid = false;
		}
		
		if (empty($mname)) {
			$mnameError = 'Please enter Middle Name';
			$valid = false;
		}
		
		if (empty($suffix)) {
			$suffixError = 'Please enter Suffix';
			$valid = false;
		}
                
        if (empty($cd)) {
			$cdError = 'Please enter CD';
			$valid = false;
		}
                
        if (empty($sd)) {
			$sdError = 'Please enter SD';
			$valid = false;
		}
		
		if (empty($hd)) {
			$hdError = 'Please enter HD';
			$valid = false;
		}
		
		if (empty($dob)) {
			$dobError = 'Please enter Date of Birth';
			$valid = false;
		}
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE voters  set VANID = ?, Address = ?, City =?, State =?, Zip5 =?, Zip4 =?, Lastname =?, Firstname =?, Middlename =?, Suffix =?, CD =?, SD =?, HD =?, DOB =? WHERE VANID = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($vanid,$address,$city,$state,$zip5,$zip4,$lname,$fname,$mname,$suffix,$cd,$sd,$hd,$dob,$vanid));
			Database::disconnect();
			header("Location: index.php");
		}
	} 
	else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM voters where VANID = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$vanid = $data['VANID'];
		$address = $data['Address'];
		$city = $data['City'];
		$state = $data['State'];
        $zip5 = $data['Zip5'];
        $zip4 = $data['Zip4'];
        $lname = $data['Lastname'];
        $fname = $data['Firstname'];
        $mname = $data['Middlename'];
        $suffix = $data['Suffix'];
        $cd = $data['CD'];
        $sd = $data['SD'];
        $hd = $data['HD'];
        $dob = $data['DOB'];
		Database::disconnect();
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
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
    
    	<div class="span10 offset1">
    		<div class="row">
		    	<h3>Update a Voter</h3>
		    </div>
    		<!--<form class="form-horizontal" action="update.php?id=<?php //echo $id;?>" method="post">-->
	    	<?php
	    		echo "<form class=\"form-horizontal\" action=\"update.php?id=".$id."\" method=\"post\">";
	    	?> 
			<!--<div class="control-group <?php //echo !empty($vanidError)?'error':'';?>">-->
			<?php
				$group = !empty($vanidError)?'error':'';
	    		echo "<div class=\"control-group ".$group."\">";
			?>
				<label class="control-label">VANID</label>
				<div class="controls">
					<input name="vanid" type="text"  placeholder="VANID" value=<?php echo "\"".$vanid."\""; ?> >
					<?php if (!empty($vanidError)): ?>
						<span class="help-inline"><?php echo $vanidError;?></span>
					<?php endif; ?>
				</div>
			</div>
			<?php
				$group = !empty($addressError)?'error':'';
	    		echo "<div class=\"control-group ".$group."\">";
			?>
			<!--<div class="control-group <?php //echo !empty($addressError)?'error':'';?>">-->
				<label class="control-label">Address</label>
				<div class="controls">
					<input name="address" type="text" placeholder="Address" value=<?php echo "\"".$address."\""; ?>>
					<?php if (!empty($addressError)): ?>
					     <span class="help-inline"><?php echo $addressError;?></span>
					<?php endif;?>
				</div>
			</div>
			<?php
				$group = !empty($cityError)?'error':'';
	    		echo "<div class=\"control-group ".$group."\">";
			?>
			<!--<div class="control-group <?php //echo !empty($cityError)?'error':'';?>">-->
				<label class="control-label">City</label>
				<div class="controls">
					<input name="city" type="text"  placeholder="City" value=<?php echo "\"".$city."\""; ?>>
					<?php if (!empty($cityError)): ?>
					    <span class="help-inline"><?php echo $cityError;?></span>
					<?php endif;?>
				</div>
			</div>
			<?php
				$group = !empty($stateError)?'error':'';
	    		echo "<div class=\"control-group ".$group."\">";
			?>
			<!--<div class="control-group <?php //echo !empty($stateError)?'error':'';?>">-->
				<label class="control-label">VANID</label>
				<div class="controls">
					<input name="state" type="text"  placeholder="State" value=<?php echo "\"".$state."\""; ?>>
					<?php if (!empty($stateError)): ?>
					    <span class="help-inline"><?php echo $stateError;?></span>
					<?php endif; ?>
				</div>
			</div>
			<?php
				$group = !empty($zip5Error)?'error':'';
	    		echo "<div class=\"control-group ".$group."\">";
			?>
			<!--<div class="control-group <?php //echo !empty($zip5Error)?'error':'';?>">-->
				<label class="control-label">Zip 5</label>
				<div class="controls">
					<input name="zip5" type="text" placeholder="Zip 5" value=<?php echo "\"".$zip5."\""; ?>>
					<?php if (!empty($zip5Error)): ?>
					    <span class="help-inline"><?php echo $zip5Error;?></span>
					<?php endif;?>
				</div>
			</div>
			<?php
				$group = !empty($zip4Error)?'error':'';
	    		echo "<div class=\"control-group ".$group."\">";
			?>
			<!--<div class="control-group <?php //echo !empty($zip4Error)?'error':'';?>">-->
				<label class="control-label">Zip 4</label>
				<div class="controls">
					<input name="zip4" type="text"  placeholder="Zip 4" value=<?php echo "\"".$zip4."\""; ?>>
					<?php if (!empty($zip4Error)): ?>
				    	<span class="help-inline"><?php echo $zip4Error;?></span>
					<?php endif;?>
				</div>
			</div>
			<?php
				$group = !empty($lnameError)?'error':'';
	    		echo "<div class=\"control-group ".$group."\">";
			?>
			<!--<div class="control-group <?php //echo !empty($lnameError)?'error':'';?>">-->
				<label class="control-label">Last Name</label>
				<div class="controls">
					<input name="lname" type="text"  placeholder="Last Name" value=<?php echo "\"".$lname."\""; ?>>
					<?php if (!empty($lnameError)): ?>
					    <span class="help-inline"><?php echo $lnameError;?></span>
					<?php endif; ?>
				</div>
			</div>
			<?php
				$group = !empty($fnameError)?'error':'';
	    		echo "<div class=\"control-group ".$group."\">";
			?>
			<!--<div class="control-group <?php //echo !empty($fnameError)?'error':'';?>">-->
				<label class="control-label">First Name</label>
				<div class="controls">
					<input name="fname" type="text" placeholder="First Name" value=<?php echo "\"".$fname."\""; ?>>
					<?php if (!empty($fnameError)): ?>
					    <span class="help-inline"><?php echo $fnameError;?></span>
					<?php endif;?>
				</div>
			</div>
			<?php
				$group = !empty($mnameError)?'error':'';
	    		echo "<div class=\"control-group ".$group."\">";
			?>
			<!--<div class="control-group <?php //echo !empty($mnameError)?'error':'';?>">-->
				<label class="control-label">Middle Name</label>
				<div class="controls">
					<input name="mname" type="text"  placeholder="Middle Name" value=<?php echo "\"".$mname."\""; ?>>
					<?php if (!empty($mnameError)): ?>
					    <span class="help-inline"><?php echo $mnameError;?></span>
					<?php endif;?>
				</div>
			</div>
			<?php
				$group = !empty($suffixError)?'error':'';
	    		echo "<div class=\"control-group ".$group."\">";
			?>
			<!--<div class="control-group <?php //echo !empty($suffixError)?'error':'';?>">-->
				<label class="control-label">Suffix</label>
				<div class="controls">
					<input name="suffix" type="text"  placeholder="Suffix" value=<?php echo "\"".$suffix."\""; ?>>
					<?php if (!empty($suffixError)): ?>
					    <span class="help-inline"><?php echo $suffixError;?></span>
					<?php endif; ?>
				</div>
			</div>
			<?php
				$group = !empty($cdError)?'error':'';
	    		echo "<div class=\"control-group ".$group."\">";
			?>
			<!--<div class="control-group <?php //echo !empty($cdError)?'error':'';?>">-->
				<label class="control-label">CD</label>
				<div class="controls">
					<input name="cd" type="text" placeholder="CD" value=<?php echo "\"".$cd."\""; ?>>
					 <?php if (!empty($fnameError)): ?>
					    <span class="help-inline"><?php echo $cdError;?></span>
					<?php endif;?>
				</div>
			</div>
			<?php
				$group = !empty($sdError)?'error':'';
	    		echo "<div class=\"control-group ".$group."\">";
			?>
			<!--<div class="control-group <?php //echo !empty($sdError)?'error':'';?>">-->
				<label class="control-label">SD</label>
				<div class="controls">
					<input name="sd" type="text"  placeholder="SD" value=<?php echo "\"".$sd."\""; ?>>
					<?php if (!empty($sdError)): ?>
					    <span class="help-inline"><?php echo $sdError;?></span>
					<?php endif;?>
				</div>
			</div>
			<?php
				$group = !empty($hdError)?'error':'';
	    		echo "<div class=\"control-group ".$group."\">";
			?>
			<!--<div class="control-group <?php //echo !empty($hdError)?'error':'';?>">-->
				<label class="control-label">HD</label>
				<div class="controls">
					<input name="hd" type="text"  placeholder="HD" value=<?php echo "\"".$hd."\""; ?>>
					<?php if (!empty($hdError)): ?>
					    <span class="help-inline"><?php echo $hdError;?></span>
					<?php endif; ?>
				</div>
			</div>
			<?php
				$group = !empty($dobError)?'error':'';
	    		echo "<div class=\"control-group ".$group."\">";
			?>
			<!--<div class="control-group <?php //echo !empty($dobError)?'error':'';?>">-->
				<label class="control-label">DOB</label>
				<div class="controls">
					<input name="dob" type="text" placeholder="Date of Birth" value=<?php echo "\"".$dob."\""; ?>>
					<?php if (!empty($dobError)): ?>
					    <span class="help-inline"><?php echo $dobError;?></span>
					<?php endif;?>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Create</button>
				<a class="btn" href="index.php">Back</a>
			</div>
			</form>
		</div>
				
    </div> <!-- /container -->
</body>
</html>