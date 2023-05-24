<?php require "../_helpers/index.php";
echo siteHeader("Ver Prêmio");
require("../_config/connection.php");
require("../dao/premio.php");

$tituloDAO = new Premio();
$product = false;
$error = false;

if (!$_GET || !isset($_GET["id"])) {
    header('Location: index.php?message=Id do prêmio não informado!');
    die();
}

$idPremio = $_GET["id"];

try {
    $titulo = $tituloDAO->getById($idPremio);
} catch (Exception $e) {
    $error = $e->getMessage();
}

 if (!$titulo || $error) {
    header('Location: index.php?message=Erro ao recuperar dados do prêmio!');
    die();
} 


?>

    <section class="container mt-5 mb-5">
        <div class="row mb-3">
            <div class="col">
                <h1>Visualizar Prêmios</h1>
            </div>
        </div>

        <div class="mb-3">
            <h3>Prêmio</h3>
            <p><?= $titulo["titulo"] ?></p>
        </div>
 
        <a href="index.php" class="btn btn-primary">Voltar</a>
       
    </section>
<?php require "../_partials/footer.php"; ?>