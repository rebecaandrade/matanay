<?php /*FEITO POR MIM, JADIEL*/

$this->load->view('_include/header') ?>

    <div class="container">
        <div class="row" id="titulo_lista">
            <div class="row">
                <div class="input-field col s12 m8 l9">
                    <i class="mdi-action-assignment-ind"></i>
                    <?php echo $this->lang->line('favorecido'); ?>
                    <a href="<?php echo base_url(); ?>index.php/favorecido/mostrar_cadastro"
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
                <th><?= $this->lang->line('nome_favorecido'); ?></th>
                <th>CPF/CNPJ</th>
                <th><?= $this->lang->line('descricao_entidade'); ?></th>
                <th><?= $this->lang->line('acao'); ?></th>
                </thead>
                <tbody>
                <?php if (isset($favorecidos)) { ?>
                    <?php foreach ($favorecidos as $favorecido) { ?>
                        <tr>
                            <td><?= $favorecido->nome ?></td>
                            <td><?= ($favorecido->cpf == NULL ? $favorecido->cnpj : $favorecido->cpf) ?></td>
                            <td><?= $this->lang->line($favorecido->descricao); ?></td>
                            <td><a class="acao"
                                   href="<?= base_url() . 'index.php/Favorecido/camposatualizacao?id=' . $favorecido->idFavorecido ?>"><?php echo $this->lang->line('editar'); ?></a>
                                | <a class="deletarLink"
                                     onclick="excluirFavorecido('<?= base_url() . 'index.php/favorecido/deletar/' . $favorecido->idFavorecido ?>')"><?php echo $this->lang->line('deletar') ?> </a>
                            </td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>

    </div>

<?php $this->load->view('_include/footer') ?>