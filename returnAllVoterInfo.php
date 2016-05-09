<?php

if($_GET['id'] != "ef9ab0f19f0893929823aad70ffd54edac56183ac663e5e5f120d0ddc570369d"){
	exit();
}

require 'database.php';


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM voters";
/*
$stmt = $pdo->query($sql);
$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultSet);//*/
$q = $pdo->prepare($sql);
$q->execute();
//$data = $q->fetch(PDO::FETCH_ASSOC);

$returnString = "";
$returnArray = array();
while($data = $q->fetch(PDO::FETCH_ASSOC)){
	//$returnString .= json_encode($data);
	$VANID = $data['VANID'];
	$sql="SELECT * FROM assistors WHERE _ID IN (SELECT assistor_ID FROM assistors_for_voters WHERE vVANID=".$VANID.")";
	$stmt = $pdo->query($sql);
	$resultRow = $stmt->fetch(PDO::FETCH_ASSOC);

	if( $resultRow != false && count($resultRow) > 0){
		$data = array_merge($data,$resultRow);
	}//*/
	//$data['ext'] = $data['VANID'];
	array_push($returnArray, $data);
}

//$sql="SELECT * FROM assistors WHERE _ID=(SELECT assistor_ID FROM assistors_for_voters WHERE vVANID=".." )"

echo json_encode($returnArray);//*/

Database::disconnect();

?>