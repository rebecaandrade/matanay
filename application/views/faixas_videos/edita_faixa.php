<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div class="container">
    <div class="row">
  	<?php echo form_open('faixas_videos/atualizar') ?>
            <input type="hidden" name="idFaixa" value="<?php echo $faixa->idFaixa; ?>">
            <div class="row">
                <div class="input-field col s12 m9 l7 offset-l2">
                    <i class="mdi-image-audiotrack prefix"></i>
                    <input id="icon-prefix" type="text" name="nome" value="<?php echo $faixa->nome; ?>">
                    <label><?php echo $this->lang->line('titulo'); ?></label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m9 l7 offset-l2">
                    <input type="text" name="isrc" value="<?php echo $faixa->isrc; ?>">
                    <label>ISRC</label>
                </div>
            </div>

            <div id="SelectArtista">
            <?php
                if(isset($entidade_faixa, $artistas)){
                    foreach ($entidade_faixa as $entidade) { 
                        if ($entidade['idTipo_Entidade'] == 1) { ?>
                            <div class="row">
                                <div class="input-field col s12 m9 l7 offset-l2">
                                    <select name="artistas[]">
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
                                    <label><?php echo $this->lang->line("artista");?></label>
                                </div>
                                <div class="input-field col s12 m2 l1">
                                    <input name="percentual_artista[]" type="text" value="<?php echo $entidade['percentual']; ?>">
                                    <label>%</label>
                                </div>
                                <a class="btn-floating btn-medium waves-effect waves-light btn"
                                    data-position="right" data-delay="50" id="removeArtista"><i class="mdi-content-remove"></i></a>
                            </div>
            <?php } } } ?>
            </div>

            <div id="SelectAutor">
            <?php
                if(isset($entidade_faixa, $autores)){
                    foreach ($entidade_faixa as $entidade) { 
                        if ($entidade['idTipo_Entidade'] == 2) { ?>
                            <div class="row">
                                <div class="input-field col s12 m9 l7 offset-l2">
                                    <select name="autores[]">
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
                                    <label><?php echo $this->lang->line('autor');?></label>
                                </div>
                                <div class="input-field col s12 m3 l1">
                                    <input name="percentual_autor[]" type="text" value="<?php echo $entidade['percentual']; ?>">
                                    <label>%</label>
                                </div>
                                <a class="btn-floating btn-medium waves-effect waves-light btn"
                                    data-position="right" data-delay="50" id="removeAutor"><i class="mdi-content-remove"></i></a>
                            </div>
            <?php } } } ?>
            </div>

            <div id="SelectProdutor">
            <?php
                if(isset($entidade_faixa, $produtores)){
                    foreach ($entidade_faixa as $entidade) {
                        if ($entidade['idTipo_Entidade'] == 3) { ?>
                            <div class="row">
                                <div class="input-field col s12 m9 l7 offset-l2">
                                    <select name="produtores[]">
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
                                    <label><?php echo $this->lang->line('produtor');?></label>
                                </div>
                                <div class="input-field col s12 m3 l1">
                                    <input name="percentual_produtor[]" type="text" value="<?php echo $entidade['percentual']; ?>">
                                    <label>%</label>
                                </div>
                                <a class="btn-floating btn-medium waves-effect waves-light btn"
                                    data-position="right" data-delay="50" id="removeProdutor"><i class="mdi-content-remove"></i></a>
                            </div>
            <?php } } } ?>
            </div>

            <button class="btn waves-effect waves-light col s12 m12 l7 offset-l2" type="submit"><?php echo $this->lang->line('atualizar'); ?>
                <i class="mdi-content-send right"></i>
            </button>
        <?php echo form_close() ?>
        </div>

</div>

<script>
 $(document).ready(function () {
        $("#SelectArtista").on("click","#removeArtista", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });

    $(document).ready(function () {
        $("#SelectAutor").on("click","#removeAutor", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });

    $(document).ready(function () {
        $("#SelectProdutor").on("click","#removeProdutor", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>

<?php $this->load->view('_include/footer') ?>