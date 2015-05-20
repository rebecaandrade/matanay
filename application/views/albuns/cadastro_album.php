<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div class="container">
    <div class="row">
      	
      	<?php echo form_open('faixas_videos/cadastrar_faixa') ?>
	        <div class="row">
	          	<div class="input-field col s12 m12 l8 offset-l2">
	          		<i class="mdi-av-album prefix"></i>
	            	<input required id="icon-prefix" type="text" name="nome">
	            	<label><?php echo $this->lang->line('titulo'); ?></label>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m12 l8 offset-l2">
	            	<select>
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
	              		<?php
                			if(isset($artistas)){
                    			foreach ($artistas as $artista) { ?>
                        		<option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label><?php echo $this->lang->line('artista');?></label>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m6 l4 offset-l2">
	            	<input required type="text" name="upc_ean">
	            	<label>UPC/EAN</label>
	          	</div>
	          	<div class="input-field col s12 m6 l4">
	            	<input required class="n_faixas" name="n_faixas" type="text">
	            	<label><?php echo $this->lang->line('n_faixas'); ?></label>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m6 l4 offset-l2">
	            	<input required type="text" name="upc_ean">
	            	<label><?php echo $this->lang->line('catalogo'); ?></label>
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

	        <div id="Tracklist">
	        	<div class="row">
		        	<div class="input-field col s2 m1 l1 offset-l1" id="Faixa">
		            	<input disabled name="ordem_faixa" type="text">
		            	<label># 1</label>
		          	</div>
		          	<div class="input-field col s10 m11 l8">
		            	<select>
		              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
		              		<?php
	                			if(isset($faixas)){
	                    			foreach ($faixas as $faixa) { ?>
	                        		<option value="<?php echo $faixa->idFaixa; ?>"> <?php echo $faixa->nome; ?>
	                		<?php }}?>
		            	</select>
		            	<label><?php echo $this->lang->line('faixa');?> 1</label>
		          	</div>
	        	</div>
	        </div>

	        <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
	          	<i class="mdi-content-send right"></i>
	        </button>
	    <?php echo form_close() ?>

    </div>
</div>

<script>
	$(document).ready(function () {

		var counter = 2;

		$(".n_faixas").change(function() {

			var n_faixas = $('input[name=n_faixas]').val();

			for(counter = 2; counter <= n_faixas; counter++){
	    		$('#Tracklist').append('<div class="row"><div class="input-field col s2 m1 l1 offset-l1" id="Faixa">' +
				'<input disabled name="ordem_faixa" type="text"><label># ' + counter + '</label></div>' +
				'<div class="input-field col s10 m11 l8">' +
				'<select><option value="" disabled selected><?php echo $this->lang->line("selecione");?></option><option value="' + "val" + ' ">"' + "desc2" + 
				'"</option><option value="' + "val2" + ' ">"' + "desc" + '"</option><option value="' + "val3" + 
				' ">"' + "desc3" + '"</option></select><label><?php echo $this->lang->line("faixa");?> ' + counter + ' </label></div></div>');
			$('select').material_select();
			}
	    });
	});
</script>


<?php $this->load->view('_include/footer') ?>