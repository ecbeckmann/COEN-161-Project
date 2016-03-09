<?php
session_start();
require "db_config.php";

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST')
{
	$rating = $_POST["rating"];
	if(isset($_POST["review"]))
		$review = $_POST["review"];
	else
		$review = null;
}

try {
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   //Insert all of the information into table
	$stmt = $dbh->prepare(
	"UPDATE 
		COEN_161_FINAL_UserInformation
	SET 
		rating = :rating,
		review = :review
		
    WHERE
    	childName = :childName
    	");

    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':review', $review);
    $stmt->bindParam(':childName', $_SESSION["childName"]);
    $stmt->execute();


	header('Location: viewReviews.php');    
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

$dbh = null;

?>
