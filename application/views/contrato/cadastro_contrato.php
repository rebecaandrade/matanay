<!-- By : Vitor Pontes -->
<?php $this->load->view('_include/header') ?>
	<?php if(isset($id_entidade)){ ?>
		<div class="container">
			<?php echo form_open('contrato/cadastrar_contrato') ?>
				<div id="row">
					<div class="row">
						<label><?php echo $this->lang->line('nome'); ?><input type='text' required name='nome'></label>
					</div>
					<div class="row">
						<label><?php echo $this->lang->line('data_inicio'); ?><input type='date' required name='data_inicio'></label>
					</div>
					<div class="row">
						<label><?php echo $this->lang->line('data_fim'); ?><input type='date' required name='data_fim'></label>
					</div>
					<div class="row">
						<?php $this->lang->line('alerta') ?>
						<select name="alerta" required >
							<option  value='' disabled selected> </option>
							<option value='1'> 1 <?php echo $this->lang->line('mes'); ?></option>
							<?php for ($i=2; $i <= 12; $i++) { ?>
								<option value="<?php echo $i ?>"> <?php echo $i.' '.$this->lang->line('meses'); ?></option>
							<?php } ?>
						</select></label>
					</div>
						<input type='hidden' name='id_entidade' value='<?php echo $id_entidade ?>'>	
						<input type='submit' value='<?php echo $this->lang->line('contrato_cadastrar'); ?>'>
				</div>
			<?php echo form_close() ?>
		</div>
	<?php } else { ?>
		<div class="container">
			<span>ERROR</span> <!-- finalizar --> 

		<div>
	<?php } ?>

<?php $this->load->view('_include/footer') ?>