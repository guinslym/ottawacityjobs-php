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

/*
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
 */

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
JOBREF VARCHAR(40)  CHARACTER SET utf8 COLLATE utf8_unicode_ci,
JOBURL TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci,
NAME VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
POSITION TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci,
COMPANYDESC TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci,
EDUCATIONANDEXP TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci,
KNOWLEDGE TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci,
JOBSUMMARY TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci,
LANGUAGECERTIFICATES TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci,
POSTDATE VARCHAR(30)CHARACTER SET utf8 COLLATE utf8_unicode_ci,
SALARYMAX VARCHAR(30)CHARACTER SET utf8 COLLATE utf8_unicode_ci,
SALARYMIN VARCHAR(30)CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";



if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

echo "\ndelete table\n";
$sql = 'DELETE FROM jobs';

if (mysqli_query($conn, $sql)) {
    echo "\nTable 'jobs' is DELETED";
} else {
    echo "\nError deleting table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
