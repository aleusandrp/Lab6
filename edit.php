<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Редактируем ID: <?php echo $_GET['id']; ?></title>
</head>
<body>
<?php 
if (isset($_GET['id'])) {
	

	$id = $_GET['id'];
	$dbh = new PDO('mysql:host=localhost;dbname=laba6', "root", "");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$stat = $dbh->prepare("SELECT * FROM users WHERE number= :d1"); 
	$stat->execute(array(
		':d1'=>$id
	));


	$stat->setFetchMode(PDO::FETCH_OBJ); 

		while($row = $stat->fetch()){
?>
<form action="edit.php" method="POST">
	<fieldset>
	<legend>Добавление</legend>
		Number<br><input type="text" value=<?php echo "'".$row->number."'"; ?> name="number"/><br>
		GivenName<br><input type="text" value=<?php echo "'".$row->givenName."'"; ?> required autofocus pattern="[a-zA-Z]{1,}" name="givenName"/><br>
		MiddleInitial<br><input type="text" value=<?php echo "'".$row->middleInitial."'"; ?> required pattern="[A-Z]{1}" name="middleinitial"/><br>
		Surname<br><input type="text" value=<?php echo "'".$row->surname."'"; ?> required pattern="[a-zA-Z]{1,}" name="surname"/><br>
		<fieldset>
		<legend>Gender</legend>
		Male<br><input type="radio" <?php if($row->gender==1)echo "checked"; ?> value="1" required name="gender"/><br>
		Female<br><input type="radio" <?php if($row->gender==0)echo "checked"; ?> value="0" required name="gender"/><br>
		</fieldset>
		City<br><input type="text" value=<?php echo "'".$row->city."'"; ?> required pattern="[a-zA-Z]{1,}" name="city"/><br>
		State<br><input type="text" value=<?php echo "'".$row->state."'"; ?> required pattern="[A-Z]{2}" name="state"/><br>
		EmailAddress<br><input type="email" value=<?php echo "'".$row->emailAddress."'"; ?> required name="emailAddress"/><br>
		Telephone<br><input type="tel" value=<?php echo "'".$row->telephone."'"; ?> required pattern="[0-9]{1,}-[0-9]{1,}-[0-9]{1,}" name="telephone"/><br>
		Birthday<br><input type="date" value=<?php echo "'".$row->birthday."'"; ?> required name="birthday"/><br>
		Occupation<br><input type="text" value=<?php echo "'".$row->occupation."'"; ?> required pattern="[a-zA-Z]{1,}" name="occupation"/><br>
		Company<br><input type="text" value=<?php echo "'".$row->company."'"; ?> required pattern="[a-zA-Z]{1,}" name="company"/><br>
		Weight<br><input type="text" value=<?php echo "'".$row->weight."'"; ?> required pattern="[0-9]{1,}" name="weight"/><br>
		Length<br><input type="text" value=<?php echo "'".$row->length."'"; ?> required pattern="[0-9]{1,}" name="length"/><br>
		StreetAddress<br><input type="text" value=<?php echo "'".$row->streetAddress."'"; ?> required name="streetAddress"/><br>
		ZipCode<br><input type="text" value=<?php echo "'".$row->zipCode."'"; ?> required pattern="[0-9]{5}" name="zipCode"/><br>
		Country<br><input type="text" value=<?php echo "'".$row->country."'"; ?> required pattern="[A-Z]{2}" name="country"/><br>
		<input type="submit" value="Добавить" /><br>
	</fieldset>
	</form>
<?php
}
$dbh = null;
}
 ?>
</body>
</html>
<?php 
if(isset($_POST['number'])){
	$dbh = new PDO('mysql:host=localhost;dbname=laba6', "root", "");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$givenName = $_POST['givenName'];
	$middleinitial = $_POST['middleinitial'];
	$surname = $_POST['surname'];
	$gender = $_POST['gender'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$emailAddress = $_POST['emailAddress'];
	$telephone = $_POST['telephone'];
	$birthday = $_POST['birthday'];
	$occupation = $_POST['occupation'];
	$company = $_POST['company'];
	$weight = $_POST['weight'];
	$length = $_POST['length'];
	$streetAddress = $_POST['streetAddress'];
	$zipCode = $_POST['zipCode'];
	$country = $_POST['country'];

	$sql = "UPDATE users SET 
	givenName =:d2,
	middleInitial =:d3,
	surname = :d4,
	gender = :d5,
	city = :d6,
	state = :d7,
	emailAddress = :d8,
	telephone = :d9,
	birthday = :d10,
	occupation = :d11,
	company = :d12,
	weight = :d13,
	length = :d14,
	streetAddress = :d15,
	zipCode = :d16,
	country = :d17 

	WHERE number = :d1"; 
	$q = $dbh->prepare($sql); 
	$q->execute(array(
		':d1'=>$_POST['number'],
		':d2'=>$givenName,
		':d3'=>$middleinitial,
		':d4'=>$surname,
		':d5'=>$gender,
		':d6'=>$city,
		':d7'=>$state,
		':d8'=>$emailAddress,
		':d9'=>$telephone,
		':d10'=>$birthday,
		':d11'=>$occupation,
		':d12'=>$company,
		':d13'=>$weight,
		':d14'=>$length,
		':d15'=>$streetAddress,
		':d16'=>$zipCode,
		':d17'=>$country,
	));
	$dbh = null;
	echo "Пользователь с ID:".$_POST['number']." отредактирован. Уходим на главную через 3 секунды";
	?>
	<meta http-equiv="Refresh" content="3; url=./">
<?php
}
 ?>