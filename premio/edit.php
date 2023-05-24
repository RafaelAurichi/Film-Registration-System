<?php require "../_helpers/index.php";
echo siteHeader("Editar Prêmip");
require("../_config/connection.php");
require("../dao/premio.php");
$tituloDAO = new Premio();

$titulo = false;
$error = false;

if (!$_GET || !isset($_GET["id"])) {
    header('Location: index.php?message=Id do prêmio não informado!');
    die();
}

$idPremio = $_GET["id"];
$titulo = $tituloDAO->getById($idPremio);

if (!$titulo || $error) {
    header('Location: index.php?message=Erro ao recuperar dados do prêmio!');
    die();
}

$updateError = false;
$rs = false;
if ($_POST) {
    try {
        $titulo = $_POST["p_titulo"];        
        $rs = $tituloDAO->update($idPremio, $titulo);
        
        if ($rs) {
            header('Location: index.php?message=Prêmio atualizado com sucesso!');
            die();
        }
    } catch (Exception $e) {
        $updateError = $e->getMessage();
    }
}

?>

<body>



    <section class="container mt-5 mb-5">

        <?php if ($_POST && (!$rs || $upadeError)) : ?>
            <p>
                Erro ao alterar o prêmio.
                <?= $error ? $error : "Erro desconhecido." ?>
            </p>
        <?php endif; ?>

        <div class="row mb-3">
            <div class="col">
                <h1>Editar Prêmio</h1>
            </div>
        </div>

        <form action="" method="post">

            <div class="mb-3">
                <label for="p_nome" class="form-label">Prêmio</label>
                <input type="text" class="form-control" id="p_titulo" name="p_titulo" placeholder="Prêmio do filme" value="<?= $titulo["titulo"] ?>">
            </div>

            <a href="index.php" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>

        </form>
    </section>

    <?php require "../_partials/footer.php"; ?>