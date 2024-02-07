<?php

  require 'conexao.php';
  require 'tarefa_model.php';
  require 'tarefa_service.php';

  $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

  // Criando a funcão de adicionar tarefa
  if($acao == 'novaTarefa') {

    

    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($tarefa, $conexao);
    
    if($tarefaService->criarTarefa()) {

        header('Location: nova_tarefa.php?inserir=1');
    }else{
        header('Location: nova_tarefa.php?inserir=erro');
    }
  // Criando a funcão de exibir tarefa    
  }else if($acao == 'exibirTarefas') {

    $tarefa = new Tarefa();

    $conexao = new Conexao();

    $tarefaService = new TarefaService($tarefa, $conexao);
    $tarefas = $tarefaService->exibirTarefas();

    // Criando a funcão de editar tarefa
  }else if($acao == 'editarTarefa') {
    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa'])->__set('id', $_POST['id']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($tarefa, $conexao);

    if($tarefaService->editarTarefa()) {

        if(isset($_GET['pag']) && $_GET['pag'] == 'index') {

            header('Location: index.php');
        }else {
            header('Location: todas_tarefas.php');
        }
    }

    // Criando a funcão de exluir tarefa
  }else if($acao == 'removerTarefa') {

    $tarefa = new Tarefa();
    $tarefa->__set('id', $_GET['id']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($tarefa, $conexao);

    if($tarefaService->removerTarefa()) {

        if(isset($_GET['pag']) && $_GET['pag'] == 'index') {

            header('Location: index.php');
        }else {
            header('Location: todas_tarefas.php');
        }
    }
    // Criando a funcão de conclisão da tarefa
  }else if($acao == 'tarefaFeita') {

    $tarefa = new Tarefa();
    $tarefa->__set('id', $_GET['id'])->__set('id_status', 2);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($tarefa, $conexao);

    if($tarefaService->concluirTarefa()) {

        if(isset($_GET['pag']) && $_GET['pag'] == 'index') {

            header('Location: index.php');
        }else {
            header('Location: todas_tarefas.php');
        }
    }
    // Criando a funcão para exibir somente as funções pendentes tarefa
  }else if($acao == 'exibirTarefasPendentes') {

    $tarefa = new Tarefa();
    $tarefa->__set('id_status', 1);
    $conexao = new Conexao();

    $tarefaService = new TarefaService($tarefa, $conexao);
    $tarefas = $tarefaService->exibirTarefasPedentes();
  }
 
?>