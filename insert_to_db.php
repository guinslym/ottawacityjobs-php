<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ottawa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Loading the content in JSON
$string = file_get_contents("full.json");
$data = json_decode($string, true);

/*

 */
$obj = $data;
for($i=0; $i<count($obj['jobs']); $i++) {

    $expiry_date = $obj['jobs'][$i]["EXPIRYDATE"];
    $company_desc = $obj['jobs'][$i]["COMPANY_DESC"];
    $education_and_exp = $obj['jobs'][$i]["EDUCATIONANDEXP"];
    $job_ref = $obj['jobs'][$i]["JOBREF"];
    $job_url = $obj['jobs'][$i]["JOBURL"];
    $knowledge = $obj['jobs'][$i]["KNOWLEDGE"];
    $job_summary = $obj['jobs'][$i]["JOB_SUMMARY"];
    $language_certificates = $obj['jobs'][$i]["LANGUAGE_CERTIFICATES"];
    $name = $obj['jobs'][$i]["NAME"];
    $position = $obj['jobs'][$i]["POSITION"];
    $post_date = $obj['jobs'][$i]["POSTDATE"];
    $salary_max = $obj['jobs'][$i]["SALARYMAX"];
    $salary_min = $obj['jobs'][$i]["SALARYMIN"];

		$sql = "INSERT INTO jobs (job_ref,job_url) VALUES ($job_ref, $job_url)";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: \n\n" . " \n\n" . $conn->error;
		}
 
}//end if load json


$conn->close();
?>
