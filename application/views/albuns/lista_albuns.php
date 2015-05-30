<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div class="container">
  	<div id="titulo_lista">
  		<i class="mdi-av-my-library-music"></i>
  		<?php echo $this->lang->line('albums'); ?>
  		<a href="<?php echo base_url(); ?>index.php/albuns/cadastra_album" 
  			class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
			data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('novo'); ?>" id="addButton">
			<i class="mdi-content-add"></i>
		</a>
  	</div>
    <?php if ($albuns!=NULL){?>
        <table class="hoverable bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('titulo'); ?></th>
                    <th>UPC/EAN</th>
                    <th><?php echo $this->lang->line('ano'); ?></th>
                    <th><?php echo $this->lang->line('acao'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($albuns)){
                    foreach($albuns as $album){?>
                        <tr>
                            <td><?php echo $album->nome;?></td>
                            <td><?php echo $album->upc_ean;?></td> 
                            <td><?php echo $album->ano;?></td>
                            <td><a id="acao" href="<?php echo base_url(); ?>index.php/albuns/editar/<?php echo $album->idAlbum ?>">
                            		<?php echo $this->lang->line('editar'); ?></a> |
                            	<a id="acao" href="#"><?php echo $this->lang->line('deletar'); ?></a>
                            </td>
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

</div>

<?php $this->load->view('_include/footer') ?>