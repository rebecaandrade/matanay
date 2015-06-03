<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div class="container">
    <div class="row">
  	<?php echo form_open('faixas_videos/atualizar') ?>
            <input type="hidden" name="idFaixa" value="<?php echo $faixa->idFaixa; ?>">
            <div class="row">
                <div class="input-field col s12 m9 l8 offset-l1">
                    <i class="mdi-image-audiotrack prefix"></i>
                    <input id="icon-prefix" type="text" name="nome" value="<?php echo $faixa->nome; ?>">
                    <label><?php echo $this->lang->line('titulo'); ?></label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m9 l8 offset-l1">
                    <input type="text" name="isrc" value="<?php echo $faixa->isrc; ?>">
                    <label>ISRC</label>
                </div>
            </div>

            <div id="SelectGroup">
            <div class="row">
                <div class="input-field col s12 m9 l8 offset-l1" id="Select1">
                    <select>
                        <option value="" disabled selected><?php echo $this->lang->line("selecione");?></option> 
                        <?php
                            if(isset($artistas)){
                                foreach ($artistas as $artista) { ?>
                                <option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
                        <?php }}?>
                    </select>
                    <label><?php echo $this->lang->line("artista");?></label>
                </div>
                <div class="input-field col s12 m2 l2">
                    <input name="percentual_artista[]" type="text" value="<?php echo $faixa->percentual_artista; ?>">
                    <label>%</label>
                </div>
                <a class="btn-floating btn-medium waves-effect waves-light btn tooltipped" 
                    data-position="right" data-delay="50" data-tooltip="Adicionar" id="addButton"><i class="mdi-content-add"></i></a>
            </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m9 l8 offset-l1">
                    <select>
                        <option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
                        <?php
                            if(isset($autores)){
                                foreach ($autores as $autor) { ?>
                                <option value="<?php echo $autor->idEntidade; ?>"> <?php echo $autor->nome; ?>
                        <?php }}?>
                    </select>
                    <label><?php echo $this->lang->line('autor');?></label>
                </div>
                <div class="input-field col s12 m3 l2">
                    <input name="percentual_autor[]" type="text" value="<?php echo $faixa->percentual_autor; ?>">
                    <label>%</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12 m9 l8 offset-l1">
                    <select>
                        <option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
                        <?php
                            if(isset($produtores)){
                                foreach ($produtores as $produtor) { ?>
                                <option value="<?php echo $produtor->idEntidade; ?>"> <?php echo $produtor->nome; ?>
                        <?php }}?>
                    </select>
                    <label><?php echo $this->lang->line('produtor');?></label>
                </div>
                <div class="input-field col s12 m3 l2">
                    <input name="percentual_produtor[]" type="text" value="<?php echo $faixa->percentual_produtor; ?>">
                    <label>%</label>
                </div>
            </div>

            <button class="btn waves-effect waves-light col s12 m12 l8 offset-l1" type="submit"><?php echo $this->lang->line('atualizar'); ?>
                <i class="mdi-content-send right"></i>
            </button>
        <?php echo form_close() ?>
        </div>

</div>

<?php $this->load->view('_include/footer') ?>