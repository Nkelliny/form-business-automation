<?php 
	require 'database.php';
	$name = 0;
	
	if ( !empty($_GET['aName'])) {
		$name = $_REQUEST['aName'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$name = $_POST['aName'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM assistors  WHERE aName = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($name));
		Database::disconnect();
		header("Location: assist.php");
		
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
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Delete Assistor</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $name;?>"/>
					  <p class="alert alert-error">Are you sure to delete ?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Yes</button>
						  <a class="btn" href="assist.php">No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>