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
						<h5 ><?php echo $this->lang->line('cliente_funcionalidades'); ?></h5>
						<?php foreach ($funcionalidades as $func) { ?>
							<p>
								<input type='checkbox' id="<?php echo $func->idFuncionalidades ?>" name='func[]' value="<?php echo $func->idFuncionalidades ?>"/> 
								<label for="<?php echo $func->idFuncionalidades ?>"> <?php echo $func->nome; ?></label>
							</p>
						<?php } ?>
					</div>
				</div>
				<input type='hidden' name='id_cliente' value=<?php echo $perfil->idCliente?> />
				<input type='hidden' name='id_perfil' value=<?php echo $perfil->idUsuario?> />
				<button class="btn waves-effect waves-light col s12 m12 l8 offset-l2" type="submit"><?php echo $this->lang->line('atualizar'); ?>
					<i class="mdi-content-send right"></i>
				</button>
			<?php echo form_close() ?>
		</div>
	</div>
<?php $this->load->view('_include/footer') ?>