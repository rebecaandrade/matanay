<?php $this->load->view('_include/header') ?> <!-- Jadiel -->
<div class="container">
	
    	<div class="row">
      	
      	<?php echo form_open('imposto/cadastrar') ?>
		      <div class="row">
		      	<div class="aviso_entidade"><?php if($this->session->flashdata('sucesso')!=null){echo $this->lang->line($this->session->flashdata('sucesso'));} ?></div>
				<div class="aviso_entidade"><?php if($this->session->flashdata('aviso')!=null){echo $this->lang->line($this->session->flashdata('aviso'));} ?></div>
		          	<div class="input-field col s12 m12 l8 offset-l2">
		          		<i class="mdi-content-content-paste prefix"></i>
		            	<input required id="icon-prefix" type="text" name="nome">
		            	<label><?php echo $this->lang->line('imposto_nome'); ?></label>
		          	</div>
		      </div>


	        <div class="row">
	          	<div class="input-field col s12 m6 l8 offset-l2">
	            	<input required name="valor" type="text">
	            	<label><?php echo $this->lang->line('valor'); ?></label>
	          	</div>
	        </div>
	        <br>
	        <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
	          	<i class="mdi-content-send right"></i>
	        </button>
	    <?php echo form_close() ?>

    </div>
</div>

<?php $this->load->view('_include/footer') ?>