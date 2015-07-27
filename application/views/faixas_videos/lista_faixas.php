<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div id="wrapper-body">
  	<div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l10">
          		<i class="mdi-av-queue-music"></i>
          		<?php echo $this->lang->line('faixas'); ?>
          		<a href="<?php echo base_url(); ?>index.php/faixas_videos/cadastra_faixa" 
          			class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
        			data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('nova'); ?>" id="addButton">
        			<i class="mdi-content-add"></i>
        		</a>
            </div>
        </div>
  	</div>
    <div class="row">
        <table id="myTable" class="hoverable bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('titulo'); ?></th>
                    <th><?php echo $this->lang->line('artista'); ?></th>
                    <th>ISRC</th>
                    <th><?php echo $this->lang->line('acao'); ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($faixas)){
                    foreach($faixas as $faixa){?>
                        <tr>
                            <td><?php echo $faixa->nome;?></td>
                            <td><?php $i=0; foreach ($artistas as $artista) { 
                                foreach ($entidades as $entidade) {
                                    if($artista->idEntidade == $entidade->idEntidade && $faixa->idFaixa == $entidade->idFaixa){ $i++; ?>
                                        <?php if($i>1) echo ', '; echo $artista->nome; ?>
                                    <?php } ?>  
                                <?php } } ?>
                            </td>
                            <td><?php echo $faixa->isrc;?></td> 
                            <td><a onclick="passaParametroFaixa('<?= $faixa->idFaixa ?>','<?=base_url()?>')"><?php echo $this->lang->line('editar'); ?></a> |
                            	<a onclick="excluirFaixa('<?= base_url() . 'index.php/faixas_videos/deletar/' . $faixa->idFaixa ?>','<?= $this->lang->line('langOpt') ?>')"><?php echo $this->lang->line('deletar'); ?></a>
                            </td>
                            <td><a class="detalhes tooltipped" data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('detalhes'); ?>" href="<?php echo base_url(); ?>index.php/faixas_videos/detalhar/<?php echo $faixa->idFaixa ?>"><i class="mdi-action-visibility"></i></a></td>
                        </tr> 
                <?php } } ?>                  
            </tbody>
        </table>
        <form id="sendUserToEdit" method="post">
            <input id="editarEntInput" type="hidden" name="oneInput">
            <input id="submitAcao" type="submit" style="display: none">
        </form>
	</div>
</div>

<?php $this->load->view('_include/footer') ?>