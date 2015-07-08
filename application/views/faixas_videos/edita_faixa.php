<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div id="wrapper-body">
    <div class="row">
  	<?php echo form_open('faixas_videos/atualizar') ?>
            <input type="hidden" name="idFaixa" value="<?php echo $faixa->idFaixa; ?>">
            <div class="row">
                <div class="input-field col s11 m8 l8 offset-l1">
                    <i class="mdi-image-audiotrack prefix"></i>
                    <input required id="icon-prefix" type="text" name="nome" value="<?php echo $faixa->nome; ?>">
                    <label><?php echo $this->lang->line('titulo'); ?></label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s11 m8 l8 offset-l1">
                    <input type="text" name="isrc" value="<?php echo $faixa->isrc; ?>">
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
                                            if ($artista->idEntidade == $entidade['idEntidade'] && $artista->idTipo_Entidade == 1) { ?>
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
                            <div class="input-field col s12 m3 l2">
                                <label><?php echo $this->lang->line('participacao');?></label>
                                <input class="<?= $this->lang->line('classPercent') ?>" name="percentualArtista[]" type="text" value="<?php echo $entidade['percentual']; ?>">
                            </div>
                            <?php if($j==0) { ?>
                                <a onclick="addSelectEntidade(getArtistas(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('artista'); ?>', '<?php echo $this->lang->line('participacao'); ?>', '<?php echo $this->lang->line('classPercent') ?>')" 
                                    class="btn-floating btn-medium waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                                <script>
                                    $('.addEntidade').chosen({search_contains: true});
                                    function getArtistas(){
                                        return <?php echo(json_encode($artistas)); ?>; }
                                </script>
                            <?php $j++; } else { ?>
                                <a class="btn-floating btn-medium waves-effect waves-light btn"
                                    data-position="right" data-delay="50" id="removeArtista"><i class="mdi-content-remove"></i></a>
                            <?php } ?>
                        </div>
                <?php } } if(empty($artista_faixa)) { ?>
                    <div class="row">
                        <div class="input-field col s11 m8 l8 offset-l1">
                            <select class="addEntidade browser-default" name="artistas[]">
                                <?php $i=0;
                                    foreach ($artistas as $artista) {
                                        if ($artista->idEntidade == $entidade['idEntidade'] && $artista->idTipo_Entidade == 1) { ?>
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
                        <div class="input-field col s12 m2 l2">
                            <label><?php echo $this->lang->line('participacao');?></label>
                            <input class="<?= $this->lang->line('classPercent') ?>" name="percentualArtista[]" type="text">
                        </div>
                        <a onclick="addSelectEntidade(getArtistas(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('artista'); ?>', '<?php echo $this->lang->line('participacao'); ?>')" 
                            class="btn-floating btn-medium waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
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
                                <select class="addEntidade browser-default" name="autores[]">
                                    <?php $i=0;
                                        foreach ($autores as $autor) {
                                            if ($autor->idEntidade == $entidade['idEntidade'] && $autor->idTipo_Entidade == 2) { ?>
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
                            <div class="input-field col s12 m3 l2">
                                <label><?php echo $this->lang->line('participacao');?></label>
                                <input class="<?= $this->lang->line('classPercent') ?>" name="percentualAutor[]" type="text" value="<?php echo $entidade['percentual']; ?>">
                            </div>
                            <?php if($j==0) { ?>
                                <a onclick="addSelectEntidade(getAutores(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('autor'); ?>', '<?php echo $this->lang->line('participacao'); ?>')" 
                                    class="btn-floating btn-medium waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                                <script>
                                    $('.addEntidade').chosen({search_contains: true});
                                    function getAutores(){
                                        return <?php echo(json_encode($autores)); ?>; }
                                </script>
                            <?php $j++; } else { ?>
                                <a class="btn-floating btn-medium waves-effect waves-light btn"
                                    data-position="right" data-delay="50" id="removeAutor"><i class="mdi-content-remove"></i></a>
                            <?php } ?>
                        </div>
                <?php } } if(empty($autor_faixa)) { ?>
                    <div class="row">
                        <div class="input-field col s11 m8 l8 offset-l1">
                            <select class="addEntidade browser-default" name="autores[]">
                                <?php $i=0;
                                    foreach ($autores as $autor) {
                                        if ($autor->idEntidade == $entidade['idEntidade'] && $autor->idTipo_Entidade == 2) { ?>
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
                        <div class="input-field col s12 m3 l2">
                            <label><?php echo $this->lang->line('participacao');?></label>
                            <input class="<?= $this->lang->line('classPercent') ?>" name="percentualAutor[]" type="text">
                        </div>
                        <a onclick="addSelectEntidade(getAutores(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('autor'); ?>', '<?php echo $this->lang->line('participacao'); ?>')" 
                            class="btn-floating btn-medium waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
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
                                <select class="addEntidade browser-default" name="produtores[]">
                                    <?php $i=0;
                                        foreach ($produtores as $produtor) {
                                            if ($produtor->idEntidade == $entidade['idEntidade'] && $produtor->idTipo_Entidade == 3) { ?>
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
                            <div class="input-field col s12 m3 l2">
                                <label><?php echo $this->lang->line('participacao');?></label>
                                <input class="<?= $this->lang->line('classPercent') ?>" name="percentualProdutor[]" type="text" value="<?php echo $entidade['percentual']; ?>">
                            </div>
                            <?php if($j==0) { ?>
                                <a onclick="addSelectEntidade(getProdutores(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('produtor'); ?>', '<?php echo $this->lang->line('participacao'); ?>')" 
                                    class="btn-floating btn-medium waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                                <script>
                                    $('.addEntidade').chosen({search_contains: true});
                                    function getProdutores(){
                                        return <?php echo(json_encode($produtores)); ?>; }
                                </script>
                            <?php $j++; } else { ?>
                                <a class="btn-floating btn-medium waves-effect waves-light btn"
                                    data-position="right" data-delay="50" id="removeProdutor"><i class="mdi-content-remove"></i></a>
                            <?php } ?>
                        </div>
                <?php } } if(empty($produtor_faixa)) { ?>
                    <div class="row">
                        <div class="input-field col s11 m8 l8 offset-l1">
                            <select class="addEntidade browser-default" name="produtores[]">
                                <?php $i=0;
                                    foreach ($produtores as $produtor) {
                                        if ($produtor->idEntidade == $entidade['idEntidade'] && $produtor->idTipo_Entidade == 3) { ?>
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
                        <div class="input-field col s12 m3 l2">
                            <label><?php echo $this->lang->line('participacao');?></label>
                            <input class="<?= $this->lang->line('classPercent') ?>" name="percentualProdutor[]" type="text">
                        </div>
                        <a onclick="addSelectEntidade(getProdutores(),'<?php echo $this->lang->line('selecione'); ?>', '<?php echo $this->lang->line('produtor'); ?>', '<?php echo $this->lang->line('participacao'); ?>')" 
                            class="btn-floating btn-medium waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        <script>
                            $('.addEntidade').chosen({search_contains: true});
                            function getProdutores(){
                                return <?php echo(json_encode($produtores)); ?>; }
                        </script>
                    </div>
                <?php } ?>
            </div>

            <button class="btn waves-effect waves-light col s12 m12 l8 offset-l1" type="submit"><?php echo $this->lang->line('atualizar'); ?>
                <i class="mdi-content-send right"></i>
            </button>
        <?php echo form_close() ?>
        </div>

</div>

<?php $this->load->view('_include/footer') ?>