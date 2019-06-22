<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TarefaTurma extends Dao {

    function __construct(){
        parent::__construct('tarefa_turma');
    }

    public function insert($data, $table = null) {
        // mais uma camada de segurança... além da validação
        $cols = array('titulo', 'prazo', 'descricao', 'turma_id');
        $this->expected_cols($cols);

        return parent::insert($data);
    }
}