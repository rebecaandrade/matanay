<?php $this->load->view('_include/header') ?>
<?php $dataFrom30Ago = date('j F, Y', strtotime("-30 days")); ?>
<?php $dataToday = date('j F, Y'); ?>

<div id="wrapper-body" xmlns="http://www.w3.org/1999/html">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-action-assignment"></i>
                <?php echo $this->lang->line('ralatorio_opcoes'); ?>
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="row">
            <div class="input-field col s6">
                <input required id="min" type="text" class="datepicker" name="datainicio"
                       value="<?= $dataFrom30Ago ?>">
                <label for="datainicio"><?= $this->lang->line('data_inicio') ?></label>
            </div>
            <div class="col s6 input-field">
                <input required id="max" type="text" class="datepicker" name="datafim"
                       value="<?= $dataToday ?>">
                <label for="datainicio"><?= $this->lang->line('data_fim') ?></label>
            </div>
        </div>
        <div class="row">
            <h5><?= $this->lang->line('tipo_relatorio') ?></h5>

            <div class="input-field col s12 m10 110 myTypeRel" style="padding-bottom:3%">
                <p>
                    <input id="tipoRelatorioFisico" checked type="checkbox" class="filled-in" value="1"
                           name="tiporelatorio[]">
                    <label for="tipoRelatorioFisico"><?= $this->lang->line('fisico') ?></label>
                </p>

                <p>
                    <input id="tipoRelatorioDigital" checked type="checkbox" class="filled-in" value="2"
                           name="tiporelatorio[]">
                    <label for="tipoRelatorioDigital"><?= $this->lang->line('digital') ?></label>
                </p>
            </div>
        </div>
        <table id="<?= $this->lang->line('myTable') ?>" class="relTable hoverable bordered">
            <thead>
                <th><?= $this->lang->line('periodo_de_apuracao') ?></th>
                <th><?= $this->lang->line('tipo') ?></th>
                <th><?= $this->lang->line('loja') ?></th>
                <th><?= $this->lang->line('subloja') ?></th>
                <th><?= $this->lang->line('territorio') ?></th>
                <th><?= $this->lang->line('artista') ?></th>
                <th><?= $this->lang->line('autor') ?></th>
                <th><?= $this->lang->line('produtor') ?></th>
                <th><?= $this->lang->line('faixa') ?></th>
                <th><?= $this->lang->line('produto') ?>oi</th>
                <th><?= $this->lang->line('catalogo') ?></th>
                <th><?= $this->lang->line('isrc') ?></th>
                <th><?= $this->lang->line('upc') ?></th>
                <th><?= $this->lang->line('qnt_vendida') ?></th>
                <th><?= $this->lang->line('valor_recebido') ?></th>
                <th><?= $this->lang->line('percentual_aplicado') ?>oii</th>
                <th><?= $this->lang->line('valor_pagar') ?>oiiii</th>
                <th><?= $this->lang->line('receita') ?>o</th>
            </thead>
            <tbody>
            <?php if (isset($vendas)) { ?>
                <?php foreach ($vendas as $venda) { ?>
                    <tr>
                        <td><?= $venda->apuracao ?></td>
                        <td>
                            <?php
                            $f = false;
                            $d = false;

                            foreach ($venda->imposto as $imposto) {
                                if($imposto == 'Fisico')
                                    $f = true;
                                if($imposto == 'Digital')
                                    $d = true;
                            }

                            if($f && $d)
                                echo $this->lang->line('ambos');
                            elseif($f)
                                echo $this->lang->line('fisico');
                            else
                                echo $this->lang->line('digital');
                        ?>
                        </td>
                        <td><?= $venda->loja ?></td>
                        <td><?= $venda->subloja ?></td>
                        <td><?= $venda->territorio ?></td>
                        <td><?= $venda->artista ?></td>
                        <td><?= $venda->autor ?></td>
                        <td><?= $venda->produtor ?></td>
                        <td><?= $venda->faixa ?></td>
                        <td><?= $venda->produto ?></td>
                        <td><?= $venda->catalogo ?></td>
                        <td><?= $venda->isrc ?></td>
                        <td><?= $venda->upc ?></td>
                        <td><?= $venda->qnt_vendida ?></td>
                        <td><?= $venda->valor_recebido ?></td>
                        <td><?= $venda->percentual_aplicado ?></td>
                        <td><?= $venda->valor_pagar ?></td>
                        <td><?= $venda->receita ?></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<script src="<?= base_url() . 'complemento/js/relatorio.js' ?>">
</script>
<script language="javascript">

var fisicoS = "<?php print $this->lang->line('fisico'); ?>"; 
var digitalS = "<?php print $this->lang->line('digital'); ?>";
var ambosS = "<?php print $this->lang->line('ambos'); ?>";

$.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
    var fisico = $('#tipoRelatorioFisico').is(":checked");
    var digital = $('#tipoRelatorioDigital').is(":checked");

    if(
        (fisico && digital && oSettings.aoData[iDataIndex]._aData[1] == ambosS) ||
        (digital && (oSettings.aoData[iDataIndex]._aData[1] == digitalS || oSettings.aoData[iDataIndex]._aData[1] == ambosS)) ||
        (fisico && (oSettings.aoData[iDataIndex]._aData[1] == fisicoS || oSettings.aoData[iDataIndex]._aData[1] == ambosS))
        ){
        return true;
    }
    return false;
});
</script>

<?php $this->load->view('_include/footer') ?>