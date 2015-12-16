<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div id="wrapper-body">
	<div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l10">
                <i class="mdi-av-my-library-music"></i>
                <?php echo $this->lang->line('albuns_cadastro'); ?>
                <a href="<?php echo base_url(); ?>index.php/albuns/listar"
                    class="btn-floating btn-medium waves-effect waves-light btn novo" id="addButton">
                    <i class="mdi-hardware-keyboard-arrow-left"></i>
                </a>
            </div>

        </div>
  	</div><br>
    <div class="row">
      	<form id="cadastro_album" action="<?= base_url() . 'index.php/albuns/cadastrar' ?>" method="post">
	        <div class="row">
	          	<div class="input-field col s12 m12 l8 offset-l2">
	          		<i class="mdi-av-album prefix"></i>
	          		<label><?php echo $this->lang->line('titulo'); ?></label>
	            	<input required pattern=".{1,45}" id="icon-prefix" type="text" name="nome"/>
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
	            	<input pattern="[0-9]{12,13}" title="12 ou 13 caracteres numericos" maxlength="13" required type="text" name="upc_ean"/>
	          	</div>
	          	<div class="input-field col s10 m5 l4">
	          		<label><?php echo $this->lang->line('n_faixas'); ?></label>
					<input required pattern="[0-9]" title="apenas números" onkeyup="geraSelect(getFaixas(),'<?php echo $this->lang->line('selecione'); ?>','<?php echo $this->lang->line('faixa'); ?>')" id="n_faixas" name="n_faixas" type="text"/>
	            	<script>
	            	function getFaixas(){
	            	    return <?php echo(json_encode($faixas)); ?>;
	            	}
                    </script>	          	
                </div>
                <a href="#modal1" class="btn-floating btn-medium waves-effect waves-light btn modal-trigger tooltipped" data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('nova'); ?>"><i class="mdi-content-add"></i></a>
	        </div>
 
	        <div class="row">
	          	<div class="input-field col s12 m6 l4 offset-l2">
	            	<label><?php echo $this->lang->line('catalogo'); ?></label>
	            	<input id="codCatalogo" pattern="[a-zA-Z0-9]+{0,10}" maxlength="10" title="Até 10 caracteres alfanumericos" type="text" name="catalogo"/>
	          	</div>
	          	<div class="input-field col s12 m6 l4"/>
	          		<label><?php echo $this->lang->line('lancamento');?></label>
	            	<input pattern="[0-9]{4,4}" maxlength="4" required type="text" name="ano" id="ano"/>
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

	        <div class="row" id="SelectImposto">
				<div class="col s12 m12 l8 offset-l2">
					<?php $nada = "" ?>
					<h5><?php echo $this->lang->line('impostos'); ?></h5><br>
					<?php if (isset($impostos)) { ?>
						<?php foreach ($impostos as $imposto) { ?>
                            <?php $index = $imposto->idImposto ?>
                            	<div class="col s4 m3 l3">
                                	<input type='checkbox' class="filled-in" id="<?php echo $imposto->idImposto ?>"
                                       	name="impostos[]"
                                       	value="<?php echo $imposto->idImposto ?>" <?= (isset($antigos['imposto'][$index]) ? "checked" : $nada) ?>/>
                                	<label for="<?php echo $imposto->idImposto ?>"><?php echo $imposto->nome; ?></label>
                            	</div>
                        <?php }
					} ?>
				</div>
			</div>

	        <input type="hidden" name="msg_erro_tipo" value="<?= $this->lang->line('erro_tipo') ?>">
	        <input type="hidden" name="msg_erro_artista" value="<?= $this->lang->line('erro_artista') ?>">
	        <input type="hidden" name="msg_erro_ano" value="<?= $this->lang->line('erro_ano') ?>">
	        <input type="hidden" name="msg_erro_faixas" value="<?= $this->lang->line('erro_faixas') ?>">
            <input type="hidden" name="codMessageDisplay" value="<?= $this->lang->line('cod_invalido') ?>">

	        <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
	          	<i class="mdi-content-send right"></i>
	        </button>
	    </form>


	    <div id="modal1" class="modal">
		    <div id="titulo_lista">
		        <div class="row">
		            <div class="input-field col s12 m8 l10">
		            	<i class="mdi-av-queue-music"></i>
		          		<?php echo $this->lang->line('faixas_cadastro'); ?>
		            </div>
		        </div>
		  	</div><br>
		  	<form action="" id="formFaixa">
		  	<div class="row">
			        <div class="row">
			          	<div class="input-field col s10 offset-s1 m7 offset-m1 l6 offset-l1">
			          		<i class="mdi-image-audiotrack prefix"></i>
			          		<label><?php echo $this->lang->line('titulo'); ?></label>
			            	<input required id="tituloFaixa" type="text" name="nome">
			          	</div>
			        </div>

			        <div class="row">
		                <div id="isrcCadastre" class="input-field col s10 offset-s1 m7 offset-m1 l6 offset-l1">
		                    <label>ISRC</label>
		                    <input required pattern="[A-Z]{2}[A-Z0-9]{3}[0-9]{7}" id="isrcFaixa" class="isrcCadastreInput" type="text" name="isrc">
		                </div>

		                <div style="display: none" id="youtubeCadastre" class="input-field col s10 offset-s1 m7 offset-m1 l6 offset-l1">
		                    <label>YouTube</label>
		                    <input id="youtubeFaixa" class="youtubeCadastreInput" type="text" name="youtube">
		                </div>
		                <input id="isrc_youtube" type="hidden" name="isrc_youtube">

		                <div class="switch col s6 offset-s6 m4 l3">
		                	<?php echo $this->lang->line('video'); ?>
		                    <p>
		                    	<input type="radio" value="isrc" checked name="isVideo" id="n_video"/>
		                        <label for="n_video"><?php echo $this->lang->line('nao'); ?></label>

		                    	<input 	type="radio" value="youtube" name="isVideo" id="eh_video"/>
		                        <label for="eh_video"><?php echo $this->lang->line('sim'); ?></label>
		                    </p>
		                </div>
		            </div>

			        <div id="SelectArtista">
				        <div class="row">
							<div class="input-field col s9 offset-s1 m7 offset-m1 l6 offset-l1">
							    <select  class="selectArtista addArtista browser-default" name="artistas[]" id="artista">
				              		<option value="-1" disabled selected><?php echo $this->lang->line("selecione");?></option>
				              		<?php
			                			if(isset($artistas)){
			                    			foreach ($artistas as $artista) { ?>
			                        		<option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
			                		<?php }}?>
				            	</select>
				            	<label id="selectLabel"><?php echo $this->lang->line("artista");?></label>
							</div>
							<div class="input-field col s9 offset-s1 m3 l3">
								<label><?php echo $this->lang->line('participacao');?></label>
				            	<input required class="<?= $this->lang->line('classPercent') ?> porcentagemArtista" name="percentualArtista[]" type="text">
				          	</div>
							<a onclick="addSelectEntidadeModal(getArtistas(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('artista'); ?>', '<?php echo $this->lang->line('participacao'); ?>')"
								class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100artista" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
				        	<script>
				        		$('.addEntidade').chosen({search_contains: true});
				            	function getArtistas(){
				            	    return <?php echo(json_encode($artistas)); ?>; }
			                </script>
				        </div>
			        </div>

			        <div id="SelectAutor">
				        <div class="row">
				          	<div class="input-field col s9 offset-s1 m7 offset-m1 l6 offset-l1">
				            	<select id="selectArtista" class="selectAutor addAutor browser-default" name="autors[]" id="autor">
				              		<option value="-1" disabled selected><?php echo $this->lang->line('selecione');?></option>
				              		<?php
			                			if(isset($autores)){
			                    			foreach ($autores as $autor) { ?>
			                        		<option value="<?php echo $autor->idEntidade; ?>"> <?php echo $autor->nome; ?>
			                		<?php }}?>
				            	</select>
				            	<label id="selectLabel"><?php echo $this->lang->line('autor');?></label>
				          	</div>
				          	<div class="input-field col s9 offset-s1 m3 l3">
				          		<label><?php echo $this->lang->line('participacao');?></label>
				            	<input required class="<?= $this->lang->line('classPercent') ?> porcentagemAutor" name="percentualAutor[]" type="text">
				          	</div>
				          	<a onclick="addSelectEntidadeModal(getAutores(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('autor'); ?>', '<?php echo $this->lang->line('participacao'); ?>')"
								class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100autor" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
				        	<script>
				        		$('.addEntidade').chosen({search_contains: true});
				            	function getAutores(){
				            	    return <?php echo(json_encode($autores)); ?>; }
			                </script>
				        </div>
			        </div>

			        <div id="SelectProdutor">
				        <div class="row">
				          	<div class="input-field col s9 offset-s1 m7 offset-m1 l6 offset-l1">
				            	<select id="selectArtista" class="selectProdutor addProdutor browser-default" name="produtors[]">
				              		<option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
				              		<?php
			                			if(isset($produtores)){
			                    			foreach ($produtores as $produtor) { ?>
			                        		<option value="<?php echo $produtor->idEntidade; ?>"> <?php echo $produtor->nome; ?>
			                		<?php }}?>
				            	</select>
				            	<label id="selectLabel"><?php echo $this->lang->line('produtor');?></label>
				          	</div>
				          	<div class="input-field col s9 offset-s1 m3 l3">
				          		<label><?php echo $this->lang->line('participacao');?></label>
				            	<input class="<?= $this->lang->line('classPercent') ?> porcentagemProdutor" name="percentualProdutor[]" type="text">
				          	</div>
				          	<a onclick="addSelectEntidadeModal(getProdutores(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('produtor'); ?>', '<?php echo $this->lang->line('participacao'); ?>')"
								class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100produtor" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
				        	<script>
				        		$('.addEntidade').chosen({search_contains: true});
				            	function getProdutores(){
				            	    return <?php echo(json_encode($produtores)); ?>; }
			                </script>
				        </div>
			        </div>

			        <div class="row" id="SelectImposto">
						<div class="col s10 offset-s1 m10 offset-m1 l8 offset-l1">
							<h5><?php echo $this->lang->line('impostos'); ?></h5><br>
							<?php if (isset($impostos)) { ?>
								<?php foreach ($impostos as $imposto) { ?>
									<div class="col s6 m4 l4">
										<input type='checkbox' class='filled-in impostoFaixa' name="impostos_faixa[]" value="<?php echo $imposto->idImposto ?>" id="<?php echo $imposto->nome ?>"/>
										<label for="<?php echo $imposto->nome ?>"><?php echo $imposto->nome; ?></label>
									</div>
								<?php }
							} ?>
						</div>
					</div>

					<input type="hidden" name="msg_erro_artistas" value="<?= $this->lang->line('erro_artistas') ?>">
			        <input type="hidden" name="msg_erro_autores" value="<?= $this->lang->line('erro_autores') ?>">
			        <input type="hidden" name="msg_perc_artista" value="<?= $this->lang->line('erro_perc_artista') ?>">
			        <input type="hidden" name="msg_perc_autor" value="<?= $this->lang->line('erro_perc_autor') ?>">
	        		<input type="hidden" name="msg_perc_produtor" value="<?= $this->lang->line('erro_perc_produtor') ?>">

			        <button id="btnSalvarFaixa" class="btn waves-effect waves-light col s10 offset-s1 m10 offset-m1 l8 offset-l1" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
			          	<i class="mdi-content-send right"></i>
			        </button>
		    </div>
			</form>
		    <div class="modal-footer">
		      	<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCELAR</a>
		    </div>
		</div>

    </div>

</div>

<input id="baseUrl" type="hidden" value="<?php echo base_url();?>"/>

<script src="<?php echo base_url(); ?>complemento/js/cadastro_album.js"></script>

<?php $this->load->view('_include/footer') ?>