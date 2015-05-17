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
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option> 
	              		<?php
                			if(isset($artistas)){
                    			foreach ($artistas as $artista) { ?>
                        		<option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label><?php echo $this->lang->line('artista');?></label>
	          	</div>
	          	<div class="input-field col s12 m3 l2">
	            	<input name="percentual_artista" type="text">
	            	<label>%</label>
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

<?php $this->load->view('_include/footer') ?>