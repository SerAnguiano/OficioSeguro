<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'morlom';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from estado table
$query = $db->query("SELECT NombreEstado FROM estado WHERE NombreEstado LIKE '%".$searchTerm."%' ORDER BY NombreEstado ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['NombreEstado'];
}
//return json data
echo json_encode($data);
?>