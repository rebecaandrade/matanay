<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div id="wrapper-body">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l10">
                <i class="mdi-av-my-library-music"></i>
                <?php echo $this->lang->line('albuns_edicao'); ?>
            </div>
        </div>
    </div><br>
    <div class="row">
        <form id="edicao_album" action="<?= base_url() . 'index.php/albuns/atualizar' ?>" method="post">
            <input type="hidden" name="idAlbum" value="<?php echo $album->idAlbum; ?>">
            <input type="hidden" name="artista_album" value="<?php echo $artista_album->idEntidade; ?>">
            <div class="row">
                <div class="input-field col s12 m8 l6 offset-l2">
                    <i class="mdi-av-album prefix"></i>
                    <label><?php echo $this->lang->line('titulo'); ?></label>
                    <input required id="icon-prefix" type="text" name="nome" value="<?php echo $album->nome; ?>"/>
                </div>
                <div class="input-field col s9 m2 l2">
                    <label for="disabled"><?php echo $this->lang->line('n_faixas'); ?></label>
                    <input class="n_faixas" id="disabled" name="n_faixas" type="text" disabled value="<?php echo $album->quantidade; ?>"/>
                </div>
                <div class="input-field col s3 m2 l2">
                    <a id="acao" href="<?php echo base_url(); ?>index.php/albuns/faixas_atualizacao/<?php echo $album->idAlbum ?>">Editar Faixas</a>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 l8 offset-l2">
                    <select class="addEntidade browser-default" name="artista">
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
                    <label id="selectLabel"><?php echo $this->lang->line('artista');?></label>
                    <script>
                        $('.addEntidade').chosen({search_contains: true});
                        function getArtistas(){
                            return <?php echo(json_encode($artistas)); ?>; }
                    </script>
                </div>
                <div class="input-field col s12 m6 l8 offset-l2">
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

            <div class="row">
                <div class="input-field col s12 m4 l2 offset-l2"/>
                    <label><?php echo $this->lang->line('lancamento');?></label>
                    <input pattern="[0-9]{4,4}" maxlength="4" required type="text" name="ano" value="<?php echo $album->ano; ?>"/>
                </div>
                <div class="input-field col s12 m4 l3">
                    <label>UPC/EAN</label>
                    <input pattern="[a-zA-Z0-9]{12,13}" title="12 ou 13 caracteres alfanumericos" maxlength="13" required type="text" name="upc_ean" value="<?php echo $album->upc_ean; ?>"/>
                </div>
                <div class="input-field col s12 m4 l3">
                    <label><?php echo $this->lang->line('catalogo'); ?></label>
                    <input pattern="[a-zA-Z0-9]+{0,10}" maxlength="10" title="Até 10 caracteres alfanumericos" type="text" name="catalogo" value="<?php echo $album->codigo_catalogo; ?>"/>
                </div>
            </div>

            <div class="row" id="SelectImposto">
                <div class="col s12 m12 l8 offset-l2">
                    <h5><?php echo $this->lang->line('impostos'); ?></h5><br>
                    <?php if (isset($impostos)) { ?>
                        <?php foreach ($impostos as $imposto) { ?>
                            <div class="col s4 m3 l3">
                                <?php if($imposto->idImposto == $album->idImposto) { ?>
                                    <input type='radio' name="imposto_album" checked value="<?php echo $imposto->idImposto ?>" id="<?php echo $imposto->idImposto ?>"/>
                                    <label for="<?php echo $imposto->idImposto ?>"><?php echo $imposto->nome; ?></label>  
                                <?php } else { ?>
                                    <input type='radio' name="imposto_album" value="<?php echo $imposto->idImposto ?>" id="<?php echo $imposto->idImposto ?>"/>
                                    <label for="<?php echo $imposto->idImposto ?>"><?php echo $imposto->nome; ?></label>
                                <?php } ?>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>

            <input type="hidden" name="msg_erro_ano" value="<?= $this->lang->line('erro_ano') ?>">

            <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2" type="submit"><?php echo $this->lang->line('atualizar'); ?>
                <i class="mdi-content-send right"></i>
            </button>
        </form>

    </div>
</div>

<?php $this->load->view('_include/footer') ?>