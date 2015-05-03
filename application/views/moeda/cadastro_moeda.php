<?php $this->load->view('_include/header') ?>

	<div class="fadein">
		<div class="circulo"><img src=""></div>

	</div>
	<div id="dados">
		<?php echo form_open('moeda/cadastrar_moeda') ?>
			<label><?php echo $this->lang->line('currency_name'); ?><input type='text' name='nome'></label>
			<label><?php echo $this->lang->line('currency_acronym'); ?><input type='text' name='sigla'></label>
			<label><?php echo $this->lang->line('currency_exchange'); ?><input type='text' name='cambio'></label>

			<input type='submit' value='<?php echo $this->lang->line('currency_register'); ?>'>
		<?php echo form_close() ?>
	</div>

<?php $this->load->view('_include/footer') ?>