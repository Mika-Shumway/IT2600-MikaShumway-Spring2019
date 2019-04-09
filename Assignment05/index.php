<html>
<head>
	<title>Brenda's Bakery - Order Form</title>
	
	<?php require 'Shared/brain.php';?>
</head>

<body>
	<?php include 'Shared/header.php';?>
	
	<main>
		<form action="processOrder.php" method="post">
			<div class="rTable">
				<table id="form">
						<tr>
							<th>Item</th>
							<th>Quantity</th>
						</tr>
						<tr>
							<td>Cupcake</td>
							<td>
								<input type="number" name="cupcakeQuantity" placeholder="#" min="0" max="20" oninvalid="invalid(this)" onchange="valid(this)">
							</td>
						</tr>
						<tr>
							<td>Donut</td>
							<td>
								<input type="number" name="donutQuantity" placeholder="#" min="0" max="12" oninvalid="invalid(this)" onchange="valid(this)">
							</td>
						</tr>
						<tr>
							<td>Bread</td>
							<td>
								<input type="number" name="breadQuantity" placeholder="#" min="0" max="10" oninvalid="invalid(this)" onchange="valid(this)">
							</td>
						</tr>
						<tr>
							<td>Cookie</td>
							<td>
								<input type="number" name="cookieQuantity" placeholder="#" min="0" max="50" oninvalid="invalid(this)" onchange="valid(this)">
							</td>
						</tr>
						<tr>
							<td>Shipping Address</td>
							<td>
								<input type="text" name="address" placeholder="Address" maxlength="40" required oninvalid="invalid(this)" onchange="valid(this)">
							</td>
						</tr>
						<tr>
							<td>How did you find Brenda's Bakery?</td>
							<td>
								<select name="find">
									<option value="1">I'm a regular customer</option>
									<option value="2">YouTube Advertisements</option>
									<option value="3">Google Maps</option>
									<option value="4">A friend</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="Submit">
							</td>
						</tr>
				</table>
			</div>
		</form>
	</main>
	
	<?php include 'Shared/footer.php';?>
</body>
</html>