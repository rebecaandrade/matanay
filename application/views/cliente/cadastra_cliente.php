<?php $this->load->view('_include/header') ?>
<div class="circulo"><img src="<?php echo base_url().'complemento/img/entity.png' ?>"></div>

	<div id="dados">
		<?php echo form_open('cliente/cadastrar') ?>
			<label><?php echo $this->lang->line('cliente_nome'); ?><input type='text' name='nome'></label>
			<label><?php echo $this->lang->line('cliente_login'); ?><input type='text' name='login'></label>
			<label><?php echo $this->lang->line('cliente_senha'); ?><input type='password' name='senha'></label>
			<label><?php echo $this->lang->line('cliente_confirmar_senha'); ?><input type='password' name='confirmar_senha'></label>
			<label><?php echo $this->lang->line('cliente_funcionalidades'); ?>
			<select name="func[]" >
				<option  value='' disabled selected> </option>
				<?php foreach ($funcionalidades as $func) { ?>
					<option value="<?php echo $func->idFuncionalidades ?>"> <?php echo $func->nome; ?></option>
				<?php } ?>
			</select></label>
			<input type='submit' value='<?php echo $this->lang->line('cliente_cadastrar'); ?>'>
		<?php echo form_close() ?>
	</div>	

<?php $this->load->view('_include/footer') ?>