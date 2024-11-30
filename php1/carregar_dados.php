<?php

$con = new PDO("mysql:host=localhost;dbname=clima;charset=utf8", "root", "");

$query = $con->query("SELECT * FROM clima");
$climas = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($climas);
?>