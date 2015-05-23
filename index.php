<?php
function generate($length) {

	if(isset($_POST['uppercase']))
		$uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	else
		$uppercase = "";

	if(isset($_POST['lowercase']))
		$lowercase = "abcdefghijklmnopqrstuvwxyz";
	else
		$lowercase = "";

	if(isset($_POST['numbers']))
		$numbers = "1234567890";
	else
		$numbers = "";

	if(isset($_POST['specialchars']))
		$specialchars = "!@#$%^&*(){}[];:,./";
	else
		$specialchars = "";

	$allchars = "$uppercase$lowercase$numbers$specialchars";

		$randompass = substr(str_shuffle($allchars), 0, $length);
		return $randompass;
	}

?>

<html>
<head>
	<title>
	Secure Password generator
	</title>
</head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<h1>Secure Password Generator</h1>
<body>
	<form action="index.php" method="POST">
		<input type="checkbox" name="uppercase" value="uppercase" <?php if(isset($_POST['uppercase'])) echo("checked='checked'"); ?>>Uppercase<br>
		<input type="checkbox" name="lowercase" value="lowercase" <?php if(isset($_POST['lowercase'])) echo("checked='checked'"); ?>>Lowercase<br>
		<input type="checkbox" name="numbers" value="numbers" <?php if(isset($_POST['numbers'])) echo("checked='checked'"); ?>>Numbers<br>
		<input type="checkbox" name="specialchars" value="specialchars" <?php if(isset($_POST['specialchars'])) echo("checked='checked'"); ?>>Special chars<br>
		 
		<select name="length">

		<option name="six">6</option> 
		<option>7</option>
		<option>8</option>
		<option>9</option>
		<option>10</option>
		<option>11</option>
		<option>12</option>	
		<option>13</option>	
		<option>14</option>	
		<option>15</option>
		</select>
		Length
		<br>
		<input type="submit" name="Generate" value="generate">
		<input type="text" value="<?php echo(generate($_POST['length']))?>">

</select>
	</form>
</body>
</html>
