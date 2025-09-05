<!DOCTYPE html>
<html>
<head>
<title>
EM ass_2
</title>
</head>
<body>
<a href='/'>Go Back</a><br>
<h3>Find the Paramaters <br> gamma(propagation constant),<br> alpha,<br> Beta (phase constant),<br> phase veloicty,<br> characteristic impedence,<br> lamda from R L G C and Omeag(2*pi*F),
</h3>

<form method="GET" action="/app/algo1.php">

<br>
<b>Enter Omega(2pif)</b> : <input type="number" step="any" name="omega" placeholder="Enter the number" required> 
<select name="omega_power">
<option value="0">One</option>
<option value="3">K</option>
<option value="6">M</option>
<option value="9">G</option>
</select>
<br>
<b>Resistance (ohm/m)</b><input type="number" step="any" name="resistance" placeholder="Enter the Resistance" required>
<select name="resistance_power">
<option value="0">One</option>
<option value="3">K</option>
<option value="6">M</option>
<option value="9">G</option>
</select>

<br>
<b>capacitance (F/m)</b><input  type="number" step="any" name="capacitance" placeholder="Enter the capacitance" required>
<select name="capacitance_power" required>
<option value="0">One</option>
<option value="-3">milli</option>
<option value="-6">micro</option>
<option value="-9">nano</option>
</select>
<br>
<b>Inductance (H/m)</b><input  type="number" step="any" name="inductance" placeholder="Enter the inductance">
<select name="inductance_power">
<option value="0">One</option>
<option value="-6">micro</option>
<option value="-3">milli</option>
</select>

<br>
<b>Conductance (S/m)</b><input type="number" step="any" name="conductance" placeholder="Enter the conductance">
<select name="conductance_power">
<option value="0">One</option>
<option value="-6">micro</option>
<option value="-3">milli</option>
<option value="3">kilo</option>
</select>
<br>
<b>Type Of Transmission Line (S/m)</b>
<select name="typeoftxline">
<option value="0">General Case</option>
<option value="1">Loseless Case</option>
<option value="2">Distortion Less Case</option>
<input type="submit" >
</form>
</body>
</html>
