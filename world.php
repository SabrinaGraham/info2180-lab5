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

//echo json_encode($results);


?>
<link rel="stylesheet" href="styles.css" type="text/css" />
<table>
	<thead>
	    <tr>
		    <th>Country Name</th>
			<th>Continent</th>
			<th>Independence Year</th>
			<th>Head of State</th>
		</tr>
	</thead>
    <tbody>
		<?php foreach ($results as $result): ?>
			<tr>
				<td><?= $result['name']; ?></td>
				<td><?= $result['continent']; ?></td>
				<td><?= $result['independence_year']; ?></td>
				<td><?= $result['head_of_state']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>


