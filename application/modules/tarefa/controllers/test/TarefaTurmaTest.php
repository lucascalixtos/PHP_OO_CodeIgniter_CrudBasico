<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH . '/controllers/test/Toast.php';
include_once APPPATH . 'modules/tarefa/libraries/TarefaTurma.php';
include_once APPPATH . 'modules/tarefa/controllers/test/builder/TarefaTurmaDataBuilder.php';

class TarefaTurmaTest extends Toast{
    private $builder;
    private $tarefa;

    function __construct(){
        parent::__construct('TarefaTurmaTest');
    }

    function _pre(){
        $this->builder = new TarefaTurmaDataBuilder();
        $this->tarefa = new TarefaTurma();
    }

    // apenas ilustrativo
    function test_objetos_criados_corretamente(){
        $this->_assert_true($this->builder, "Erro na criação do builder");
        $this->_assert_true($this->tarefa, "Erro na criação da tarefa");
    }

    // apenas ilustrativo
    function test_selecionado_banco_de_teste(){
        $s = $this->builder->database();
        $this->_assert_equals('lp2_modulo_test', $s, 'Erro na seleção do banco de teste');
    }

    function test_insere_registro_na_tabela(){
        // cenário 1: vetor com dados corretos
        $this->builder->clean_table();
        $data = $this->builder->getData(0);
        $id1 = $this->tarefa->insert($data);
        $this->_assert_equals(1, $id1, "Esperado 1, recebido $id1");

        // verificação: o objeto criado é, de fato, aquele que enviamos?
        $task = $this->tarefa->get(array('id' => 1))[0];
        $this->_assert_equals($data['prazo'], $task['prazo']);
        $this->_assert_equals($data['titulo'], $task['titulo']);
        $this->_assert_equals($data['turma_id'], $task['turma_id']);

        // cenário 2: vetor vazio
        $id2 = $this->tarefa->insert(array());
        $this->_assert_equals(-1, $id2, "Esperado -1, recebido $id2");

        // cenário 3: vetor com dados inesperados
        $info = $this->builder->getData(1);
        $info['unexpected_col_name'] = 1;
        $id = $this->tarefa->insert($info);
        $this->_assert_equals(-1, $id, "Esperado -1, recebido $id");

        // cenário 4: vetor com dados incompletos... deve ser
        // tratado pela validação, mas tem que ser pensado aqui
        $v = array('titulo' => 'vetor incompleto');
        $id = $this->tarefa->insert($v);
        $this->_assert_equals(-1, $id, "Esperado -1, recebido $id");
    }

    function test_carrega_todos_os_registros_da_tabela(){
        $this->builder->clean_table();
        $this->builder->build();

        $tasks = $this->tarefa->get();
        $this->_assert_equals(3, sizeof($tasks), "Número de registros incorreto");
    }

    function test_carrega_registro_condicionalmente(){
        $this->builder->clean_table();
        $this->builder->build();

        $task = $this->tarefa->get(array('prazo' => '2019-06-04', 'turma_id' => 6))[0];
        $this->_assert_equals('2019-06-04', $task['prazo'], "Erro no prazo");
        $this->_assert_equals(6, $task['turma_id'], "Erro no id da turma");
    }
    
    function test_atualiza_registro(){
        $this->builder->clean_table();
        $this->builder->build();

        // lê um registro do bd
        $task1 = $this->tarefa->get(array('id' => 2))[0];
        $this->_assert_equals('2019-06-04', $task1['prazo'], "Erro no prazo");
        $this->_assert_equals(6, $task1['turma_id'], "Erro no id da turma");

        // atualiza seus valores
        $task1['prazo'] = '2019-06-02';
        $task1['turma_id'] = 8;
        $this->tarefa->insert_or_update($task1);

        // lê novamente, o mesmo objeto, e verifica se foi atualizado
        $task2 = $this->tarefa->get(array('id' => 2))[0];
        $this->_assert_equals($task1['prazo'], $task2['prazo'], "Erro no prazo");
        $this->_assert_equals($task1['turma_id'], $task2['turma_id'], "Erro no id da turma");
    }
    
    function test_remove_registro_da_tabela(){
        $this->builder->clean_table();
        $this->builder->build();

        // verifica que o registro existe
        $task1 = $this->tarefa->get(array('id' => 2))[0];
        $this->_assert_equals('2019-06-04', $task1['prazo'], "Erro no prazo");
        $this->_assert_equals(6, $task1['turma_id'], "Erro no id da turma");

        // remove o registro
        $this->tarefa->delete(array('id' => 2));

        // verifica que o registro não existe mais
        $task2 = $this->tarefa->get(array('id' => 2));
        $this->_assert_equals_strict(0, sizeof($task2), "Registro não foi removido");
    }

}