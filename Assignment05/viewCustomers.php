<html>
<head>
	<title>Brenda's Bakery - Customer Registrations</title>
	
	<?php require 'Shared/brain.php';?>
</head>

<body>
	<?php include 'Shared/header.php';?>
	
	<main>
		<?php
			$fileName = "customers";
			$tableTop = ['Registration Date', 'Customer', 'Address', 'City', 'State', 'Zip Code'];
			$badValues = ['[', ']', '{', '}', '(', ')', '::', ','];
			
			read2table($fileName, $tableTop, $badValues);
		?>
	</main>
	
	<?php include 'Shared/footer.php';?>
</body>
</html>