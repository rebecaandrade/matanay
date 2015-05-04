<?php $this->load->view('_include/header') ?>

	<div class="circulo"><img src="<?php echo base_url().'complemento/img/moeda.png' ?>"></div>

	<div id="dados">
		<?php echo form_open('moeda/cadastrar_moeda') ?>
			<label><?php echo $this->lang->line('moeda_nome'); ?><input type='text' name='nome'></label>
			<label><?php echo $this->lang->line('moeda_sigla'); ?><input type='text' name='sigla'></label>
			<label><?php echo $this->lang->line('moeda_cambio'); ?><input type='text' name='cambio'></label>

			<input type='submit' value='<?php echo $this->lang->line('moeda_cadastrar'); ?>'>
		<?php echo form_close() ?>
	</div>

<?php $this->load->view('_include/footer') ?>