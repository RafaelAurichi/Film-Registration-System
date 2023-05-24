<?php
require("../_config/connection.php");
require("../dao/premio.php");
$tituloDAO = new Premio();
$error = false;

if (!$_GET || !$_GET["id"]) {
    header('Location: index.php?message=Id do prêmio não informado!');
    die();
}

$idPremio = $_GET["id"];

try {
    $result = $tituloDAO->delete($idPremio);
  
} catch (Exception $e) {
    $error = $e->getMessage();
}

$message = ($result && !$error) ? "Prêmio excluido com sucesso." : "Erro ao excluir o prêmio.";
header("Location: index.php?message=$message");
die();
