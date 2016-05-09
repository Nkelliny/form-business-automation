<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload page</title>
<style type="text/css">
body {
	background: #ffffff;
	font: normal 14px/30px Helvetica, Arial, sans-serif;
	color: #000000;
}
a {
	color:#898989;
	font-size:14px;
	font-weight:bold;
	text-decoration:none;
}
a:hover {
	color:#CC0033;
}

h1 {
	font: bold 14px Helvetica, Arial, sans-serif;
	color: #CC0033;
}
h2 {
	font: bold 14px Helvetica, Arial, sans-serif;
	color: #898989;
}
#container {
	background: #ffffff;
	margin: 100px auto;
	width: 945px;
}
#form 			{padding: 20px 150px;}
#form input     {margin-bottom: 20px;}
</style>
</head>
<body>
<div id="container">
<div id="form">

<?php

require "database.php"; //Connect to Database
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*$deleterecords = "TRUNCATE TABLE voters"; //empty the table of its current records
//mysql_query($deleterecords);
$pdo->exec($deleterecords);//*/

//Upload File
if (isset($_POST['submit'])) {
	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
		echo "<h2>Displaying contents:</h2>";
		readfile($_FILES['filename']['tmp_name']);
		$deleterecords = "TRUNCATE TABLE voters"; //empty the table of its current records
		//mysql_query($deleterecords);
		$pdo->exec($deleterecords);
	}

	//Import uploaded file to Database
	$handle = fopen($_FILES['filename']['tmp_name'], "r");

	$totalAffectedRows=0;
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$importQuery="INSERT into voters(VANID,Address,City,State,Zip5,Zip4,Lastname,Firstname,Middlename,Suffix,CD,SD,HD, `Phone Number`, DOB) values(\"".$data[1]."\", \"".$data[2]."\", \"".$data[3]."\", \"".$data[4]."\", \"".$data[5]."\", \"".$data[6]."\", \"".$data[7]."\", \"".$data[8]."\", \"".$data[9]."\", \"".$data[10]."\", \"".$data[11]."\", \"".$data[12]."\", \"".$data[13]."\", \"".$data[14]."\", \"".$data[15]."\")";

		//mysql_query($import) or die("Error in While loop: ".mysql_error());

		$numAffected = $pdo->exec($importQuery) or die("Error in While loop: ".print_r($pdo->errorInfo(), true));

		$totalAffectedRows += $numAffected;
	}
	echo "<br>Total number of rows added to the database: ".$totalAffectedRows;
	fclose($handle);

	//print "Import done";

	//view upload form
}else {

	print "Upload new csv by browsing to file and clicking on Upload<br />\n";

	print "<form enctype='multipart/form-data' action='' method='post'>";

	print "File name to import:<br />\n";

	print "<input size='50' type='file' name='filename'><br />\n";

	print "<input type='submit' name='submit' value='Upload'></form>";

}
Database::disconnect();

?>

</div>
</div>
</body>
</html>