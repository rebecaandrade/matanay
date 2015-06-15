<!-- By : Vitor Pontes -->
<?php $this->load->view('_include/header') ?>
	<?php if(isset($entidades) && isset($favorecidos)){ ?>
		<div class="container"> 
			<div class="row">
				<?php echo form_open('moeda/cadastrar_contrato') ?>
					<div class="row">
						<div class="input-field col s12 m9 l8 offset-l1">
							<i class="mdi-editor-attach-money prefix"></i>	
							<input type='text' name='nome' value="<?php echo set_value('nome'); ?>" required>
							<label><?php echo $this->lang->line('nome'); ?></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m9 l8 offset-l1">
							<select name="entidade" required>
								<option value="" disabled selected><?php echo $this->lang->line('contrato_entidade'); ?></option>
								<?php foreach ($entidades as $entidade) { ?>
									<option value="<?php echo $entidade->idEntidade ?>"><?php echo $entidade->nome ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m9 l8 offset-l1">
							<select name="favorecido" required>
								<option value="" disabled selected><?php echo $this->lang->line('contrato_favorecido'); ?></option>
								<?php foreach ($favorecidos as $favorecido) { ?>
									<option value="<?php echo $favorecido->idFavorecido ?>"><?php echo $favorecido->nome ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m9 l8 offset-l1">
							<input class="datepicker" type='date' name='data_inicio' required >
							<label><?php echo $this->lang->line('data_inicio'); ?></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m9 l8 offset-l1">
							<input class="datepicker" type='date' name='data_fim' >
							<label ><?php echo $this->lang->line('data_fim'); ?></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m9 l8 offset-l1">
							<select name="alerta" required >
								<option  value='' disabled selected> </option>
								<option value='1'> 1 <?php echo $this->lang->line('mes'); ?></option>
								<?php for ($i=2; $i <= 12; $i++) { ?>
									<option value="<?php echo $i ?>"> <?php echo $i.' '.$this->lang->line('meses'); ?></option>
								<?php } ?>
							</select>
							<label ><?php echo $this->lang->line('alerta'); ?></label>
						</div>
					</div>
					<button class="btn waves-effect waves-light col s12 m12 l8 offset-l1" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
						<i class="mdi-content-send right"></i>
					</button>
				<?php echo form_close() ?>
			</div>
		</div>
	<?php } else { ?>
		<div class="container">
			<span>ERROR</span> <!-- finalizar --> 
		<div>
	<?php } ?>
<?php $this->load->view('_include/footer') ?>