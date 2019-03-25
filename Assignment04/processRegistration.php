<?php
	// Declare short variable names
	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$stateID = $_POST['state'];
	$zip = $_POST['zip'];
	$date = date('g:i A, jS F Y');
	
	@ $states = file("Data/states.txt");  // Read file into array
	$stateLine = explode("|", $states[$stateID]);  // Split up the items in each line
	$state = $stateLine[0];  // Get the abbreviated version from states.txt
?>

<html>
<head>
	<title>Brenda's Bakery - Registration Results</title>
	
	<?php require 'Shared/brain.php';?>
</head>

<body>
	<?php include 'Shared/menu.php';?>
	
	<h2>Registration Results</h2>
	
	<?php
		echo "<p>Registration processed at ".$date."</p>";
		echo "<p>Your registration is as follows:</p>";
		
		echo "Name: ".$name."<br/>";
		echo "Address: ".$address."<br/>";
		echo "City: ".$city."<br/>";
		echo "State: ".$state."<br/>";
		echo "Zip Code: ".$zip."<br/>";
		
		// Create a summary of the registration
		$regSummary = $date."::\t"
			.$name."\t"
			."(".$address.")\t"
			."{".$city.",\t"
			.$state."\t"
			.$zip."}\n";
		
		// Check for duplicate entries
		if (file_exists("Data/customers.txt") == true) {
			@ $registrations = file("Data/customers.txt");  // Read file into array
			
			$entry = substr($regSummary, strpos($regSummary, '::'));  // Read the summary starting at ":\t"
			
			foreach ($registrations as $reg) {  // Proccess each line in file
				$line = substr($reg, strpos($reg, '::'));  // Read the line starting at ":\t"
				
				if ($entry == $line) {  // Compare entry to other registrations
					echo "<p style='color:red;font-weight: bold;'>You are already registered</p>";
					exit;
				}
			}
			unset($reg);  // Clear reffrence of $reg to $registrations
		}
		
		// Write into file
		@ $file = fopen("Data/customers.txt", 'ab');  // Open log file for appending
		
		if (!$file) {  // Return an error message when the file cannot be found
			echo "<p style='color:red;font-weight: bold;'>Your registration could not be processed at this time.  Please try again later.</p>";
			exit;
		}

		flock($file, LOCK_EX);  // Lock the file
		fwrite($file, $regSummary, strlen($regSummary));  // Write the registration summary to the log file
		fclose($file);  // Close the file (Which also unlocks the file at the same time)
		
		echo "<p style='color:blue;font-weight: bold;'>Registration Completed.</p>";
	?>
</body>
</html>