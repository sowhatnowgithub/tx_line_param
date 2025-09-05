<!DOCTYPE html>
<html>
<head>
<title>
EM ass_2
</title>
</head>
<body>

<a href='/'>Go Back</a><br>
<h1>Algo-5</h1>
<h3>Find the standing wave waveform from <br>alpha,<br> Beta (phase constant),<br> characteristic impedence <br> Input voltage magnitude <br> Reflection Coeffi mag and phase
</h3>

<form method="GET" action="/app/algo5.php">
<br>
	<b>Voltage Input Mag </b><input type="number" step="any" name="voltage_mag" placeholder="Enter the Voltage Magnitude" required>
<select name="voltage_mag_power">
<option value="0">One</option>
<option value="-3">milli</option>
<option value="-6">micro</option>
<option value="-9">nano</option>
<option value="3">K</option>
<option value="6">M</option>
<option value="9">G</option>
</select>
<br>
	<b>Reflection Coefficient Mag </b><input type="number" step="any" name="reff_mag" placeholder="Enter the Reflection Magnitude" required>
<select name="reff_mag_power">
<option value="0">One</option>
<option value="-3">milli</option>
<option value="-6">micro</option>
<option value="-9">nano</option>
<option value="3">K</option>
<option value="6">M</option>
<option value="9">G</option>
</select>
<br>
	<b>Reflection Coeff Phase</b><input type="number" step="any" name="reff_phase" placeholder="Enter the phase" required>
<select name="reff_phase_power">
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
<b>alpha (Np/m)</b><input  type="number" step="any" name="alpha" placeholder="Enter the alpha value" required>
<select name="alpha_power" required>
<option value="0">One</option>
<option value="-3">milli</option>
<option value="-6">micro</option>
<option value="-9">nano</option>
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
