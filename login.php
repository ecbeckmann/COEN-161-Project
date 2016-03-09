<?php
session_start();
require "db_config.php";

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST')
{
	$childName = $_POST["childName"];
	$parentEmailPhone = $_POST["parentEmailPhone"];
}

try {
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Try and find other childName
	$stmt = $dbh->prepare("SELECT childName FROM COEN_161_FINAL_UserInformation WHERE parentEmailPhone = :parentEmailPhone");
	$stmt->bindParam(':parentEmailPhone', $parentEmailPhone);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if(empty($result))
	{
		$_SESSION["login"] = 0;
		header('Location: failed.html');
	}
	else
	{
		for ($i=0; $i < count($result) ; $i++) { 
			
			if($result[$i]["childName"] == $childName)
			{
				$_SESSION["login"] = 1;
				$_SESSION["childName"] = $childName;
				header('Location: scheduleInfo.php'); 
				break;
			}
		}
	}
	if ($_SESSION["login"] != 1)
	{
		$_SESSION["login"] = 0;
		header('Location: failed.html');
	}
	
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}


?>
