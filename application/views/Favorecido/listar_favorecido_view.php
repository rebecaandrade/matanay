<?php /*FEITO POR MIM, JADIEL*/

$this->load->view('_include/header') ?>

    <div id="wrapper-body">
        <div class="row" id="titulo_lista">
            <div class="row">
                <div class="input-field col s12 m8 l9">
                    <i class="mdi-action-perm-identity"></i>
                    <?php echo $this->lang->line('favorecidos'); ?>
                    <a href="<?php echo base_url(); ?>index.php/favorecido/mostrar_cadastro"
                       class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo"
                       data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('novo'); ?>"
                       id="addButton">
                        <i class="mdi-content-add"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <table id="<?=$this->lang->line('myTable')?>" class="hoverable bordered">
                <thead>
                <th><?= $this->lang->line('nome_favorecido'); ?></th>
                <th>CPF/CNPJ</th>
                <th><?= $this->lang->line('descricao_entidade'); ?></th>
                <th><?= $this->lang->line('acao'); ?></th>
                </thead>
                <tbody>
                <?php if (isset($favorecidos)) { ?>
                    <?php foreach ($favorecidos as $row) { ?>
                        <tr>
                            <td>    <?= $row->nome ?>                                                    </td>
                            <td>    <?= ($row->cpf == NULL ? $row->cnpj : $row->cpf) ?>    </td>
                            <td>    <?= $this->lang->line($row->descricao); ?>                           </td>
                            <td>    <a class="acao"
                                    onclick=" passaParamentroFavorecido('<?= $row->idFavorecido ?>','<?=base_url()?>')"><?php echo $this->lang->line('editar'); ?></a>
                                <?php $flag=0;
                                foreach ($entidades as $key) { // verificacao de relacionamentos com alguma entidade que impeca a deleção
                                    if($key->idFavorecido==$row->idFavorecido)
                                        $flag=1;
                                }
                                if($flag==0){ ?>
                                |   <a class="deletarLink"
                                    onclick="excluirFavorecido('<?= base_url() . 'index.php/favorecido/deletar/' . $row->idFavorecido ?>')"><?php echo $this->lang->line('deletar') ?> </a>
                                <?php } else echo "| ",$this->lang->line('indisponivel');?>
                            </td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
        <form id="sendUserToEdit" method="post">
            <input id="editarEntInput" type="hidden" name="oneInput">
            <input id="submitAcao" type="submit" style="display: none">
        </form>

    </div>

<?php $this->load->view('_include/footer') ?>