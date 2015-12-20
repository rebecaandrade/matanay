<?php $this->load->view('_include/header') ?>
	<div id="wrapper-body"> 
		<div id="titulo_lista">
			<div class="row">
				<div class="input-field col s12 m8 l9">
					<i class="mdi-action-account-box"></i>
					<?php echo $this->lang->line('cliente_cadastro'); ?>
					<a href="<?php echo base_url(); ?>index.php/cliente/lista_clientes"
                	    class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
                	    data-position="top" data-delay="50" data-tooltip="<?php echo $this->lang->line('voltar'); ?>" id="backButton">
                	    <i class="mdi-hardware-keyboard-arrow-left"></i>
                	</a>
				</div>
			</div>
		</div><br>
		<div class="row">
			<?php echo form_open('cliente/cadastrar_cliente') ?>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">	
						<i class="mdi-action-perm-identity prefix"></i>
						<label><?php echo $this->lang->line('cliente_nome'); ?></label>
						<input type='text' name='nome'>
					</div>
				</div>
				<button class="btn waves-effect waves-light col s12 m10 offset-m1 l8 offset-l2" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
					<i class="mdi-content-send right"></i>
				</button>
			<?php echo form_close() ?>
		</div>
	</div>		

<?php $this->load->view('_include/footer') ?>