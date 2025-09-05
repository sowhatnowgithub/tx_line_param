<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EM ASS_2</title>
	<style>
	a {
		text-decoration: none;
	}
	</style>
  </head>
  <body>
<h1> Transmission Line Analysis Zone </h1>
<pre> I have created 5 Algo for solving of tx line param 

And also an ml predictive model, you can see waveforms in algo5  </pre>
<?php

echo "<br><b>Click on the algo to solve</b><br><hr>";
echo "<div class='algo_choose'>";
echo "<a href='web/algo1.php'>Algo one : Find Z0,propagation constant, Phase Velocity, Lamda</a>";
echo "<br> <br>";
echo "<a href='web/algo2.php'>Algo Two : For a loss less Tx, Find L, C</a>";
echo "<br><br>";
echo "<a href='web/algo3.php'>Algo Three : For a Distortion Less Tx line, find R, L, G, C</a>";
echo "<br><br>";
echo "<a href='web/algo4.php'>Algo Four : Finding the voltage reflection coefficient and Voltage Standing Wave Ration, using impedances</a>";
echo "<br><br>";
echo "<a href='web/algo5.php'>Algo Five : Finding the standing waveform</a>";
echo "<br><br>";
echo "<a href='/algo6.php'>Algo Six: Find load impedance using Characteristic Impedance and Voltage Reflection Coeff</a>";
echo "</div>";
?>
  </body>
</html>
