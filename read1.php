<?php 
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

	$id = null;
	if ( !empty($_GET['_ID'])) {
		$id = $_GET['_ID'];
		$voterIDList = getAllVotersForAssistor($id);
		$resultSet = displayVoters($voterIDList);
	}
	
	$pdo = Database::connect();
	$sql="SELECT * FROM assistors WHERE _ID=?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$assistData = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.css" rel="stylesheet">
    <link href="css/printAll.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body id="main">
<?php

	foreach ($resultSet as $row) {
		echo "<div class=\"pageone\">";
			echo "<h5 class=\"lastname\">".$row['Lastname']."</h5>";
			echo "<h5 class=\"firstname\">".$row['Firstname']."</h5>";
			echo "<h5 class=\"middlename\">".$row['Middlename']."</h5>";
			echo "<h5 class=\"suffix\">".$row['Suffix']."</h5>";
			echo "<h5 class=\"address\">".$row['Address']."</h5>";
			echo "<h5 class=\"city\">".$row['City']."</h5>";
			echo "<h5 class=\"state\">".$row['State']."</h5>";
			echo "<h5 class=\"zip\">".$row['Zip']."</h5>";
			$dob = $row['DOB'];
			$bd = explode("/", $dob);
			echo "<h5 class=\"month\">".$bd[0]."</h5>";
			echo "<h5 class=\"day\">".$bd[1]."</h5>";
			echo "<h5 class=\"year\">".$bd[2]."</h5>";
			echo "<h5 class=\"phone\">".$row['Phone Number']."</h5>";
			echo "<h5 class=\"ass_Name\">".$assistData['aName']."</h5>";
			echo "<h5 class=\"ass_Address\">".$assistData['aAddress']."</h5>";
			echo "<h5 class=\"ass_Municipality\">".$assistData['aMunicipality']."</h5>";
			echo "<h5 class=\"ass_State\">".$assistData['aState']."</h5>";
			echo "<h5 class=\"ass_Zip\">".$assistData['aZip']."</h5>";
		echo "</div>";
		echo "<div class=\"pagetwo\">";
		echo "</div>";
	}
?>
</body>

</html>