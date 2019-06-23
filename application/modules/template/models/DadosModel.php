<?php
include_once APPPATH.'modules\template\libraries\Dados.php';
class DadosModel extends CI_Model{

    public function salvar(){
        $nome   = $this->input->post('nome');
        $descricao = $this->input->post('descricao');
        $imagem = $this->input->post('imagem');
        $configuracao = array(
            'upload_path'   => './assets/images',
            'allowed_types' => 'gif|jpg|png|jpeg',
            'file_name'     => $imagem
        ); 
        $this->load->library('upload');
        $this->upload->initialize($configuracao);
        if ($this->upload->do_upload('imagem')){
            echo 'Arquivo salvo com sucesso.';
            $file_data = $this->upload->data();
            $dados = new Dados($nome, $descricao, $file_data['file_name']);
            $dados->save();
        }


    }

}
