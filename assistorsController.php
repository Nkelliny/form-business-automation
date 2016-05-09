<?php

require "database.php";

//both above variables should be filtered


function removeRow(){
	$VANID = $_POST['vanid'];

	$assistorID = $_POST['asID'];

	if(!isset($VANID) || $VANID == '' || !isset($assistorID) || $assistorID == ''){
		die("Row Remove Error: No VANID or assistor ID given, cannot remove row without a VANID nor an assistor ID");
	}

	$pdo = Database::connect();
	$sql = "DELETE FROM assistors_for_voters WHERE assistor_ID=".$assistorID." AND vVANID=".$VANID;

	$numOfAffectedRows = $pdo->exec($sql);

	Database::disconnect();

	if($numOfAffectedRows == 0 || $numOfAffectedRows == false){
		echo "error";
	}
	else{
		echo "ok";
	}
}

function addRow(){
	$VANID = $_POST['vanid'];

	$assistorID = $_POST['asID'];

	if(!isset($VANID) || $VANID == '' || !isset($assistorID) || $assistorID == ''){
		die("Row Remove Error: No VANID or assistor ID given, cannot remove row without a VANID nor an assistor ID");
	}


	$pdo = Database::connect();
	$sql = "INSERT INTO assistors_for_voters (vVANID, assistor_ID) VALUES ('".$VANID."', '".$assistorID."')";

	$numOfAffectedRows = $pdo->exec($sql);

	Database::disconnect();

	if($numOfAffectedRows == 0 || $numOfAffectedRows == false){
		echo "error";
	}
	else{
		$pdo = Database::connect();
		$sql = "SELECT * FROM voters WHERE VANID=".$VANID;
		$stmt = $pdo->query($sql);
		$resultRow = $stmt->fetch(PDO::FETCH_ASSOC);

		Database::disconnect();

		echo json_encode($resultRow);
		
	}
}

switch ($_POST['action']) {
	case 'remove':
		removeRow();
		break;
	case 'add':
		addRow();
		break;
	default:
		die("Error: no action specified...");
		break;
}




?>