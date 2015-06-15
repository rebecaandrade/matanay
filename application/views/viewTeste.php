<?php $this->load->view('_include/header') ?> <!-- Evandro -->


<div id="wrapper-body">
    <div class="row">
      	
      	<?php echo form_open('albuns/cadastrar') ?>
	        <div class="row">
	          	<div class="input-field col s12 m12 l8 offset-l2">
	          		<i class="mdi-av-album prefix"></i>
	          		<label><?php echo $this->lang->line('titulo'); ?></label>
	            	<input required id="icon-prefix" type="text" name="nome"/>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m12 l8 offset-l2">
	            	<select name="artista">
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione'); ?></option>
	              		<?php
if (isset($artistas)) {
    foreach ($artistas as $artista) { ?>
        <option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
    <?php }
} ?>
	            	</select>
	            	<label><?php echo $this->lang->line('artista'); ?></label>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m6 l4 offset-l2">
	          		<label>UPC/EAN</label>
	            	<input required type="text" name="upc_ean"/>
	          	</div>
	          	<div class="input-field col s12 m6 l4">
	          		<label><?php echo $this->lang->line('n_faixas'); ?></label>
	            	<input required onkeyup="executaSelect(getFaixas(),'<?php echo $this->lang->line('selecione'); ?>')" id="n_faixas" name="n_faixas" type="text"/>
	            	<script>
	            	function getFaixas(){
	            	    return <?php echo(json_encode($faixas)); ?>;
	            	}
                    </script>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m6 l4 offset-l2">
	            	<label><?php echo $this->lang->line('catalogo'); ?></label>
	            	<input type="text" name="catalogo"/>
	          	</div>
	          	<div class="input-field col s12 m6 l4"/>
	          		<label><?php echo $this->lang->line('lancamento'); ?></label>
	            	<input required type="text" name="ano"/>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m12 l8 offset-l2">
	            	<select name="tipo">
	              		<option value="" disabled selected><?php echo $this->lang->line('selecione'); ?></option>
	              		<?php
if (isset($tipos)) {
    foreach ($tipos as $tipo) { ?>
        <option value="<?php echo $tipo->idTipo_Album; ?>"> <?php echo $tipo->descricao; ?>
    <?php }
} ?>
	            	</select>
	            	<label><?php echo $this->lang->line('tipo'); ?></label>
	          	</div>
	        </div>

	        <div id="tracklist" class="row">
	        </div>

	        <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
	          	<i class="mdi-content-send right"></i>
	        </button>
	    <?php echo form_close() ?>

    </div>
</div>

<script>


</script>

<?php $this->load->view('_include/footer') ?>