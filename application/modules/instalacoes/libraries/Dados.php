<?php


class Dados{

    private $nome;
    private $descricao;
    private $imagem;

    private $db;
    function __construct($nome = null, $descricao = null, $imagem = null){
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $ci = &get_instance();
        $this->db = $ci->db;
    }

    public function save(){
        $sql = "INSERT INTO lp2_empresa(nome, descricao, imagem) 
       VALUES ('$this->nome', '$this->descricao', '$this->imagem')"; 
        $this->db->query($sql);
    }

    public function getALL(){
        $sql = "SELECT * FROM lp2_empresa";
        $res = $this->db->query($sql);
        return $res->result_array();
     }

     public function delete($id){
        $this->db->delete('lp2_empresa', "id = $id");
    }

    public function update($data, $id){
        $this->db->update('lp2_empresa', $data, "id = $id");
        return $this->db->affected_rows();
    }

    public function getById($id){
        $rs = $this->db->get_where('lp2_empresa', "id = $id");
       return $rs->row_array();
    }



}