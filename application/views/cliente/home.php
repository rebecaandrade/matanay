<?php $this->load->view('_include/header') ?>

<div class="container">
	<div id="wrapper">
	    <div id="home" class="row">
	    	<div class="input-field col s12 m7 l4">
		    	<a href="<?php echo base_url(); ?>index.php/relatorio/opcoes_relatorio">
			        <div class="card-panel grey ">
			          	<i class="mdi-action-trending-up"></i>
			          	<div class="label"><?php echo $this->lang->line('vendas'); ?></div>
			        </div> 
		        </a> 
	      	</div>

	      	<div class="input-field col s7 m5 l3">
		      	<a href="<?php echo base_url(); ?>index.php/notificacao/listar">
			        <div class="card-panel grey lighten-1">
			          	<i class="mdi-alert-warning"></i>
			          	<div class="label"><?php echo $this->lang->line('notificacao'); ?></div>
			        </div>
		        </a>
	        </div>

	        <div class="input-field col s5 m4 l3">
		        <a href="<?=base_url().'index.php/relatorio/listar_relatorios'?>">
			        <div class="card-panel grey lighten-2">
			          	<i class="mdi-content-content-paste"></i>
			          	<div class="label"><?php echo $this->lang->line('relatorios'); ?></div>
			        </div> 
		        </a>
	        </div>

	        <!--O unico que pode acessar os clientes eh o admin, para um usuario comum soh pode ser visto os perfis-->
	        <?php   
        		$funcionalidades = $this->cliente_model->minhas_funcionalidades($this->session->userdata('id_usuario'));
		        foreach ($funcionalidades as $funcionalidade){
		            if ( $funcionalidade->nome == "func_manter_cliente"){?>
				        <div class="input-field col s12 m8 l2">
					        <a href="<?php echo base_url(); ?>index.php/cliente/lista_clientes">
						        <div class="card-panel grey lighten-3">
						          	<i class="mdi-social-person"></i>
						          	<div class="label"><?php echo $this->lang->line('clientes'); ?></div>
						        </div> 
					        </a> 
				        </div>
			<?php 
			            break; ?>
		    <?php 
					} else { ?>
				    	<div class="input-field col s12 m8 l2">
					        <a href="<?php echo base_url().'index.php/cliente/lista_perfis/'.$this->session->userdata('cliente_id');?>">
						        <div class="card-panel grey lighten-3">
						          	<i class="mdi-social-person"></i>
						          	<div class="label"><?php echo $this->lang->line('perfis'); ?></div>
						        </div> 
					        </a> 
				        </div>

		    <?php 
		    			break; 
		    		} 
		    	}?>


	    	<div class="input-field col s5 m6 l2">
		        <a href="<?php echo base_url(); ?>index.php/albuns/listar">
			        <div class="card-panel grey">
			          	<i class="mdi-av-album"></i>
			          	<div class="label"><?php echo $this->lang->line('albums'); ?></div>
			        </div> 
		        </a> 
	        </div>
	        
	        <div class="input-field col s7 m6 l4">
	        	<a href="<?php echo base_url(); ?>index.php/faixas_videos/listar">
			        <div class="card-panel grey lighten-1">
			          	<i class="mdi-av-queue-music"></i>
			          	<div class="label"><?php echo $this->lang->line('faixas'); ?></div>
			      	</div>
		      	</a>
	        </div>

	        <div class="input-field col s12 m12 l6">
	        	<a href="<?php echo base_url(); ?>index.php/cliente/cadastros">
			        <div class="card-panel grey lighten-2">
			          	<i class="mdi-action-account-child"></i>
			          	<div class="label"><?php echo $this->lang->line('cadastros1'); ?></div>
			      	</div>
		      	</a>
	        </div>
	        <?php if ($notificacao == true){ ?>
			    <script type="text/javascript">
			    	notificacaoMensagem(<?= $this->lang->line('langOpt') ?>);
			    </script>
			<?php } ?>
	    </div>
	</div>
</div>

<div id="wrapper-body">
    <div class="row">
    </div>
    <div class="row">
    	<?php 
    	$contador = 0;
		$flag = 1;
		?>
        <?php foreach ($dadoNotificacao as $notificacao) { 
            //contador serve para imprimir apenas as tres notificacoes mais 
            if ($contador >= 3)
            	break;
            /*verificao das datas atuais e convercoes para unix*/
            $unix =  mysql_to_unix($notificacao->data_fim);
            $now = now();

            $tempo = timespan($now,$unix  );
            /*verificacao do numero de meses*/
            $meses=0;
            if($tempo[2] == "Y"){
                $meses = $tempo[0] *12 + $tempo[8];
            }
            else
                if($tempo[2] == "M"){
                    $meses = $tempo[0] + $tempo[10] / 4 ;
                }
            if((($meses <= $notificacao->alerta)&&($meses != 0))||(($meses <= $notificacao->alerta)&&($tempo != '1 Second'))){ 
            	$contador ++; ?>
                <?php if($flag == 1){ 
                	$flag = 0; ?>
                	<div id="titulo_lista">
    			        <div class="row">
    			            <div id="tituloNotificacao" class="input-field col s12 m8 l9">
    			                <i class="mdi-alert-warning"></i>
    			                <?php echo $this->lang->line('principaisNotificacoes'); ?>
    			            </div>
    			        </div>
    			    </div>
                    <table  id="myTable_wrapper1" class="hoverable bordered">
    		            <thead>
    		                <tr>
    		                    <th>   <?php echo $this->lang->line('contrato_nome'); ?>    </th>
    		                    <th>   <?php echo $this->lang->line('data_fim'); ?>         </th>
    		                    <th>   <?php echo $this->lang->line('nome_entidade'); ?>    </th>
    		                    <th>   <?php echo $this->lang->line('nome_favorecido'); ?>  </th>
    		                </tr>
    		            </thead>
    		    <?php } ?>
	            <tbody>
                    <tr>
                        <td>    <?php echo $notificacao->nome; ?>           </td>
                        <td>    <?php echo $notificacao->data_fim; ?>       </td>
                        <?php foreach ($dadosEntidade as $entidade){
                            if ($entidade->idEntidade == $notificacao->idEntidade){ ?>
                                <td>    <?php echo $entidade->nome; ?>      </td> 
                                <?php break; ?>                                   
                        <?php } } foreach ($dadosFavorecido as $favorecido) {
                            if ($favorecido->idFavorecido == $notificacao->idFavorecido) { ?>
                                <td>    <?php echo $favorecido->nome; ?>      </td>                                    
                                <?php break; ?>                                   
                        <?php } } ?>
                    </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
</div>
            
<?php $this->load->view('_include/footer') ?>