<?php require "../_helpers/index.php";
echo siteHeader("Ver filme");
require("../_config/connection.php");

require("../dao/filme.php");

$filmeDAO = new Filme();

$filme = false;
$error = false;

if (!$_GET || !$_GET["id"]) {
    header('Location: index.php?message=Id do filme não informado!');
    die();
}

$idfilme = $_GET["id"];

try {
    $filme = $filmeDAO->getById($idfilme);
} catch (Exception $e) {
    echo "Id: ".$idfilme."<br>";
    $error = $e->getMessage();
}

if (!$filme || $error) {
    header('Location: index.php?message=Erro ao recuperar dados do filme!');
    die();
}


?>


    <section class="container mt-5 mb-5">
        <div class="row mb-3">
            <div class="col">
                <h1>Visualizar Filme</h1>
            </div>
        </div>

        <div class="mb-3">
            <h3>Prêmio</h3>
            <p><?= $filme["titulo"] ?></p>
        </div>
        
        <div class="mb-3">
            <h3>Nome</h3>
            <p><?= $filme["nome"] ?></p>
        </div>
        
        <div class="mb-3">
            <h3>Ano</h3>
            <p><?= $filme["ano"] ?></p>
        </div>
        <a href="index.php" class="btn btn-primary">Voltar</a>
    </section>

<?php require "../_partials/footer.php"; ?>