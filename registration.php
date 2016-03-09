<?php
session_start();
require "db_config.php";

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST')
{
	$childName = $_POST["childName"];
	$dateOfBirth = $_POST["dateOfBirth"];
	$parentName = $_POST["parentName"];
	$parentEmailPhone = $_POST["parentEmailPhone"];
	$gradeLevel = $_POST["gradeLevel"];
	$schoolName = $_POST["schoolName"];
	$specialInstructions = $_POST["specialInstructions"];
	$duration = $_POST["duration"];
	$paymentInfo = $_POST["paymentInfo"];
	$section = $_POST["section"];
}

try {
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Try and find other childName
	$stmt = $dbh->prepare("SELECT childName FROM COEN_161_FINAL_UserInformation WHERE parentName = :parentName");
	$stmt->bindParam(':parentName', $parentName);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	//If Found, give 10% discount
	if (empty($result))
	    $baseFee = 50;
	else
	    $baseFee = 45;

	//Calc total fee    
	$TotalFee = $baseFee * $_POST["duration"];


   //Insert all of the information into table
	$stmt = $dbh->prepare("INSERT INTO COEN_161_FINAL_UserInformation (
		childName, dateOfBirth, 
		parentName, parentEmailPhone, 
		gradeLevel, schoolName,
		instructions, duration,
		fee, paymentInfo,
		section
		)
    VALUES (
    	:childName, :dateOfBirth,
    	:parentName, :parentEmailPhone,
    	:gradeLevel, :schoolName,
    	:instructions, :duration,
    	:fee, :paymentInfo,
    	:section
    	)");

    $stmt->bindParam(':childName', $childName);
    $stmt->bindParam(':dateOfBirth', $dateOfBirth);
    $stmt->bindParam(':parentName', $parentName);
    $stmt->bindParam(':parentEmailPhone', $parentEmailPhone);
    $stmt->bindParam(':gradeLevel', $gradeLevel);
    $stmt->bindParam(':schoolName', $schoolName);
    $stmt->bindParam(':instructions', $instructions);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':fee', $TotalFee);
    $stmt->bindParam(':paymentInfo', $paymentInfo);
    $stmt->bindParam(':section', $section);
    $stmt->execute();

	header('Location: scheduleInfo.php'); 

	$_SESSION["login"] = 1;
	$_SESSION["childName"] = $childName;   
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

$dbh = null;

?>
