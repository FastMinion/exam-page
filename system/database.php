<?php


$dbName = "ote";
$dbUser = "root";
$dbPass = "";
$dbPrefix = "ote__";


$dsn = "mysql:host=localhost;dbname=".$dbName.";charset=utf8mb4";


$db = new PDO($dsn, $dbUser, $dbPass);


function DbQuery($sql, $params = null)
{
	global $db;
	$query = $db->prepare($sql);
	$query->execute($params);
	$result = $query->fetchAll(PDO::FETCH_ASSOC);

	return $result;
}
