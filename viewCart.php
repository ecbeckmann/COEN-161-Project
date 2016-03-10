<?php 
	session_start();	// Start the session before you write your HTML page
    include ("inventory.php"); 

// This function displays the contents of the shopping cart 
function show_cart() {
	global $items;
    if (isset($_SESSION['cart'])){
		echo "Your Shopping Cart has the following items so far:<br/>"; 
		$mycart = $_SESSION['cart'];
		foreach ($mycart as $key => $value){
		if ($value >0)
		    // get the full widget name from the items array;
			$fullname = $items[$key];
			print("$fullname = $value"."<a href="."viewCart.php?drop=$key".
			">    Remove</a><br/>");
		}
	}
	else {
		echo "No items in the cart";
	
	}
}
// This function removes an item from the shopping cart
function drop() {

	 if (isset($_GET['drop'])){
	 	$dropItemId = $_GET['drop'];	 		 		
		if (isset($_SESSION['cart'])){
			$mycart = $_SESSION['cart'];
			if($mycart[$dropItemId] - 1 == 0)
				unset ($mycart[$dropItemId]);
			else
				$mycart[$dropItemId]--;			
			$_SESSION['cart'] = $mycart; 			
		} 
	}  
} 
// Adds an item to the shopping cart
function addToCart(){
	// Access the global array
	global $items;
	
	
	// Get the item id to add - this is the string sent with the 
	// selection when the user clicked a link
	
	$addItemId = $_GET['add'];
		 		 		
	if (isset($_SESSION['cart'])){
		$mycart = $_SESSION['cart'];
		
		// if the item already exists, increment the count
		if (isset($mycart[$addItemId])){
			$mycart[$addItemId]+= 1;									
		} 
		// if the item does not exist, add it to the cart
		else{
			$mycart[$addItemId] = 1;
		}		
	}
	else{
		// cart does not exist, create one
		$mycart = array();
		$mycart[$addItemId] = 1;
	}
    $_SESSION['cart'] = $mycart; 
	echo "$items[$addItemId] added to cart <br/>";  
}
function clearCart(){
	if (isset($_GET['clear'])){
	 	if (isset($_SESSION['cart'])){
			unset($_SESSION['cart']); 
	  	}
		echo "Shopping Cart Cleared ";
	} 
}
function checkout()
{
	global $items;
	global $prices;
	$total = 0;
	$subtotal = 0;
	$savings = 0;

	if (isset($_SESSION['cart'])){
		echo "Checking out now with:<br/>"; 
		$mycart = $_SESSION['cart'];
		foreach ($mycart as $key => $value){
		if ($value >0)
		    // calculate prices;
			$fullname = $items[$key];
			$subtotal = $value * $prices[$key];
			if($_SESSION["login"] == 1)
			{
				$subtotal *= 0.9;
				$savings += ($subtotal * 0.1);
			}
			echo "$value $fullname: \$" . number_format($subtotal, 2). "<br/>";
			$total += $subtotal;
		}
		echo "Grand Total: \$" . number_format($total, 2) . "<br/>";
		if($_SESSION["login"] == 1)
			echo "User Savings: \$". number_format($savings, 2) ." <br/>";
	}
	else {
		echo "No items in the cart";
	
	}
	unset($_SESSION["cart"]);
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
            <div id="image">logo</div>
            <h1>EdCamps Inc.</h1>
            
        </header>
        <section>
            <div id="nav">
                <ul id="sidebar">
                    <li><a class="log" href="login.html">Login</a></li>
                    <li><a class="log" href="#">I'm New!</a></li>
                    <li><a class="active" href="finalpagetemplate.php">Home</a></li>
                    <li><a href="registration.html">Schedule and Registration</a></li>
                    <li><a href="#">Catalog</a></li>
                    <li><a href="review.php">Forum</a></li>
                    <li><a href="#">Statistics</a></li>
                    <li><a href="#">Activities</a></li>
                </ul>
            </div>
            <div id="main">
            	<?php
					// if user has chosen "add"
					if ( isset($_GET['add'])) { 
						addToCart();
						unset($_GET['add']);
					}
					// if user has chosen "show cart"	
					elseif (isset($_GET['show'])){ 
				       		
						show_cart();
						unset($_GET['show']);	
					}
					// if user has chosen "clear cart"	
					elseif (isset($_GET['clear'])){ 
						clearCart();
						unset($_GET['clear']);	
					}
					// if user has chosen "remove item from cart"		
					elseif (isset($_GET['drop'])){ 
						drop();
						unset($_GET['drop']);	
					}// if user has chosen "remove item from cart"		
					elseif (isset($_GET['checkout'])){ 
						checkout();
						unset($_GET['checkout']);	
					}	   	
				?>
            </div>
        </section>
<p> 
    <a href="catalog.php?">Back to the Catalog</a> 
</p> 
 </body>
</html>
