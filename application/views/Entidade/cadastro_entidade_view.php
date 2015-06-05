<?php /*FEITO POR MIM, JADIEL*/

$this->load->view('_include/header') ?>



<!--<div class="aviso_entidade"><?php if ($this->session->flashdata('sucesso') != null) {
    echo $this->session->flashdata('sucesso');
} ?></div class="row">-->
<div class="container">

    <div class="row">
        <?php
        $atributo = array('id' => 'form');//colocando um id no form
        echo form_open('/Entidade/cadastrar', $atributo) ?>
        <?php if (isset($variavel)) {
            echo $variavel;
        } ?>
        <div class="row">
            <div class="aviso_entidade"><?php if ($this->session->flashdata('sucesso') != null) {
                    echo $this->lang->line($this->session->flashdata('sucesso'));
                } ?></div>
            <div class="aviso_entidade"><?php if ($this->session->flashdata('aviso') != null) {
                    echo $this->lang->line($this->session->flashdata('aviso'));
                } ?></div>
            <div class="input-field col s12 m9 l8 offset-l2">
                <i class="mdi-action-assignment-ind prefix"></i>
                <input id="nome" id="icon-prefix" type="text" value="" name="nomeentidade">
                <label><?php echo $this->lang->line('nome_entidade'); ?></label>
            </div>
            <!--a paradinha de dizer se eh favorecido-->
            <div class="switch col s6 offset-s6 m3 l2">
                <?php echo $this->lang->line('eh_favorecido'); ?>
                <p>
                    <input type="radio" value="1" name="favorecido" id="test3"/>
                    <label for="test3"><?php echo $this->lang->line('sim'); ?></label>

                    <input type="radio" value="0" name="favorecido" id="test4"/>
                    <label for="test4"><?php echo $this->lang->line('nao'); ?></label>
                </p>
            </div>
        </div>
        <div class="row"><!--a paradinha de dizer se eh CPF ou CNPJ-->
            <div class="input-field col s12 m9 l8 offset-l2">
                <label>CPF/CNPJ</label>
                <input required type="text" value="" name="cpf_cnpj">
            </div>
            <div class="switch col s6 offset-s6 m3 l2">
                <p>
                    <input type="radio" value="cpf" name="cpf/cnpj" id="test1"/>
                    <label for="test1">CPF</label>

                    <input type="radio" value="cpnj" name="cpf/cnpj" id="test2"/>
                    <label for="test2">CNPJ</label>
                </p>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s12 m6 l4 offset-l2">
                <label><?php echo $this->lang->line('telefone'); ?></label>
                <input id="telefone" maxlength="15" required type="text" value="" name="telefone1">
            </div>
            <div class="input-field col s12 m6 l4">
                <label><?php echo $this->lang->line('telefone_alternativo'); ?></label>
                <input id="telefone1" maxlength="15" required type="text" value="" name="telefone2">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 l4 offset-l2">
                <label><?php echo $this->lang->line('contato'); ?></label>
                <input required type="text" value="" name="contato">
            </div>
            <div class="input-field col s12 m6 l4">
                <label><?php echo $this->lang->line('email'); ?></label>
                <input required type="email" value="" name="email">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 l4 offset-l2">
                <label><?php echo $this->lang->line('percentual_fisico'); ?></label>
                <input required type="text" value="" name="porcentagemganhofisico">
            </div>
            <div class="input-field col s12 m6 l4">
                <label><?php echo $this->lang->line('percentual_digital'); ?></label>
                <input required type="text" value="" name="porcentagemganhodigital">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m12 l8 offset-l2">
                <select name="identificacao">
                    <option value="" disabled selected><?php echo $this->lang->line('selecione'); ?></option>
                    <option value=1><?php echo $this->lang->line('artista'); ?></option>
                    <option value=2><?php echo $this->lang->line('autor'); ?></option>
                    <option value=3><?php echo $this->lang->line('produtor'); ?></option>
                </select>
                <label><?php echo $this->lang->line('identificacao'); ?></label>
            </div>
        </div>
        <div id="favorecido" class="box">
            <div class="row">
                <div class="input-field col s12 m12 l2 offset-l2">
                    <label><?php echo $this->lang->line('banco'); ?></label>
                    <input type="text" value="" name="banco">
                </div>
                <div class="input-field col s12 m6 l3">
                    <label><?php echo $this->lang->line('conta'); ?></label>
                    <input type="text" value="" name="contacorrente">
                </div>
                <div class="input-field col s12 m6 l3">
                    <label><?php echo $this->lang->line('agencia'); ?></label>
                    <input type="text" value="" name="agencia">
                </div>
            </div>
        </div>
        <div id="nao_favorecido" class="box">
            <?php if (($dadofavorecido != null)) { ?>
                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <select name="favorecido_relacionado">
                            <option value="" disabled
                                    selected> <?php echo $this->lang->line('favorecido_cadastrado'); ?> </option>
                            <?php //verifica se a entidade ja foi cadastrada como favorecido
                            foreach ($dadofavorecido as $row) {
                                ?>
                                <option value="<?php echo $row->idFavorecido;?>"><?php echo $row->nome;?></option>
                            <?php } ?>
                        </select>
                        <label><?php echo $this->lang->line('favorecido_cadastrado'); ?></label>
                    </div>
                </div>
            <?php } ?>
        </div>
        <button name="botao" class="btn waves-effect waves-light col s12 m12 l8 offset-l2"
                type="submit"><?php echo $this->lang->line('cadastrar'); ?>
            <i class="mdi-content-send right"></i>
        </button>
        <?php form_close() ?>
    </div>
</div>
</div>

<?php $this->load->view('_include/footer') ?>

