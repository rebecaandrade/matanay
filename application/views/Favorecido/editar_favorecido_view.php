<?php /*FEITO POR MIM JADIEL*/
$this->load->view('_include/header') ?>
<br>

<div class="container">
    <div class="row">
        <?php echo $this->lang->line('edit_entitys'); ?>
        <?php if (isset($sucesso)) {
            echo $sucesso;
        } ?><br>
        <?php echo form_open('Favorecido/atualizar') ?>
        <input type="hidden" name='idFavorecido' value="<?php echo $dadosfavorecido->idFavorecido; ?>"/>
        <input type="hidden" name='idtelefone1' value="<?php echo $telefone1->idTelefone_Favorecido; ?>"/>
        <input type="hidden" name='idtelefone2' value="<?php echo $telefone2->idTelefone_Favorecido; ?>"/>

        <div class="row">
            <div class="aviso_entidade"><?php if ($this->session->flashdata('sucesso') != null) {
                    echo $this->lang->line($this->session->flashdata('sucesso'));
                } ?></div>
            <div class="aviso_entidade"><?php if ($this->session->flashdata('aviso') != null) {
                    echo $this->lang->line($this->session->flashdata('aviso'));
                } ?></div>
            <div class="input-field col s12 m12 l8 offset-l2">
                <i class="mdi-action-perm-identity prefix"></i>
                <label><?php echo $this->lang->line('nome_favorecido'); ?></label>
                <input value="<?php echo $dadosfavorecido->nome; ?>" name="nome" required type="text"/>
            </div>
        </div>
        <?php if ($dadosfavorecido->cpf == null) { ?>
            <div class="row">
                <div class="input-field col s12 m12 l8 offset-l2">
                    <label><?php echo $this->lang->line('cpf_cnpj'); ?></label>
                    <input value="<?php echo $dadosfavorecido->cnpj; ?>" name="cnpj" required type="text"/>
                </div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="input-field col s12 m12 l8 offset-l2">
                    <label><?php echo $this->lang->line('cpf_cnpj'); ?></label>
                    <input value="<?php echo $dadosfavorecido->cpf; ?>" name="cpf" required type="text"/>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="input-field col s12 m6 l4 offset-l2">
                <label><?php echo $this->lang->line('telefone'); ?>:</label>
                <input id="telefone" maxlength="14" class="telefone" value="<?php echo $telefone1->numero; ?>"
                       name="telefone1" required type="text"/>
            </div>
            <div class="input-field col s12 m6 l4">
                <label><?php echo $this->lang->line('telefone_alternativo'); ?>:</label>
                <input id="telefone1" maxlength="14" id="telefone1" value="<?php echo $telefone2->numero; ?>"
                       name="telefone2" required type="text"/>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 l4 offset-l2">
                <label><?php echo $this->lang->line('contato'); ?>:</label>
                <input value="<?php echo $dadosfavorecido->contato; ?>" name="contato" required type="text"/>
            </div>
            <div class="input-field col s12 m6 l4">
                <label><?php echo $this->lang->line('email'); ?>:</label>
                <input value="<?php echo $dadosfavorecido->email; ?>" name="email" required type="email"/>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 l4 offset-l2">
                <label><?php echo $this->lang->line('percentual_fisico'); ?>:</label>
                <input value="<?php echo $dadosfavorecido->percentual_fisico; ?>" name="percentual_fisico" required
                       type="text"/>
            </div>
            <div class="input-field col s12 m6 l4">
                <label><?php echo $this->lang->line('percentual_digital'); ?>:</label>
                <input value="<?php echo $dadosfavorecido->percentual_digital; ?>" name="percentual_digital" required
                       type="text"/>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m12 l8 offset-l2">
                <select name="identificacao">
                    <option value="" disabled selected> <?php echo $this->lang->line('selecione'); ?>
                        (<?php echo $this->lang->line('atual'); ?>
                        : <?php echo $this->lang->line($dadosidentificacao->descricao); ?>)
                    </option>
                    <option value=1><?php echo $this->lang->line('artista'); ?></option>
                    <option value=2><?php echo $this->lang->line('autor'); ?></option>
                    <option value=3><?php echo $this->lang->line('produtor'); ?></option>
                    <br>
                </select>
                <label><?php echo $this->lang->line('identificacao'); ?></label>
            </div>
        </div>
        <div class="row">
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
        </div>
        <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2"
                type="submit"><?php echo $this->lang->line('editar'); ?>
            <i class="mdi-content-send right"></i>
        </button>
        <?php form_close() ?>
    </div>
</div>
<?php $this->load->view('_include/footer') ?>
