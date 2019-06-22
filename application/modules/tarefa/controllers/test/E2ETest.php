<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH . '/controllers/test/Toast.php';
include_once APPPATH . 'modules/tarefa/libraries/TarefaTurma.php';
include_once APPPATH . 'modules/tarefa/controllers/test/builder/TarefaTurmaDataBuilder.php';

class E2ETest extends Toast{

    function __construct(){
        parent::__construct('E2E Test');
    }

    function test_limpa_tabela_de_teste(){
        $builder = new TarefaTurmaDataBuilder('lp2_modulo');
        $builder->clean_table();

        $tarefa = new TarefaTurma();
        $data = $tarefa->get();
        $this->_assert_equals_strict(0, sizeof($data), 'Erro na limpeza da tabela de teste');
    }

}