<?php $this->load->view('_include/header') ?>
	<div id="wrapper-body"> 
		<div id="titulo_lista">
			<div class="row">
				<div class="input-field col s12 m8 l9">
					<i class="mdi-action-account-circle"></i>
					<?php echo $this->lang->line('perfil_cadastro'); ?>
				</div>
			</div>
		</div><br>
		<?php if(isset($id_cliente)){ ?>
			<div class="row">
				<?php echo form_open('cliente/cadastrar_perfil') ?>
					<div class="row">
						<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
							<i class="mdi-action-perm-identity prefix"></i>	
							<label><?php echo $this->lang->line('cliente_nome'); ?></label>
							<input type='text' name='nome'>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
							<label><?php echo $this->lang->line('cliente_login'); ?></label>
							<input type='text' name='login'>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
							<label><?php echo $this->lang->line('cliente_senha'); ?></label>
							<input type='password' name='senha'>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
							<label><?php echo $this->lang->line('cliente_confirmar_senha'); ?></label>
							<input type='password' name='confirmar_senha'>
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
					<input type='hidden' name='id' value=<?php echo $id_cliente?> />
					<button class="btn waves-effect waves-light col s12 m10 offset-m1 l8 offset-l2" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
						<i class="mdi-content-send right"></i>
					</button>
				<?php echo form_close() ?>
			</div>
		<?php } ?>		
	</div>

<?php $this->load->view('_include/footer') ?>