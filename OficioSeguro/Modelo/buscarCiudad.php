<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'morlompruebas';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from estado table
$query = $db->query("SELECT * FROM ciudad WHERE NombreCiudad LIKE '%".$searchTerm."%' ORDER BY NombreCiudad ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['NombreCiudad'];
}
//return json data
echo json_encode($data);
?>