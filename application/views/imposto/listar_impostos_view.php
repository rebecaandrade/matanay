<?php /*FEITO POR JADIEL*/
$this->load->view('_include/header') ?>

<div id="wrapper-body">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-content-content-paste"></i>
                <?php echo $this->lang->line('imposto'); ?>
                <a href="<?php echo base_url(); ?>index.php/imposto/mostrar_cadastro"
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
                    <th>   <?php echo $this->lang->line('imposto_nome'); ?> </th>
                    <th>   <?php echo $this->lang->line('valor'); ?>        </th>
                    <th>   <?php echo $this->lang->line('tipo'); ?>         </th>
                    <th>   <?php echo $this->lang->line('acao'); ?>         </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dadoimposto as $row1) { 
                    $tipo=$row1->idTipo_Imposto;?>
                    <tr>
                        <td>    <?php echo $row1->nome; ?>      </td>
                        <td>    <?php echo $row1->valor; ?>%    </td>
                        <td>
                            <?php if ($tipo==1) echo $this->lang->line('fisico'); ?>  <!--Determina o tipo de imposto atraves do idTipo_Imposto-->
                            <?php if ($tipo==2) echo $this->lang->line('digital'); ?>
                        </td>
                        <td>
                            <?php
                            $flag=0;
                            foreach ($faixas_has_imposto as $key) {
                                if ($key->idImposto == $row1->idImposto)
                                    $flag=1;
                            }
                            if ($flag==0){ ?>
                                <a class="deletarLink" onclick="excluirImposto('<?= base_url() . 'index.php/Imposto/deletar/' . $row1->idImposto ?>','<?=$this->lang->line('langOpt')?>')"><?php echo $this->lang->line('deletar') ?> </a>
                            <?php }
                            else 
                                echo $this->lang->line('indisponivel');
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('_include/footer') ?>