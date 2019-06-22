<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dao extends CI_Object {
    private $table;
    protected $cols = '*';
    private $valid_cols;
    
    /**
     * @param string table: o nome da tabela associada à classe filha
     */
    public function __construct($table = null){
        $this->table = $table;
    }

    /**
     * Insere data na tabela table
     * 
     * @param array data: um vetor associativo contendo índices idênticos aos nomes da colunas da tabela.
     * @return int id: o identificador do último registro inserido em table | -1 para erro na inserção
     */
    public function insert($data, $table = null){
        if(!sizeof($data)) return -1;
        if(! $this->valid_cols($data)) return -1;
        $table = $table ? $table : $this->table;

        $this->db->db_debug = false;
        $this->db->insert($this->table, $data);
        $this->db->db_debug = true;
        $error = $this->db->error();

        $id = $this->db->insert_id();
        return $error['code'] > 0 ? -1 : $id;
    }
       
    /**
	 * Insere data em table; caso data ja exista em table, atualiza os pares
	 * nome/valor contidos em data.
	 *
	 * @param String $table - o nome da tabela a ser atualizada
	 * @param Array $data - os dados a serem inseridos ou atualizados na tabela table
	 * @param int id do registro inserido
	 */
	function insert_or_update($data, $table = null) {
        $updt = plic_array($data);
        $table = $table ? $table : $this->table;
		$sql = $this->db->insert_string($table, $data) .
		' ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id), '
		.urldecode(http_build_query($updt, '', ', '));
		$this->db->query($sql);
		return $this->db->insert_id();
   }

    /**
     * Retorna todos os registros de uma tabela caso não receba o array de condições.
     * @param array conds: lista de condições a serem usadas na consulta sql.
     * @param string table: nome opcional da tabela; por padrão usa o nome fornecido no construtor.
     * @param int del: -1 retorna todos; 0 retorna não deletados; 1 retorna deletados.
     * @return array associative matrix.
     */
    public function get(array $conds = null, $table = null){
        $conds = $conds ? $this->where($conds) : '';
        $table = $table ? $table : $this->table;

        $sql = "SELECT $this->cols FROM $table $conds";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function delete(array $conds = null, $table = null){
        $conds = $conds ? $this->where($conds) : '';
        $table = $table ? $table : $this->table;
        $sql = "DELETE FROM $table $conds";
        return $this->db->query($sql);
    }

    private function where($conds){
        $v = plic_array($conds);
        $s = http_build_query($v, '', ' AND ');
        return "WHERE " . urldecode($s);
    }

    public function cols(array $cols){
        $this->cols = implode(', ', $cols);
    }

    /**
     * Define as colunas que são obrigatórias na criação de um registro do bd.
     * @param array cols: a lista de nomes (strings) das colunas obrigatórias.
     */
    protected function expected_cols(array $cols){
        $this->valid_cols = $cols;
    }

    // verifica se as colunas esperadas de uma tabela
    // têm valor definido no vetor a ser inserido.
    private function valid_cols($data){
        foreach ($this->valid_cols as $col)
            if(! isset($data[$col])) 
                return false;
        return true;
    }
}
