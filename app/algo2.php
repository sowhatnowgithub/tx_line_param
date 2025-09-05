<?php


$omega = $_GET["omega"];
$omega_power = $_GET["omega_power"];

$resistance = $_GET["resistance"];
$resistance_power = $_GET["resistance_power"];

$beta = $_GET['beta'];
$beta_power = $_GET['beta_power'];

$omega_val = $omega * pow(10, $omega_power);
$resistance_val = $resistance * pow(10, $resistance_power);
$beta_val = $beta * pow(10, $beta_power);

$cmd =
    "cd ../algo && ./tx_algo_2 " .
    number_format($omega_val, 10, ".", "") .
    " " .
    number_format($resistance_val, 10, ".", "") .
    " " .
    number_format($beta_val, 10, ".", "") ;
$result = json_decode(shell_exec($cmd));
function displayData($data)
{
    echo "<h2>Transmission Line Parameters</h2>";
	echo "<ul>";
	echo "<li><strong>Lbar:</strong> " .
        $data->outputs->LBar .
        "</li>";
    echo "<li><strong>Cbar:</strong> " .
        $data->outputs->CBar .
		"</li>";
    echo "<h3>Inputs</h3>";
	echo "<ul>";        
    echo "<li><strong>Z₀ (Characteristic Impedance):</strong> " .
        $data->inputs->z_0 .
        "</li>";
    echo "<li><strong>Beta:</strong> " .
        $data->inputs->Beta .
		"</li>";
	echo "<li><strong>omega:</strong> " .
        $data->inputs->omega .
        "</li>";
	echo "</ul>";
	echo "</ul>";
}
displayData($result);

require "../web/algo2.php";
