<?php
session_start();
session_destroy(); //destroi a sessao
header("Location:index1.php"); //redireciona para o index
?>