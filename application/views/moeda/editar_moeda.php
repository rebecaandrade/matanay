<?php $this->load->view('_include/header'); ?>

	<div class="circulo"><img src="<?php echo base_url().'complemento/img/moeda.png' ?>"></div>

	<div id="dados">
		<?php echo form_open('moeda/editar_moeda') ?>
			<label><?php echo $this->lang->line('moeda_nome'); ?><input type='text' name='nome' value="<?php echo $moeda->nome; ?>"></label>
			<label><?php echo $this->lang->line('moeda_sigla'); ?><input type='text' name='sigla' value="<?php echo $moeda->sigla; ?>"></label>
			<label><?php echo $this->lang->line('moeda_cambio'); ?><input type='text' name='cambio' value="<?php echo $moeda->taxa_cambio; ?>"></label>
			<input type='hidden' name='id' value="<?php echo $moeda->idMoeda; ?>">
			<input type='submit' value='<?php echo $this->lang->line('moeda_editar'); ?>'>
		<?php echo form_close() ?>
	</div>

<?php $this->load->view('_include/footer') ?>