<?php 

  class ENTIDADE extends CI_Controller {  

    function __construct() {//carregar os models que sao de onde carrega as paradas do banco
        parent:: __construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('entidade_model');
        $this->load->model('favorecido_model');
        $this->load->database();
    }

    public function index(){
      $this->listar();
      $sucesso=null;
      //$this->mostrar_cadastro($sucesso);
        
      } 

    public function mostrar_cadastro($sucesso){
      if (isset($sucesso)){
        $dados['sucesso']=$sucesso;
      }
      $dados["dadofavorecido"]=$this->favorecido_model->buscar_favorecido();
      $dados["dadoentidade"]=$this->entidade_model->buscar_entidades();
      //esse envio ocorre para que se saiba os favorecidos cadastrados dentro da view de cadastro de entidadesalem de saber o idioma
      $this->load->view("Entidade/cadastro_entidade_view", $dados);     
    }

      public function cadastra_entidade(){
          $this->session->set_flashdata('redirect_url', current_url());

          $linguagem_usuario = $this->session->userdata('linguagem');
          $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
        
          $this->load->view('entidade/cadastro_entidade');
       }
    
    public function cadastrar(){

        if ($this->input->post('favorecido')){//se for favorecido coloca no banco o que eh pego no form sobre favorecido
            $entidade = array(//recebe do form as informacoes da entidade
                'nome' => $this->input->post('nomeentidade') ,
                'cpf_cnpj' => $this->input->post('cpf_cnpj') ,
                'contato' => $this->input->post('contato') ,
                'email' => $this->input->post('email') ,
                'percentual_digital' => $this->input->post('porcentagemganhodigital') ,
                'percentual_fisico' => $this->input->post('porcentagemganhofisico') ,
                'favorecido' => $this->input->post('favorecido') ,
                'idTipo_Entidade' => $this->input->post('identificacao'),
            );
            $id_entidade=$this->entidade_model->cadastrar_entidade($entidade);//coloca os telefones

            $telefone = array(
                  'idEntidade'=>$id_entidade,
                  'numero'=>$this->input->post('telefone1')
                 );
            $this->entidade_model->cadastrar_telefone($telefone);//coloca os telefones
            $telefone = array(
                  'idEntidade'=>$id_entidade,
                  'numero'=>$this->input->post('telefone2')
                 );
            $this->entidade_model->cadastrar_telefone($telefone);
            $favorecido= array(
                'Entidade_idEntidade'=>$id_entidade,
                'banco'=>$this->input->post('banco'),
                'agencia'=>$this->input->post('agencia'),
                'conta'=>$this->input->post('contacorrente')
                );
            $idfavorecidos=$this->entidade_model->cadastrar_favorecido($favorecido);
            $sucesso="Cadastro realizado com sucesso";
            $this->mostrar_cadastro($sucesso);
        }
    }
    
    public function listar(){
        $dados["dadofavorecido"]=$this->favorecido_model->buscar_favorecido();
        $dados["dadoentidade"]=$this->entidade_model->buscar_entidades();
        $this->load->view("Entidade/listar_entidades_view",$dados);
    }
    
    public function camposatualizacao(){
        $id=$this->input->get('id');
        $dados['dadosentidade']= $this->entidade_model->buscar_entidade_especifica($id);
        $dados['dadosfavorecido']= $this->favorecido_model->buscar_favorecido_especifica($id);
        $rowtelefone=0;
        $dados['telefone1']= $this->entidade_model->buscar_telefone_especifico($id, $rowtelefone);
        $rowtelefone=1;
        $dados['telefone2']= $this->entidade_model->buscar_telefone_especifico($id, $rowtelefone);
        $dados_auxiliar= $this->entidade_model->buscar_entidade_especifica($id);//utilizado para passar o idTipo_entidade para a busca de identificacao na tabela tipo_entidade
        $dados['dadosidentificacao']= $this->entidade_model->buscar_identificacao_especifica($dados_auxiliar->idTipo_Entidade);
        
        $this->load->view('Entidade/editar_entidade_view', $dados);
    }

    public function atualizar(){
        $entidade = array(//recebe do form as informacoes da entidade
                'idEntidade'=> $this->input->post('idEntidade') ,
                'nome' => $this->input->post('nome') ,
                'cpf_cnpj' => $this->input->post('cpf_cnpj') ,
                'contato' => $this->input->post('contato') ,
                'email' => $this->input->post('email') ,
                'percentual_digital' => $this->input->post('percentual_digital') ,
                'percentual_fisico' => $this->input->post('percentual_fisico') ,
                'favorecido' => $this->input->post('favorecido') ,
                'idTipo_Entidade' => $this->input->post('identificacao'),
         );
        $id_entidade=$this->input->post('idEntidade');//coloca os telefones
        $erro[10]=$this->entidade_model->atualizar_entidade($entidade);
        $telefone1 = array(
              'idTelefone'=> $this->input->post('idtelefone1') ,              
              'idEntidade'=>$id_entidade,
              'numero'=>$this->input->post('telefone1')
             );
        $erro[4]=$this->entidade_model->atualizar_telefone($telefone1);//coloca os telefones
        $telefone2 = array(
              'idTelefone'=> $this->input->post('idtelefone2') ,
              'idEntidade'=>$id_entidade,
              'numero'=>$this->input->post('telefone2')
             );
        $erro[0]=$this->entidade_model->atualizar_telefone($telefone2);

        $favorecido= array(
            'Entidade_idEntidade'=>$id_entidade,
            'banco'=>$this->input->post('banco'),
            'agencia'=>$this->input->post('agencia'),
            'conta'=>$this->input->post('conta')
            );
        $erro[1]=$this->entidade_model->atualizar_favorecido($favorecido);
        $sucesso="Atualizacao realizado com sucesso";
        $this->index();

    }







}