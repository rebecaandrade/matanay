<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div  class="container">
    <div class="row">
      	
      	<?php echo form_open('faixas_videos/cadastrar_faixa') ?>
	        <div class="row">
	          	<div class="input-field col s12 m12 l8 offset-l2">
	          		<i class="mdi-av-album prefix"></i>
	            	<input id="icon-prefix" type="text" name="nome">
	            	<label><?php echo $this->lang->line('titulo'); ?></label>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m6 l4 offset-l2">
	            	<input type="text" name="upc_ean">
	            	<label>UPC/EAN</label>
	          	</div>
	          	<div class="input-field col s12 m6 l4">
	            	<input type="text" name="upc_ean">
	            	<label><?php echo $this->lang->line('catalogo'); ?></label>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m6 l4 offset-l2">
	            	<input name="percentual_artista" type="text">
	            	<label><?php echo $this->lang->line('n_faixas'); ?></label>
	          	</div>
	          	<div class="input-field col s12 m6 l4">
	            	<input type="date" class="datepicker">
	            	<label class="active"><?php echo $this->lang->line('lancamento'); ?></label>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m12 l8 offset-l2">
	            	<select>
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
	              		<?php
                			if(isset($tipos)){
                    			foreach ($tipos as $tipo) { ?>
                        		<option value="<?php echo $tipo->idTipo_Album; ?>"> <?php echo $tipo->descricao; ?>
                		<?php }}?>
	            	</select>
	            	<label><?php echo $this->lang->line('tipo');?></label>
	          	</div>
	        </div>

	        <div class="row">
	        	<div class="input-field col s2 m2 l1 offset-l1">
	            	<input name="percentual_autor" type="text">
	            	<label>#</label>
	          	</div>
	          	<div class="input-field col s10 m10 l8">
	            	<select>
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
	              		<?php
                			if(isset($faixas)){
                    			foreach ($faixas as $faixa) { ?>
                        		<option value="<?php echo $faixa->idFaixa; ?>"> <?php echo $faixa->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label><?php echo $this->lang->line('faixa');?></label>
	          	</div>
	        </div>

	        <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
	          	<i class="mdi-content-send right"></i>
	        </button>
	    <?php echo form_close() ?>

    </div>
</div>

<?php $this->load->view('_include/footer') ?>