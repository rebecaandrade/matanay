<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div id="wrapper-body">
	<div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l10">
                <i class="mdi-av-my-library-music"></i>
                <?php echo $this->lang->line('albuns_cadastro'); ?>
            </div>
        </div>
  	</div><br>
    <div class="row">
      	<form id="cadastro_album" action="<?= base_url() . 'index.php/albuns/cadastrar' ?>" method="post">
	        <div class="row">
	          	<div class="input-field col s12 m12 l8 offset-l2">
	          		<i class="mdi-av-album prefix"></i>
	          		<label><?php echo $this->lang->line('titulo'); ?></label>
	            	<input required id="icon-prefix" type="text" name="nome"/>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m12 l8 offset-l2">
	            	<select class="addEntidade browser-default" name="artista" id="artista">
	              		<option value="-1" disabled selected><?php echo $this->lang->line('selecione');?></option>
	              		<?php
                			if(isset($artistas)){
                    			foreach ($artistas as $artista) { ?>
                        		<option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
                		<?php }}?>
	            	</select>
	            	<label id="selectLabel"><?php echo $this->lang->line('artista');?></label>
	          	</div>
	          	<script>
	        		$('.addEntidade').chosen({search_contains: true});
	            	function getArtistas(){
	            	    return <?php echo(json_encode($artistas)); ?>; }
                </script>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m6 l4 offset-l2">
	          		<label>UPC/EAN</label>
	            	<input pattern="[a-zA-Z0-9]{12,13}" title="12 ou 13 caracteres alfanumericos" maxlength="13" required type="text" name="upc_ean"/>
	          	</div>
	          	<div class="input-field col s12 m6 l4">
	          		<label><?php echo $this->lang->line('n_faixas'); ?></label>
					<input required pattern="[0-9]" title="apenas números" onkeyup="geraSelect(getFaixas(),'<?php echo $this->lang->line('selecione'); ?>','<?php echo $this->lang->line('faixa'); ?>')" id="n_faixas" name="n_faixas" type="text"/>
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
	            	<input pattern="[a-zA-Z0-9]+{0,10}" maxlength="10" title="Até 10 caracteres alfanumericos" type="text" name="catalogo"/>
	          	</div>
	          	<div class="input-field col s12 m6 l4"/>
	          		<label id="selectLabel"><?php echo $this->lang->line('lancamento');?></label>
	            	<input required type="date" class="datepicker" name="ano" id="ano"/>
	          	</div>
	        </div>

	        <div class="row">
	          	<div class="input-field col s12 m12 l8 offset-l2">
	            	<select name="tipo" id="tipo">
	              		<option value="-1" disabled selected><?php echo $this->lang->line('selecione');?></option>
	              		<?php
                			if(isset($tipos)){
                    			foreach ($tipos as $tipo) { ?>
                        		<option value="<?php echo $tipo->idTipo_Album; ?>"> <?php echo $tipo->descricao; ?>
                		<?php }}?>
	            	</select>
	            	<label><?php echo $this->lang->line('tipo');?></label>
	          	</div>
	        </div>

	        <div id="tracklist">
	        </div>

	        <input type="hidden" name="msg_erro_tipo" value="<?= $this->lang->line('erro_tipo') ?>">
	        <input type="hidden" name="msg_erro_artista" value="<?= $this->lang->line('erro_artista') ?>">
	        <input type="hidden" name="msg_erro_ano" value="<?= $this->lang->line('erro_ano') ?>">

	        <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
	          	<i class="mdi-content-send right"></i>
	        </button>
	    </form>

    </div>
</div>

<?php $this->load->view('_include/footer') ?>