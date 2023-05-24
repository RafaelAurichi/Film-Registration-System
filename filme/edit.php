<?php require "../_helpers/index.php";
echo siteHeader("Editar filme");
require("../_config/connection.php");

require("../dao/filme.php");
require("../dao/premio.php");
$filmeDAO = new Filme();
$tituloDAO = new Premio();

$filme = false;
$error = false;

if (!$_GET || !isset($_GET["id"])) {
    header('Location: index.php?message=Id da filme não informado!');
    die();
}

$idfilme = $_GET["id"];

try {
    $filme = $filmeDAO->getById($idfilme);
} catch (Exception $e) {
    $error = $e->getMessage();
}

if (!$filme || $error) {
    header('Location: index.php?message=Erro ao recuperar dados da filme!');
    die();
}

$upadeError = false;
$updateResult = false;
if ($_POST) {
    try {
        $idPremio  = $_POST["p_idPremio"];
        $nome = $_POST["p_nome"];
        $ano = $_POST["p_ano"];
        
        $rs = $filmeDAO->update($idfilme, $idPremio, $nome, $ano);
        
        if ($rs) {
            header('Location: index.php?message=filme alterada com sucesso!');
            die();
        }
    } catch (Exception $e) {
        $upadeError = $e->getMessage();
    }
}
try {
    $titulos = $tituloDAO->getAll();
} catch (Exception $e) {
    header('Location: index.php?message=Erro ao recuperar prêmios!');
    die();
}

?>


<section class="container mt-5 mb-5">

    <?php if ($_POST && (!$rs || $upadeError)) : ?>
        <p>
            Erro ao alterar a filme.
            <?= $error ? $error : "Erro desconhecido." ?>
        </p>
    <?php endif; ?>

    <div class="row mb-3">
        <div class="col">
            <h1>Editar filme</h1>
        </div>
    </div>

    <form action="" method="post">
    <div class="row">

        <div class="mb-3">
            <label for="p_idPremio" class="form-label">Selecione o Prêmio</label>
            <select class="form-select" id="p_idPremio" name="p_idPremio" required>
                <option value="">-- Selecione um --</option>

                <?php foreach ($titulos as $titulo) : ?>
                    <option value="<?= $titulo->id ?>" <?= $titulo->id == $filme["idPremio"] ? "selected" : "" ?> >
                        <?= $titulo->titulo ?>
                </option>

                <?php endforeach; ?>

            </select>
        </div>        
        
        <div class="row mb-3">
            <div class="col-3">
                <label for="p_nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="p_nome" name="p_nome" value="<?= $filme["nome"] ?>" />
            </div>
            <div class="col-9">
                <label for="p_ano" class="form-label">Ano</label>
                <input type="text" class="form-control" id="p_ano" name="p_ano" value="<?= $filme["ano"] ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </div>

    </form>
</section>

<?php require "../_partials/footer.php"; ?>