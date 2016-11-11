<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="add.php" method="POST">
	<fieldset>
	<legend>Добавление</legend>
		GivenName<br><input type="text" required name="givenName"/><br>
		MiddleInitial<br><input type="text" required pattern="[A-Z]{1}" autofocus name="middleinitial"/><br>
		Surname<br><input type="text" required name="surname"/><br>
		<fieldset>
		<legend>Gender</legend>
		Male<br><input type="radio" required name="gender" value="1"/><br>
		Female<br><input type="radio" required name="gender" value="0"/><br>
		</fieldset>
		City<br><input type="text" required name="city"/><br>
		State<br><input type="text" required pattern="[A-Z]{2}" name="state"/><br>
		EmailAddress<br><input type="email" required name="emailAddress"/><br>
		Telephone<br><input type="tel" required pattern="[0-9]{1,}-[0-9]{1,}-[0-9]{1,}" name="telephone"/><br>
		Birthday<br><input type="date" required name="birthday"/><br>
		Occupation<br><input type="text" required name="occupation"/><br>
		Company<br><input type="text" required name="company"/><br>
		Weight<br><input type="text" required name="weight"/><br>
		Length<br><input type="text" required name="length"/><br>
		StreetAddress<br><input type="text" required name="streetAddress"/><br>
		ZipCode<br><input type="text" required pattern="[0-9]{5}" name="zipCode"/><br>
		Country<br><input type="text" required pattern="[A-Z]{2}" name="country"/><br>
		<input type="submit" value="Добавить" /><br>
	</fieldset>
	</form>
</body>
</html>
<?php 
if(isset($_POST['givenName'])){
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

	$sql = "INSERT INTO users (givenName,middleInitial,surname,gender,city,state,emailAddress,telephone,birthday,occupation,company,weight,length,streetAddress,zipCode,country) VALUES (:d1,:d2,:d3,:d4,:d5,:d6,:d7,:d8,:d9,:d10,:d11,:d12,:d13,:d14,:d15,:d16)"; 
	$q = $dbh->prepare($sql); 
	$q->execute(array(
		':d1'=>$givenName,
		':d2'=>$middleinitial,
		':d3'=>$surname,
		':d4'=>$gender,
		':d5'=>$city,
		':d6'=>$state,
		':d7'=>$emailAddress,
		':d8'=>$telephone,
		':d9'=>$birthday,
		':d10'=>$occupation,
		':d11'=>$company,
		':d12'=>$weight,
		':d13'=>$length,
		':d14'=>$streetAddress,
		':d15'=>$zipCode,
		':d16'=>$country
	));
	
	$dbh = null;
}
 ?>