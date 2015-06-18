<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div id="wrapper-body">
    <div class="row">
      	
      	<?php echo form_open('faixas_videos/cadastrar_faixa') ?>
	        <div class="row">
	          	<div class="input-field col s11 m8 l8 offset-l1">
	          		<i class="mdi-image-audiotrack prefix"></i>
	          		<label><?php echo $this->lang->line('titulo'); ?></label>
	            	<input required id="icon-prefix" type="text" name="nome">
	          	</div>
	        </div>

	        <div class="row">
                <div id="isrcCadastre" class="input-field col s12 m9 l8 offset-l1">
                    <label>ISRC</label>
                    <input id="isrcCadastreInput" class="isrcCadastreInput" type="text" name="isrc">
                </div>

                <div style="display: none" id="youtubeCadastre" class="input-field col s12 m9 l8 offset-l1">
                    <label>YouTube</label>
                    <input id="youtubeCadastreInput" class="youtubeCadastreInput" type="text" name="youtube">
                </div>
                <input id="isrc_youtube" type="hidden" name="isrc_youtube">

                <div class="switch col s6 offset-s6 m3 l2">
                	<?php echo $this->lang->line('video'); ?>
                    <p>
                    	<input type="radio" value="isrc" checked name="isrc/youtube" id="n_video"/>
                        <label for="n_video"><?php echo $this->lang->line('nao'); ?></label>

                    	<input type="radio" value="youtube" name="isrc/youtube" id="eh_video"/>
                        <label for="eh_video"><?php echo $this->lang->line('sim'); ?></label>
                    </p>
                </div>
            </div>

	        <div id="SelectArtista">
	        <div class="row">
				<div class="input-field col s10 m8 l8 offset-l1">
				    <select class="addEntidade browser-default" name="artistas[]">
	              		<option value="" disabled selected><?php echo $this->lang->line("selecione");?></option> 
	              		<?php
                			if(isset($artistas)){
                    			foreach ($artistas as $artista) { ?>
                        		<option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label id="selectLabel"><?php echo $this->lang->line("artista");?></label>
				</div>
				<div class="input-field col s10 m3 l2">
					<label><?php echo $this->lang->line('participacao');?></label>
	            	<input required class="<?= $this->lang->line('classPercent') ?>" name="percentualArtista[]" type="text">
	          	</div>
				<a onclick="addSelectEntidade(getArtistas(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('artista'); ?>', '<?php echo $this->lang->line('participacao'); ?>')" 
					class="btn-floating btn-medium waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
	        	<script>
	        		$('.addEntidade').chosen({search_contains: true});
	            	function getArtistas(){
	            	    return <?php echo(json_encode($artistas)); ?>; }
                </script>
	        </div>
	        </div>

	        <div id="SelectAutor">
	        <div class="row">
	          	<div class="input-field col s10 m8 l8 offset-l1">
	            	<select class="addEntidade browser-default" name="autores[]">
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
	              		<?php
                			if(isset($autores)){
                    			foreach ($autores as $autor) { ?>
                        		<option value="<?php echo $autor->idEntidade; ?>"> <?php echo $autor->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label id="selectLabel"><?php echo $this->lang->line('autor');?></label>
	          	</div>
	          	<div class="input-field col s10 m3 l2">
	          		<label><?php echo $this->lang->line('participacao');?></label>
	            	<input required class="<?= $this->lang->line('classPercent') ?>" name="percentualAutor[]" type="text">
	          	</div>
	          	<a onclick="addSelectEntidade(getAutores(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('autor'); ?>', '<?php echo $this->lang->line('participacao'); ?>')" 
					class="btn-floating btn-medium waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
	        	<script>
	        		$('.addEntidade').chosen({search_contains: true});
	            	function getAutores(){
	            	    return <?php echo(json_encode($autores)); ?>; }
                </script>
	        </div>
	        </div>

	        <div id="SelectProdutor">
	        <div class="row">
	          	<div class="input-field col s10 m8 l8 offset-l1">
	            	<select class="addEntidade browser-default" name="produtores[]">
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
	              		<?php
                			if(isset($produtores)){
                    			foreach ($produtores as $produtor) { ?>
                        		<option value="<?php echo $produtor->idEntidade; ?>"> <?php echo $produtor->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label id="selectLabel"><?php echo $this->lang->line('produtor');?></label>
	          	</div>
	          	<div class="input-field col s10 m3 l2">
	          		<label><?php echo $this->lang->line('participacao');?></label>
	            	<input required class="<?= $this->lang->line('classPercent') ?>" name="percentualProdutor[]" type="text">
	          	</div>
	          	<a onclick="addSelectEntidade(getProdutores(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('produtor'); ?>', '<?php echo $this->lang->line('participacao'); ?>')" 
					class="btn-floating btn-medium waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
	        	<script>
	        		$('.addEntidade').chosen({search_contains: true});
	            	function getProdutores(){
	            	    return <?php echo(json_encode($produtores)); ?>; }
                </script>
	        </div>
	        </div>

	        <button class="btn waves-effect waves-light col s11 m12 l8 offset-l1" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
	          	<i class="mdi-content-send right"></i>
	        </button>
	    <?php echo form_close() ?>

    </div>
</div>

<?php $this->load->view('_include/footer') ?>