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
			<?php echo form_open('modelo_relatorio/cadastrar_modelo') ?>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<input type='text' name='nome' value="<?php echo set_value('nome'); ?>">
						<label><?php echo $this->lang->line('nome'); ?></label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<select name='tipo'>
						<option disabled selected ><?php echo $this->lang->line('escolha_opcao'); ?></option>
						<?php foreach ($tipos as $tipo) { ?>
							<option value="<?php echo $tipo->idTipo_Modelo ?>" ><?php echo $tipo->descricao ?></option>
						<?php } ?>
						</select>
						<label><?php echo $this->lang->line('tipo'); ?></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<select name='isrc'>
						<option disabled selected ><?php echo $this->lang->line('coluna'); ?></option>
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
						<option disabled selected ><?php echo $this->lang->line('coluna'); ?></option>
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
						<option disabled selected ><?php echo $this->lang->line('coluna'); ?></option>
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
						<option disabled selected ><?php echo $this->lang->line('coluna'); ?></option>
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
						<option disabled selected ><?php echo $this->lang->line('coluna'); ?></option>
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
						<option disabled selected ><?php echo $this->lang->line('coluna'); ?></option>
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
						<option disabled selected ><?php echo $this->lang->line('coluna'); ?></option>
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
						<option disabled selected ><?php echo $this->lang->line('coluna'); ?></option>
						<?php foreach ($colunas as $coluna) { ?>
							<option value="<?php echo $coluna ?>" ><?php echo $coluna ?></option>
						<?php } ?>
						</select>
						<label><?php echo $this->lang->line('identificador_moeda'); ?></label>
					</div>
				</div>
				<button class="btn waves-effect waves-light col s12 m10 offset-m1 l8 offset-l2" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
					<i class="mdi-content-send right"></i>
				</button>
			<?php echo form_close() ?>
		</div>
	</div>
<?php $this->load->view('_include/footer') ?>