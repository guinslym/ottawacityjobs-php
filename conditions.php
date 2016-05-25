<?php
//INSERT MULTIPLE RECORDS
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ottawa";


//Loading the content in JSON
$string = file_get_contents("full.json");
$data = json_decode($string, true);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT id FROM jobs';

$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "Tutorial ID :{$row['id']} \n";
}
echo "Fetched data successfully\n";
mysql_close($conn);
