<?php
session_start();
require "db_config.php";

$result = array();

try {
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Try and find other childName

	$stmt = $dbh->prepare("SELECT * FROM COEN_161_FINAL_UserInformation");
	$stmt->bindParam(':childName', $_SESSION["childName"]);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}

?>

<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="finalstyle.css">
        <title>EdCamps</title>
    </head>
    <body>
        <header>
            <div id="image">logo</div>
            <h1>EdCamps Inc.</h1>
            
        </header>
        <section>
            <div id="nav">
                <ul id="sidebar">
                    <li><a class="log" href="login.html">Login</a></li>
                    <li><a class="log" href="#">I'm New!</a></li>
                    <li><a href="finalpagetemplate.html">Home</a></li>
                    <li><a class="active" href="#">Schedule and Registration</a></li>
                    <li><a href="#">Catalog</a></li>
                    <li><a href="review.php">Forum</a></li>
                    <li><a href="#">Statistics</a></li>
                    <li><a href="#">Activities</a></li>
                </ul>
            </div>
            <div id="main">
            	<?php
            	global $result;

                for ($i=0; $i < count($result) ; $i++) { 

                if(empty($result[$i]["rating"]) || empty($result[$i]["review"]))
                {
                    continue;
                }

                //print_r($result[$i]);

            	echo "<p>Child Name:" . $result[$i]["childName"] . "</p>";
            	echo "<p>Parent Name:" . $result[$i]["parentName"] . "</p>";
            	echo "<p>Child's Grade Level:" . $result[$i]["gradeLevel"] . "</p>";
            	echo "<p>Duration:" . $result[$i]["duration"] . "</p>";
            	echo "<p>Section:" . $result[$i]["section"] . "</p>";
                echo "<p>Rating:" . $result[$i]["rating"] . "</p>";
                echo "<p>Review:" . $result[$i]["review"] . "</p>";
                echo "<br>";
                }
				?>
            </div>
        </section>
    </body>
</html>
