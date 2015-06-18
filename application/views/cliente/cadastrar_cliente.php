<?php $this->load->view('_include/header') ?>
	<div class="container"> 
		<div class="row">
			<?php echo form_open('cliente/cadastrar_cliente') ?>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">	
						<i class="mdi-action-account-box prefix"></i>
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