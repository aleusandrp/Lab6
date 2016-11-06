<?php
$dbh = new PDO('mysql:host=localhost;dbname=laba6', "root", "");
// здесь мы каким-то образом используем соединение
$sth = $dbh->query('SELECT * FROM foo');

// соединение больше не нужно, закрываем
$sth = null;
$dbh = null;
?>