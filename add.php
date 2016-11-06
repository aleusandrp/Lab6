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
		<p>givenName<input type="text" required pattern="[a-zA-Z]{1,}" name="givenName"/></p>
		<p>middleinitial<input type="text" required pattern="[A-Z]{1}" autofocus name="middleinitial"/></p>
		<p>surname<input type="text" required pattern="[a-zA-Z]{1,}" name="surname"/></p>
		<fieldset>
		<legend>gender</legend>
		<p>male<input type="radio" required name="gender" value="1"/></p>
		<p>female<input type="radio" required name="gender" value="0"/></p>
		</fieldset>
		<p>city<input type="text" required pattern="[a-zA-Z]{1,}" name="city"/></p>
		<p>state<input type="text" required pattern="[A-Z]{2}" name="state"/></p>
		<p>emailAddress<input type="email" required name="emailAddress"/></p>
		<p>telephone<input type="tel" required pattern="[0-9]{1,}-[0-9]{1,}-[0-9]{1,}" name="telephone"/></p>
		<p>birthday<input type="date" required name="birthday"/></p>
		<p>occupation<input type="text" required pattern="[a-zA-Z]{1,}" name="occupation"/></p>
		<p>company<input type="text" required pattern="[a-zA-Z]{1,}" name="company"/></p>
		<p>weight<input type="text" required pattern="[0-9]{1,}" name="weight"/></p>
		<p>length<input type="text" required pattern="[0-9]{1,}" name="length"/></p>
		<p>streetAddress<input type="text" required name="streetAddress"/></p>
		<p>zipCode<input type="text" required pattern="[0-9]{5}" name="zipCode"/></p>
		<p>country<input type="text" required pattern="[A-Z]{2}" name="country"/></p>
		<p><input type="submit" value="Добавить" /></p>
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