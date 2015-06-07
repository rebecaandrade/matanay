<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div class="container">
    <div class="row">
      	
      	<?php echo form_open('faixas_videos/cadastrar_faixa') ?>
	        <div class="row">
	          	<div class="input-field col s12 m9 l8 offset-l1">
	          		<i class="mdi-image-audiotrack prefix"></i>
	            	<input required id="icon-prefix" type="text" name="nome">
	            	<label><?php echo $this->lang->line('titulo'); ?></label>
	          	</div>
	        </div>

	        <div class="row">
	        	<div id="n_video" class="input-field col s12 m9 l8 offset-l1">
	            	<input type="text" name="isrc">
	            	<label>ISRC</label>
	          	</div>
	          	<div id="eh_video" class="input-field col s12 m9 l8 offset-l1">
	            	<input type="text" name="youtube">
	            	<label>YouTube</label>
	          	</div>
	          	<div class="switch col s6 offset-s6 m3 l2">
	            	<label>
	              		<?php echo $this->lang->line('video');?>
	              		<input type="checkbox" value="1">
	              		<span class="lever"></span>
	              		<?php echo $this->lang->line('sim');?>
	            	</label>
	          	</div>
	        </div>

	        <div id="SelectArtista">
	        <div class="row">
				<div class="input-field col s11 m9 l8 offset-l1" id="Select1">
				    <select name="artistas[]">
	              		<option value="" disabled selected><?php echo $this->lang->line("selecione");?></option> 
	              		<?php
                			if(isset($artistas)){
                    			foreach ($artistas as $artista) { ?>
                        		<option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label><?php echo $this->lang->line("artista");?></label>
				</div>
				<div class="input-field col s12 m2 l2">
	            	<input name="percentual_artista[]" type="text">
	            	<label>%</label>
	          	</div>
				<a class="btn-floating btn-medium waves-effect waves-light btn tooltipped" 
					data-position="right" data-delay="50" data-tooltip="Adicionar" id="addArtista"><i class="mdi-content-add"></i></a>
	        </div>
	        </div>

	        <div id="SelectAutor">
	        <div class="row">
	          	<div class="input-field col s11 m9 l8 offset-l1">
	            	<select name="autores[]">
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
	              		<?php
                			if(isset($autores)){
                    			foreach ($autores as $autor) { ?>
                        		<option value="<?php echo $autor->idEntidade; ?>"> <?php echo $autor->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label><?php echo $this->lang->line('autor');?></label>
	          	</div>
	          	<div class="input-field col s12 m2 l2">
	            	<input name="percentual_autor[]" type="text">
	            	<label>%</label>
	          	</div>
	          	<a class="btn-floating btn-medium waves-effect waves-light btn tooltipped" 
					data-position="right" data-delay="50" data-tooltip="Adicionar" id="addAutor"><i class="mdi-content-add"></i></a>
	        </div>
	        </div>

	        <div id="SelectProdutor">
	        <div class="row">
	          	<div class="input-field col s11 m9 l8 offset-l1">
	            	<select name="produtores[]">
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
	              		<?php
                			if(isset($produtores)){
                    			foreach ($produtores as $produtor) { ?>
                        		<option value="<?php echo $produtor->idEntidade; ?>"> <?php echo $produtor->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label><?php echo $this->lang->line('produtor');?></label>
	          	</div>
	          	<div class="input-field col s12 m2 l2">
	            	<input name="percentual_produtor[]" type="text">
	            	<label>%</label>
	          	</div>
	          	<a class="btn-floating btn-medium waves-effect waves-light btn tooltipped" 
					data-position="right" data-delay="50" data-tooltip="Adicionar" id="addProdutor"><i class="mdi-content-add"></i></a>
	        </div>
	        </div>

	        <button class="btn waves-effect waves-light col s12 m12 l8 offset-l1" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
	          	<i class="mdi-content-send right"></i>
	        </button>
	    <?php echo form_close() ?>

    </div>
</div>

<script>
	$(document).ready(function () {

		var counter = 2;

		$("#addArtista").click(function(e) {
			e.preventDefault();

			var artistas = $.parseJSON(<?php print json_encode(json_encode($artistas)); ?>);

			var newTextBoxDiv = $(document.createElement('div')).attr("id", 'Select' + counter);
			newTextBoxDiv.after().html('<div class="row"><div class="input-field col s11 m9 l8 offset-l1">' +
				'<select id="select_artista' + counter + '" name="artistas[]"><option value="" disabled selected><?php echo $this->lang->line("selecione");?></option>' +
				'</select><label><?php echo $this->lang->line("artista");?></label></div>' +
				'<div class="input-field col s12 m2 l2"><input name="percentual_artista[]" type="text"><label>%</label></div>' +
				'<a class="btn-floating btn-medium waves-effect waves-light btn tooltipped"' +
				'data-position="right" data-delay="50" data-tooltip="Remover" id="removeArtista"><i class="mdi-content-remove"></i></a></div>');

			newTextBoxDiv.appendTo("#SelectArtista");

			$.each(artistas, function(idEntidade, nome){
	            $('#select_artista' + counter).append($("<option>",{
	                value: nome.idEntidade,
	                text: nome.nome
	            }));
	      	});

				counter++;
				$('select').material_select();
			});

		$("#SelectArtista").on("click","#removeArtista", function(e){ //user click on remove text
        	e.preventDefault(); $(this).parent('div').remove(); x--;
    	})
	});

	$(document).ready(function () {

		var counter = 2;

		$("#addAutor").click(function(e) {
			e.preventDefault();

			var autores = $.parseJSON(<?php print json_encode(json_encode($autores)); ?>);

			var newTextBoxDiv = $(document.createElement('div')).attr("id", 'Select' + counter);
			newTextBoxDiv.after().html('<div class="row"><div class="input-field col s11 m9 l8 offset-l1">' +
				'<select id="select_autor' + counter + '" name="autores[]"><option value="" disabled selected><?php echo $this->lang->line("selecione");?></option>' +
				'</select><label><?php echo $this->lang->line("autor");?></label></div>' +
				'<div class="input-field col s12 m2 l2"><input name="percentual_autor[]" type="text"><label>%</label></div>' +
				'<a class="btn-floating btn-medium waves-effect waves-light btn tooltipped"' +
				'data-position="right" data-delay="50" data-tooltip="Remover" id="removeAutor"><i class="mdi-content-remove"></i></a></div>');

			newTextBoxDiv.appendTo("#SelectAutor");

			$.each(autores, function(idEntidade, nome){
	            $('#select_autor' + counter).append($("<option>",{
	                value: nome.idEntidade,
	                text: nome.nome
	            }));
	      	});

				counter++;
				$('select').material_select();
			});

		$("#SelectAutor").on("click","#removeAutor", function(e){ //user click on remove text
        	e.preventDefault(); $(this).parent('div').remove(); x--;
    	})
	});

	$(document).ready(function () {

		var counter = 2;

		$("#addProdutor").click(function(e) {
			e.preventDefault();

			var produtores = $.parseJSON(<?php print json_encode(json_encode($produtores)); ?>);

			var newTextBoxDiv = $(document.createElement('div')).attr("id", 'Select' + counter);
			newTextBoxDiv.after().html('<div class="row"><div class="input-field col s11 m9 l8 offset-l1">' +
				'<select id="select_produtor' + counter + '" name="produtores[]"><option value="" disabled selected><?php echo $this->lang->line("selecione");?></option>' +
				'</select><label><?php echo $this->lang->line("produtor");?></label></div>' +
				'<div class="input-field col s12 m2 l2"><input name="percentual_produtor[]" type="text"><label>%</label></div>' +
				'<a class="btn-floating btn-medium waves-effect waves-light btn tooltipped"' +
				'data-position="right" data-delay="50" data-tooltip="Remover" id="removeProdutor"><i class="mdi-content-remove"></i></a></div>');

			newTextBoxDiv.appendTo("#SelectProdutor");

			$.each(produtores, function(idEntidade, nome){
	            $('#select_produtor' + counter).append($("<option>",{
	                value: nome.idEntidade,
	                text: nome.nome
	            }));
	      	});

				counter++;
				$('select').material_select();
			});

		$("#SelectProdutor").on("click","#removeProdutor", function(e){ //user click on remove text
        	e.preventDefault(); $(this).parent('div').remove(); x--;
    	})
	});
</script>

<?php $this->load->view('_include/footer') ?>