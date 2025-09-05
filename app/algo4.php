<?php



$resistance_0_real = $_GET["resistance_0_real"];
$resistance_0_real_power = $_GET["resistance_0_real_power"];
$resistance_0_imag = $_GET["resistance_0_imag"];
$resistance_0_imag_power = $_GET["resistance_0_imag_power"];



$resistance_load_real = $_GET["resistance_load_real"];
$resistance_load_real_power = $_GET["resistance_load_real_power"];

$resistance_load_imag = $_GET["resistance_load_imag"];
$resistance_load_imag_power = $_GET["resistance_load_real_power"];





$resistance_0_real_val = $resistance_0_real * pow(10, $resistance_0_real_power);
$resistance_0_imag_val = $resistance_0_imag * pow(10, $resistance_0_imag_power);

$resistance_load_real_val = $resistance_load_real * pow(10, $resistance_load_real_power);
$resistance_load_imag_val = $resistance_load_imag * pow(10, $resistance_load_imag_power);

$cmd =
    "cd ../algo && ./tx_algo_4 " .
    number_format($resistance_load_real_val, 10, ".", "") . " " .
    number_format($resistance_load_imag_val, 10, ".", "") . " " .
    number_format($resistance_0_real_val, 10, ".", "") . " " .
    number_format($resistance_0_imag_val, 10, ".", "") ;

$result = json_decode(shell_exec($cmd));

//var_dump($result);


function displayData($data)
{
    echo "<h2>Transmission Line Complex Parameters</h2>";

    echo "<h3>Inputs</h3>";
    echo "<ul>";
    echo "<li><strong>Z<sub>L</sub> (Load Impedance):</strong> ";
    echo $data->inputs->z_L->real . " + j" . $data->inputs->z_L->imag;
    echo "</li>";

    echo "<li><strong>Z<sub>0</sub> (Characteristic Impedance):</strong> ";
    echo $data->inputs->z_0->real . " + j" . $data->inputs->z_0->imag;
    echo "</li>";
    echo "</ul>";

    echo "<h3>Outputs</h3>";
    echo "<ul>";
    echo "<li><strong>Voltage Reflection Coefficient:</strong> ";
    echo $data->outputs->VoltageRefCoeff->abs . ".exp(-j" . $data->outputs->VoltageRefCoeff->arg.")";
	$VoltageRef = $data->outputs->VoltageRefCoeff->abs;
	switch($VoltageRef) {
		case 0:	
		echo "<li>Matched Load</li>";
		break;
		case -1:
			echo "<li>Short Load</li>";
				break;
		case 1:
			echo "<li>Open Load</li>";
			break;
		}
    echo "</li>";
    echo "</ul>";
}
displayData($result);
require "../web/algo4.php";
