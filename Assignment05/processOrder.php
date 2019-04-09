<?php
	// Declare short variable names
	$cupcakeQty = $_POST['cupcakeQuantity'];
	$donutQty = $_POST['donutQuantity'];
	$breadQty = $_POST['breadQuantity'];
	$cookieQty = $_POST['cookieQuantity'];
	$address = $_POST['address'];
	$date = date('g:i A, jS F Y');
	$find = $_POST['find'];
	
	// Set empty fields to equal 0
	if ($cupcakeQty == null) $cupcakeQty = 0;
	if ($donutQty == null) $donutQty = 0;
	if ($breadQty == null) $breadQty = 0;
	if ($cookieQty == null) $cookieQty = 0;
?>

<html>
<head>
	<title>Brenda's Bakery - Order Results</title>
	
	<?php require 'Shared/brain.php';?>
</head>

<body>
	<?php include 'Shared/header.php';?>
	
	<main>
		<h2>Order Results</h2>
		
		<?php
			echo "<p>Order processed at ".$date."</p>";
			echo "<p>Your order is as follows:</p>";
			
			$totalQty = 0;  // Set the value of totalQty to 0 by default
			$totalQty = $cupcakeQty + $donutQty + $breadQty + $cookieQty;  // Set totalQty to equal the sum of all the fields
			
			echo "Items ordered: ".$totalQty."<br/>";
			
			if ($totalQty == 0) {  // Return an error message when all fields are empty
				echo "<p style='color:red;'>You have not ordered anything, please return to the Order Form.</p> <br/>";
				exit;
			} else {  // Only display products that have been ordered
				if ($cupcakeQty > 0) {
					echo $cupcakeQty." cupcakes <br/>";
				}
				if ($donutQty > 0) {
					echo $donutQty." donuts <br/>";
				}
				if ($breadQty > 0) {
					echo $breadQty." loafs of bread <br/>";
				}
				if ($cookieQty > 0) {
					echo $cookieQty." cookies <br/>";
				}
			}
			if ($address == null) {  // Return an error message when the address field is empty
				echo "<p style='color:red;'>You have not entered an address, please return to the Order Form.</p> <br/>";
				exit;
			}
			
			$totalAmount = 0.00;  // Set the value of totalAmount to 0.00 by default
			
			// Declare constants for values that should never change
			define('CUPCAKE_PRICE', 2.50);
			define('DONUT_PRICE', 1.20);
			define('BREAD_PRICE', 3);
			define('COOKIE_PRICE', 2.30);
			define('TAX_RATE', .10);
			
			$totalAmount = ($cupcakeQty * CUPCAKE_PRICE) + ($donutQty * DONUT_PRICE) + ($breadQty * BREAD_PRICE) + ($cookieQty * COOKIE_PRICE);  // Calculate the total price for the order
			$total = $totalAmount * (1 + TAX_RATE);  // Calculate the total price with tax
			// Format the results of the calculations
			$subTotal = number_format($totalAmount, 2, '.', ' ');
			$newTotal = number_format($total, 2, '.', ' ');
			
			echo "<br/> Subtotal: $".$subTotal;
			echo "<br/> Total: $".$newTotal;
			echo "<p>Address to ship to is ".$address."</p>";
			
			// Return a message for the selected option
			if($find == "1") {
				echo "<p>Customer is a regular customer.</p>";
			} elseif($find == "2") {
				echo "<p>Customer referred by YT advert.</p>";
			} elseif($find == "3") {
				echo "<p>Customer referred by Google Maps.</p>";
			} elseif($find == "4") {
				echo "<p>Customer referred by word of mouth.</p>";
			} else {
				echo "<p>We do not know how this customer found us.</p>";
			}
			
			// Create a summary of the order
			$orderSummary = $date.": \t"
				."[".$cupcakeQty." cupcakes,\t"
				.$donutQty." donuts,\t"
				.$breadQty." loafs of bread,\t"
				.$cookieQty." cookies]\t"
				."{Price: \$".$newTotal."}\t"
				."(Address: ".$address.")\n";
			
			@ $file = fopen("Data/orders.txt", 'ab');  // Open log file for appending
			
			if (!$file) {  // Return an error message when the file cannot be found
				echo "<p style='color:red;font-weight: bold;'>Your order could not be processed at this time.  Please try again later.</p>";
				exit;
			}
			
			flock($file, LOCK_EX);  // Lock the file
			fwrite($file, $orderSummary, strlen($orderSummary));  // Write the order summary to the log file
			fclose($file);  // Close the file (Which also unlocks the file at the same time)
			
			echo "<p style='color:blue;font-weight: bold;'>Order Placed.</p>";
		?>
	</main>
	
	<?php include 'Shared/footer.php';?>
</body>
</html>