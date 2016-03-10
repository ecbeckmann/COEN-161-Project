<?php
session_start();
require "db_config.php";

$result = array();

try {
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Try and find other childName

	$stmt = $dbh->prepare("SELECT * FROM COEN_161_FINAL_UserInformation WHERE childName = :childName");
	$stmt->bindParam(':childName', $_SESSION["childName"]);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}

?>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
        <link rel="stylesheet" type="text/css" href="finalstyle.css">
        <title>EdCamps</title>
    </head>
    <body>
        <header>
            <div id="logo">
                <img id="corner" src = "edcamplogosmall.png"></img>
            </div>
            <h1>EdCamps Inc.</h1>
            
        </header>
        <section>
            <div id="nav">
                <ul id="sidebar">
                    <li><a href="login.html">Login</a></li>
                    <li><a href="finalmainpage.html">Home</a></li>
                    <li><a class="active" href="registration.html">Schedule and Registration</a></li>
                    <li><a href="catalog.php">Catalog</a></li>
                    <li><a href="viewReviews.php">Forum</a></li>
                    <li><a href="finalvisual.html">Statistics</a></li>
                    <li><a href="activities.html">Activities</a></li>
                </ul>
            </div>
            <div id="main">
            	<?php
            	global $result;

            	echo <<< HTML
            	<p>Child Name: $result[childName]</p>
            	<p>Child's Grade Level: $result[gradeLevel]</p>
            	<p>Duration: $result[duration]</p>
            	<p>Section: $result[section]</p>
HTML;
				?>
            </div>
        </section>
    </body>
</html>

