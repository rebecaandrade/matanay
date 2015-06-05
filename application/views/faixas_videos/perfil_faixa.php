<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div class="container">
    <div id="titulo_perfil">
      	<div class="row">
            <div class="input-field col s12 m8 l12">
                <a href="<?php echo base_url(); ?>index.php/faixas_videos/listar" 
                    class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
                    data-position="bottom" data-delay="50" data-tooltip="<?php echo $this->lang->line('voltar'); ?>" id="voltar">
                    <i class="mdi-content-reply"></i>
                </a>
                <i class="mdi-image-audiotrack"></i>
                <?php echo $faixa->nome; ?>
            </div>
        </div>
        <div class="row">
            <div id="upc" class="input-field col s10 offset-s2 m5 offset-m1 l5 offset-l1">
                <h5><?php
                    if(isset($artistas)){
                        foreach ($artista_faixa as $entidade) {
                            foreach ($artistas as $artista) {
                                if ($artista->idEntidade == $entidade['idEntidade']) { ?>
                                    <?php echo $artista->nome; ?>
                    <?php } } } } ?> 
                </h5>
                <h6>ISRC: <?php echo $faixa->isrc; ?></h6><br>

                <h5><?php echo $this->lang->line('compositores'); ?></h5>
                <h6><?php
                    if(isset($autores)){
                        foreach ($autor_faixa as $entidade) {
                            foreach ($autores as $autor) {
                                if ($autor->idEntidade == $entidade['idEntidade']) { ?>
                                    <?php echo $autor->nome; ?>
                    <?php } } } } ?> 
                </h6><br>

                <h5><?php echo $this->lang->line('produtores'); ?></h5>
                <h6><?php
                    if(isset($produtores)){
                        foreach ($produtor_faixa as $entidade) {
                            foreach ($produtores as $produtor) {
                                if ($produtor->idEntidade == $entidade['idEntidade']) { ?>
                                    <?php echo $produtor->nome; ?>
                    <?php } } } } ?> 
                </h6>
            </div>

            <div id="albuns_part" class="input-field col s10 m10 l5">
                <h5><?php echo $this->lang->line('albums'); ?></h5>
                <h6><?php
                    if(isset($albuns)){
                        foreach ($albuns as $album) {
                                if ($faixa->idFaixa == $album['idFaixa']) { ?>
                                    <?php echo $album['nome']; ?>
                    <?php } } } ?> 
                </h6>
            </div>
        </div>
    </div>

</div>

<?php $this->load->view('_include/footer') ?>