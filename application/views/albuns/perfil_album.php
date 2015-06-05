<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div class="container">
    <div id="titulo_perfil">
      	<div class="row">
            <div class="input-field col s12 m8 l12">
                <a href="<?php echo base_url(); ?>index.php/albuns/listar" 
                    class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
                    data-position="top" data-delay="50" data-tooltip="<?php echo $this->lang->line('voltar'); ?>" id="voltar">
                    <i class="mdi-content-reply"></i>
                </a>
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
            <div id="upc" class="input-field col s10 offset-s2 m10 offset-m1 l11 offset-l1">
                <h5>UPC/EAN: <?php echo $album->upc_ean; ?></h5>
                <h6>Ano: <?php echo $album->ano; ?></h6>
            </div>
        </div>
    </div>

    <div class="row">
        <table id="table_album" class="col l6 offset-l3">
            <thead>
                <th>#</th>
                <th>Faixa</th>
            </thead>
            <tbody>
                <?php $i=0; foreach ($tracklist as $track) { 
                    foreach ($faixas as $faixa) { 
                        if ($faixa->idFaixa == $track->idFaixa) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $faixa->nome; ?></td>
                            </tr>
                <?php $i++; } } } ?>
            </tbody>
        </table>
    </div>

</div>

<?php $this->load->view('_include/footer') ?>