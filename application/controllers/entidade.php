<?php /*FEITO POR MIM JADIEL*/

  class Entidade extends CI_Controller {  

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

    public function procurar(){
      //pequeno teste para que na hora da busca ele interprete autor como 2 no banco.
                  $this->session->set_flashdata('redirect_url', current_url());
      $linguagem_usuario = $this->session->userdata('linguagem');
      $this->lang->load('_matanay_'. $linguagem_usuario, $linguagem_usuario);
      if(($this->input->post('procurar')==$this->lang->line('artista_min'))||($this->input->post('procurar')==$this->lang->line('artista')))
        $busca=1;
      else if(($this->input->post('procurar')==$this->lang->line('autor_min'))||($this->input->post('procurar')==$this->lang->line('autor')))
        $busca=2;
      else if(($this->input->post('procurar')==$this->lang->line('produtor_min'))||($this->input->post('procurar')==$this->lang->line('produtor')))
        $busca=3;
      else
        $busca=$this->input->post('procurar');
        $dados["busca"] = $this->Entidade_model->procurar_entidade($busca);
      $dados["dadoentidade"]=$this->Entidade_model->buscar_entidades();
      $this->load->view("Entidade/listar_entidades_view",$dados);
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
      $dados["dadofavorecido"]=$this->Favorecido_model->buscar_favorecido();
      $dados["dadoentidade"]=$this->Entidade_model->buscar_entidades();
      //esse envio ocorre para que se saiba os favorecidos cadastrados dentro da view de cadastro de entidadesalem de saber o idioma
      $this->load->view("Entidade/cadastro_entidade_view", $dados);     
    }
    
    public function cadastrar(){
      //TESTE DOS CAMPOS, Sim, estupido para caralho, deve ter outro jeito para fazer isso, mais estou sem tempo
      if(($this->input->post('nomeentidade')==null)||($this->input->post('cpf_cnpj')==null)||($this->input->post('contato')==null)||($this->input->post('email')==null)||($this->input->post('porcentagemganhodigital')==null)||( $this->input->post('porcentagemganhofisico')==null)||($this->input->post('favorecido')==null)||($this->input->post('identificacao')==null)||($this->input->post('telefone1')==null)||($this->input->post('telefone2')==null)){
          $this->session->set_flashdata('aviso','campo_vazio');
          redirect('Entidade/mostrar_cadastro');
      }
        if ($this->input->post('cpf/cnpj')=="cpf"){
            $validade_cpf=$this->validar_cpf($this->input->post('cpf_cnpj'));
            if($validade_cpf==FALSE){
              $this->session->set_flashdata('aviso','cpf_invalido');
              redirect('Entidade/mostrar_cadastro');
            }
        }
        if ($this->input->post('cpf/cnpj')=="cpnj"){
            $validade_cnpj=$this->validar_cpnj($this->input->post('cpf_cnpj'));
            if($validade_cnpj==FALSE){
              $this->session->set_flashdata('aviso','cnpj_invalido');
              redirect('Entidade/mostrar_cadastro');

            } 
        }

        //se for favorecido coloca no banco o que eh pego no form sobre favorecido
        if ($this->input->post('favorecido')){
          if($this->input->post('cpf/cnpj')=='cpf'){//testa se for cpf ou cnpj e coloca null no que nao for.
            $cpf=$this->input->post('cpf_cnpj');
            $cnpj=null;
          }else{
            $cnpj=$this->input->post('cpf_cnpj');
            $cpf=null;
          }
          $favorecido = array(//recebe do form as informacoes da entidade
              'nome' => $this->input->post('nomeentidade') ,
              'cpf' => $cpf ,
              'cnpj' => $cnpj ,
              'contato' => $this->input->post('contato') ,
              'email' => $this->input->post('email') ,
              'percentual_digital' => $this->input->post('porcentagemganhodigital') ,
              'percentual_fisico' => $this->input->post('porcentagemganhofisico') ,
              'idTipo_Favorecido' => $this->input->post('identificacao'),
              'banco'=>$this->input->post('banco'),
              'agencia'=>$this->input->post('agencia'),
              'conta'=>$this->input->post('contacorrente')
          );
          $id_entidade=$this->Favorecido_model->cadastrar_favorecido($favorecido);//coloca os telefones
          $telefone = array(
                'idFavorecido'=>$id_entidade,
                'numero'=>$this->input->post('telefone1')
               );
          $this->Favorecido_model->cadastrar_telefone($telefone);//coloca os telefones
          $telefone = array(
                'idFavorecido'=>$id_entidade,
                'numero'=>$this->input->post('telefone2')
              );
          $this->Favorecido_model->cadastrar_telefone($telefone);
          $this->session->set_flashdata('sucesso', 'cadastro_realizado');
          redirect('Entidade/mostrar_cadastro');
        }
        //se nao for favorecido segue o codigo
        else{
          if($this->input->post('cpf/cnpj')=='cpf'){//testa se for cpf ou cnpj e coloca null no que nao for.
            $cpf=$this->input->post('cpf_cnpj');
            $cnpj=null;
          }else{
            $cnpj=$this->input->post('cpf_cnpj');
            $cpf=null;
          }
          $entidade = array(//recebe do form as informacoes da entidade
              'nome' => $this->input->post('nomeentidade') ,
              'cpf' => $cpf ,
              'cnpj' => $cnpj ,
              'contato' => $this->input->post('contato') ,
              'email' => $this->input->post('email') ,
              'idFavorecido'=>$this->input->post('favorecido_relacionado'),
              'percentual_digital' => $this->input->post('porcentagemganhodigital') ,
              'percentual_fisico' => $this->input->post('porcentagemganhofisico') ,
              'idTipo_Entidade' => $this->input->post('identificacao'),

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
          $this->session->set_flashdata('sucesso', 'cadastro_realizado');
          redirect('Entidade/mostrar_cadastro');
        }
    }
    
    public function listar(){
        $this->load->library('pagination');
        $config['base_url'] = base_url('index.php/entidade/listar');
        $config['total_rows'] = $this->Entidade_model->buscar_entidades()->num_rows();
        $config['uri_segment'] = 3;
        $config['per_page'] = 5;

        $qtde = $config['per_page'];
        ($this->uri->segment(3) != '') ? $inicio = $this->uri->segment(3) : $inicio = 0;
        $this->pagination->initialize($config);

        $dados = array(
          'dadoentidade' => $this->Entidade_model->buscar_entidades($qtde, $inicio)->result(),
          'paginas' => $this->pagination->create_links()
        );

        $this->load->view("Entidade/listar_entidades_view", $dados);
    }
    
    public function camposatualizacao(){
        if($this->session->flashdata('id')!=null){
            $id=$this->session->flashdata('id');
        }
        else
        $id=$this->input->get('id');
      if ($id==null)
        redirect('entidade/listar');
      $dados['dadosentidade']= $this->Entidade_model->buscar_entidade_especifica($id);
      $dados["dadosfavorecido"]=$this->Favorecido_model->buscar_favorecido();
      $rowtelefone=0;
      $dados['telefone1']= $this->Entidade_model->buscar_telefone_especifico($id, $rowtelefone);
      $rowtelefone=1;
      $dados['telefone2']= $this->Entidade_model->buscar_telefone_especifico($id, $rowtelefone);
      $dados_auxiliar= $this->Entidade_model->buscar_entidade_especifica($id);//utilizado para passar o idTipo_entidade para a busca de identificacao na tabela tipo_entidade
      $dados['dadosidentificacao']= $this->Entidade_model->buscar_identificacao_especifica($dados_auxiliar->idTipo_Entidade);
      $this->load->view('Entidade/editar_entidade_view', $dados);

    }

    public function atualizar(){
      //TESTE DOS CAMPOS, Sim, estupido para caralho, deve ter outro jeito para fazer isso, mais estou sem tempo
      if(($this->input->post('nome')==null)||($this->input->post('contato')==null)||($this->input->post('email')==null)||($this->input->post('percentual_digital')==null)||( $this->input->post('percentual_fisico')==null)||($this->input->post('identificacao')==null)||($this->input->post('telefone1')==null)||($this->input->post('telefone2')==null)){
          $this->session->set_flashdata('aviso','campo_vazio');
          $this->session->set_flashdata('id', $this->input->post('idEntidade'));
          redirect('Entidade/camposatualizacao');
      }

        if ($this->input->post('cpf/cnpj')=="cpf"){

            $validade_cpf=$this->validar_cpf($this->input->post('cpf_cnpj'));
            if($validade_cpf==FALSE){
              $this->session->set_flashdata('aviso','cpf_invalido');
              $this->session->set_flashdata('id', $this->input->post('idEntidade'));
              redirect('Entidade/camposatualizacao');
            }
        }
        if ($this->input->post('cpf/cnpj')=="cpnj"){
            $validade_cnpj=$this->validar_cpnj($this->input->post('cpf_cnpj'));
            if($validade_cnpj==FALSE){
              $this->session->set_flashdata('aviso','cnpj_invalido');
              $this->session->set_flashdata('id', $this->input->post('idEntidade'));
              redirect('Entidade/camposatualizacao');

            } 
        }

        $entidade = array(//recebe do form as informacoes da entidade
                'idEntidade'=> $this->input->post('idEntidade') ,
                'nome' => $this->input->post('nome') ,
                'cpf' => $this->input->post('cpf') ,
                'cnpj' =>$this->input->post('cnpj') ,
                'contato' => $this->input->post('contato') ,
                'email' => $this->input->post('email') ,
                'percentual_digital' => $this->input->post('percentual_digital') ,
                'percentual_fisico' => $this->input->post('percentual_fisico') ,
                'idTipo_Entidade' => $this->input->post('identificacao'),
                'idFavorecido'=> $this->input->post('relacao_favorecido')
         );
        $id_entidade=$this->input->post('idEntidade');//coloca os telefones
        $this->Entidade_model->atualizar_entidade($entidade);
        $telefone1 = array(
              'idTelefone'=> $this->input->post('idtelefone1') ,              
              'idEntidade'=>$id_entidade,
              'numero'=>$this->input->post('telefone1')
             );
        $this->Entidade_model->atualizar_telefone($telefone1);//coloca os telefones
        $telefone2 = array(
              'idTelefone'=> $this->input->post('idtelefone2') ,
              'idEntidade'=>$id_entidade,
              'numero'=>$this->input->post('telefone2')
             );
        $this->Entidade_model->atualizar_telefone($telefone2);
        $sucesso="Atualizacao realizado com sucesso!!";
        $this->index();

    }







}