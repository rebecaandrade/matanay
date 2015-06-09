<?php $this->load->view('_include/header') ?>
	<div class="container"> 
		<?php if(isset($id_cliente)){ ?>
			<div class="row">
				<?php echo form_open('cliente/cadastrar_perfil') ?>
					<div class="row">
						<div class="input-field col s12 m9 l8 offset-l1">	
							<input type='text' name='nome'>
							<label><?php echo $this->lang->line('cliente_nome'); ?></label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12 m9 l8 offset-l1">
							<input type='text' name='login'>
							<label><?php echo $this->lang->line('cliente_login'); ?></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m9 l8 offset-l1">
							<input type='password' name='senha'>
							<label><?php echo $this->lang->line('cliente_senha'); ?></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m9 l8 offset-l1">
							<input type='password' name='confirmar_senha'>
							<label><?php echo $this->lang->line('cliente_confirmar_senha'); ?></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m9 l8 offset-l1">
							<select name="func[]" >
								<option  value='' disabled selected> </option>
								<?php foreach ($funcionalidades as $func) { ?>
									<option value="<?php echo $func->idFuncionalidades ?>"> <?php echo $func->nome; ?></option>
								<?php } ?>
							</select>
							<label><?php echo $this->lang->line('cliente_funcionalidades'); ?></label>
						</div>
					</div>
					<input type='hidden' name='id' value=<?php echo $id_cliente?> />
					<button class="btn waves-effect waves-light col s12 m12 l8 offset-l1" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
						<i class="mdi-content-send right"></i>
					</button>
				<?php echo form_close() ?>
			</div>
		<?php } ?>		
	</div>

<?php $this->load->view('_include/footer') ?>