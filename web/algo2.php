<!DOCTYPE html>
<html>
<head>
<title>
EM ass_2
</title>
</head>
<body>

<a href='/'>Go Back</a><br>
<h1>Welcome</h1>
<h3>Find the Paramaters L and C from <br> Omega,<br> Beta (phase constant),<br> characteristic impedence
</h3>

<form method="GET" action="/app/algo2.php">

<br>
<b>Enter Omega(2pif)</b> : <input type="number" step="any" name="omega" placeholder="Enter the number" required> 
<select name="omega_power">
<option value="0">One</option>
<option value="3">K</option>
<option value="6">M</option>
<option value="9">G</option>
</select>
<br>
	<b>characteristic Impedance (ohm)</b><input type="number" step="any" name="resistance" placeholder="Enter the Resistance" required>
<select name="resistance_power">
<option value="0">One</option>
<option value="3">K</option>
<option value="6">M</option>
<option value="9">G</option>
</select>
<br>
<b>beta (rad/m)</b><input  type="number" step="any" name="beta" placeholder="Enter the beta value" required>
<select name="beta_power" required>
<option value="0">One</option>
<option value="-3">milli</option>
<option value="-6">micro</option>
<option value="-9">nano</option>
</select>
<br>
<input type="submit">
</form>
</body>
</html>
