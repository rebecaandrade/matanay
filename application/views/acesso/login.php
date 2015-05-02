<?php $this->load->view('_include/header_log') ?>

<div class="fadein">
	<div class="logo"><img src="<?php echo base_url().'complemento/img/logo3.fw.png' ?>"></div>

	<div class='login'>
		<?php echo form_open('acesso/logar') ?>
			<div id="wrap-login">
				<div class="img-login"><img src="<?php echo base_url().'complemento/img/user.png' ?>"></div>
				<input type='text' name='usuario' value='<?php echo $this->lang->line('username'); ?>' 
					onfocus="if(this.value == '<?php echo $this->lang->line('username'); ?>') this.value = '';">
			</div>
			<div id="wrap-login">
				<div class="img-login"><img src="<?php echo base_url().'complemento/img/key.png' ?>"></div>
				<input type='password' name='senha' value='<?php echo $this->lang->line('password'); ?>' 
					onfocus="if(this.value == '<?php echo $this->lang->line('password'); ?>') this.value = '';">
			</div>
			<a href="<?php echo base_url(); ?>index.php/acesso/recuperar"><?php echo $this->lang->line('forgot'); ?></a>
			<input type='submit' value='<?php echo $this->lang->line('login'); ?> '>	
		<?php echo form_close() ?>	
	</div>
</div>
<?php $this->load->view('_include/footer') ?>