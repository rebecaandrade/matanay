<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div class="container">
    <div class="row">
  	    <?php echo form_open('albuns/atualizar') ?>
            <input type="hidden" name="idAlbum" value="<?php echo $album->idAlbum; ?>">
            <div class="row">
                <div class="input-field col s12 m12 l6 offset-l2">
                    <i class="mdi-av-album prefix"></i>
                    <label><?php echo $this->lang->line('titulo'); ?></label>
                    <input id="icon-prefix" type="text" name="nome" value="<?php echo $album->nome; ?>"/>
                </div>
                <div class="input-field col s12 m6 l2">
                    <label for="disabled"><?php echo $this->lang->line('n_faixas'); ?></label>
                    <input class="n_faixas" id="disabled" name="n_faixas" type="text" disabled value="<?php echo $album->quantidade; ?>"/>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m12 l8 offset-l2">
                    <select name="artista">
                        <?php
                            if(isset($artistas)){
                                foreach ($artistas as $artista) {
                                    if ($artista->idEntidade == $artista_album->idEntidade) { ?>
                                        <option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
                        <?php } } } ?>

                        <?php
                            if(isset($artistas)){
                                foreach ($artistas as $artista) { 
                                    if ($artista->idEntidade != $artista_album->idEntidade) { ?>
                                        <option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
                        <?php } } } ?>
                    </select>
                    <label><?php echo $this->lang->line('artista');?></label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 l3 offset-l2">
                    <label>UPC/EAN</label>
                    <input type="text" name="upc_ean" value="<?php echo $album->upc_ean; ?>"/>
                </div>
                <div class="input-field col s12 m6 l3">
                    <label><?php echo $this->lang->line('catalogo'); ?></label>
                    <input type="text" name="catalogo" value="<?php echo $album->codigo_catalogo; ?>"/>
                </div>
                <div class="input-field col s12 m6 l2"/>
                    <label><?php echo $this->lang->line('lancamento'); ?></label>
                    <input type="text" name="ano" value="<?php echo $album->ano; ?>"/>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m12 l8 offset-l2">
                    <select name="tipo">
                        <?php
                            if(isset($tipos)){
                                foreach ($tipos as $tipo) {
                                    if ($tipo->idTipo_Album == $album->idTipo_Album) { ?>
                                        <option value="<?php echo $tipo->idTipo_Album; ?>"> <?php echo $tipo->descricao; ?>
                        <?php } } } ?>
                        
                        <?php
                            if(isset($tipos)){
                                foreach ($tipos as $tipo) { 
                                    if ($tipo->idTipo_Album != $album->idTipo_Album) { ?>
                                        <option value="<?php echo $tipo->idTipo_Album; ?>"> <?php echo $tipo->descricao; ?>
                        <?php } } } ?>
                    </select>
                    <label><?php echo $this->lang->line('tipo');?></label>
                </div>
            </div>

            <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2" type="submit"><?php echo $this->lang->line('atualizar'); ?>
                <i class="mdi-content-send right"></i>
            </button>
        <?php echo form_close() ?>
    </div>

</div>

<?php $this->load->view('_include/footer') ?>