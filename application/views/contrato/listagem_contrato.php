<?php /*FEITO POR JADIEL*/
$this->load->view('_include/header') ?>

<div id="wrapper-body">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-action-description"></i>
                <?php echo $this->lang->line('contrato'); ?>
                <a href="<?php echo base_url(); ?>index.php/contrato/cadastro"
                    class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo"
                    data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('novo'); ?>" id="addButton">
                    <i class="mdi-content-add"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        </div>
    <div class="row">
        <table id="<?=$this->lang->line('myTable')?>" class="hoverable bordered">
            <thead>
                <tr>
                    <th>   <?php echo $this->lang->line('contrato_nome'); ?>    </th>
                    <th>   <?php echo $this->lang->line('data_fim'); ?>         </th>
                    <th>   <?php echo $this->lang->line('nome_entidade'); ?>    </th>
                    <th>   <?php echo $this->lang->line('nome_favorecido'); ?>  </th>
                    <th>   <?php echo $this->lang->line('acao'); ?>             </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dadoContrato as $contrato) { 
                    if($contrato->excluido == NULL){?>
                        <tr>
                            <td>    <?php echo $contrato->nome; ?>           </td>
                            <td>    <?php echo $contrato->data_fim; ?>       </td>
                            <?php foreach ($dadosEntidade as $entidade){
                                if ($entidade->idEntidade == $contrato->idEntidade){ ?>
                                    <td>    <?php echo $entidade->nome; ?>      </td> 
                                    <?php break; ?>                                   
                            <?php } } foreach ($dadosFavorecido as $favorecido) {
                                if ($favorecido->idFavorecido == $contrato->idFavorecido) { ?>
                                    <td>    <?php echo $favorecido->nome; ?>      </td>                                    
                                    <?php break; ?>                                   
                            <?php } } ?>
                            <td>
                                <a class="acao"
                                   onclick=" passaParamentroEntidade('<?= $contrato->idContrato ?>','<?= base_url() ?>')"><?php echo $this->lang->line('editar'); ?></a>
                                | <a class="deletarLink" onclick="excluirImposto('<?= base_url() . 'index.php/contrato/deletar/' . $contrato->idContrato ?>','<?=$this->lang->line('langOpt')?>')"><?php echo $this->lang->line('deletar') ?> </a>
                            </td>
                        </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('_include/footer') ?>