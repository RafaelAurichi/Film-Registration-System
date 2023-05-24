<?php require "../_helpers/index.php";
echo siteHeader("Gerenciar filmes");
require("../_config/connection.php");
require("../dao/filme.php");


$message = false;
if ($_GET && $_GET["message"]) {
	$message = $_GET["message"];
}
$filmes = new Filme();
?>
<section class="container mt-5 mb-5">

	<?php if ($message) : ?>
		<div class="alert alert-primary alert-dismissible fade show" role="alert">
			<?= $message ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<div class="row mb-3">
		<div class="col">
			<h1>Filme</h1>
		</div>
		<div class="col d-flex justify-content-end align-items-center">
			<a class="btn btn-primary" href="add.php">Adicionar</a>
		</div>
	</div>

	<table class="table table-striped table-bordered text-center">
		<thead class="table-dark">
			<tr>
				<th>ID</th>
				<th>Título</th>
				<th>Nome</th>
				<th>Ano</th>				
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($filmes->getAll() AS $filme) : ?>
				<tr>
					<td>
						<?= "#".$filme->id?>
					</td>

					<td>
						<?= $filme->titulo ?>
					</td>
					
					<td>
						<?= $filme->nome ?>
					</td>
					
					<td>
						<?= $filme->ano ?>
					</td>					
					<td>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-outline-primary" onclick="confirmDelete(<?= $filme->id ?>)">
								Excluir
							</button>
							<a href="edit.php?id=<?= $filme->id ?>" class="btn btn-outline-primary">
								Editar
							</a>
							<a href="view.php?id=<?= $filme->id ?>" class="btn btn-outline-primary">
								Ver
							</a>
						</div>
					</td>
				</tr>

			<?php endforeach; ?>
		</tbody>
		<tfooter class="table-dark">
			<tr>
				<th>ID</th>
				<th>Título</th>
				<th>Nome</th>
				<th>Ano</th>				
				<th>Ações</th>
			</tr>
		</tfooter>
	</table>
</section>

<script>
	const confirmDelete = (idfilme) => {
		const response = confirm("Deseja realmente excluir o filme?")
		if (response) {
			window.location.href = "delete.php?id=" + idfilme
		}
	}
</script>

<?php require("../_partials/footer.php"); ?>