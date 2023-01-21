<?php

$data =file_get_contents( "  ");//data.php的url

$lines = explode("\n", $data);
$pilots = [];
$atcs = [];

foreach ($lines as $line) {
    $parts = explode(':', $line);
    $type = $parts[0];

    if ($type == 'PILOT') {
        $pilot = [
            'call_sign' => $parts[2],
            'departure_airport' => $parts[9],
            'arrival_airport' => $parts[10],
        ];
        $pilots[] = $pilot;
    } elseif ($type == 'ATC') {
        $atc = [
            'user_id'=> $parts[1],
            'call_sign' => $parts[2],
            
        ];
        $atcs[] = $atc;
    }
}

$result = [
    'pilots' => $pilots,
    'atcs' => $atcs,
];

echo json_encode($result);
