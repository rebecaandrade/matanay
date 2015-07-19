<?php $this->load->view('_include/header'); ?>
	<div id="wrapper-body">
		<div id="titulo_lista">
			<div class="row">
				<div class="input-field col s12 m8 l9">
					<i class="mdi-action-assignment"></i>
					<?php echo $this->lang->line('modelo_cadastro'); ?>
				</div>
			</div>
		</div><br>
		<div class="row">
			<?php echo form_open('modelo_relatorio/editar_modelo/'.$modelo->idModelo) ?>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<input type='text' name='nome' value="<?php echo $modelo->nome; ?>">
						<label><?php echo $this->lang->line('nome'); ?></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<select name='tipo'>
						<option disabled select ><?php echo $this->lang->line('escolha_opcao'); ?></option>
						<?php foreach ($tipos as $tipo) { ?>
							<option value="<?php echo $tipo->idTipo_Modelo ?>" 
							<?php if ($modelo->idTipo_Modelo == $tipo->idTipo_Modelo) {
								echo 'selected';
							} ?>
							><?php echo $tipo->descricao ?></option>
						<?php } ?>
						</select>
						<label><?php echo $this->lang->line('tipo'); ?></label>
					</div>
				</div>
				<div class="row col s12 m10 offset-m1 l8 offset-l2">
					<h5><?php echo $this->lang->line('selecione_coluna'); ?></h5>
				</div>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<select name='isrc'>
						<option value="<?php echo $modelo->isrc; ?>" ><?php echo $modelo->isrc; ?></option>
						<?php foreach ($colunas as $coluna) { ?>
							<option value="<?php echo $coluna ?>" ><?php echo $coluna ?></option>
						<?php } ?>
						</select>
						<label><?php echo $this->lang->line('isrc'); ?></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<select name='upc'>
						<option value="<?php echo $modelo->upc; ?>" ><?php echo $modelo->upc; ?></option>
						<?php foreach ($colunas as $coluna) { ?>
							<option value="<?php echo $coluna ?>" ><?php echo $coluna ?></option>
						<?php } ?>
						</select>
						<label><?php echo $this->lang->line('upc'); ?></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<select name='qnt_vendida'>
						<option value="<?php echo $modelo->qnt_vendida; ?>" ><?php echo $modelo->qnt_vendida; ?></option>
						<?php foreach ($colunas as $coluna) { ?>
							<option value="<?php echo $coluna ?>" ><?php echo $coluna ?></option>
						<?php } ?>
						</select>
						<label><?php echo $this->lang->line('qnt_vendida'); ?></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<select name='valor_recebido'>
						<option value="<?php echo $modelo->valor_recebido; ?>" ><?php echo $modelo->valor_recebido; ?></option>
						<?php foreach ($colunas as $coluna) { ?>
							<option value="<?php echo $coluna ?>" ><?php echo $coluna ?></option>
						<?php } ?>
						</select>
						<label><?php echo $this->lang->line('valor_recebido'); ?></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<select name='loja'>
						<option value="<?php echo $modelo->loja; ?>" ><?php echo $modelo->loja; ?></option>
						<?php foreach ($colunas as $coluna) { ?>
							<option value="<?php echo $coluna ?>" ><?php echo $coluna ?></option>
						<?php } ?>
						</select>
						<label><?php echo $this->lang->line('loja'); ?></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<select name='subloja'>
						<option value="<?php echo $modelo->subloja; ?>" ><?php echo $modelo->subloja; ?></option>
						<?php foreach ($colunas as $coluna) { ?>
							<option value="<?php echo $coluna ?>" ><?php echo $coluna ?></option>
						<?php } ?>
						</select>
						<label><?php echo $this->lang->line('subloja'); ?></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<select name='territorio'>
						<option value="<?php echo $modelo->territorio; ?>" ><?php echo $modelo->territorio; ?></option>
						<?php foreach ($colunas as $coluna) { ?>
							<option value="<?php echo $coluna ?>" ><?php echo $coluna ?></option>
						<?php } ?>
						</select>
						<label><?php echo $this->lang->line('territorio'); ?></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<select name='moeda'>
						<option value="<?php echo $modelo->moeda; ?>" ><?php echo $modelo->moeda; ?></option>
						<?php foreach ($colunas as $coluna) { ?>
							<option value="<?php echo $coluna ?>" ><?php echo $coluna ?></option>
						<?php } ?>
						</select>
						<label><?php echo $this->lang->line('identificador_moeda'); ?></label>
					</div>
				</div>
				<input type='hidden' name='param' value="<?php echo $modelo->idCliente; ?>">
				<button class="btn waves-effect waves-light col s12 m10 offset-m1 l8 offset-l2" type="submit"><?php echo $this->lang->line('editar'); ?>
					<i class="mdi-content-send right"></i>
				</button>
			<?php echo form_close() ?>
		</div>
	</div>
<?php $this->load->view('_include/footer') ?>