<?php $this->load->view('_include/header'); ?>
	<div class="container">
    	<div class="row">
			<?php echo form_open('moeda/cadastrar_moeda') ?>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<i class="mdi-editor-attach-money prefix"></i>	
						<input type='text' name='nome' value="<?php echo set_value('nome'); ?>">
						<label><?php echo $this->lang->line('moeda_nome'); ?></label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<input type='text' name='sigla' value="<?php echo set_value('sigla'); ?>">
						<label><?php echo $this->lang->line('moeda_sigla'); ?></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<input type='text' name='cambio' value="<?php echo set_value('cambio'); ?>">
						<label><?php echo $this->lang->line('moeda_cambio'); ?></label>
					</div>
				</div>
				<button class="btn waves-effect waves-light col s12 m10 offset-m1 l8 offset-l2" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
					<i class="mdi-content-send right"></i>
				</button>
			<?php echo form_close() ?>
		</div>
	</div>
<?php $this->load->view('_include/footer') ?>