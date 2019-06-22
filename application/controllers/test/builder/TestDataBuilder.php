<?php

abstract class TestDataBuilder extends Dao{
    private $table;

    function __construct($table, $test_db){
        if($test_db) $this->db->db_select($test_db);
        $this->table = $table;
    }

    /**
     * Insere os dados de teste na tabela $table.
     */
    public function build(){
        $data = $this->getData();
        foreach ($data AS $item)
        $this->db->insert($this->table, $item);
    }

    /**
     * Limpa a tabela que está sendo usada no teste.
     */
    public function clean_table(){
        $sql = "TRUNCATE $this->table";
        $this->db->query($sql);
    }

    /**
     * Retorna o nome do banco de dados que está sendo usado no teste.
     */
    public function database(){
        return $this->db->database;
    }

    /**
     * Informa quais são os dados de teste
     * 
     * @return matriz: dados de teste
     */
    protected abstract function getData($index = -1);

}