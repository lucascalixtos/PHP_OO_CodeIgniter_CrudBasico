<?php
include_once APPPATH.'modules\instalacoes\libraries\Dados.php';
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
            redirect('instalacoes/listar');
        }
        

    }

    public function lista_editar(){
        $html = '';
        $dados = new Dados();
        // organiza a lista e depois retorna o resultado
        $data = $dados->getAll();
        $html .= '<table class="table mx-auto justify-content-center" >';
        $html .= '<tr><th scope="col" class="justify-content-center" >Imagem</th><th scope="col" >Nome</th><th scope="col" >Descrição</th><th scope="col">Modificar</th></tr>';
        foreach($data as $row){
            $html .= '<tr>';
            $html .= '<th scope="col"><img src="'.base_url('assets/images/'.$row['imagem']).'" width="120px"></th>';
            $html .= '<th scope="col">'.$row['nome'].'</th>';
            $html .= '<th scope="col">'.$row['descricao'].'</th>';
            $html .='<th scope="col">'.$this->icones($row['id']).'</th></tr>';
            }
                $html .= '</table>';
                return $html;
        }

        private function icones($id){
            $html = '';
            $html .= '<a href="'.base_url('instalacoes/edit/'.$id).'"><i class="far fa-edit mr-3 text-primary"></i></a>';
            $html .= '<a href="'.base_url('instalacoes/delete/'.$id).'"><i class="far fa-trash-alt text-danger"></i></a>';
            return $html;

        }
        
        public function carrega_dados($id){
            $dados = new Dados();
            return $dados->getById($id);
        }

        public function atualizar($id){
            if(sizeof($_POST) == 0) return;
    
            $data = $this->input->post();
            $dados = new Dados();
            if($dados->update($data, $id))
                redirect('instalacoes/listar');    
        }

        public function delete($id){
            $dados = new Dados();
            $dados->delete($id);
        }

}
