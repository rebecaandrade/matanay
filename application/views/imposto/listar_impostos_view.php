<?php /*FEITO POR MIM JADIEL*/
$this->load->view('_include/header') ?>
    <br><br>
    <div class="container">
        <div id="titulo_lista">
            <i class="mdi-content-content-paste"></i>
            <?php echo $this->lang->line('imposto'); ?>
            <a href="<?php echo base_url(); ?>index.php/imposto/mostrar_cadastro"
               class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo"
               data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('novo'); ?>"
               id="addButton">
                <i class="mdi-content-add"></i>
            </a>
        </div>
        <br>
        <?php echo $this->lang->line('entitys'); ?>
        <?php if ($dadoimposto != NULL) { ?>
            <table id="tabela_listagem">
                <thead>
                <tr>
                    <th>   <?php echo $this->lang->line('imposto_nome'); ?>  </th>
                    <th>   <?php echo $this->lang->line('valor'); ?>   </th>
                    <th>      <?php echo $this->lang->line('acao'); ?>      </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dadoimposto as $row1) { ?>
                    <tr>
                        <td><?php echo $row1->nome; ?></td>
                        <td><?php echo $row1->valor; ?></td>
                        <td>
                            <a href="<?php echo base_url() . 'index.php/Imposto/deletar?id=' . $row1->idImposto ?>"><?php echo $this->lang->line('deletar'); ?> </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <span><?php echo $this->lang->line('nao_ha_impostos'); ?></span><br>
        <?php } ?>

    </div>
<?php $this->load->view('_include/footer') ?>