<?php /*FEITO POR MIM JADIEL*/
$this->load->view('_include/header') ?>
<br>
<div class="container">
    <div class="row">
        <?php echo $this->lang->line('edit_entitys'); ?>

        <form id="updateFormEntidade" action="<?= base_url() . 'index.php/entidade/atualizar' ?>" method="post">
            <input type="hidden" name='idEntidade' value="<?= $dadosentidade->idEntidade; ?>"/>

            <input type="hidden" name='idtelefone1' value="<?= $telefone1->idTelefone; ?>"/>
            <input type="hidden" name='idtelefone2' value="<?= $telefone2->idTelefone; ?>"/>

            <div class="row">
                <div class="input-field col s12 m12 l8 offset-l2">
                    <i class="mdi-action-assignment-ind prefix"></i>
                    <label><?= $this->lang->line('nome_entidade'); ?></label>
                    <input value="<?= $dadosentidade->nome; ?>" name="nome" required type="text"/>
                </div>
            </div>
            <?php if ($dadosentidade->cpf == null) { ?>
                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <label><?= $this->lang->line('cpf_cnpj'); ?></label>
                        <input id="cpfUpdate" value="<?= $dadosentidade->cnpj; ?>" name="cnpj" required type="text"/>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <label><?php echo $this->lang->line('cpf_cnpj'); ?></label>
                        <input id="cnpjUpdate" value="<?= $dadosentidade->cpf; ?>" name="cpf" required type="text"/>
                    </div>
                </div>
            <?php } ?>
            <input id="cppjUpdate" type="hidden" name="cpf_cnpj">

            <div class="row">
                <div class="input-field col s12 m6 l4 offset-l2">
                    <label><?php echo $this->lang->line('telefone'); ?>:</label>
                    <input id="telefone" maxlength="15" value="<?= $telefone1->numero; ?>" name="telefone1"
                           required
                           type="text"/>
                </div>
                <div class="input-field col s12 m6 l4">
                    <label><?php echo $this->lang->line('telefone_alternativo'); ?>:</label>
                    <input id="telefone1" maxlength="15" value="<?php echo $telefone2->numero; ?>" name="telefone2"
                           required
                           type="text"/>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l4 offset-l2">
                    <label><?php echo $this->lang->line('contato'); ?>:</label>
                    <input value="<?php echo $dadosentidade->contato; ?>" name="contato" required type="text"/>
                </div>
                <div class="input-field col s12 m6 l4">
                    <label><?php echo $this->lang->line('email'); ?>:</label>
                    <input value="<?php echo $dadosentidade->email; ?>" name="email" required type="email"/>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l4 offset-l2">
                    <label><?php echo $this->lang->line('percentual_fisico'); ?>:</label>
                    <input class="<?= $this->lang->line('classPercent') ?>"
                           value="<?php echo $dadosentidade->percentual_fisico; ?>" name="percentual_fisico" required
                           type="text"/>
                </div>
                <div class="input-field col s12 m6 l4">
                    <label><?php echo $this->lang->line('percentual_digital'); ?>:</label>
                    <input class="<?= $this->lang->line('classPercent') ?>"
                           value="<?php echo $dadosentidade->percentual_digital; ?>" name="percentual_digital" required
                           type="text"/>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l8 offset-l2">
                    <select name="identificacao">
                        <option value="<?= $dadosentidade->idTipo_Entidade ?>"
                                selected> <?= $this->lang->line('selecione') ?> (<?= ($this->lang->line('atual') . ":" . $this->lang->line($dadosidentificacao->descricao)) ?>)
                        </option>
                        <option value="1"><?= $this->lang->line('artista'); ?></option>
                        <option value="2"><?= $this->lang->line('autor'); ?></option>
                        <option value="3"><?= $this->lang->line('produtor'); ?></option>
                        <br>
                    </select>
                    <label><?= $this->lang->line('identificacao'); ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l8 offset-l2">
                    <select name="relacao_favorecido">
                        <?php foreach ($dadosfavorecido as $row) {
                            if ($dadosentidade->idFavorecido == $row->idFavorecido) { ?>
                                <option value="<?= $row->idFavorecido ?>"
                                        selected> <?php echo $this->lang->line('selecione'); ?> (<?php echo $this->lang->line('atual'); ?>: <?php echo $row->nome; ?>)
                                </option>
                            <?php } else { ?>
                                <option value="<?php echo $row->idFavorecido; ?>"><?php echo $row->nome; ?></option>
                            <?php }
                        } ?>
                    </select>
                    <label><?php echo $this->lang->line('favorecido_cadastrado'); ?></label>
                </div>
            </div>
            <!--<div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <label><?php echo $this->lang->line('banco'); ?>:</label>
                        <input value="<?php echo $dadosfavorecido->banco; ?>" name="banco" required type="text"/>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <input value="<?php echo $dadosfavorecido->conta; ?>" name="conta" required type="text"/>
                        <label><?php echo $this->lang->line('conta'); ?>:</label>
                    </div>
                </div>
                <div class="row">
                   <div class="input-field col s12 m12 l8 offset-l2">
                        <label><?php echo $this->lang->line('agencia'); ?>:</label>
                        <input value="<?php echo $dadosfavorecido->agencia; ?>" name="agencia" required type="text"/>
                    </div>
                </div>-->
            <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2"
                    type="submit"><?php echo $this->lang->line('editar'); ?>
                <i class="mdi-content-send right"></i>
            </button>
        </form>
    </div>
</div>
<?php $this->load->view('_include/footer') ?>


