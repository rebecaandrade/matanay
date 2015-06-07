<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div class="container">
    <div class="row">
  	<?php echo form_open('faixas_videos/atualizar') ?>
            <input type="hidden" name="idFaixa" value="<?php echo $faixa->idFaixa; ?>">
            <div class="row">
                <div class="input-field col s11 m9 l7 offset-l2">
                    <i class="mdi-image-audiotrack prefix"></i>
                    <input required id="icon-prefix" type="text" name="nome" value="<?php echo $faixa->nome; ?>">
                    <label><?php echo $this->lang->line('titulo'); ?></label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s11 m9 l7 offset-l2">
                    <input type="text" name="isrc" value="<?php echo $faixa->isrc; ?>">
                    <label>ISRC</label>
                </div>
            </div>

            <div id="SelectArtista">
            <?php $j=0;
                if(isset($artista_faixa, $artistas)){
                    foreach ($artista_faixa as $entidade) { ?>
                        <div class="row">
                            <div class="input-field col s11 m9 l7 offset-l2">
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
                            <?php if($j==0) { ?>
                                <a class="btn-floating btn-medium waves-effect waves-light btn tooltipped" 
                                    data-position="right" data-delay="50" data-tooltip="Adicionar" id="addArtista"><i class="mdi-content-add"></i></a>
                            <?php $j++; } else { ?>
                                <a class="btn-floating btn-medium waves-effect waves-light btn"
                                    data-position="right" data-delay="50" id="removeArtista"><i class="mdi-content-remove"></i></a>
                            <?php } ?>
                        </div>
                <?php } } if(empty($artista_faixa)) { ?>
                    <div class="row">
                        <div class="input-field col s11 m9 l7 offset-l2">
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
                            <input name="percentual_artista[]" type="text">
                            <label>%</label>
                        </div>
                        <a class="btn-floating btn-medium waves-effect waves-light btn tooltipped" 
                            data-position="right" data-delay="50" data-tooltip="Adicionar" id="addArtista"><i class="mdi-content-add"></i></a>
                    </div>
                <?php } ?>
            </div>

            <div id="SelectAutor">
            <?php $j=0;
                if(isset($autor_faixa, $autores)){
                    foreach ($autor_faixa as $entidade) { ?>
                        <div class="row">
                            <div class="input-field col s11 m9 l7 offset-l2">
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
                            <?php if($j==0) { ?>
                                <a class="btn-floating btn-medium waves-effect waves-light btn tooltipped" 
                                    data-position="right" data-delay="50" data-tooltip="Adicionar" id="addAutor"><i class="mdi-content-add"></i></a>
                            <?php $j++; } else { ?>
                                <a class="btn-floating btn-medium waves-effect waves-light btn"
                                    data-position="right" data-delay="50" id="removeAutor"><i class="mdi-content-remove"></i></a>
                            <?php } ?>
                        </div>
                <?php } } if(empty($autor_faixa)) { ?>
                    <div class="row">
                        <div class="input-field col s11 m9 l7 offset-l2">
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
                            <input name="percentual_autor[]" type="text">
                            <label>%</label>
                        </div>
                        <a class="btn-floating btn-medium waves-effect waves-light btn tooltipped" 
                            data-position="right" data-delay="50" data-tooltip="Adicionar" id="addAutor"><i class="mdi-content-add"></i></a>
                    </div>
                <?php } ?>
            </div>

            <div id="SelectProdutor">
            <?php $j=0;
                if(isset($produtor_faixa, $produtores)){
                    foreach ($produtor_faixa as $entidade) { ?>
                        <div class="row">
                            <div class="input-field col s11 m9 l7 offset-l2">
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
                            <?php if($j==0) { ?>
                                <a class="btn-floating btn-medium waves-effect waves-light btn tooltipped" 
                                    data-position="right" data-delay="50" data-tooltip="Adicionar" id="addProdutor"><i class="mdi-content-add"></i></a>
                            <?php $j++; } else { ?>
                                <a class="btn-floating btn-medium waves-effect waves-light btn"
                                    data-position="right" data-delay="50" id="removeProdutor"><i class="mdi-content-remove"></i></a>
                            <?php } ?>
                        </div>
                <?php } } if(empty($produtor_faixa)) { ?>
                    <div class="row">
                        <div class="input-field col s11 m9 l7 offset-l2">
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
                            <input name="percentual_produtor[]" type="text">
                            <label>%</label>
                        </div>
                        <a class="btn-floating btn-medium waves-effect waves-light btn tooltipped" 
                            data-position="right" data-delay="50" data-tooltip="Adicionar" id="addProdutor"><i class="mdi-content-add"></i></a>
                    </div>
                <?php } ?>
            </div>

            <button class="btn waves-effect waves-light col s12 m12 l7 offset-l2" type="submit"><?php echo $this->lang->line('atualizar'); ?>
                <i class="mdi-content-send right"></i>
            </button>
        <?php echo form_close() ?>
        </div>

</div>

<script>
    $(document).ready(function () {

        var counter = 2;

        $("#addArtista").click(function(e) {
            e.preventDefault();

            var artistas = $.parseJSON(<?php print json_encode(json_encode($artistas)); ?>);

            var newTextBoxDiv = $(document.createElement('div')).attr("id", 'Select' + counter);
            newTextBoxDiv.after().html('<div class="row"><div class="input-field col s11 m9 l7 offset-l2">' +
                '<select id="select_artista' + counter + '" name="artistas[]"><option value="" disabled selected><?php echo $this->lang->line("selecione");?></option>' +
                '</select><label><?php echo $this->lang->line("artista");?></label></div>' +
                '<div class="input-field col s12 m3 l1"><input name="percentual_artista[]" type="text"><label>%</label></div>' +
                '<a class="btn-floating btn-medium waves-effect waves-light btn tooltipped"' +
                'data-position="right" data-delay="50" data-tooltip="Remover" id="removeArtista"><i class="mdi-content-remove"></i></a></div>');

            newTextBoxDiv.appendTo("#SelectArtista");

            $.each(artistas, function(idEntidade, nome){
                $('#select_artista' + counter).append($("<option>",{
                    value: nome.idEntidade,
                    text: nome.nome
                }));
            });

                counter++;
                $('select').material_select();
            });

        $("#SelectArtista").on("click","#removeArtista", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });

    $(document).ready(function () {

        var counter = 2;

        $("#addAutor").click(function(e) {
            e.preventDefault();

            var autores = $.parseJSON(<?php print json_encode(json_encode($autores)); ?>);

            var newTextBoxDiv = $(document.createElement('div')).attr("id", 'Select' + counter);
            newTextBoxDiv.after().html('<div class="row"><div class="input-field col s11 m9 l7 offset-l2">' +
                '<select id="select_autor' + counter + '" name="autores[]"><option value="" disabled selected><?php echo $this->lang->line("selecione");?></option>' +
                '</select><label><?php echo $this->lang->line("autor");?></label></div>' +
                '<div class="input-field col s12 m3 l1"><input name="percentual_autor[]" type="text"><label>%</label></div>' +
                '<a class="btn-floating btn-medium waves-effect waves-light btn tooltipped"' +
                'data-position="right" data-delay="50" data-tooltip="Remover" id="removeAutor"><i class="mdi-content-remove"></i></a></div>');

            newTextBoxDiv.appendTo("#SelectAutor");

            $.each(autores, function(idEntidade, nome){
                $('#select_autor' + counter).append($("<option>",{
                    value: nome.idEntidade,
                    text: nome.nome
                }));
            });

                counter++;
                $('select').material_select();
            });

        $("#SelectAutor").on("click","#removeAutor", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });

    $(document).ready(function () {

        var counter = 2;

        $("#addProdutor").click(function(e) {
            e.preventDefault();

            var produtores = $.parseJSON(<?php print json_encode(json_encode($produtores)); ?>);

            var newTextBoxDiv = $(document.createElement('div')).attr("id", 'Select' + counter);
            newTextBoxDiv.after().html('<div class="row"><div class="input-field col s11 m9 l7 offset-l2">' +
                '<select id="select_produtor' + counter + '" name="produtores[]"><option value="" disabled selected><?php echo $this->lang->line("selecione");?></option>' +
                '</select><label><?php echo $this->lang->line("produtor");?></label></div>' +
                '<div class="input-field col s12 m3 l1"><input name="percentual_produtor[]" type="text"><label>%</label></div>' +
                '<a class="btn-floating btn-medium waves-effect waves-light btn tooltipped"' +
                'data-position="right" data-delay="50" data-tooltip="Remover" id="removeProdutor"><i class="mdi-content-remove"></i></a></div>');

            newTextBoxDiv.appendTo("#SelectProdutor");

            $.each(produtores, function(idEntidade, nome){
                $('#select_produtor' + counter).append($("<option>",{
                    value: nome.idEntidade,
                    text: nome.nome
                }));
            });

                counter++;
                $('select').material_select();
            });

        $("#SelectProdutor").on("click","#removeProdutor", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>

<?php $this->load->view('_include/footer') ?>