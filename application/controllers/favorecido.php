<?php /*FEITO POR MIM JADIEL*/

  class Favorecido extends CI_Controller {  

    function __construct() {//carregar os models que sao de onde carrega as paradas do banco
        parent:: __construct();
        $this->load->model('Entidade_model');
        $this->load->model('Favorecido_model');
    }

    public function index(){

      $this->listar();

      //$this->mostrar_cadastro($sucesso);
        
      } 

    public function validar_telefone($telefone){
      if(!preg_match('|\(?\d{2}\)? ?\d{4}\-?\d{4}|', $telefone)){
          return false;
       } 

    }


    public function validar_cpf($cpf){
      $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
      // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
      if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
        return FALSE;
      } else { // Calcula os números para verificar se o CPF é verdadeiro
        for ($t = 9; $t < 11; $t++) {
          for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
          }
          $d = ((10 * $d) % 11) % 10;
          if ($cpf{$c} != $d) {
            return FALSE;
          }
        }
        return TRUE;
      }
    }

    public function validar_cpnj($cnpj){
      $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

      // Valida tamanho
      if (strlen($cnpj) != 14)
        return false;

      // Valida primeiro dígito verificador
      for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
      {
        $soma += $cnpj{$i} * $j;
        $j = ($j == 2) ? 9 : $j - 1;
      }

      $resto = $soma % 11;

      if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
        return false;

      // Valida segundo dígito verificador
      for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
      {
        $soma += $cnpj{$i} * $j;
        $j = ($j == 2) ? 9 : $j - 1;
      }

      $resto = $soma % 11;

      return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }


    public function mostrar_cadastro(){
      $this->session->set_flashdata('redirect_url', current_url());
      $linguagem_usuario = $this->session->userdata('linguagem');
      $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
      $this->load->view("Favorecido/cadastro_favorecido_view");     
    }
    
    public function cadastrar(){
      //TESTE DOS CAMPOS, Sim, estupido para caralho, deve ter outro jeito para fazer isso, mais estou sem tempo
      if(($this->input->post('nomeentidade')==null)||($this->input->post('cpf_cnpj')==null)||($this->input->post('cpf/cnpj')==null)||($this->input->post('contato')==null)||($this->input->post('email')==null)||($this->input->post('porcentagemganhodigital')==null)||( $this->input->post('porcentagemganhofisico')==null)||($this->input->post('identificacao')==null)||($this->input->post('telefone1')==null)||($this->input->post('telefone2')==null)){
          $this->session->set_flashdata('aviso','campo_vazio');
          redirect('favorecido/mostrar_cadastro');
      }
        if ($this->input->post('cpf/cnpj')=="cpf"){
            $validade_cpf=$this->validar_cpf($this->input->post('cpf_cnpj'));
            if($validade_cpf==FALSE){
              $this->session->set_flashdata('aviso','cpf_invalido');
              redirect('favorecido/mostrar_cadastro');
            }
        }
        if ($this->input->post('cpf/cnpj')=="cpnj"){
            $validade_cnpj=$this->validar_cpnj($this->input->post('cpf_cnpj'));
            if($validade_cnpj==FALSE){
              $this->session->set_flashdata('aviso','cnpj_invalido');
              redirect('favorecido/mostrar_cadastro');

            } 
        }

        /*$validade_telefone1=$this->validar_telefone($this->input->post('telefone1'));
        if ($validade_telefone1==false){
            $erro["message"]="Telefone 1 imválido!!";  
            $erro["heading"] ="ERRO!!";
            $this->load->view('errors/html/error_general', $erro);///EU SEI QUE NAO ROLA DE DEIXAR ISSO DESSA FORMA
        }
        $validade_telefone2=$this->validar_telefone($this->input->post('telefone2'));
        if ($validade_telefone2==false){
            $erro["message"]="Telefone 2 imválido!!";  
            $erro["heading"] ="ERRO!!";
            $this->load->view('errors/html/error_general', $erro);///EU SEI QUE NAO ROLA DE DEIXAR ISSO DESSA FORMA
        }*/
          $entidade = array(//recebe do form as informacoes da entidade
              'nome' => $this->input->post('nomeentidade') ,
              'cpf_cnpj' => $this->input->post('cpf_cnpj') ,
              'contato' => $this->input->post('contato') ,
              'email' => $this->input->post('email') ,
              'percentual_digital' => $this->input->post('porcentagemganhodigital') ,
              'percentual_fisico' => $this->input->post('porcentagemganhofisico') ,
              'idTipo_Entidade' => $this->input->post('identificacao'),
              'favorecido' => 1 ,
          );
          $id_entidade=$this->Entidade_model->cadastrar_entidade($entidade);//coloca os telefones
          $telefone = array(
                'idEntidade'=>$id_entidade,
                'numero'=>$this->input->post('telefone1')
               );
          $this->Entidade_model->cadastrar_telefone($telefone);//coloca os telefones
          $telefone = array(
                'idEntidade'=>$id_entidade,
                'numero'=>$this->input->post('telefone2')
              );
          $this->Entidade_model->cadastrar_telefone($telefone);
          $favorecido= array(
              'Entidade_idEntidade'=>$id_entidade,
              'banco'=>$this->input->post('banco'),
              'agencia'=>$this->input->post('agencia'),
              'conta'=>$this->input->post('contacorrente')
              );
          $idfavorecidos=$this->Entidade_model->cadastrar_favorecido($favorecido);
          $this->session->set_flashdata('sucesso', 'cadastro_realizado');
          redirect('Favorecido/mostrar_cadastro');
    }
    
    public function listar(){
        $dados["dadofavorecido"]=$this->Favorecido_model->buscar_favorecido();
        $dados["dadoentidade"]=$this->Entidade_model->buscar_entidades();
        $this->load->view("Favorecido/listar_favorecido_view",$dados);
    }
    
    public function camposatualizacao(){
      
        $id=$this->input->get('id');
        $dados['dadosentidade']= $this->Entidade_model->buscar_entidade_especifica($id);
        $dados['dadosfavorecido']= $this->Favorecido_model->buscar_favorecido_especifica($id);
        $rowtelefone=0;
        $dados['telefone1']= $this->Entidade_model->buscar_telefone_especifico($id, $rowtelefone);
        $rowtelefone=1;
        $dados['telefone2']= $this->Entidade_model->buscar_telefone_especifico($id, $rowtelefone);
        $dados_auxiliar= $this->Entidade_model->buscar_entidade_especifica($id);//utilizado para passar o idTipo_entidade para a busca de identificacao na tabela tipo_entidade
        $dados['dadosidentificacao']= $this->Entidade_model->buscar_identificacao_especifica($dados_auxiliar->idTipo_Entidade);
        $this->load->view('Favorecido/editar_favorecido_view', $dados);
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
        $erro[10]=$this->Entidade_model->atualizar_entidade($entidade);
        $telefone1 = array(
              'idTelefone'=> $this->input->post('idtelefone1') ,              
              'idEntidade'=>$id_entidade,
              'numero'=>$this->input->post('telefone1')
             );
        $erro[4]=$this->Entidade_model->atualizar_telefone($telefone1);//coloca os telefones
        $telefone2 = array(
              'idTelefone'=> $this->input->post('idtelefone2') ,
              'idEntidade'=>$id_entidade,
              'numero'=>$this->input->post('telefone2')
             );
        $erro[0]=$this->Entidade_model->atualizar_telefone($telefone2);

        $favorecido= array(
            'Entidade_idEntidade'=>$id_entidade,
            'banco'=>$this->input->post('banco'),
            'agencia'=>$this->input->post('agencia'),
            'conta'=>$this->input->post('conta')
            );
        $erro[1]=$this->Entidade_model->atualizar_favorecido($favorecido);
        $sucesso="Atualizacao realizado com sucesso!!";
        $this->index();

    }







}