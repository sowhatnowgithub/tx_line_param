<?php

$omega = $_GET["omega"];
$omega_power = $_GET["omega_power"];

$resistance = $_GET["resistance"];
$resistance_power = $_GET["resistance_power"];

$capacitance = $_GET["capacitance"];
$capacitance_power = $_GET["capacitance_power"];

$inductance = $_GET["inductance"];
$inductance_power = $_GET["inductance_power"];

$conductance = $_GET["conductance"];
$conductance_power = $_GET["conductance_power"];

$omega_val = $omega * pow(10, $omega_power);
$resistance_val = $resistance * pow(10, $resistance_power);
$capacitance_val = $capacitance * pow(10, $capacitance_power);
$inductance_val = $inductance * pow(10, $inductance_power);
$conductance_val = $conductance * pow(10, $conductance_power);
$typeoftxline = $_GET["typeoftxline"];

$cmd =
    "cd ../algo && ./tx_algo_1 " .
    number_format($omega_val, 10, ".", "") .
    " " .
    number_format($resistance_val, 10, ".", "") .
    " " .
    number_format($conductance_val, 10, ".", "") .
    " " .
    number_format($inductance_val, 10, ".", "") .
    " " .
    number_format($capacitance_val, 10, ".", "") .
    " " .
    $typeoftxline;

$result = json_decode(shell_exec($cmd));

function displayData($data)
{
    echo "<h2>Transmission Line Parameters</h2>";
    echo "<ul>";

    echo "<li><strong>Gamma:</strong> " .
        number_format($data->gamma->real, 10) .
        " + j" .
        number_format($data->gamma->imag, 10) .
        "</li>";
    echo "<li><strong>Alpha:</strong> " .
        number_format($data->alpha, 10) .
        "</li>";
    echo "<li><strong>Beta:</strong> " .
        number_format($data->beta, 10) .
        "</li>";
    echo "<li><strong>Z₀ (Characteristic Impedance):</strong> " .
        number_format($data->Z_0->real, 10) .
        " + j" .
        number_format($data->Z_0->imag, 10) .
        "</li>";
    echo "<li><strong>Phase Velocity:</strong> " .
        number_format($data->phaseVelocity, 10) .
        " m/s</li>";
    echo "<li><strong>Wavelength (λ):</strong> " .
        number_format($data->Lambda, 10) .
        " m</li>";

    echo "<h3>Inputs</h3>";
    echo "<ul>";
    echo "<li><strong>w:</strong> " .
        number_format($data->inputs->w, 10) .
        "</li>";
    echo "<li><strong>Rbar:</strong> " .
        number_format($data->inputs->Rbar, 10) .
        "</li>";
    echo "<li><strong>Gbar:</strong> " .
        number_format($data->inputs->Gbar, 10) .
        "</li>";
    echo "<li><strong>Lbar:</strong> " .
        number_format($data->inputs->Lbar, 10) .
        "</li>";
    echo "<li><strong>Cbar:</strong> " .
        number_format($data->inputs->Cbar, 10) .
        "</li>";
    echo "<li><strong>TypeOfTx:</strong> " .
        intval($data->inputs->TypeOfTx) .
        "</li>";
    echo "</ul>";

    echo "</ul>";
}

// Call the function
displayData($result);

require "../web/algo1.php";
