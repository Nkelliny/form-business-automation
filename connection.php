<?
 $filename=$_POST['filename'];
 $db=mysql_connect('localhost', 'nkelliny', 'nkk82393') or die("Error in Connection: ".mysql_error());
	if(!$db){
		die("no db");
	}
	if(!mysql_select_db("voter_van",$db)){
		die("No database selected.");
	}
?>