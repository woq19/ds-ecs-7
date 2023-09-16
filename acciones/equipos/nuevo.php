<?php

require_once '../equipos/request/nuevoRequest.php';
require_once '../equipos/responses/nuevoResponse.php';
require_once '../../modelo/jugadores.php';

$resp = new NuevoResponse();

$json = file_get_contents('php://input',true);
$req = json_decode($json);

header('Content-Type: application/json');

$cantidadJugadores=0;

foreach ($req->ListJugadores as $j) {
    $cantidadJugadores=$cantidadJugadores+1;
}

if($cantidadJugadores>=1 && $cantidadJugadores<=5){
    $resp->IsOk=true;
    $resp->Mensaje='';
}
else {
    $resp->IsOk=false;
    $resp->Mensaje= 'El equipo posee '.$cantidadJugadores.' y debe poseer entre 1 y 5  jugadores';
}

echo json_encode($resp);