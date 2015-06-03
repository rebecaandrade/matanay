<?php $this->load->view('_include/header') ?>

<div class="container">
	<div id="wrapper">
	    <div id="home" class="row">
	    	<div class="input-field col s5 m4 l7">
		    	<a href="#">
			        <div class="card-panel grey lighten-1">
			          	<i class="mdi-content-content-paste"></i>
			          	<div class="label"><?php echo $this->lang->line('relatorios'); ?></div>
			        </div> 
		        </a>
	      	</div>

	      	<div class="input-field col s7 m4 l5">
		      	<a href="<?php echo base_url(); ?>index.php/entidade/listar">
			        <div class="card-panel grey lighten-2">
			          	<i class="mdi-action-account-child"></i>
			          	<div class="label"><?php echo $this->lang->line('entidades'); ?></div>
			        </div>
		        </a>
	        </div>

	    	<div class="input-field col s7 m4 l5">
		        <a href="<?php echo base_url(); ?>index.php/albuns/listar">
			        <div class="card-panel grey darken-1">
			          	<i class="mdi-av-album"></i>
			          	<div class="label"><?php echo $this->lang->line('albums'); ?></div>
			        </div> 
		        </a> 
	        </div>
	        
	        <div class="input-field col s5 m4 l6">
	        	<a href="<?php echo base_url(); ?>index.php/faixas_videos/listar">
			        <div class="card-panel grey lighten-1">
			          	<i class="mdi-av-queue-music"></i>
			          	<div class="label"><?php echo $this->lang->line('faixas'); ?></div>
			      	</div>
		      	</a>
	        </div>
	    </div>
	</div>
</div>
            
<?php $this->load->view('_include/footer') ?>