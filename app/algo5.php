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

echo $cmd;
