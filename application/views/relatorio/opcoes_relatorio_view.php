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
    <div class="container">
        <form name="coisa" id="relOpt" action="<?= base_url() . 'index.php/relatorio/gera_relatorio' ?>" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input required id="datainicio" type="text" class="datepicker" name="datainicio"
                           value="<?= $dataFrom30Ago ?>">
                    <label for="datainicio"><?= $this->lang->line('data_inicio') ?></label>
                </div>
                <div class="col s6 input-field">
                    <input required id="datafim" type="text" class="datepicker" name="datafim"
                           value="<?= $dataToday ?>">
                    <label for="datainicio"><?= $this->lang->line('data_fim') ?></label>
                </div>
            </div>
            <div class="row">
                <h5><?= $this->lang->line('tipo_relatorio') ?></h5>

                <div class="input-field col s12 m10 110 myTypeRel" style="padding-bottom:3%">
                    <p>
                        <input id="tipoRelatorioFisico" type="checkbox" class="filled-in" value="1"
                               name="tiporelatorio[]">
                        <label for="tipoRelatorioFisico"><?= $this->lang->line('fisico') ?></label>
                    </p>

                    <p>
                        <input id="tipoRelatorioDigital" type="checkbox" class="filled-in" value="2"
                               name="tiporelatorio[]">
                        <label for="tipoRelatorioDigital"><?= $this->lang->line('digital') ?></label>
                    </p>
                </div>
            </div>
            <div class="row myLojas mySubLojas">
                <div class="col s6 m6 <?= $this->lang->line('loja') ?>">
                    <h5><?= $this->lang->line('loja') ?></h5>

                    <div class="row">
                        <div class="col s10 m8 l8">
                            <select name="lojas[]" id="relLojas" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('loja') ?></option>
                                <?php if (isset($lojas)) { ?>
                                    <?php foreach ($lojas as $loja) { ?>
                                        <option value="<?= $loja ?>"><?= $loja ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <a onclick="addSelectParam(getLojas(),'<?php echo $this->lang->line('selecione'); ?>','<?php echo $this->lang->line('loja')?>')" 
                                class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100artista" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col s6 m6 <?= $this->lang->line('subloja') ?>">
                    <h5><?= $this->lang->line('subloja') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="sub-lojas[]" id="relSubLojas" class="browser-default ">
                                <option selected value="-1"><?= $this->lang->line('subloja') ?></option>
                                <?php if (isset($sublojas)) { ?>
                                    <?php foreach ($sublojas as $subLoja) { ?>
                                        <option value="<?= $subLoja ?>"><?= $subLoja ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <a onclick="addSelectParam(getSubLojas(),'<?php echo $this->lang->line('selecione'); ?>','<?php echo $this->lang->line('subloja')?>')" 
                                class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100artista" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row myTerritorios myArtista">
                <div class="col s6 m6 <?= $this->lang->line('territorio') ?>">
                    <h5><?= $this->lang->line('territorio') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="territorios[]" id="relTerritorio" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('territorio') ?></option>
                                <?php if (isset($territorios)) { ?>
                                    <?php foreach ($territorios as $territorio) { ?>
                                        <option
                                            value="<?= $territorio ?>"><?= $territorio ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <a onclick="addSelectParam(getTerritorios(),'<?php echo $this->lang->line('selecione'); ?>','<?php echo $this->lang->line('territorio')?>')" 
                                class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100artista" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col s6 m6 <?= $this->lang->line('artista') ?>">
                    <h5><?= $this->lang->line('artista') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="artistas[]" id="relArtista" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('artista') ?></option>
                                <?php if (isset($artistas)) { ?>
                                    <?php foreach ($artistas as $artista) { ?>
                                        <option value="<?= $artista ?>"><?= $artista ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <a onclick="addSelectParam(getArtistas(),'<?php echo $this->lang->line('selecione'); ?>','<?php echo $this->lang->line('artista')?>')" 
                                class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100artista" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row myEditora myProdutor">
                <div class="col s6 m6 <?= $this->lang->line('editora') ?>">
                    <h5><?= $this->lang->line('editora') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="editoras[]" id="relAutor" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('editora') ?></option>
                                <?php if (isset($editoras)) { ?>
                                    <?php foreach ($editoras as $editora) { ?>
                                        <option value="<?= $editora ?>"><?= $editora ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <a onclick="addSelectParam(getEditoras(),'<?php echo $this->lang->line('selecione'); ?>','<?php echo $this->lang->line('editora')?>')" 
                                class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100artista" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col s6 m6 <?= $this->lang->line('produtor') ?>">
                    <h5><?= $this->lang->line('produtor') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="produtors[]" id="relProdutor" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('produtor') ?></option>
                                <?php if (isset($produtores)) { ?>
                                    <?php foreach ($produtores as $produtor) { ?>
                                        <option value="<?= $produtor ?>"><?= $produtor ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <a onclick="addSelectParam(getProdutores(),'<?php echo $this->lang->line('selecione'); ?>','<?php echo $this->lang->line('produtor')?>')" 
                                class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100artista" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row myISRC myUPC">
                <div class="col s6 m6 <?= $this->lang->line('isrc') ?>">
                    <h5><?= $this->lang->line('isrc') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="isrcs[]" id="relIsrc" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('isrc') ?></option>
                                <?php if (isset($isrcs)) { ?>
                                    <?php foreach ($isrcs as $isrc) { ?>
                                        <option value="<?= $isrc ?>"><?= $isrc ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <a onclick="addSelectParam(getIsrcs(),'<?php echo $this->lang->line('selecione'); ?>','<?php echo $this->lang->line('isrc')?>')" 
                                class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100artista" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col s6 m6 <?= $this->lang->line('upc') ?>">
                    <h5><?= $this->lang->line('upc') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="upcs[]" id="relUpc" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('upc') ?></option>
                                <?php if (isset($upcs)) { ?>
                                    <?php foreach ($upcs as $upc) { ?>
                                        <option value="<?= $upc ?>"><?= $upc ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <a onclick="addSelectParam(getUpcs(),'<?php echo $this->lang->line('selecione'); ?>','<?php echo $this->lang->line('upc')?>')" 
                                class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100artista" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  myAlbum myFaixa">
                <div class="col s6 m6 <?= $this->lang->line('albums') ?>">
                    <h5><?= $this->lang->line('albums') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="albums[]" id="relAlbum" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('albums') ?></option>
                                <?php if (isset($albuns)) { ?>
                                    <?php foreach ($albuns as $album) { ?>
                                        <option value="<?= $album ?>"><?= $album ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <a onclick="addSelectParam(getAlbuns(),'<?php echo $this->lang->line('selecione'); ?>','<?php echo $this->lang->line('album')?>')" 
                                class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100artista" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col s6 m6 <?= $this->lang->line('faixas') ?>">
                    <h5><?= $this->lang->line('faixas') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="faixass[]" id="relFaixa" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('faixas') ?></option>
                                <?php if (isset($faixas)) { ?>
                                    <?php foreach ($faixas as $faixa) { ?>
                                        <option value="<?= $faixa ?>"><?= $faixa ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <a onclick="addSelectParam(getFaixas(),'<?php echo $this->lang->line('selecione'); ?>','<?php echo $this->lang->line('faixas')?>')" 
                                class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100artista" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row myCatalogo">
                <div class="col s6 m6 catalogo">
                    <h5><?= $this->lang->line('catalogo') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="catalogos[]" id="relCatalogo" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('catalogo') ?></option>
                                <?php if (isset($catalogos)) { ?>
                                    <?php foreach ($catalogos as $catalogo) { ?>
                                        <option value="<?= $catalogo ?>"><?= $catalogo ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <a onclick="addSelectParam(getCatalogos(),'<?php echo $this->lang->line('selecione'); ?>','catalogo')" 
                                class="btn-floating btn-medium waves-effect waves-light btn tooltipped" id="100artista" data-position="right" data-delay="50" data-tooltip="Adicionar"><i class="mdi-content-add"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="startDateIsGreaterMessegeDisplay"
                   value="<?= $this->lang->line('data_inicio_maior_que_data_fim') ?>">
            <input type="hidden" name="invalidDatesMessegeDisplay"
                   value="<?= $this->lang->line('datas_invalidas') ?>">
            <input type="hidden" name="typeReportMessegeDisplay"
                   value="<?= $this->lang->line('tipo_relatorio_erro') ?>">

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
                    <th><?= $this->lang->line('produto') ?></th>
                    <th><?= $this->lang->line('catalogo') ?></th>
                    <th><?= $this->lang->line('isrc') ?></th>
                    <th><?= $this->lang->line('upc') ?></th>
                    <th><?= $this->lang->line('qnt_vendida') ?></th>
                    <th><?= $this->lang->line('valor_recebido') ?></th>
                    <th><?= $this->lang->line('percentual_aplicado') ?></th>
                    <th><?= $this->lang->line('valor_pagar') ?></th>
                    <th><?= $this->lang->line('receita') ?></th>
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
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <div class="row">
                <br><br>
                <button class="btn waves-effect waves-light col s12 m10 offset-m1 l12" type="submit">
                        <?php echo $this->lang->line('exportar'); ?>
                    <i class="mdi-content-send right"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<script src="<?= base_url() . 'complemento/js/relatorio.js' ?>"></script>
<?php $this->load->view('_include/footer') ?>

<script language="javascript">
    var fisicoS = "<?php print $this->lang->line('fisico'); ?>"; 
    var digitalS = "<?php print $this->lang->line('digital'); ?>";
    var ambosS = "<?php print $this->lang->line('ambos'); ?>";

    $.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
        var fisico = $('#tipoRelatorioFisico').is(":checked");
        var digital = $('#tipoRelatorioDigital').is(":checked");
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

<script type="text/javascript">
    function getLojas(){
        return <?php echo(json_encode($lojas)); ?>; }
    function getSubLojas(){
        return <?php echo(json_encode($sublojas)); ?>; }
    function getTerritorios(){
        return <?php echo(json_encode($territorios)); ?>; }
    function getArtistas(){
        return <?php echo(json_encode($artistas)); ?>; }
    function getEditoras(){
        return <?php echo(json_encode($editoras)); ?>; }
    function getProdutores(){
        return <?php echo(json_encode($produtores)); ?>; }
    function getIsrcs(){
        return <?php echo(json_encode($isrcs)); ?>; }
    function getUpcs(){
        return <?php echo(json_encode($upcs)); ?>; }
    function getAlbuns(){
        return <?php echo(json_encode($albuns)); ?>; }
    function getFaixas(){
        return <?php echo(json_encode($faixas)); ?>; }
    function getCatalogos(){
        return <?php echo(json_encode($catalogos)); ?>; }
</script>