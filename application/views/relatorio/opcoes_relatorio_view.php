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
                <div class="col s6 m6">
                    <h5><?= $this->lang->line('loja') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="loja" id="relLojas" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('loja') ?></option>
                                <?php if (isset($lojas)) { ?>
                                    <?php foreach ($lojas as $loja) { ?>
                                        <option value="<?= $loja ?>"><?= $loja ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <select name="escolhaLoja" id="">
                                <option value="0"><?= $this->lang->line('exclusao') ?></option>
                                <option selected value="1"><?= $this->lang->line('adicao') ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col s6 m6">
                    <h5><?= $this->lang->line('subloja') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="subloja" id="relSubLojas" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('subloja') ?></option>
                                <?php if (isset($sublojas)) { ?>
                                    <?php foreach ($sublojas as $subLoja) { ?>
                                        <option value="<?= $subLoja ?>"><?= $subLoja ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <select name="escolhaSubLoja" id="">
                                <option value="0"><?= $this->lang->line('exclusao') ?></option>
                                <option selected value="1"><?= $this->lang->line('adicao') ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row myTerritorios myArtista">
                <div class="col s6 m6">
                    <h5><?= $this->lang->line('territorio') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="territorio" id="relTerritorio" class="browser-default">
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
                            <select name="escolhaTerritorio" id="">
                                <option value="0"><?= $this->lang->line('exclusao') ?></option>
                                <option selected value="1"><?= $this->lang->line('adicao') ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col s6 m6">
                    <h5><?= $this->lang->line('artista') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="artista" id="relArtista" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('artista') ?></option>
                                <?php if (isset($artistas)) { ?>
                                    <?php foreach ($artistas as $artista) { ?>
                                        <option value="<?= $artista->nome ?>"><?= $artista->nome ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <select name="escolhaArtista" id="">
                                <option value="0"><?= $this->lang->line('exclusao') ?></option>
                                <option selected value="1"><?= $this->lang->line('adicao') ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row myAutor myProdutor">
                <div class="col s6 m6">
                    <h5><?= $this->lang->line('autor') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="autor" id="relAutor" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('autor') ?></option>
                                <?php if (isset($autores)) { ?>
                                    <?php foreach ($autores as $autor) { ?>
                                        <option value="<?= $autor->nome ?>"><?= $autor->nome ?></option>
                                    <?php }

                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <select name="escolhaAutor" id="">
                                <option value="0"><?= $this->lang->line('exclusao') ?></option>
                                <option selected value="1"><?= $this->lang->line('adicao') ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col s6 m6">
                    <h5><?= $this->lang->line('produtor') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="produtor" id="relProdutor" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('produtor') ?></option>
                                <?php if (isset($produtores)) { ?>
                                    <?php foreach ($produtores as $produtor) { ?>
                                        <option value="<?= $produtor->nome ?>"><?= $produtor->nome ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <select name="escolhaProdutor" id="">
                                <option value="0"><?= $this->lang->line('exclusao') ?></option>
                                <option selected value="1"><?= $this->lang->line('adicao') ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  myAlbum myFaixa">
                <div class="col s6 m6">
                    <h5><?= $this->lang->line('albums') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="album" id="relAlbum" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('albums') ?></option>
                                <?php if (isset($albuns)) { ?>
                                    <?php foreach ($albuns as $album) { ?>
                                        <option value="<?= $album->nome ?>"><?= $album->nome ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <select name="escolhaAlbum" id="">
                                <option value="0"><?= $this->lang->line('exclusao') ?></option>
                                <option selected value="1"><?= $this->lang->line('adicao') ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col s6 m6">
                    <h5><?= $this->lang->line('faixas') ?></h5>

                    <div class="row">
                        <div class="col s8 m8">
                            <select name="faixa" id="relFaixa" class="browser-default">
                                <option selected value="-1"><?= $this->lang->line('faixas') ?></option>
                                <?php if (isset($faixas)) { ?>
                                    <?php foreach ($faixas as $faixa) { ?>
                                        <option value="<?= $faixa->nome ?>"><?= $faixa->nome ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col s4 m4">
                            <select name="escolhaFaixa" id="">
                                <option value="0"><?= $this->lang->line('exclusao') ?></option>
                                <option selected value="1"><?= $this->lang->line('adicao') ?></option>
                            </select>
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

            <div class="row">
                <button class="btn waves-effect waves-light col s12 m10 offset-m1 l12" type="submit">
                        <?php echo $this->lang->line('exportar'); ?>
                    <i class="mdi-content-send right"></i>
                </button>
            </div>
        </form>
    </div>

    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-action-assignment"></i>
                <?= $this->lang->line('listar_relatorios'); ?>
            </div>
        </div>
    </div>    
    <div class="row">
        <p id="renderingEngineFilter"></p>
        <p id="browserFilter"></p>
        <p id="platformsFilter"></p>
        <p id="engineVersionFilter"></p>
        <p id="cssGradeFilter"></p>
        <table id="<?= $this->lang->line('myTable') ?>" class="relTable hoverable bordered">
            <thead>
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
                        <td><?= $venda->descricao ?></td>
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
<script src="<?= base_url() . 'complemento/js/relatorio.js' ?>"></script>
<?php $this->load->view('_include/footer') ?>