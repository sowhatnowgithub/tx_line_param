<!DOCTYPE html>
<html>
<head>
<title>
EM ass_2
</title>
</head>
<body>

<a href='/'>Go Back</a><br>
<h1>Algo-4</h1>
<h3>Find the Paramaters Voltage reflection coeff from <br> Load Impedance<br> characteristic impedance
</h3>

<form method="GET" action="/app/algo4.php">

<br>
	<b>Load Impedance Real (ohm)</b><input type="number" step="any" name="resistance_load_real" placeholder="Enter the Resistance" required>
<select name="resistance_load_real_power">
<option value="0">One</option>
<option value="3">K</option>
<option value="6">M</option>
<option value="9">G</option>
</select>
<br>
	<b>Load Impedance Imag (j ohm)</b><input type="number" step="any" name="resistance_load_imag" placeholder="Enter the Resistance" required>
<select name="resistance_load_imag_power">
<option value="0">One</option>
<option value="3">K</option>
<option value="6">M</option>
<option value="9">G</option>
</select>
<br>
	<b>characteristic Impedance real part(ohm)</b><input type="number" step="any" name="resistance_0_real" placeholder="Enter the Resistance" required>
<select name="resistance_0_real_power">
<option value="0">One</option>
<option value="3">K</option>
<option value="6">M</option>
<option value="9">G</option>
</select>
<br>
	<b>characteristic Impedance Imag part(j ohm)</b><input type="number" step="any" name="resistance_0_imag" placeholder="Enter the Resistance" required>
<select name="resistance_0_imag_power">
<option value="0">One</option>
<option value="3">K</option>
<option value="6">M</option>
<option value="9">G</option>
</select>
<br>
<input type="submit">
</form>
</body>
</html>
