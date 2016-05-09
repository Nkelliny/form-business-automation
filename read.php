<?php 
	require 'database.php';
	$vanid = null;
	if ( !empty($_GET['VANID'])) {
		$vanid = $_GET['VANID'];
	}
	
	if ( null==$vanid ) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM voters where VANID = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($vanid));
		$data = $q->fetch(PDO::FETCH_ASSOC);

		$sql="SELECT * FROM assistors WHERE _ID IN (SELECT assistor_ID FROM assistors_for_voters WHERE vVANID=?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($vanid));
		$assistData = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
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
<script type="text/javascript"> 
window.onload=function(){self.print();} 
</script> 
	<div class="pageone">
		<h5 class="lastname"><?php echo $data['Lastname'];?></h5>
		<h5 class="firstname"><?php echo $data['Firstname'];?></h5>
		<h5 class="middlename"><?php echo $data['Middlename'];?></h5>
		<h5 class="suffix"><?php echo $data['Suffix'];?></h5>
		<h5 class="address"><?php echo $data['Address'];?></h5>
		<h5 class="city"><?php echo $data['City'];?></h5>
		<h5 class="state"><?php echo $data['State'];?></h5>
		<h5 class="zip"><?php echo $data['Zip'];?></h5>
		<?php
		$dob = $data['DOB'];
		$bd = explode("/", $dob);
		?>
		<h5 class="month"><?php echo $bd[0];?></h5>
		<h5 class="day"><?php echo $bd[1];?></h5>
		<h5 class="year"><?php echo $bd[2];?></h5>
		<h5 class="phone"><?php echo $data['Phone Number'];?></h5>
		<h5 class="ass_Name"><?php echo $assistData['aName'];?></h5>
		<h5 class="ass_Address"><?php echo $assistData['aAddress'];?></h5>
		<h5 class="ass_Municipality"><?php echo $assistData['aMunicipality'];?></h5>
		<h5 class="ass_State"><?php echo $assistData['aState'];?></h5>
		<h5 class="ass_Zip"><?php echo $assistData['aZip'];?></h5>
	</div>
	<div class="pagetwo">
	</div>
</body>

</html>