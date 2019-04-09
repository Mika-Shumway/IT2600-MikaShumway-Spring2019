<html>
<head>
	<title>Brenda's Bakery - Customer Orders</title>
	
	<?php require 'Shared/brain.php';?>
</head>

<body>
	<?php include 'Shared/header.php';?>
	
	<main>
		<?php
			$fileName = "orders";
			$tableTop = ['Order Date', 'Cupcakes', 'Donuts', 'Bread Loafs', 'Cookies', 'Total', 'Address'];
			$badValues = ['[', ']', '{', '}', '(', ')', ': ', ' cupcakes,', ' donuts,', ' loafs of bread,', ' cookies', 'Price', 'Address'];
			
			read2table($fileName, $tableTop, $badValues);
		?>
	</main>
	
	<?php include 'Shared/footer.php';?>
</body>
</html>