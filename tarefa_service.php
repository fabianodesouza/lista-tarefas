<?php

class TarefaService {

    private $conexao;
    private $tarefa;

    public function __construct(Tarefa $tarefa, Conexao $conexao)
    {
        $this->tarefa = $tarefa;
        $this->conexao = $conexao->conectar();
    }

    // Funcão de criar tarefa
    public function criarTarefa() {
        $query = 'insert into tb_tarefas(tarefa) values (:tarefa)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->execute();
        return $this;

    }

    // Funcão de exibir tarefas
    public function exibirTarefas() {
        $query = '
        select
            tbt.id, tbt.tarefa, tbs.status
        from
            tb_tarefas as tbt
        left join
            tb_status as tbs on (tbt.id_status = tbs.id)';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    // Funcão de editar tarefas
    public function editarTarefa() {

        $query = 'update tb_tarefas set tarefa = ? where id = ?';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('tarefa'));
        $stmt->bindValue(2, $this->tarefa->__get('id'));
        $stmt->execute();
        return $this;
    }

    // Funcão de remover tarefas
    public function removerTarefa() {

        $query = 'delete from tb_tarefas where id = ?';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('id'));
        $stmt->execute();
        return $this;
    }

    // Funcão de conclusão da tarefa
    public function concluirTarefa() {

        $query = 'update tb_tarefas set id_status = ? where id = ?';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('id_status'));
        $stmt->bindValue(2, $this->tarefa->__get('id'));
        $stmt->execute();
        return $this;

    }

    // Funcão de exibir tarefa pendentes
    public function exibirTarefasPedentes() {

        $query = '
        select
            tbt.id, tbt.tarefa, tbs.status
        from
            tb_tarefas as tbt
        left join
            tb_status as tbs on (tbt.id_status = tbs.id)
        where
            tbt.id_status = ?';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('id_status'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>