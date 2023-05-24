<?php require "../_helpers/index.php";
echo siteHeader("Adicionar Prêmio");
require("../_config/connection.php");

require("../dao/premio.php");
$tituloDAO = new Premio();

$result = false;
$error = false;


if ($_POST) {
    try {
        $titulo = $_POST["p_titulo"];
        $rs = $tituloDAO->insert($titulo);

        if ($rs) {
            header('Location: index.php?message=Prêmio inserido com sucesso!');
            die();
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}


?>

<body>



    <section class="container mt-5 mb-5">

        <?php if ($_POST && (!$result || $error)) : ?>
            <p>
                Erro ao salvar o novo prêmio.
                <?= $error ? $error : "Erro desconhecido." ?>
            </p>
        <?php endif; ?>

        <div class="row mb-3">
            <div class="col">
                <h1>Adicionar Prêmio</h1>
            </div>
        </div>

        <form action="" method="post">
            <div class="mb-3">
                <label for="p_nome" class="form-label">Prêmio</label>
                <input type="text" class="form-control" id="p_titulo" name="p_titulo" placeholder="Prêmio do Filme">
            </div>

            <a href="index.php" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </section>

    <?php require "../_partials/footer.php"; ?>