<?php

include_once "../model/Aluno.php";
include_once "../dao/Aluno.php";

$resp = consultarEspecifico($_POST["idAluno"]);

print json_encode($resp);


?>