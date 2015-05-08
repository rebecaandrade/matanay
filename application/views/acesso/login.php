<?php $this->load->view('_include/header_log') ?>

<div class="fadein">
	<div class="logo"><img src="<?php echo base_url().'complemento/img/logo3.fw.png' ?>"></div>

	<div class='login'>
		<?php echo form_open('acesso/logar') ?>
			<div id="wrap-login">
				<div class="img-login"><img src="<?php echo base_url().'complemento/img/user.png' ?>"></div>
				<input type='text' name='usuario' placeholder='<?php echo $this->lang->line('login'); ?>'>
			</div>
			<div id="wrap-login">
				<div class="img-login"><img src="<?php echo base_url().'complemento/img/key.png' ?>"></div>
				<input type='password' name='senha' placeholder='<?php echo $this->lang->line('senha'); ?>'>
			</div>
			<a href="<?php echo base_url(); ?>index.php/acesso/recuperar"><?php echo $this->lang->line('esqueceu_senha'); ?></a>
			<input type='submit' value='<?php echo $this->lang->line('entrar'); ?> '>	
		<?php echo form_close() ?>	
	</div>
</div>
<?php $this->load->view('_include/footer') ?>