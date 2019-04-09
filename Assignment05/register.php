<html>
<head>
	<title>Brenda's Bakery - Register Form</title>
	
	<?php require 'Shared/brain.php';?>
</head>

<body>
	<?php include 'Shared/header.php';?>
	
	<main>
		<form action="processRegistration.php" method="post">
			<div class="rTable">
				<table id="form">
						<tr>
							<th>Info</th>
							<th>Input</th>
						</tr>
						<tr>
							<td>Name</td>
							<td>
								<input type="text" name="name" placeholder="Name" maxlength="50" required oninvalid="invalid(this)" onchange="valid(this)">
							</td>
						</tr>
						<tr>
							<td>Address</td>
							<td>
								<input type="text" name="address" placeholder="Address" maxlength="40" required oninvalid="invalid(this)" onchange="valid(this)">
							</td>
						</tr>
						<tr>
							<td>City</td>
							<td>
								<input type="text" name="city" placeholder="City" maxlength="40" required oninvalid="invalid(this)" onchange="valid(this)">
							</td>
						</tr>
						<tr>
							<td>State</td>
							<td>
								<select name="state">
									<?php
										@ $states = file("Data/states.txt");  // Read file into array
										
										$count = 0;  // Set $count to 0
										
										foreach ($states as $state) {  // Proccess each line
											$line = explode("|", $state);  // Split up the items in each line
											
											echo "<option value='".$count."'>";
											echo $line[1];  // Echo the non-abbreviated portion of each line in states.txt
											echo "</option>";
											$count++;  // Increment $count
										}
										unset($state);  // Clear reffrence of $state to $states
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Zip Code</td>
							<td>
								<input type="number" name="zip" placeholder="Zip" min="11111" max="99999" required oninvalid="invalid(this)" onchange="valid(this)">
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