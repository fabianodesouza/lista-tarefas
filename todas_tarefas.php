<?php

	$acao = 'exibirTarefas';
	require 'tarefa_controller.php';

	// echo '<pre>';
    // print_r($tarefas);
    // echo '</pre>';
?>



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

		<!-- Java script -->
		<script>
			function editarTarefa(txt_tarefa,id) {

				let form = document.createElement('form');
				form.action = 'tarefa_controller.php?acao=editarTarefa';
				form.method = 'POST';
				form.className = 'row';

				let inputTarefa = document.createElement('input');
				inputTarefa.type = 'text';
				inputTarefa.name = 'tarefa';
				inputTarefa.value = txt_tarefa;
				inputTarefa.className = 'form-control col-7';

				let inputId = document.createElement('input');
				inputId.type = 'hidden';
				inputId.name = 'id';
				inputId.value = id;

				let button = document.createElement('button');
				button.type = 'submit';
				button.className = 'btn btn-info col-3';
				button.innerHTML = 'Editar';

				form.appendChild(inputTarefa);
				form.appendChild(inputId);
				form.appendChild(button);

				// console.log(form);

				let tarefa = document.getElementById(`tarefa_${id}`);
				tarefa.innerHTML = '';
				tarefa.insertBefore(form, tarefa[0]);

			}

			function removerTarefa(id) {

				location.href = `tarefa_controller.php?acao=removerTarefa&id=${id}`;
			}

			function tarefaConcluida(id) {
				location.href = `tarefa_controller.php?acao=tarefaFeita&id=${id}`;
			}
		</script>
		
	</head>

	<body class="fundo">
		<nav class="navbar navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="todas_tarefas.php">
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

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />
								<?php foreach($tarefas as $tarefa) { ?>
									<div class="row mb-1 d-flex align-items-center tarefa">
										<div class="col-sm-9" id="tarefa_<?=$tarefa['id']?>">
											<?=$tarefa['tarefa']?> (<?=$tarefa['status']?>)
										</div>
										<div class="col-sm-3 mt-2 mb-3 d-flex justify-content-end icone">
											<i class="fas fa-trash-alt fa-lg text-danger"
											onclick="removerTarefa(<?=$tarefa['id']?>)"></i>
											<?php if($tarefa['status'] == 'pendente') { ?>
											<i class="fas fa-edit fa-lg text-info"
											onclick="editarTarefa('<?=$tarefa['tarefa']?>',<?=$tarefa['id']?>)"></i>
											<i class="fas fa-check-square fa-lg text-success"
											onclick="tarefaConcluida(<?=$tarefa['id']?>)"></i>
											<?php } ?>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>