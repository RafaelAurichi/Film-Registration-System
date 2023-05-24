<?php require "../_helpers/index.php";
echo siteHeader("Adicionar filme");
require("../_config/connection.php");
require("../dao/filme.php");
require("../dao/premio.php");

$filmeDAO = new Filme();
$tituloDAO = new Premio();

$result = false;
$error = false;
if ($_POST) {
    try {
        $idPremio  = $_POST["p_idPremio"];
        $nome = $_POST["p_nome"];
        $ano = $_POST["p_ano"];
        
        $result = $filmeDAO->insert($idPremio, $nome, $ano);
         if ($result) {
            header('Location: index.php?message=Filme inserido com sucesso!');
            die();
        } 
    } catch (Exception $e) {
        $error = $e->getMessage();
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

    <?php if ($_POST && (!$result || $error)) : ?>
        <p>
            Erro ao salvar o filme.
            <?= $error ? $error : "Erro desconhecido." ?>
        </p>
    <?php endif; ?>

    <div class="row mb-3">
        <div class="col">
            <h1>Adicionar Filme</h1>
        </div>
    </div>

    <form action="" method="post">
        <div class="row">

            <div class="mb-3">
                <label for="p_idPremio" class="form-label">Selecione o prêmio</label>
                <select class="form-select" id="p_idPremio" name="p_idPremio" required>
                    <option value="">-- Selecione um --</option>

                    <?php foreach ($titulos as $titulo) : ?>
                        <option value="<?= $titulo->id ?>">
                            <?= $titulo->titulo ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="p_nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="p_nome" name="p_nome" />
            </div>
            <div class="col-9">
                <label for="p_ano" class="form-label">Ano</label>
                <input type="text" class="form-control" id="p_ano" name="p_ano" />
            </div>
        </div>
        
        
        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>

    </form>
</section>

<?php require "../_partials/footer.php"; ?>