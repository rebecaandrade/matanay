<?php $this->load->view('_include/header') ?>

<div class="container">
	<div id="wrapper">
	    <div id="home" class="row">
	    	<div class="input-field col s12 m10 offset-m1 l6 offset-l3">
		    	<a href="<?php echo base_url(); ?>index.php/entidade/listar">
			        <div class="card-panel grey lighten-1">
			          	<i class="mdi-social-person"></i>
			          	<div class="label"><?php echo $this->lang->line('entidades'); ?></div>
			        </div> 
		        </a>
	      	</div>

	      	<div class="input-field col s12 m10 offset-m1 l6 offset-l3">
		      	<a href="<?php echo base_url(); ?>index.php/favorecido/listar">
			        <div class="card-panel grey lighten-2">
			          	<i class="mdi-action-perm-identity"></i>
			          	<div class="label"><?php echo $this->lang->line('favorecidos'); ?></div>
			        </div>
		        </a>
	        </div>
	    </div>
	</div>
</div>
            
<?php $this->load->view('_include/footer') ?>