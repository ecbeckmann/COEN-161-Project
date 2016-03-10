<?php
	session_start();
	include ("inventory.php");
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
            <div id="image">logo</div>
            <h1>EdCamps Inc.</h1>
            
        </header>
        <section>
            <div id="nav">
                <ul id="sidebar">
                    <li><a class="log" href="login.html">Login</a></li>
                    <li><a class="log" href="#">I'm New!</a></li>
                    <li><a href="finalpagetemplate.html">Home</a></li>
                    <li><a class="active" href="registration.html">Schedule and Registration</a></li>
                    <li><a href="#">Catalog</a></li>
                    <li><a href="viewReviews.php">Forum</a></li>
                    <li><a href="#">Statistics</a></li>
                    <li><a href="#">Activities</a></li>
                </ul>
            </div>
            <div id="main">
			<table>
				<tr> <th> Item <th> Price <th>  
			<?php     
				 global $items;
			     global $prices;

			     foreach($items as $key => $value)
			     {
			         echo <<< HTML

			             <tr><td> $value </td>
			                 <td> &dollar; $prices[$key] </td>
			             <td> <a href="viewCart.php?add=$key">Add to cart</a></td>
			         </tr>
HTML;
				 }
			?>
			</table>
			  
			  <p> 
			    <a href="viewCart.php?show">View Shopping Cart</a> 
			    <br/> <br/>
				<a href="viewCart.php?checkout">Checkout</a> 
			    <br/> <br/>
			    <a href="viewCart.php?clear">Clear Shopping Cart</a> 
			   </p> 

            </div>
        </section>
    </body>
</html>
