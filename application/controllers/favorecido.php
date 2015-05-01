<?php 

	class favorecido extends CI_Controller {	
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
			$this->load->view("cadastro_favoreccido_view", $dados);
		}






















}