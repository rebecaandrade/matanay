<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div id="wrapper-body">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l10">
                <i class="mdi-av-queue-music"></i>
                <?php echo $this->lang->line('albuns_edicao_faixas'); ?>
            </div>
        </div>
    </div>
    <div id="titulo_perfil">
        <div class="row">
            <div class="input-field col s12 m8 l11 offset-l2">
                <i class="mdi-av-album"></i>
                <?php echo $album->nome; ?> -
                <?php
                    if(isset($artistas)){
                        foreach ($artistas as $artista) {
                            if ($artista->idEntidade == $artista_album->idEntidade) { ?>
                                <?php echo $artista->nome; ?>
                <?php } } } ?> 
            </div>
        </div>
        <div class="row">
            <div id="upc" class="input-field col s10 offset-s2 m10 offset-m1 l11 offset-l2">
                <h5>UPC/EAN: <?php echo $album->upc_ean; ?></h5>
                <h6>Ano: <?php echo $album->ano; ?></h6>
            </div>
        </div>
    </div>
     
    <?php echo form_open('albuns/atualizar_faixas') ?>
        <input type="hidden" name="idAlbum" value="<?php echo $album->idAlbum; ?>">

            <div id="SelectFaixas">
            <?php $j=0;
                if(isset($tracklist, $faixas)){
                    foreach ($tracklist as $track) { ?>
                        <div class="row">
                            <div class="input-field col s10 m10 offset-m1 l8 offset-l2">
                                <select class="addFaixa browser-default" name="faixas[]">
                                    <?php $i=0;
                                        foreach ($faixas as $faixa) {
                                            if ($faixa->idFaixa == $track->idFaixa) { ?>
                                                <option value="<?php echo $faixa->idFaixa; ?>"> <?php echo $faixa->nome; $i++; ?>
                                    <?php } } ?>

                                    <?php if ($i == 0){ ?>
                                        <option value="" disabled selected><?php echo $this->lang->line('selecione'); ?></option>
                                    <?php }
                                        foreach ($faixas as $faixa) { 
                                            if ($faixa->idFaixa != $track->idFaixa) { ?>
                                                <option value="<?php echo $faixa->idFaixa; ?>"> <?php echo $faixa->nome; ?>
                                    <?php } } ?>
                                </select>
                                <label id="selectLabel"><?php echo $this->lang->line("faixa");?></label>
                            </div>
                            <?php if($j==0) { ?>
                                <a onclick="addSelectFaixa(getFaixas(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('faixa'); ?>')" 
                                    class="btn-floating btn-medium waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('adicionar'); ?>"><i class="mdi-content-add"></i></a>
                                <script>
                                    $('.addFaixa').chosen({search_contains: true});
                                    function getFaixas(){
                                        return <?php echo(json_encode($faixas)); ?>; }
                                </script>
                            <?php $j++; } else { ?>
                                <script>
                                    $('.addFaixa').chosen({search_contains: true});
                                </script>
                                <a class="btn-floating btn-medium waves-effect waves-light btn"
                                    data-position="right" data-delay="50" id="removeFaixa"><i class="mdi-content-remove"></i></a>
                            <?php } ?>
                        </div>
                <?php } } if(empty($tracklist)) { ?>
                    <div class="row">
                        <div class="input-field col s10 m10 offset-m1 l8 offset-l2">
                            <select class="addFaixa browser-default" name="faixas[]">
                                <?php $i=0;
                                    foreach ($faixas as $faixa) {
                                        if ($faixa->idFaixa == $track['idFaixa']) { ?>
                                            <option value="<?php echo $faixa->idFaixa; ?>"> <?php echo $faixa->nome; $i++; ?>
                                <?php } } ?>

                                <?php if ($i == 0){ ?>
                                        <option value="" disabled selected><?php echo $this->lang->line('selecione'); ?></option>
                                    <?php }
                                    foreach ($faixas as $faixa) { 
                                        if ($faixa->idFaixa != $track->idFaixa) { ?>
                                            <option value="<?php echo $faixa->idFaixa; ?>"> <?php echo $faixa->nome; ?>
                                <?php } } ?>
                            </select>
                            <label id="selectLabel"><?php echo $this->lang->line("faixa");?></label>
                        </div>
                        <a onclick="addSelectFaixa(getFaixas(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('artista'); ?>', '<?php echo $this->lang->line('participacao'); ?>')" 
                            class="btn-floating btn-medium waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('adicionar'); ?>"><i class="mdi-content-add"></i></a>
                        <script>
                            $('.addFaixa').chosen({search_contains: true});
                            function getFaixas(){
                                return <?php echo(json_encode($faixas)); ?>; }
                        </script>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <button class="input-field btn waves-effect waves-light col s11 m10 offset-m1 l8 offset-l2" type="submit"><?php echo $this->lang->line('atualizar'); ?>
                    <i class="mdi-content-send right"></i>
                </button>
            </div>
    <?php echo form_close() ?>   
</div>

<?php $this->load->view('_include/footer') ?>