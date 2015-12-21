<?php $this->load->view('_include/header_log') ?> <!-- Evandro -->

<div class="fadein">
	<div class="row">
      <div class="col s10 offset-s1 m8 offset-m2 l4 offset-l4">
        <div class="card-rec card-panel grey lighten-1">
	        <div class="logo"><img src="<?php echo base_url().'complemento/img/logo3.fw.png' ?>"></div>
	          
			<?php echo form_open('acesso/recuperarSenha') ?>
				<div class="row">
		          	<div class="input-field col s12 m12 l12">
		          		<i class="mdi-action-account-circle prefix"></i>
		            	<input id="icon-prefix" type="text" name="usuario">
		            	<label for="icon_prefix"><?php echo $this->lang->line('login'); ?></label>
		          	</div>
		        </div>

				<button class="send-login btn waves-effect waves-light col s12 m12 l12 " type="submit"><?php echo $this->lang->line('enviar'); ?>
		          	
		        </button>	
			<?php echo form_close() ?>	
        </div>
      </div>
    </div>
</div>

<?php $this->load->view('_include/footer') ?>