<?php
header('Access-Control-Allow-Origin:*');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$q=htmlspecialchars($_GET["country"]);


if (htmlspecialchars($_GET["context"])!=null){
    
    
    $stmt = $conn->query("SELECT* FROM countries JOIN cities ON cities.country_code=countries.code WHERE countries.name LIKE '%$q%'");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo "<table>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Name</th>";
	echo "<th>District</th>";
	echo "<th>Population</th>";
	echo "</tr>";
	echo "</thead>";
    echo "<tbody>";
	foreach ($results as $result)
	{
		echo "<tr>";
		echo "<td>";
		echo $result['name'];
		echo "</td>";
		echo "<td>"; 
		echo $result['district'];
		echo "</td>";
		echo "<td>";
		echo $result['population'];
		echo "</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
}
else {
	
	
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$q%'");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo "<table>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Country Name</th>";
	echo "<th>Continent</th>";
	echo "<th>Independence Year</th>";
	echo "<th>Head of State</th>";
	echo "</tr>";
	echo "</thead>";
    echo "<tbody>";
	foreach ($results as $result)
	{
		echo "<tr>";
		echo "<td>";
		echo $result['name']; 
		echo "</td>";
		echo "<td>"; 
		echo $result['continent'];
		echo "</td>";
		echo "<td>";
		echo $result['independence_year'];
		echo "</td>";
		echo "<td>";
		echo $result['head_of_state'];
		echo "</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";

}
    





?>
