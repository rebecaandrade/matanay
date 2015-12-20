<?php $this->load->view('_include/header'); ?>
	<div id="wrapper-body">
		<div id="titulo_lista">
			<div class="row">
				<div class="input-field col s12 m8 l9">
					<i class="mdi-editor-attach-money"></i>
					<?php echo $this->lang->line('moeda_cadastro'); ?>
					<a href="<?php echo base_url(); ?>index.php/moeda/listar"
                	    class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
                	    data-position="top" data-delay="50" data-tooltip="<?php echo $this->lang->line('voltar'); ?>" id="backButton">
                	    <i class="mdi-hardware-keyboard-arrow-left"></i>
                	</a>
				</div>
			</div>
		</div><br>
    	<div class="row">
			<?php echo form_open('moeda/cadastrar_moeda') ?>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<label><?php echo $this->lang->line('moeda_nome'); ?></label>
						<input type='text' name='nome' value="<?php echo set_value('nome'); ?>">
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<label><?php echo $this->lang->line('moeda_sigla'); ?></label>
						<input type='text' name='sigla' value="<?php echo set_value('sigla'); ?>">
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<label><?php echo $this->lang->line('moeda_cambio'); ?></label>
						<input type='text' name='cambio' value="<?php echo set_value('cambio'); ?>">
					</div>
				</div>
				<button class="btn waves-effect waves-light col s12 m10 offset-m1 l8 offset-l2" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
					<i class="mdi-content-send right"></i>
				</button>
			<?php echo form_close() ?>
		</div>
	</div>
<?php $this->load->view('_include/footer') ?>