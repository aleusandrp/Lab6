<!DOCTYPE <html></html>
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
		

	    /*/
	    $handle = fopen("newbase.txt", "r");
		while (($base = fgetcsv($handle, 1000, ";")) !== FALSE) {
			$sql = "INSERT INTO users VALUES (:d1,:d2,:d3,:d4,:d5,:d6,:d7,:d8,:d9,:d10,:d11,:d12,:d13,:d14,:d15,:d16,:d17)"; 
			$q = $dbh->prepare($sql); 
			$q->execute(array(
				':d1'=>$base[0],
				':d2'=>$base[1],
				':d3'=>$base[2],
				':d4'=>$base[3],
				':d5'=>$base[4],
				':d6'=>$base[5],
				':d7'=>$base[6],
				':d8'=>$base[7],
				':d9'=>$base[8],
				':d10'=>preg_replace('/(\d{1,2})\.(\d{1,2})\.(\d{4})/', '$3-$1-$2', $base[9]),
				':d11'=>$base[10],
				':d12'=>$base[11],
				':d13'=>$base[12],
				':d14'=>$base[13],
				':d15'=>$base[14],
				':d16'=>$base[15],
				':d17'=>$base[16]
				));
		}
		fclose($handle);
	    /*/




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
			echo "<td>".(2016-$row->birthday = preg_replace('/(\d{1,2})\.(\d{1,2})\.(\d{4})/', '$3', $row->birthday))."</td>";
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