<html>
<head>
	<title>Brenda's Bakery - Customer Registrations</title>
	
	<?php require 'Shared/brain.php';?>
</head>

<body>
	<?php include 'Shared/menu.php';?>
	
	<h2>Customer Registrations</h2>
	
	<?php
		@ $registrations = file("Data/customers.txt");  // Read file into array
		
		if (count($registrations) == 0) {  // Return an error message when array is empty
			echo "<p style='color:red;font-weight: bold;'>No registrations pending.  Please try again later.</p>";
			exit;
		}
		
		echo "<table id='data'> \n";
		echo "<tr> \n
			<th>Registration Date</th>
			<th>Customer</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zip Code</th>
		<tr> \n";
		
		foreach ($registrations as $reg) {  // Proccess each line
			$notValues = ['[', ']', '{', '}', '(', ')', '::', ','];
			
			$cleanLine = str_replace($notValues, "", $reg);  // Keep only the values of each line
			
			$line = explode("\t", $cleanLine);  // Split up the items in each line

			echo "<tr> \n";
			
			foreach ($line as $item) {  // Output each item
				echo "<td>".$item."</td>";
			}
			unset($item);  // Clear reffrence of $item to $line
			
			echo "</tr> \n";
		}
		unset($reg);  // Clear reffrence of $reg to $registrations
		
		echo "</table> \n";
	?>
</body>
</html>