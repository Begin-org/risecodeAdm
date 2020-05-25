<?php

include_once "../model/Turma.php";
include_once "../dao/Turma.php";

$idTurma = $_POST["idTurma"];

$resp = excluir($idTurma);

print $resp;


?>