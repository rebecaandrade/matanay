<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div id="wrapper-body">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l10">
                <i class="mdi-av-queue-music"></i>
                <?php echo $this->lang->line('faixas_edicao'); ?>
            </div>
        </div>
    </div><br>
    <div class="row">
  	<form id="edicao_faixa" action="<?= base_url() . 'index.php/faixas_videos/atualizar' ?>" method="post">
            <input type="hidden" name="idFaixa" value="<?php echo $faixa->idFaixa; ?>">
            <div class="row">
                <div class="input-field col s11 m8 l8 offset-l1">
                    <i class="mdi-image-audiotrack prefix"></i>
                    <input required id="icon-prefix" type="text" name="nome" value="<?php echo $faixa->nome; ?>">
                    <label><?php echo $this->lang->line('titulo');?></label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s11 m8 l8 offset-l1">
                    <input pattern="[A-Z]{2}[A-Z0-9]{3}[0-9]{7}" required type="text" name="isrc" value="<?php echo $faixa->isrc; ?>">
                    <label>ISRC</label>
                </div>
            </div>

            <div id="SelectArtista">
            <?php $j=0;
                if(isset($artista_faixa, $artistas)){
                    foreach ($artista_faixa as $entidade) { ?>
                        <div class="row">
                            <div class="input-field col s11 m8 l8 offset-l1">
                                <select class="addEntidade browser-default" name="artistas[]">
                                    <?php $i=0;
                                        foreach ($artistas as $artista) {
                                            if ($artista->idEntidade == $entidade['idEntidade']) { ?>
                                                <option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; $i++; ?>
                                    <?php } } ?>

                                    <?php if ($i == 0){ ?>
                                        <option value="" disabled selected><?php echo $this->lang->line('selecione'); ?></option>
                                    <?php }
                                        foreach ($artistas as $artista) { 
                                            if ($artista->idEntidade != $entidade['idEntidade']) { ?>
                                                <option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
                                    <?php } } ?>
                                </select>
                                <label id="selectLabel"><?php echo $this->lang->line("artista");?></label>
                            </div>
                            <div class="input-field col s11 m3 l2">
                                <label><?php echo $this->lang->line('participacao');?></label>
                                <input required class="porcentagem" name="percentArtista[]" type="text" value="<?php echo number_format((float)$entidade['percentual'], 2, '.', ''); ?>">
                            </div>
                            <?php if($j==0) { ?>
                                <a onclick="addSelectEnt(getArtistas(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('artista'); ?>', '<?php echo $this->lang->line('participacao'); ?>', '<?php echo $this->lang->line('classPercent') ?>')" 
                                    class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100art" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                                <script>
                                    $('.addEntidade').chosen({search_contains: true});
                                    function getArtistas(){
                                        return <?php echo(json_encode($artistas)); ?>; }
                                </script>
                            <?php $j++; } else { ?>
                                <a class="btn-floating btn-medium waves-effect waves-light btn"
                                    data-position="right" data-delay="50" id="remArtista"><i class="mdi-content-remove"></i></a>
                            <?php } ?>
                        </div>
                <?php } } if(empty($artista_faixa)) { ?>
                    <div class="row">
                        <div class="input-field col s11 m8 l8 offset-l1">
                            <select class="addEntidade browser-default" name="artistas[]">
                                <?php $i=0;
                                    foreach ($artistas as $artista) {
                                        if ($artista->idEntidade == $entidade['idEntidade']) { ?>
                                            <option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; $i++; ?>
                                <?php } } ?>

                                <?php if ($i == 0){ ?>
                                        <option value="" disabled selected><?php echo $this->lang->line('selecione'); ?></option>
                                    <?php }
                                    foreach ($artistas as $artista) { 
                                        if ($artista->idEntidade != $entidade['idEntidade']) { ?>
                                            <option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
                                <?php } } ?>
                            </select>
                            <label id="selectLabel"><?php echo $this->lang->line("artista");?></label>
                        </div>
                        <div class="input-field col s11 m2 l2">
                            <label><?php echo $this->lang->line('participacao');?></label>
                            <input required class="porcentagem" name="percentArtista[]" type="text">
                        </div>
                        <a onclick="addSelectEnt(getArtistas(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('artista'); ?>', '<?php echo $this->lang->line('participacao'); ?>')" 
                            class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100art" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        <script>
                            $('.addEntidade').chosen({search_contains: true});
                            function getArtistas(){
                                return <?php echo(json_encode($artistas)); ?>; }
                        </script>
                    </div>
                <?php } ?>
            </div>

            <div id="SelectAutor">
            <?php $j=0;
                if(isset($autor_faixa, $autores)){
                    foreach ($autor_faixa as $entidade) { ?>
                        <div class="row">
                            <div class="input-field col s11 m8 l8 offset-l1">
                                <select class="addEntidade browser-default" name="autors[]">
                                    <?php $i=0;
                                        foreach ($autores as $autor) {
                                            if ($autor->idEntidade == $entidade['idEntidade']) { ?>
                                                <option value="<?php echo $autor->idEntidade; ?>"> <?php echo $autor->nome; $i++; ?>
                                    <?php } } ?>

                                    <?php if ($i == 0){ ?>
                                            <option value="" disabled selected><?php echo $this->lang->line('selecione'); ?></option>
                                        <?php }
                                        foreach ($autores as $autor) { 
                                            if ($autor->idEntidade != $entidade['idEntidade']) { ?>
                                                <option value="<?php echo $autor->idEntidade; ?>"> <?php echo $autor->nome; ?>
                                    <?php } } ?>
                                </select>
                                <label id="selectLabel"><?php echo $this->lang->line('autor');?></label>
                            </div>
                            <div class="input-field col s11 m3 l2">
                                <label><?php echo $this->lang->line('participacao');?></label>
                                <input required class="porcentagem" name="percentAutor[]" type="text" value="<?php echo number_format((float)$entidade['percentual'], 2, '.', ''); ?>">
                            </div>
                            <?php if($j==0) { ?>
                                <a onclick="addSelectEnt(getAutores(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('autor'); ?>', '<?php echo $this->lang->line('participacao'); ?>')" 
                                    class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100aut" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                                <script>
                                    $('.addEntidade').chosen({search_contains: true});
                                    function getAutores(){
                                        return <?php echo(json_encode($autores)); ?>; }
                                </script>
                            <?php $j++; } else { ?>
                                <a class="btn-floating btn-medium waves-effect waves-light btn"
                                    data-position="right" data-delay="50" id="remAutor"><i class="mdi-content-remove"></i></a>
                            <?php } ?>
                        </div>
                <?php } } if(empty($autor_faixa)) { ?>
                    <div class="row">
                        <div class="input-field col s11 m8 l8 offset-l1">
                            <select class="addEntidade browser-default" name="autors[]">
                                <?php $i=0;
                                    foreach ($autores as $autor) {
                                        if ($autor->idEntidade == $entidade['idEntidade']) { ?>
                                            <option value="<?php echo $autor->idEntidade; ?>"> <?php echo $autor->nome; $i++; ?>
                                <?php } } ?>

                                <?php if ($i == 0){ ?>
                                    <option value="" disabled selected><?php echo $this->lang->line('selecione'); ?></option>
                                    <?php }
                                    foreach ($autores as $autor) { 
                                        if ($autor->idEntidade != $entidade['idEntidade']) { ?>
                                            <option value="<?php echo $autor->idEntidade; ?>"> <?php echo $autor->nome; ?>
                                <?php } } ?>
                            </select>
                            <label id="selectLabel"><?php echo $this->lang->line('autor');?></label>
                        </div>
                        <div class="input-field col s11 m3 l2">
                            <label><?php echo $this->lang->line('participacao');?></label>
                            <input required class="porcentagem" name="percentAutor[]" type="text">
                        </div>
                        <a onclick="addSelectEnt(getAutores(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('autor'); ?>', '<?php echo $this->lang->line('participacao'); ?>')" 
                            class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100aut" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        <script>
                            $('.addEntidade').chosen({search_contains: true});
                            function getAutores(){
                                return <?php echo(json_encode($autores)); ?>; }
                        </script>
                    </div>
                <?php } ?>
            </div>

            <div id="SelectProdutor">
            <?php $j=0;
                if(isset($produtor_faixa, $produtores)){
                    foreach ($produtor_faixa as $entidade) { ?>
                        <div class="row">
                            <div class="input-field col s11 m8 l8 offset-l1">
                                <select class="addEntidade browser-default" name="produtors[]">
                                    <?php $i=0;
                                        foreach ($produtores as $produtor) {
                                            if ($produtor->idEntidade == $entidade['idEntidade']) { ?>
                                                <option value="<?php echo $produtor->idEntidade; ?>"> <?php echo $produtor->nome; $i++; ?>
                                    <?php } } ?>

                                    <?php if ($i == 0){ ?>
                                            <option value="" disabled selected><?php echo $this->lang->line('selecione'); ?></option>
                                        <?php }
                                        foreach ($produtores as $produtor) { 
                                            if ($produtor->idEntidade != $entidade['idEntidade']) { ?>
                                                <option value="<?php echo $produtor->idEntidade; ?>"> <?php echo $produtor->nome; ?>
                                    <?php } } ?>
                                </select>
                                <label id="selectLabel"><?php echo $this->lang->line('produtor');?></label>
                            </div>
                            <div class="input-field col s11 m3 l2">
                                <label><?php echo $this->lang->line('participacao');?></label>
                                <input class="porcentagem" name="percentProdutor[]" type="text" value="<?php echo number_format((float)$entidade['percentual'], 2, '.', ''); ?>">
                            </div>
                            <?php if($j==0) { ?>
                                <a onclick="addSelectEnt(getProdutores(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('produtor'); ?>', '<?php echo $this->lang->line('participacao'); ?>')" 
                                    class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100prod" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                                <script>
                                    $('.addEntidade').chosen({search_contains: true});
                                    function getProdutores(){
                                        return <?php echo(json_encode($produtores)); ?>; }
                                </script>
                            <?php $j++; } else { ?>
                                <a class="btn-floating btn-medium waves-effect waves-light btn"
                                    data-position="right" data-delay="50" id="remProdutor"><i class="mdi-content-remove"></i></a>
                            <?php } ?>
                        </div>
                <?php } } if(empty($produtor_faixa)) { ?>
                    <div class="row">
                        <div class="input-field col s11 m8 l8 offset-l1">
                            <select class="addEntidade browser-default" name="produtors[]">
                                <?php $i=0;
                                    foreach ($produtores as $produtor) {
                                        if ($produtor->idEntidade == $entidade['idEntidade']) { ?>
                                            <option value="<?php echo $produtor->idEntidade; ?>"> <?php echo $produtor->nome; $i++; ?>
                                <?php } } ?>

                                <?php if ($i == 0){ ?>
                                    <option value="" disabled selected><?php echo $this->lang->line('selecione'); ?></option>
                                <?php }
                                    foreach ($produtores as $produtor) { 
                                        if ($produtor->idEntidade != $entidade['idEntidade']) { ?>
                                            <option value="<?php echo $produtor->idEntidade; ?>"> <?php echo $produtor->nome; ?>
                                <?php } } ?>
                            </select>
                            <label id="selectLabel"><?php echo $this->lang->line('produtor');?></label>
                        </div>
                        <div class="input-field col s11 m3 l2">
                            <label><?php echo $this->lang->line('participacao');?></label>
                            <input class="porcentagem prodNull" name="percentProdutor[]" type="text">
                        </div>
                        <a onclick="addSelectEnt(getProdutores(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('produtor'); ?>', '<?php echo $this->lang->line('participacao'); ?>')" 
                            class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100prod" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        <script>
                            $('.addEntidade').chosen({search_contains: true});
                            function getProdutores(){
                                return <?php echo(json_encode($produtores)); ?>; }
                        </script>
                    </div>
                <?php } ?>
            </div>

            <div class="row" id="SelectImposto">
                <div class="col s12 m12 l8 offset-l1">
                    <h5><?php echo $this->lang->line('impostos'); ?></h5><br>
                    <?php if (isset($impostos)) { $imp = array(); $i=0; ?>
                        <?php foreach ($impostos as $imposto) { ?>
                            <?php foreach ($impostos_faixa as $faixa_imposto) { 
                                $imp[$i] = $faixa_imposto->idImposto; $i++;
                            } ?>
                            <div class="col s4 m3 l3">
                                <?php if(in_array($imposto->idImposto, $imp)) { ?>
                                    <input type='checkbox' class='filled-in' name="impostos_faixa[]" checked value="<?php echo $imposto->idImposto ?>" id="<?php echo $imposto->idImposto ?>"/>
                                    <label for="<?php echo $imposto->idImposto ?>"><?php echo $imposto->nome; ?></label>  
                                <?php } else { ?>
                                    <input type='checkbox' class='filled-in' name="impostos_faixa[]" value="<?php echo $imposto->idImposto ?>" id="<?php echo $imposto->idImposto ?>"/>
                                    <label for="<?php echo $imposto->idImposto ?>"><?php echo $imposto->nome; ?></label>
                                <?php } ?>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>

            <input type="hidden" name="msg_perc_artista" value="<?= $this->lang->line('erro_perc_artista') ?>">
            <input type="hidden" name="msg_perc_autor" value="<?= $this->lang->line('erro_perc_autor') ?>">
            <input type="hidden" name="msg_perc_produtor" value="<?= $this->lang->line('erro_perc_produtor') ?>">

            <button class="btn waves-effect waves-light col s12 m12 l8 offset-l1" type="submit"><?php echo $this->lang->line('atualizar'); ?>
                <i class="mdi-content-send right"></i>
            </button>
    
        </div>
    </form>
</div>

<?php $this->load->view('_include/footer') ?>