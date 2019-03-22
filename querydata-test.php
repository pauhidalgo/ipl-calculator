<?php
//a functional php file that gets data from the sql server!
header('Content-Type: application/json');

define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'snore820[rebind');
define('DB_NAME', 'carbon_calculator_v2');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);


if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

$query1 = sprintf("SELECT DISTINCT state_province FROM congregations"); 

//execute query
$result = $mysqli->query($query1);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}


//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);


?>