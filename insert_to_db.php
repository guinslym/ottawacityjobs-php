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



mysql_set_charset("utf8");

$obj = $data;
for($i=0; $i<count($obj['jobs']); $i++) {

    $job_ref = ($obj['jobs'][$i]["JOBREF"]);
    $job_url = ($obj['jobs'][$i]["JOBURL"]);
    $name = $obj['jobs'][$i]["NAME"];
    $position = $obj['jobs'][$i]["POSITION"];
    $salary_max = $obj['jobs'][$i]["SALARYMAX"];
    $salary_min = $obj['jobs'][$i]["SALARYMIN"];
    $expiry_date = $obj['jobs'][$i]["EXPIRYDATE"];
    $post_date = $obj['jobs'][$i]["POSTDATE"];
    $company_desc = $obj['jobs'][$i]["COMPANY_DESC"];
    $education_and_exp = $obj['jobs'][$i]["EDUCATIONANDEXP"];
    $knowledge = $obj['jobs'][$i]["KNOWLEDGE"];
    $job_summary = $obj['jobs'][$i]["JOB_SUMMARY"];

    //there is a difference between
    //mysql_real_escape_string
    //and
    //mysqli_real_escape_string
    //mysqli will be deprecated in php 5.5
    //https://stackoverflow.com/questions/25636975/warning-mysqli-real-escape-string-expects-exactly-2-parameters-1-given-wh
    $position = mysql_real_escape_string($position);
    $company_desc = mysql_real_escape_string($company_desc);
    $education_and_exp = mysql_real_escape_string($education_and_exp);
    $knowledge = mysql_real_escape_string($knowledge);
    $job_summary = mysql_real_escape_string($job_summary);
    $language_certificates = mysql_real_escape_string($language_certificates);
	   //echo $job_ref . " ". $job_url . " ". $position. "\n";
		$value_to_insert = "('".$job_ref."','".$job_url."','".$name."','".$position."','".$company_desc."','".$education_and_exp."','".$knowledge."','".$job_summary."','".$language_certificates."')";
		//$sql .= "INSERT INTO jobs (job_ref,job_url) VALUES ($job_ref, $job_url)";


	$sql = "INSERT INTO jobs (job_ref, job_url, name, position, company_desc, education_and_exp, knowledge, job_summary, language_certificates ) VALUES".$value_to_insert;


	if ($conn->query($sql) === TRUE) {
	    echo "\nNew records created successfully\n";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	#echo "\n".$value_to_insert."\n";

}//end for load json


$conn->close();
/*
mysql> explain jobs;
+-----------------------+-----------------+------+-----+-------------------+-----------------------------+
| Field                 | Type            | Null | Key | Default           | Extra                       |
+-----------------------+-----------------+------+-----+-------------------+-----------------------------+
| id                    | int(6) unsigned | NO   | PRI | NULL              | auto_increment              |
| job_ref               | varchar(30)     | NO   |     | NULL              |                             |
| job_url               | varchar(250)    | NO   |     | NULL              |                             |
| position              | varchar(250)    | YES  |     | NULL              |                             |
| company_desc          | text            | YES  |     | NULL              |                             |
| education_and_exp     | text            | YES  |     | NULL              |                             |
| knowledge             | text            | YES  |     | NULL              |                             |
| job_summary           | text            | YES  |     | NULL              |                             |
| language_certificates | text            | YES  |     | NULL              |                             |
| name                  | varchar(30)     | YES  |     | NULL              |                             |
| post_date             | varchar(30)     | YES  |     | NULL              |                             |
| salary_max            | varchar(30)     | YES  |     | NULL              |                             |
| salary_min            | varchar(30)     | YES  |     | NULL              |                             |
| reg_date              | timestamp       | NO   |     | CURRENT_TIMESTAMP | on update CURRENT_TIMESTAMP |
+-----------------------+-----------------+------+-----+-------------------+-----------------------------+
14 rows in set (0.00 sec)
*/
?>
