<?php 

	class entidade extends CI_Controller {	

		function __construct() {//carregar os models que sao de onde carrega as paradas do banco
	      parent:: __construct();
			  $this->load->helper('form');
			  $this->load->helper('url');
        $this->load->model('entidade_model');
        $this->load->model('favorecido_model');
        $this->load->database();
    }

		public function index(){
			$this->mostrar_cadastro();
        
    	}	

		public function mostrar_cadastro(){
			$dados["flag"]="tupiniquim";//define a lingua da pagina
			if (null!=$this->input->get('id')){
				$dados["flag1"]=$this->input->get('id');
				if ($dados["flag1"]==0){
					$dados["flag"]="ingles";
				}
				else
					$dados["flag"]="tupiniquim";
      }
      $dados["dadofavorecido"]=$this->favorecido_model->buscar_favorecido();
      $dados["dadoentidade"]=$this->entidade_model->buscar_entidades();
     // var_dump($dados);
      //exit();
      //esse envio ocorre para que se saiba os favorecidos cadastrados dentro da view de cadastro de entidadesalem de saber o idioma
      $this->load->view("entidade/cadastro_entidade_view", $dados);

       		
		}


    public function cadastrar(){

        $entidade = array(//recebe do form as informacoes da entidade
            'nome' => $this->input->post('nomeentidade') ,
            'cpf_cnpj' => $this->input->post('cpf_cnpj') ,
            'contato' => $this->input->post('contato') ,
            'email' => $this->input->post('email') ,
            'percentual_digital' => $this->input->post('porcentagemganhodigital') ,
            'percentual_fisico' => $this->input->post('porcentagemganhofisico') ,
            'favorecido' => $this->input->post('favorecido') ,
            'Tipo_Entidade_idTipo_Entidade' => $this->input->post('identificacao'),
        );
        $id_entidade=$this->entidade_model->cadastrar_entidade($entidade);//coloca os telefones
        $telefone = array(
              'Entidade_idEntidade'=>$id_entidade,
              'numero'=>$this->input->post('telefone1')
             );
        $this->entidade_model->cadastrar_telefone($telefone);//coloca os telefones
        $telefone = array(
              'Entidade_idEntidade'=>$id_entidade,
              'numero'=>$this->input->post('telefone')
             );
        $this->entidade_model->cadastrar_telefone($telefone);
        if ($this->input->post('favorecido')==1){//se for favorecido coloca no banco o que eh pego no form sobre favorecido
            $favorecido= array(
                'Entidade_idEntidade'=>$id_entidade,
                'banco'=>$this->input->post('banco'),
                'agencia'=>$this->input->post('agencia'),
                'conta'=>$this->input->post('contacorrente')
          );
          $idfavorecidos=$this->entidade_model->cadastrar_favorecido($favorecido);
        }
        else;//se nao for favorecido pesquisa as entidades favorecidas e as listas em um dropdown, nao sei por que, nao faz sentido


        



    }







}