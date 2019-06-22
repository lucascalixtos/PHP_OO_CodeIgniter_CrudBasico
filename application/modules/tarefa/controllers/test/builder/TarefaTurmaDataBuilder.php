<?php
include_once APPPATH.'controllers/test/builder/TestDataBuilder.php';

class TarefaTurmaDataBuilder extends TestDataBuilder {

    public function __construct($table = 'lp2_modulo_test'){
        parent::__construct('tarefa_turma', $table);
    }

    function getData($index = -1){
        $data[0]['prazo'] = '2019-06-05';
        $data[0]['titulo'] = 'Atividade 01';
        $data[0]['turma_id'] = 5;
        $data[0]['descricao'] = 'Uma tarefa bem difícil';

        $data[1]['prazo'] = '2019-06-04';
        $data[1]['titulo'] = 'Tarefa atrasada';
        $data[1]['turma_id'] = 6;
        $data[1]['descricao'] = 'Uma tarefa sem nota';

        $data[2]['prazo'] = '2019-06-03';
        $data[2]['titulo'] = 'Tarefa muito atrasada';
        $data[2]['turma_id'] = 7;
        $data[2]['descricao'] = 'Caso de reprovar o aluno';
        return $index > -1 ? $data[$index] : $data;
    }

}