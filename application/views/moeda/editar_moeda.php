<?php $this->load->view('_include/header'); ?>
	<div class="container"> 
		<div class="row">
			<?php echo form_open('moeda/editar_moeda') ?>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<i class="mdi-editor-attach-money prefix"></i>	
						<input type='text' name='nome' value="<?php echo $moeda->nome; ?>">
						<label><?php echo $this->lang->line('moeda_nome'); ?></label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<input type='text' name='sigla' value="<?php echo $moeda->sigla; ?>">
						<label><?php echo $this->lang->line('moeda_sigla'); ?></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m10 offset-m1 l8 offset-l2">
						<input type='text' name='cambio' value="<?php echo $moeda->taxa_cambio; ?>">
						<label><?php echo $this->lang->line('moeda_cambio'); ?></label>
					</div>
				</div>
				<input type='hidden' name='id' value="<?php echo $moeda->idMoeda; ?>">
				<input type='hidden' name='id_cliente' value="<?php echo $moeda->idCliente; ?>">
				<button class="btn waves-effect waves-light col s12 m10 offset-m1 l8 offset-l2" type="submit"><?php echo $this->lang->line('atualizar'); ?>
					<i class="mdi-content-send right"></i>
				</button>
			<?php echo form_close() ?>
		</div>
	</div>
<?php $this->load->view('_include/footer') ?>