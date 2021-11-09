<?php
header('Access-Control-Allow-Origin:*');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$q=htmlspecialchars($_GET["country"]);
//echo $q;

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$q%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($stmt);

echo json_encode($results);
?>


