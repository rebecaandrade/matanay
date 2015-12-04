<!-- By : jadiel -->
<?php $this->load->view('_include/header') ?>
	<?php if(isset($dadosEntidade) && isset($dadosFavorecido)) { ?>
		<div id="wrapper-body"> 
			<div id="titulo_lista">
				<div class="row">
					<div class="input-field col s12 m8 l9">
						<i class="mdi-action-description"></i>
						<?php echo $this->lang->line('contrato_edicao'); ?>
					</div>
				</div>
			</div><br>
			<div class="row">
				<?php echo form_open('contrato/atualizacao_contrato') ?>
				    <input type="hidden" name='idContrato' value="<?= $dadosContrato->idContrato; ?>"/>
					<div class="row">
						<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
							<input type='text' name='nome' value = "<?php echo $dadosContrato->nome ?>"  required>
							<label><?php echo $this->lang->line('nome'); ?></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
							<select name="entidade" required>
								<option value="<?php echo $dadosEntidade->idEntidade ?>" selected><?php echo $dadosEntidade->nome; ?></option>
								<?php foreach ($entidades as $entidade) { ?>
									<option value="<?php echo $entidade->idEntidade ?>"><?php echo $entidade->nome ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
							<select name="favorecido" required>
								<option value="<?php echo $dadosFavorecido->idFavorecido ?>" selected><?php echo $dadosFavorecido->nome; ?></option>
								<?php foreach ($favorecidos as $favorecido) { ?>
									<option value="<?php echo $favorecido->idFavorecido ?>"><?php echo $favorecido->nome ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m10 offset-m1 l4 offset-l2">
							<input value = "<?php echo $dadosContrato->data_inicio; ?>" class="datepicker" type='date' name='data_inicio' required >
							<label><?php echo $dadosContrato->data_inicio; ?></label>
						</div>
					
						<div class="input-field col s12 m10 offset-m1 l4">
							<input value = "<?php echo $dadosContrato->data_fim ?>" class="datepicker" type='date' name='data_fim' >
							<label ><?php echo $dadosContrato->data_fim; ?></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
							<select name="alerta" required>
								<option  value='<?php echo $dadosContrato->alerta ?>' selected><?php echo $dadosContrato->alerta.' '.$this->lang->line('meses'); ?></option>
								<option value='1'> 1 <?php echo $this->lang->line('mes'); ?></option>
								<?php for ($i=2; $i <= 12; $i++) { ?>
									<option value='<?php echo $i ?>'> <?php echo $i.' '.$this->lang->line('meses'); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<button class="btn waves-effect waves-light col s12 m10 offset-m1 l8 offset-l2" type="submit"><?php echo $this->lang->line('atualizar'); ?>
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