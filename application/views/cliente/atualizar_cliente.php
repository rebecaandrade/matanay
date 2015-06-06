<?php $this->load->view('_include/header');?>
	<div class="container"> 
	    <div class="row">
	      	<?php echo form_open('cliente/atualizar_cliente/'.$cliente->idCliente) ?>
		        <div class="row">
		          	<div class="input-field col s12 m9 l8 offset-l1">	
		            	<input type='text' name='nome' value="<?php echo $cliente->nome?>">
		            	<label><?php echo $this->lang->line('cliente_nome'); ?></label>
		          	</div>
		        </div>
		        <button class="btn waves-effect waves-light col s12 m12 l8 offset-l1" type="submit"><?php echo $this->lang->line('atualizar'); ?>
		          	<i class="mdi-content-send right"></i>
		        </button>
		    <?php echo form_close() ?>
		</div>
	</div>		

<?php $this->load->view('_include/footer') ?>