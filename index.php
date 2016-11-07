<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="jq.js"></script>
	<script src="cu.js"></script>
</head>
<body>
	<form action="add.php" method="POST">
	     <input type="submit" value="Добавить" />
	</form>
	<?php 
	try {
	    $dbh = new PDO('mysql:host=localhost;dbname=laba6', "root", "");
		//1*

		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $stat = $dbh->query('SELECT number, givenName, middleInitial, surname, city, state, birthday, telephone FROM users');
		$stat->setFetchMode(PDO::FETCH_OBJ); 

		echo "<table border=".'1'.">";
		echo "<tr>";
			echo "<td>"."ID"."</td>";
			echo "<td>"."Name"."</td>";
			echo "<td>"."Home Town"."</td>";
			echo "<td>"."Age"."</td>";
			echo "<td>"."Telephone"."</td>";
			echo "<td>"."Action"."</td>";
		echo "</tr>";
		# выводим результат 
		while($row = $stat->fetch()) { 
		echo "<tr>";
			echo "<td>".$row->number."</td>";
			echo "<td>".$row->givenName.' '.$row->middleInitial.' '.$row->surname."</td>";
			echo "<td>".$row->city.' '.$row->state."</td>";
			echo "<td>".$row->birthday."</td>";
			echo "<td>".$row->telephone."</td>";
			?>
			<td>
			<a class="edit" data-id=<?php echo "'".$row->number."'" ?> href="#">Edit</a> 
			<a class="del" data-id=<?php echo "'".$row->number."'" ?> href="#">Del</a>
			</td>
			<?php
		echo "</tr>";
		}
		echo "</table>";    
	    $dbh = null;
	} catch (PDOException $e) {
	    print "Error!: " . $e->getMessage() . "<br/>";
	    die();
	}
	?>
</body>
</html>