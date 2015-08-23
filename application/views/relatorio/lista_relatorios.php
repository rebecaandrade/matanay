<?php $this->load->view('_include/header') ?>
<div id="wrapper-body" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <a href="<?= base_url() . 'index.php/relatorio/testaExcel' ?>" class="btn"> Teste Excel</a>
    </div>
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-action-assignment"></i>
                <?= $this->lang->line('listar_relatorios'); ?>
                <a href="<?php echo base_url(); ?>index.php/relatorio/importa_relatorio"
                   class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo"
                   data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('novo'); ?>"
                   id="addButton">
                    <i class="mdi-content-add"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <table id="<?= $this->lang->line('myTable') ?>" class="relTable hoverable bordered">
            <thead>
            <th><?= $this->lang->line('listar_relatorios') ?></th>
            <th><?= $this->lang->line('periodo_de_apuracao') ?></th>
            <th><?= $this->lang->line('data_importacao') ?></th>
            <th><?= $this->lang->line('modelo_relatorio') ?></th>
            <th><?= $this->lang->line('acao') ?></th>
            </thead>
            <tbody>
            <?php if (isset($relatorios)) { ?>
                <?php foreach ($relatorios as $relatorio) { ?>
                    <tr>
                        <?php $fileName = current(array_slice(explode("/", $relatorio->arquivo), -1)) ?>
                        <td><?= $fileName ?></td>
                        <td><?= $relatorio->periodo_apuracao ?></td>
                        <td><?= $relatorio->data_importacao ?></td>
                        <td><?= $relatorio->nome ?></td>
                        <td><a href="#"><?=$this->lang->line('deletar')?></a></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('_include/footer') ?>
