<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div class="container">
    <div class="row">
      	
      	<?php echo form_open('albuns/cadastrar') ?>
	        <div class="row">
	          	<div class="input-field col s12 m12 l8 offset-l2">
	          		<i class="mdi-av-album prefix"></i>
	          		<label><?php echo $this->lang->line('titulo'); ?></label>
	            	<input id="icon-prefix" type="text" name="nome"/>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m12 l8 offset-l2">
	            	<select name="artista">
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
	          		<label>UPC/EAN</label>
	            	<input type="text" name="upc_ean"/>
	          	</div>
	          	<div class="input-field col s12 m6 l4">
	          		<label><?php echo $this->lang->line('n_faixas'); ?></label>
	            	<input class="n_faixas" name="n_faixas" type="text"/>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m6 l4 offset-l2">
	            	<label><?php echo $this->lang->line('catalogo'); ?></label>
	            	<input type="text" name="catalogo"/>
	          	</div>
	          	<div class="input-field col s12 m6 l4"/>
	          		<label><?php echo $this->lang->line('lancamento'); ?></label>
	            	<input type="text" name="ano"/>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m12 l8 offset-l2">
	            	<select name="tipo">
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
		            	<input disabled name="ordem_faixa" type="text"/>
		            	<label># 1</label>
		          	</div>
		          	<div class="input-field col s10 m11 l8">
		            	<select name="faixas[]">
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
			var faixas = $.parseJSON(<?php print json_encode(json_encode($faixas)); ?>);

			for(counter = 2; counter <= n_faixas; counter++){
	    		$('#Tracklist').append('<div class="row"><div class="input-field col s2 m1 l1 offset-l1" id="Faixa">' +
				'<input disabled name="ordem_faixa" type="text"><label># ' + counter + '</label></div>' +
				'<div class="input-field col s10 m11 l8">' +
				'<select id="select_faixas' + counter + '" name="faixas[]"><option value="" disabled selected><?php echo $this->lang->line("selecione");?></option>' +
				'</select><label><?php echo $this->lang->line("faixa");?> ' + counter + ' </label></div></div>');

	    	
	    		$.each(faixas, function(idFaixa, nome){
            		$('#select_faixas' + counter).append($("<option>",{
                  		value: nome.idFaixa,
                  		text: nome.nome
            		}));
      			}); 
            
	   
			$('select').material_select();
			}
	    });
	});
</script>


<?php $this->load->view('_include/footer') ?>