<?php /*FEITO POR MIM, JADIEL*/

 $this->load->view('_include/header') ?>
<div id="wrapper-body">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-action-perm-identity"></i>
                <?php echo $this->lang->line('cadastro_favorecido'); ?>
                <a href="<?php echo base_url(); ?>index.php/favorecido/listar"
                    class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
                    data-position="top" data-delay="50" data-tooltip="<?php echo $this->lang->line('voltar'); ?>" id="backButton">
                    <i class="mdi-hardware-keyboard-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <form id="myForm1" action="<?= base_url() . 'index.php/Favorecido/cadastrar' ?>" method="post"> 
            <?php if (isset($variavel)) {
                echo $variavel;
            } ?>
            <div class="row">
                <div class="input-field col s12 m9 l8 offset-l2">
                    <i class="mdi-action-perm-identity prefix"></i>
                    <input class="cutSpace" pattern=".{4,45}" required id="nome" id="icon-prefix" type="text" value=""
                           name="nomefavorecido">
                    <label><?php echo $this->lang->line('nome_favorecido'); ?></label>
                </div>
                <!--a paradinha de dizer se eh favorecido-->
            </div>
            <div class="row"><!--a paradinha de dizer se eh CPF ou CNPJ-->
                <div id="cpfCadastre" class="input-field col s12 m9 l8 offset-l2">
                    <label>CPF</label>
                    <input pattern=".{14,}" required id="cpfCadastreInput1" class="cpfCadastreInput" type="text"
                           name="cpf">
                </div>
                <div style="display: none" id="cnpjCadastre" class="input-field col s12 m9 l8 offset-l2">
                    <label>CNPJ</label>
                    <input pattern=".{18,}" id="cnpjCadastreInput1" class="cnpjCadastreInput" type="text" name="cnpj">
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
                    <input pattern=".{11,}" id="telefone" maxlength="15" required type="text" value="" name="telefone1">
                </div>
                <div class="input-field col s12 m6 l4">
                    <label><?php echo $this->lang->line('telefone_alternativo'); ?></label>
                    <input pattern=".{11,}" id="telefone1" maxlength="15" required type="text" value=""
                           name="telefone2">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l4 offset-l2">
                    <label><?php echo $this->lang->line('contato'); ?></label>
                    <input required type="text" value="" name="contato" id="contato">
                </div>
                <div class="input-field col s12 m6 l4">
                    <label><?php echo $this->lang->line('email'); ?></label>
                    <input class="cutAllSpace" pattern=".{4,60}" required type="email" value="" name="email" id="email">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l4 offset-l2">
                    <label><?php echo $this->lang->line('percentual_fisico'); ?></label>
                    <input pattern=".{2,}" required class="<?= $this->lang->line('classPercent') ?>" type="text"
                           value=""
                           name="porcentagemganhofisico">
                </div>
                <div class="input-field col s12 m6 l4">
                    <label><?php echo $this->lang->line('percentual_digital'); ?></label>
                    <input pattern=".{2,}" required class="<?= $this->lang->line('classPercent') ?>" type="text"
                           value=""
                           name="porcentagemganhodigital">
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l8 offset-l2 IdEntity">
                    <h5><?php echo $this->lang->line('identificacao'); ?></label></h5>

                    <p>
                        <input type="checkbox" class="filled-in" id="checkArtist" name="identificacao[]" value=1>
                        <label for="checkArtist"><?php echo $this->lang->line('artista'); ?></label>
                    </p>

                    <p>
                        <input type="checkbox" class="filled-in" id="checkAutor" name="identificacao[]" value=2>
                        <label for="checkAutor"><?php echo $this->lang->line('autor'); ?></label>
                    </p>

                    <p>
                        <input type="checkbox" class="filled-in" id="checkProd" name="identificacao[]" value=3>
                        <label for="checkProd"><?php echo $this->lang->line('produtor'); ?></label>
                    </p>
                </div>
            </div>
            <div id="favorecido" >
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
            <input type="hidden" name="favoredMessageDisplay" value="<?= $this->lang->line('erro_favorecido') ?>">
            <input type="hidden" name="IdMessageDisplay" value="<?= $this->lang->line('erro_identificacao') ?>">
            <input type="hidden" name="cpfMessageDisplay" value="<?= $this->lang->line('cpf/cnpj_invalido') ?>">
            <input type="hidden" name="nomeMessageDisplay" value="<?= $this->lang->line('nome_invalido') ?>">
            <button name="botao" class="btn waves-effect waves-light col s12 m12 l8 offset-l2"
                    type="submit"><?php echo $this->lang->line('cadastrar'); ?>
                <i class="mdi-content-send right"></i>
            </button>
        </form>
    </div>
</div>
<?php $this->load->view('_include/footer') ?>

