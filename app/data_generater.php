<?php
$runs = 500; 
$allRows = [];
for ($i = 0; $i < $runs; $i++) {
    $beta  = rand(100, 500) / 100.0;
    $alpha = rand(0, 50) / 1000.0;
    $Z0    = rand(40, 80);
    $mag   = rand(0, 100) / 100.0;
    $phase = rand(-180, 180);

    $cmd = sprintf("cd ../algo && ./tx_algo_6 %f %f %f %f %f", $beta, $alpha, $Z0, $mag, $phase);

    $rawOutput = shell_exec($cmd);
    $parsed = json_decode($rawOutput, true);
    if ($parsed === null || !isset($parsed["V"])) {
        continue; 
    }

    foreach ($parsed["V"] as $row) {
        $allRows[] = [
            "Alpha"           => $row[0],
            "Beta"            => $row[1],
            "Yo"              => $row[2],
            "ReflectionMag"   => $row[3],
            "ReflectionPhase" => $row[4],
            "D"               => $row[5],
            "ReYd"            => $row[6],
            "ImgYd"           => $row[7],
            "ReYt"            => $row[8],
            "ImgYt"           => $row[9]
        ];
    }
}

file_put_contents("dataset.json", json_encode($allRows, JSON_PRETTY_PRINT));

echo " Saved " . count($allRows) . " rows to dataset.json\n";
?>

