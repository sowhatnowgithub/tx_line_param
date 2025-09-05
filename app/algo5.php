<?php 

$reff_mag = $_GET['reff_mag'];
$reff_mag_power = $_GET['reff_mag_power'];

$reff_phase = $_GET['reff_phase'];
$reff_phase_power = $_GET['reff_phase_power'];


$voltage_mag = $_GET['voltage_mag'];
$voltage_mag_power = $_GET['voltage_mag_power'];

$resistance = $_GET["resistance"];
$resistance_power = $_GET["resistance_power"];

$alpha = $_GET['alpha'];
$alpha_power = $_GET['alpha_power'];
$beta = $_GET['beta'];
$beta_power = $_GET['beta_power'];


$resistance_val = $resistance * pow(10, $resistance_power);
$beta_val = $beta * pow(10, $beta_power);
$alpha_val = $alpha * pow(10, $alpha_power);
$reff_mag_val = $reff_mag * pow(10, $reff_mag_power);
$reff_phase_val = $reff_phase * pow(10, $reff_phase_power);

$voltage_mag_val = $voltage_mag * pow(10, $voltage_mag_power);

$cmd =
    "cd ../algo && ./tx_algo_5 " .
	number_format($alpha_val, 10, ".", "")." " .
    number_format($beta_val, 10, ".", ""). " ".
    number_format($resistance_val, 10, ".", "") ." ".
    number_format($reff_mag_val, 10, ".", "") ." ".
    number_format($reff_phase_val, 10, ".", "") ." ".
    number_format($voltage_mag_val, 10, ".", "");

$result = json_decode(shell_exec($cmd));
var_dump($result);

function displayData($data)
{
    echo "<h2>Transmission Line Parameters</h2>";

    // Display Inputs
    echo "<h3>Inputs</h3>";
    echo "<ul>";
    echo "<li><strong>V<sub>0</sub>:</strong> {$data->inputs->V0}</li>";
    echo "<li><strong>Voltage Reflection Magnitude:</strong> {$data->inputs->volRef_mag}</li>";
    echo "<li><strong>Voltage Reflection Phase (degrees):</strong> {$data->inputs->volRef_phase}</li>";
    echo "<li><strong>Alpha:</strong> {$data->inputs->alpha}</li>";
    echo "<li><strong>Beta:</strong> {$data->inputs->beta}</li>";
    echo "<li><strong>Z<sub>0</sub> (Characteristic Impedance):</strong> {$data->inputs->Z_0}</li>";
    echo "<li><strong>λ (Lambda):</strong> {$data->inputs->lamda}</li>";
    echo "</ul>";

    // Display Outputs
    echo "<h3>Outputs</h3>";
    echo "<ul>";
    echo "<li><strong>λ (Lambda):</strong> {$data->outputs->lamda}</li>";
    echo "<li><strong>V<sub>max</sub>:</strong> {$data->outputs->Vmax}</li>";
    echo "<li><strong>V<sub>min</sub>:</strong> {$data->outputs->Vmin}</li>";
    echo "<li><strong>VSWR:</strong> {$data->outputs->VSWR}</li>";
    echo "</ul>";

    // Display V
    echo "<h3>Voltage (V) Samples</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>x</th><th>V(x)</th></tr>";
    foreach ($data->V as $pair) {
        echo "<tr><td>{$pair[0]}</td><td>{$pair[1]}</td></tr>";
    }
    echo "</table>";

    // Display I
    echo "<h3>Current (I) Samples</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>x</th><th>I(x)</th></tr>";
    foreach ($data->I as $pair) {
        echo "<tr><td>{$pair[0]}</td><td>{$pair[1]}</td></tr>";
    }
    echo "</table>";
}
displayData($result);
require "../web/algo5.php";
