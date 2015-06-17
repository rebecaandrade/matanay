<?php $this->load->view('_include/header') ?>
	<div class="container"> 
		<div class="row">
			<?php echo form_open('cliente/atualizar_perfil_admin') ?>
				<div class="row">
					<div class="input-field col s12 m9 l8 offset-l2">
						<i class="mdi-action-account-circle prefix"></i>	
						<input type='text' name='nome' value=<?php echo $perfil->nome?> >
						<label><?php echo $this->lang->line('cliente_nome'); ?></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m9 l8 offset-l2">
						<input type='text' name='login' value=<?php echo $perfil->nome?> >
						<label><?php echo $this->lang->line('cliente_login'); ?></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m9 l8 offset-l2">
						<select name="func[]" >
							<option  value='' disabled selected> </option>
							<?php foreach ($funcionalidades as $func) { ?>
								<option value="<?php echo $func->idFuncionalidades ?>"> <?php echo $func->nome; ?></option>
							<?php } ?>
						</select>
						<label><?php echo $this->lang->line('cliente_funcionalidades'); ?></label>
					</div>
				</div>
				<input type='hidden' name='id_cliente' value=<?php echo $perfil->idCliente?> />
				<input type='hidden' name='id_perfil' value=<?php echo $perfil->idPerfis?> />
				<button class="btn waves-effect waves-light col s12 m12 l8 offset-l2" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
					<i class="mdi-content-send right"></i>
				</button>
			<?php echo form_close() ?>
		</div>
	</div>
<?php $this->load->view('_include/footer') ?>