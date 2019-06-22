<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH . '/controllers/test/Toast.php';
include_once APPPATH . 'modules/tarefa/libraries/Turma.php';

/**
 * Essa classe de teste é apenas ilustrativa e foi criada somente 
 * para que você perceba a utilidade da execução de uma suite de testes.
 */

class TurmaTest extends Toast{
    private $turma;

    function __construct(){
        parent::__construct('TurmaTest');
    }

    function _pre(){
        $this->turma = new Turma();
    }

    function test_carrega_lista_de_turmas(){
        $v = $this->turma->lista();
        $this->_assert_equals(4, sizeof($v), "Número de turmas incorreto");
    }

    function test_gera_nome_das_turmas(){
        $nome = $this->turma->nome(2);
        $this->_assert_equals('5º Ano B', $nome, "Erro no nome da turma");
    }

}