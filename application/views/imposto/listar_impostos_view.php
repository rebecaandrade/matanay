<?php /*FEITO POR MIM JADIEL*/
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
            <div class="col s1"> <p style="font-size: 125%">Mostrando</p></div>
            <div class="col s1">
                <select class="tableSelect">
                    <option value="10"> 10 </option>
                    <option selected value="25"> 25 </option>
                    <option value="50"> 50 </option>
                    <option value="75"> 75 </option>
                    <option value="100"> 100 </option>
                </select>
            </div>
            <div class="col s1"><p style="font-size: 125%"> Resultados </p></div>
        </div>
    <div class="row">
        <table id="myTable" class="hoverable bordered">
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
    </div>
</div>

<?php $this->load->view('_include/footer') ?>