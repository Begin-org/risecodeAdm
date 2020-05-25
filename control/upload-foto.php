<?php

function uploadFoto($foto,$fotoTmp){

  // checa se o arquivo é mesmo uma imagem
  $check = getimagesize($fotoTmp);
  if($check !== false) {
    $ext = strtolower(substr($foto, -4)); // pega a extensão
    $nomeNovo = md5(uniqid($foto)).$ext; // renomeia com a extensão

    $destinoFoto = $_SERVER['DOCUMENT_ROOT'] . "/risecode/view/uploads/" . $nomeNovo;
    move_uploaded_file($fotoTmp, $destinoFoto);
    return $nomeNovo;

  } else {
    return "O arquivo não é uma imagem!";
  }

}

?>