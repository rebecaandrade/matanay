<?php $this->load->view('_include/header_log') ?> <!-- Evandro -->

<div class="fadein">
	<div class="row">
      <div class="col s10 offset-s1 m8 offset-m2 l4 offset-l4">
        <div class="card-rec card-panel grey lighten-1">
	        <div class="logo"><img src="<?php echo base_url().'complemento/img/logo3.fw.png' ?>"></div>
	          
			<?php echo form_open('acesso/cadastrarNovaSenha') ?>
				<div class="row">
		          	<div class="input-field col s12 m12 l12">
		          		<i class="mdi-action-lock prefix"></i>
		            	<input id="icon-prefix" type="password" name="senha" autofocus>
		            	<label for="icon_prefix"><?php echo $this->lang->line('senha'); ?></label>
		          	</div>
		          	<div class="input-field col s12 m12 l12">
		          		<i class="mdi-action-lock prefix"></i>
		            	<input id="icon-prefix" type="password" name="confirmar_senha">
		            	<label for="icon_prefix"><?php echo $this->lang->line('cliente_confirmar_senha'); ?></label>
		          	</div>
		        </div>
		        <input type='hidden' name='id_cliente' value="<?php echo $perfil->idCliente ?>"/>
		        <input type='hidden' name='email' value='<?php echo $email ?>'/>
                <input type='hidden' name='id_usuario' value="<?php echo $perfil->idUsuario ?>"/>
                <input type="hidden" name="passMessageDisplay" value="<?= $this->lang->line('password_error') ?>">
                <input type="hidden" name="checkBoxMessageDisplay" value="<?= $this->lang->line('checkbox_erro') ?>">
                <input type="hidden" name="nomeMessageDisplay" value="<?= $this->lang->line('nome_invalido') ?>">

				<button class="send-login btn waves-effect waves-light col s12 m12 l12 " type="submit"><?php echo $this->lang->line('enviar'); ?>
		          	
		        </button>	
			<?php echo form_close() ?>	
        </div>
      </div>
    </div>
</div>

<?php $this->load->view('_include/footer') ?>