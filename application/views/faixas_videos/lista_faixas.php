<?php $this->load->view('_include/header') ?> <!-- Evandro -->

<div class="container">
  	<div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
          		<i class="mdi-av-queue-music"></i>
          		<?php echo $this->lang->line('faixas'); ?>
          		<a href="<?php echo base_url(); ?>index.php/faixas_videos/cadastra_faixa" 
          			class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
        			data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('nova'); ?>" id="addButton">
        			<i class="mdi-content-add"></i>
        		</a>
            </div>
            <?php if($faixas!=NULL){
                echo form_open('/Entidade/procurar') ?>
                    <div class="input-field col s12 m4 l3">
                        <i class="mdi-action-search prefix"></i>
                        <label><?php echo $this->lang->line('procurar'); ?></label>
                        <input required type="text" value="" name="procurar" >
                    </div>
            <?php form_close(); } ?>
        </div>
  	</div></br>
    <?php if ($faixas!=NULL){?>
        <table class="hoverable bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('titulo'); ?></th>
                    <th>ISRC</th>
                    <th><?php echo $this->lang->line('acao'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($faixas)){
                    foreach($faixas as $faixa){?>
                        <tr>
                            <td><?php echo $faixa->nome;?></td>
                            <td><?php echo $faixa->isrc;?></td> 
                            <td><a id="acao" href="<?php echo base_url(); ?>index.php/faixas_videos/editar/<?php echo $faixa->idFaixa ?>">
                            		<?php echo $this->lang->line('editar'); ?></a> |
                            	<a id="acao" href="#"><?php echo $this->lang->line('deletar'); ?></a>
                            </td>
                        </tr> 
                <?php }}?>                  
            </tbody>
        </table>
    <?php }else{?>
        <span><?php echo $this->lang->line('nao_ha_faixas'); ?></span><br>
    <?php } ?>

	<div id="paginacao">
		<?php if($paginas) echo $paginas; ?>
	</div>

</div>

<?php $this->load->view('_include/footer') ?>