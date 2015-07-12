<?php /*FEITO POR MIM, JADIEL*/

$this->load->view('_include/header') ?>

<div id="wrapper-body">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-action-assignment-ind"></i>
                <?php echo $this->lang->line('favorecido_cadastro'); ?>
            </div>
        </div>
    </div><br>
    <div class="row">
        <form id="myForm" action="<?= base_url() . 'index.php/Favorecido/cadastrar' ?>" method="post">
        <?php if (isset($variavel)) {
            echo $variavel;
        } ?>
        <div class="row">
            <div class="input-field col s12 m12 l8 offset-l2">
                <i class="mdi-action-perm-identity prefix"></i>
                <label><?php echo $this->lang->line('nome_favorecido'); ?></label>
                <input id="icon-prefix" required type="text" value="" name="nomefavorecido">
            </div>
        </div>
        <div class="row"><!--a paradinha de dizer se eh CPF ou CNPJ-->
            <div id="cpfCadastre" class="input-field col s12 m9 l8 offset-l2">
                <label>CPF</label>
                <input required id="cpfCadastreInput" class="cpfCadastreInput" type="text" name="cpf">
            </div>
            <div style="display: none" id="cnpjCadastre" class="input-field col s12 m9 l8 offset-l2">
                <label>CNPJ</label>
                <input id="cnpjCadastreInput" class="cnpjCadastreInput" type="text" name="cnpj" >
            </div>
            <input id="cpf_cnpj" type="hidden" name="cpf_cnpj">
            <div class="switch col s6 offset-s6 m3 l2">
                <p>
                    <input type="radio" value="cpf" checked name="cpf/cnpj" id="test1"/>
                    <label for="test1">CPF</label>
                    <input type="radio" value="cpnj" name="cpf/cnpj" id="test2"/>
                    <label for="test2">CNPJ</label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 l4 offset-l2">
                <label><?php echo $this->lang->line('telefone'); ?></label>
                <input id="telefone" maxlength="14" required type="text" value="" name="telefone1">
            </div>
            <div class="input-field col s12 m6 l4">
                <label><?php echo $this->lang->line('telefone_alternativo'); ?></label>
                <input id="telefone1" maxlength="14" required type="text" value="" name="telefone2">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 l4 offset-l2">
                <label><?php echo $this->lang->line('contato'); ?></label>
                <input required type="text" value="" name="contato">
            </div>
            <div class="input-field col s12 m6 l4">
                <label><?php echo $this->lang->line('email'); ?></label>
                <input required type="text" value="" name="email">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 l4 offset-l2">
                <label><?php echo $this->lang->line('percentual_fisico'); ?></label>
                <input required class="<?=$this->lang->line('classPercent')?>" type="text" value="" name="porcentagemganhofisico">
            </div>
            <div class="input-field col s12 m6 l4">
                <label><?php echo $this->lang->line('percentual_digital'); ?></label>
                <input required class="<?=$this->lang->line('classPercent')?>" type="text" value="" name="porcentagemganhodigital">
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
        <div class="row">
            <div class="input-field col s12 m12 l2 offset-l2">
                <label><?php echo $this->lang->line('banco'); ?></label>
                <input required type="text" value="" name="banco">
            </div>
            <div class="input-field col s12 m6 l3">
                <label><?php echo $this->lang->line('conta'); ?></label>
                <input required type="text" value="" name="contacorrente">
            </div>
            <div class="input-field col s12 m6 l3">
                <label><?php echo $this->lang->line('agencia'); ?></label>
                <input required type="text" value="" name="agencia">
            </div>
        </div>
        <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2"
                type="submit"><?php echo $this->lang->line('cadastrar'); ?>
            <i class="mdi-content-send right"></i>
        </button>
        <?php form_close() ?>
    </div>
</div>
</div>

<?php $this->load->view('_include/footer') ?>
