<?php 
$dbh = new PDO('mysql:host=localhost;dbname=laba6', "root", "");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_POST['param1'])) {
	$id = $_POST['param1'];
	$sql = "DELETE FROM users WHERE number = :d1"; 
	$q = $dbh->prepare($sql); 
	$q->execute(array(
		':d1'=>$id
	));
}
$dbh = null;
?>