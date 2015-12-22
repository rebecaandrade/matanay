<?php $this->load->view('_include/header') ?>
<div class="circulo"><img src="<?php echo base_url().'complemento/img/entity.png' ?>"></div>

	<div id="dados">
		<?php echo form_open('cliente/cadastrar_cliente') ?>
			<label><?php echo $this->lang->line('cliente_nome'); ?><input type='text' name='nome'></label>
			<input type='submit' value='<?php echo $this->lang->line('cliente_cadastrar'); ?>'>
		<?php echo form_close() ?>
	</div>		

<?php $this->load->view('_include/footer') ?>