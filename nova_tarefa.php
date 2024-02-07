<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="img/icone.png" type="image/x-icon">
		<title>App Lista Tarefas</title>


		<!-- Estilo -->
		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="css/responsivo.css">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<!-- Bootstrap Icon -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

		<!-- Fontawesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<!-- Google fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Rubik&family=Secular+One&display=swap" rel="stylesheet">

		<!-- Java script -->
		<script src="js/script.js" defer></script>

	</head>

	<body class="fundo">
		<nav class="navbar navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="nova_tarefa.php">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="Logo Lista Tarefa">
					App Lista Tarefas
				</a>
			</div>
			<div class="dark-btn-box">
				<input type="checkbox" class="checkbox" id="check">
				 <label class="label" for="check">
				 <i class="bi bi-moon-fill"></i>
				 <i class="bi bi-brightness-high-fill"></i>
					<div class="ball"></div>
				 </label>
			</div>
		</nav>
		<?php if(isset($_GET['inserir']) && $_GET['inserir'] == 1) { ?>
			<div class="bg-success text-white pt-2 d-flex justify-content-center">
				<h5>Tarefa criada com sucesso</h5>
			</div>
		<?php } ?>

		<?php if(isset($_GET['inserir']) && $_GET['inserir'] == 'erro') { ?>
			<div class="bg-danger text-white pt-2 d-flex justify-content-center">
				<h5>Erro.Tarefa não pode ser criada</h5>
			</div>
		<?php } ?>
		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item active"><a href="#">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Nova tarefa</h4>
								<hr />

								<form action="tarefa_controller.php?acao=novaTarefa" method="post">
									<div class="form-group">
										<label>Descrição da tarefa:</label>
										<input type="text" class="form-control" placeholder="Exemplo: Lavar o carro" name="tarefa">
									</div>

									<button class="btn btn-success">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>