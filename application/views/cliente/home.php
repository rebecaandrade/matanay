<?php $this->load->view('_include/header') ?>

<div class="container">
	<div id="wrapper">
	    <div id="home" class="row">
	    	<div class="input-field col s5 m4 l3">
		    	<a href="#">
			        <div class="card-panel grey">
			          	<i class="mdi-content-content-paste"></i>
			          	<div class="label"><?php echo $this->lang->line('relatorios'); ?></div>
			        </div> 
		        </a>
	      	</div>

	      	<div class="input-field col s7 m3 l2">
		      	<a href="<?php echo base_url(); ?>index.php/cliente/cadastros">
			        <div class="card-panel grey lighten-1">
			          	<i class="mdi-action-account-child"></i>
			          	<div class="label"><?php echo $this->lang->line('cadastros'); ?></div>
			        </div>
		        </a>
	        </div>

	        <div class="input-field col s7 m5 l4">
		        <a href="#">
			        <div class="card-panel grey lighten-2">
			          	<i class="mdi-action-trending-up"></i>
			          	<div class="label"><?php echo $this->lang->line('vendas'); ?></div>
			        </div> 
		        </a> 
	        </div>

	        <div class="input-field col s5 m3 l3">
		        <a href="<?php echo base_url(); ?>index.php/cliente/lista_clientes">
			        <div class="card-panel grey lighten-3">
			          	<i class="mdi-social-person"></i>
			          	<div class="label"><?php echo $this->lang->line('clientes'); ?></div>
			        </div> 
		        </a> 
	        </div>

	    	<div class="input-field col s5 m5 l2">
		        <a href="<?php echo base_url(); ?>index.php/albuns/listar">
			        <div class="card-panel grey">
			          	<i class="mdi-av-album"></i>
			          	<div class="label"><?php echo $this->lang->line('albums'); ?></div>
			        </div> 
		        </a> 
	        </div>
	        
	        <div class="input-field col s7 m4 l4">
	        	<a href="<?php echo base_url(); ?>index.php/faixas_videos/listar">
			        <div class="card-panel grey lighten-1">
			          	<i class="mdi-av-queue-music"></i>
			          	<div class="label"><?php echo $this->lang->line('faixas'); ?></div>
			      	</div>
		      	</a>
	        </div>

	        <div class="input-field col s12 m12 l6">
	        	<a href="#">
			        <div class="card-panel grey lighten-2">
			          	<i class="mdi-alert-warning"></i>
			          	<div class="label">NOTIFICAÇÕES</div>
			      	</div>
		      	</a>
	        </div>
	    </div>
	</div>
</div>
            
<?php $this->load->view('_include/footer') ?>