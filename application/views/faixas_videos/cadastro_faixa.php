<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div class="container">
    <div class="row">
      	
      	<?php echo form_open('faixas_videos/cadastrar_faixa') ?>
	        <div class="row">
	          	<div class="input-field col s12 m9 l8 offset-l1">
	          		<i class="mdi-av-queue-music prefix"></i>
	            	<input id="icon-prefix" type="text" name="nome">
	            	<label><?php echo $this->lang->line('titulo'); ?></label>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m9 l8 offset-l1">
	            	<input type="text" name="isrc">
	            	<label>ISRC</label>
	          	</div>
	          	<div class="switch col s6 offset-s6 m3 l2">
	            	<label>
	              		<?php echo $this->lang->line('video');?>
	              		<input type="checkbox">
	              		<span class="lever"></span>
	              		<?php echo $this->lang->line('sim');?>
	            	</label>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m9 l8 offset-l1">
	            	<select>
	              		<option value="" disabled selected><?php echo $this->lang->line("selecione");?></option> 
	              		<?php
                			if(isset($artistas)){
                    			foreach ($artistas as $artista) { ?>
                        		<option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label><?php echo $this->lang->line("artista");?></label>
	          	</div>
	          	<div class="input-field col s12 m3 l2">
	            	<input name="percentual_artista" type="text">
	            	<label>%</label>
	          	</div>
	        </div>

	        <div id="SelectGroup">
	        <div class="row">
				<div class="input-field col s12 m9 l8 offset-l1" id="Select1">
				    <select>
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
	            	<input name="percentual_artista" type="text">
	            	<label>%</label>
	          	</div>
				<a class="btn-floating btn-medium waves-effect waves-light btn tooltipped" 
					data-position="right" data-delay="50" data-tooltip="Adicionar" id="addButton"><i class="mdi-content-add"></i></a>
	        </div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m9 l8 offset-l1">
	            	<select>
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
	              		<?php
                			if(isset($autores)){
                    			foreach ($autores as $autor) { ?>
                        		<option value="<?php echo $autor->idEntidade; ?>"> <?php echo $autor->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label><?php echo $this->lang->line('autor');?></label>
	          	</div>
	          	<div class="input-field col s12 m3 l2">
	            	<input name="percentual_autor" type="text">
	            	<label>%</label>
	          	</div>
	        </div>


	        <div class="row">
	          	<div class="input-field col s12 m9 l8 offset-l1">
	            	<select>
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
	              		<?php
                			if(isset($produtores)){
                    			foreach ($produtores as $produtor) { ?>
                        		<option value="<?php echo $produtor->idEntidade; ?>"> <?php echo $produtor->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label><?php echo $this->lang->line('produtor');?></label>
	          	</div>
	          	<div class="input-field col s12 m3 l2">
	            	<input name="percentual_produtor" type="text">
	            	<label>%</label>
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

		$("#addButton").click(function(e) {
			e.preventDefault();

			var newTextBoxDiv = $(document.createElement('div')).attr("id", 'Select' + counter);
			newTextBoxDiv.after().html('<div class="row"><div class="input-field col s10 m10 l8 offset-l1">' +
				'<select id="select' + counter + '" ><option value="" disabled selected><?php echo $this->lang->line("selecione");?></option><option value="' + "val" + ' ">"' + "desc2" + 
				'"</option><option value="' + "val2" + ' ">"' + "desc" + '"</option><option value="' + "val3" + 
				' ">"' + "desc3" + '"</option></select><label>Artista ' + counter + ' </label></div><div class="input-field col s12 m3 l2">' +
				'<input name="percentual_artista' + counter + '" type="text"><label>%</label></div>' +
				'<a class="btn-floating btn-medium waves-effect waves-light btn tooltipped"' +
				'data-position="right" data-delay="50" data-tooltip="Remover" id="removeButton"><i class="mdi-content-remove"></i></a></div>');

				newTextBoxDiv.appendTo("#SelectGroup");
				counter++;
				$('select').material_select();
			});

		$("#SelectGroup").on("click","#removeButton", function(e){ //user click on remove text
        	e.preventDefault(); $(this).parent('div').remove(); x--;
    	})
	});
</script>

<?php $this->load->view('_include/footer') ?>