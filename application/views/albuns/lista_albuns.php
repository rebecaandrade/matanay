<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div class="container">
  	<div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-av-my-library-music"></i>
                <?php echo $this->lang->line('albums'); ?>
                <a href="<?php echo base_url(); ?>index.php/albuns/cadastra_album" 
                    class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
                    data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('novo'); ?>" id="addButton">
                    <i class="mdi-content-add"></i>
                </a>
            </div>
            <?php if($albuns!=NULL){
                echo form_open('/Entidade/procurar') ?>
                    <div class="input-field col s12 m4 l3">
                        <i class="mdi-action-search prefix"></i>
                        <label><?php echo $this->lang->line('procurar'); ?></label>
                        <input required type="text" value="" name="procurar" >
                    </div>
            <?php form_close(); } ?>
        </div>
  	</div></br>
    <?php if ($albuns!=NULL){?>
        <table class="hoverable bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('titulo'); ?></th>
                    <th><?php echo $this->lang->line('artista'); ?></th>
                    <th>UPC/EAN</th>
                    <th><?php echo $this->lang->line('tipo'); ?></th>
                    <th><?php echo $this->lang->line('ano'); ?></th>
                    <th><?php echo $this->lang->line('acao'); ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($albuns)){
                    foreach($albuns as $album){?>
                        <tr>
                            <td><?php echo $album->nome;?></td>
                            <?php foreach ($artistas as $artista) { 
                                foreach ($entidades as $entidade) {
                                    if($artista->idEntidade == $entidade->idEntidade && $album->idAlbum == $entidade->idAlbum){ ?>
                                        <td><?php echo $artista->nome; ?></td>
                                    <?php } ?>  
                            <?php } } ?>
                            <td><?php echo $album->upc_ean;?></td> 
                            <?php foreach ($tipos as $tipo) { 
                                foreach ($entidades as $entidade) {
                                    if($tipo->idTipo_Album == $album->idTipo_Album){ ?>
                                        <td><?php echo $tipo->descricao; ?></td>
                                    <?php } ?>  
                            <?php } } ?>
                            <td><?php echo $album->ano;?></td>
                            <td><a id="acao" href="<?php echo base_url(); ?>index.php/albuns/editar/<?php echo $album->idAlbum ?>">
                            		<?php echo $this->lang->line('editar'); ?></a> |
                            	<a id="acao" onclick="if (confirm('Deseja excluir este album?')) window.location.replace('<?php echo base_url().'index.php/albuns/deletar?id='.$album->idAlbum ?>')"><?php echo $this->lang->line('deletar'); ?></a>
                            </td>
                            <td><a class="detalhes modal-trigger tooltipped" data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('detalhes'); ?>" href="#modal1"><i class="mdi-action-visibility"></i></a></td>
                        </tr> 
                <?php }}?>                  
            </tbody>
        </table>
    <?php }else{?>
        <span><?php echo $this->lang->line('nao_ha_albums'); ?></span><br>
    <?php } ?>

	<div id="paginacao">
		<?php if($paginas) echo $paginas; ?>
	</div>

    <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Album Title</h4>
      <p>Tracklist</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Editar</a>
    </div>
  </div>

</div>

<?php $this->load->view('_include/footer') ?>