<?php

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

    echo $expiry_date . "\n" . $knowledge . "\n" ;
}
#connect to mysql or sqlite3

#Check to see if the database has already this JOBREF

#Insert to database

?>
