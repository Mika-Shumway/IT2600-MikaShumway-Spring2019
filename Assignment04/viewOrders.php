<html>
<head>
	<title>Brenda's Bakery - Customer Orders</title>
	
	<?php require 'Shared/brain.php';?>
</head>

<body>
	<?php include 'Shared/menu.php';?>
	
	<h2>Customer Orders</h2>
	
	<?php
		@ $orders = file("Data/orders.txt");  // Read file into array
		
		if (count($orders) == 0) {  // Return an error message when array is empty
			echo "<p style='color:red;font-weight: bold;'>No orders pending.  Please try again later.</p>";
			exit;
		}
		
		echo "<table id='data'> \n";
		echo "<tr> \n
			<th>Order Date</th>
			<th>Cupcakes</th>
			<th>Donuts</th>
			<th>Bread Loafs</th>
			<th>Cookies</th>
			<th>Total</th>
			<th>Address</th>
		<tr> \n";
		
		foreach ($orders as $order) {  // Proccess each line
			$notValues = ['[', ']', '{', '}', '(', ')', ': ', ' cupcakes,', ' donuts,', ' loafs of bread,', ' cookies', 'Price', 'Address'];
			
			$cleanLine = str_replace($notValues, "", $order);  // Keep only the values of each line
			
			$line = explode("\t", $cleanLine);  // Split up the items in each line

			echo "<tr> \n";
			
			foreach ($line as $item) {  // Output each item
				echo "<td>".$item."</td>";
			}
			unset($item);  // Clear reffrence of $item to $line
			
			echo "</tr> \n";
		}
		unset($order);  // Clear reffrence of $order to $orders
		
		echo "</table> \n";
	?>
</body>
</html>