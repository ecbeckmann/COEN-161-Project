<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
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
                    <li><a href="finalpagetemplate.php">Home</a></li>
                    <li><a class="active" href="registration.html">Schedule and Registration</a></li>
                    <li><a href="#">Catalog</a></li>
                    <li><a href="#">Activities</a></li>
                    <li><a href="viewReviews.php">Forum</a></li>
                    <li><a href="#">Statistics</a></li>
                </ul>
            </div>
            <div id="main">
                <?php
                    session_start();
                    if($_SESSION["login"] == 1){
                        echo <<< HTML
                            <form action="reviewInsertion.php" method="post">
                            Rating (Out of 10): <select name ="rating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select><br>
                            Review: <br> <textarea name="review" rows="10" cols="30"></textarea> <br>
                            <input type = "submit" value = "submit">
                            </form>
HTML;
                    }
                    else
                        echo "<p>You are not logged in, therefore, you cannot leave a review </p>"
                    ?>
            </div>
        </section>
    </body>
</html>
