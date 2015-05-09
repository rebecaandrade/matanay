<?php $this->load->view('_include/header') ?>

<div  class="container">
    <div class="row">
      	
      	<?php echo form_open('faixas_videos/cadastrar_faixa') ?>
	        <div class="row">
	        	<div id="titulo" class="col s1">
        			<i class="mdi-av-queue-music prefix"></i>
      			</div>
	          	<div class="input-field col s7">
	            	<input type="text" name="nome">
	            	<label><?php echo $this->lang->line('titulo'); ?></label>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s8">
	            	<input type="text" name="isrc">
	            	<label>ISRC</label>
	          	</div>
	          	<div class="switch col s2">
	            	<label>
	              		Video?
	              		<input type="checkbox">
	              		<span class="lever"></span>
	              		Sim
	            	</label>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s8">
	            	<select>
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
	              		<?php
                			if(isset($artistas)){
                    			foreach ($artistas as $artista) { ?>
                        		<option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label>Artista</label>
	          	</div>
	          	<div class="input-field col s2">
	            	<input name="percentual_artista" type="text">
	            	<label>%</label>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s8">
	            	<select>
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
	              		<?php
                			if(isset($autores)){
                    			foreach ($autores as $autor) { ?>
                        		<option value="<?php echo $autor->idEntidade; ?>"> <?php echo $autor->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label>Autor</label>
	          	</div>
	          	<div class="input-field col s2">
	            	<input name="percentual_autor" type="text">
	            	<label>%</label>
	          	</div>
	        </div>


	        <div class="row">
	          	<div class="input-field col s8">
	            	<select>
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
	              		<?php
                			if(isset($produtores)){
                    			foreach ($produtores as $produtor) { ?>
                        		<option value="<?php echo $produtor->idEntidade; ?>"> <?php echo $produtor->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label>Produtor</label>
	          	</div>
	          	<div class="input-field col s2">
	            	<input name="percentual_produtor" type="text">
	            	<label>%</label>
	          	</div>
	        </div>

	        <button class="btn waves-effect waves-light col s8" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
	          	<i class="mdi-content-send right"></i>
	        </button>
	    <?php echo form_close() ?>

    </div>
</div>

<?php $this->load->view('_include/footer') ?>