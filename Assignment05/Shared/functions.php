<?php
	function read2table($fileName, $tableTop, $badValues) {
		@ $file = file("Data/$fileName.txt");  // Read file into array
		
		if (count($file) == 0) {  // Return an error message when array is empty
			echo "<p style='color:red;font-weight: bold;'>No $fileName pending.  Please try again later.</p>";
			exit;
		}
		
		echo "<h2>".ucfirst($fileName)."</h2>";
		echo "<div class='rTable'> \n";
		
		echo "<table id='data'> \n";
		
		echo "<tr> \n";
		foreach ($tableTop as $top) {  // Output items as table headers
			echo "<th>$top</th> \n";
		}
		echo "</tr> \n";
		
		foreach ($file as $line) {  // Read each line from file
			$cleanLine = str_replace($badValues, "", $line);  // Retrieve key values from each line
			
			$items = explode("\t", $cleanLine);  // Break each line into items

			echo "<tr> \n";
			foreach ($items as $item) {  // Output items as table cells
				echo "<td>".$item."</td>";
			}
			unset($item);  // Clear reffrence of $item
			echo "</tr> \n";
		}
		unset($line);  // Clear reffrence of $line
		
		echo "</table> \n";
		echo "</div> \n";
	}
?>