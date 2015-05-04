<?php $this->load->view('_include/header') ?>

	<div class="circulo"><img src="<?php echo base_url().'complemento/img/faixa.png' ?>"></div>

	<div id="dados">
	<?php echo form_open('usuario/cadastrar_faixa') ?>
			<label><?php echo $this->lang->line('titulo'); ?><input type='text' name='nome'></label>
			<label>ISRC <input type='text' name='isrc'></label>
			<h2><?php echo $this->lang->line('porcentagem'); ?></h2>
			<label><?php echo $this->lang->line('porcent_artista'); ?><input type='text' name='porcent_artista'></label>
			<label><?php echo $this->lang->line('porcent_compositor'); ?><input type='text' name='porcent_compositor'></label>
			<label><?php echo $this->lang->line('porcent_produtor'); ?><input type='text' name='porcent_produtor'></label>
			<input type='submit' value='<?php echo $this->lang->line('cadastrar'); ?>'>
	<?php echo form_close() ?>
	</div>

<?php $this->load->view('_include/footer') ?>