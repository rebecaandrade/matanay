<?php $this->load->view('_include/header') ?>
    <div id="wrapper-body">
        <div id="titulo_lista">
            <div class="row">
                <div class="input-field col s12 m8 l9">
                    <i class="mdi-action-assignment-ind"></i>
                    <?php echo $this->lang->line('entidades'); ?>
                    <a href="<?php echo base_url(); ?>index.php/entidade/mostrar_cadastro"
                       class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo"
                       data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('nova'); ?>"
                       id="addButton">
                        <i class="mdi-content-add"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <table id="myTable" class="hoverable bordered">
                <thead>
                <th><?= $this->lang->line('nome_entidade'); ?></th>
                <th>CPF/CNPJ</th>
                <th><?= $this->lang->line('descricao_entidade'); ?></th>
                <th><?= $this->lang->line('acao'); ?></th>
                </thead>
                <tbody>
                <?php if (isset($entidades)) { ?>
                    <?php foreach ($entidades as $entidade) { ?>
                        <tr>
                            <td><?= $entidade->nome ?></td>
                            <td><?= ($entidade->cpf == NULL ? $entidade->cnpj : $entidade->cpf) ?></td>
                            <td><?= $entidade->descricao ?></td>
                            <td><a class="acao"
                                   onclick=" passaParamentro('<?= $entidade->idEntidade ?>','<?=base_url()?>')"><?php echo $this->lang->line('editar'); ?></a>
                                | <a class="deletarLink"
                                     onclick="excluirEntidade('<?= base_url() . 'index.php/entidade/deletar/' . $entidade->idEntidade ?>')"><?php echo $this->lang->line('deletar') ?> </a>
                            </td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
            <form id="sendUserToEdit" method="post">
                <input id="editarEntInput" type="hidden" name="oneInput">
                <input id="submitAcao" type="submit" style="display: none">
            </form>
        </div>
    </div>
<?php $this->load->view('_include/footer') ?>