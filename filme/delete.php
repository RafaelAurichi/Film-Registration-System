<?php  
	require("../_config/connection.php");
    require("../dao/filme.php");
    $filmeDAO = new Filme();
    $error = false;

    if(!$_GET || !$_GET["id"]){
        header('Location: index.php?message=Id do filme não informado!');
        die();
    }

    $idfilme = $_GET["id"];

    try {
        $result = $filmeDAO->delete($idfilme);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

    $message = ($result && !$error) ? "Filme excluido com sucesso." : "Erro ao excluir o filme.";
    header("Location: index.php?message=$message");
    die();

