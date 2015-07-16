<?php /*FEITO POR MIM JADIEL*/
$this->load->view('_include/header') ?>

<div id="wrapper-body">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-action-assignment-ind"></i>
                <?php echo $this->lang->line('edicao_entidade'); ?>
            </div>
        </div>
    </div>
    <div class="row">

        <form id="myFormUpdate" onsubmit="validaformupdateentidade()" action="<?= base_url() . 'index.php/entidade/atualizar' ?>" method="post">
            <input type="hidden" name='idEntidade' value="<?= $dadosentidade->idEntidade; ?>"/>
            <input type="hidden" name='idTipo_Entidade' value="<?= $dadosidentificacao->idTipo_Entidade; ?>"/>
            <input type="hidden" name='idCliente' value="<?= $dadosentidade->idCliente; ?>"/>
            <?php if($dadosentidade->cpf==null) { ?> <!--informacao que nos diz se o proprietario tem cpf ou cnpj-->
                <input type="hidden" name='cpf/cnpj' value="cnpj"/>
            <?php }if($dadosentidade->cnpj==null) { ?>
                <input type="hidden" name='cpf/cnpj' value="cpf"/>    
            <?php } ?>        
            <input type="hidden" name='idtelefone1' value="<?= $telefone1->idTelefone; ?>"/>
            <input type="hidden" name='idtelefone2' value="<?= $telefone2->idTelefone; ?>"/>

            <div class="row">
                <div class="input-field col s12 m12 l8 offset-l2">
                    <i class="mdi-action-assignment-ind prefix"></i>
                    <label><?= $this->lang->line('nome_entidade'); ?></label>
                    <input class="cutSpace" value="<?= $dadosentidade->nome; ?>" name="nome" required type="text"/>
                </div>
            </div>

                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <label><?= $this->lang->line('cpf_cnpj'); ?></label>
                        <input  id="cpf/cnpjUpdate" <?php if($dadosentidade->cpf==null){ echo "value='".$dadosentidade->cnpj."' name='cnpj' pattern='.{18,}' ";}else{echo "value='".$dadosentidade->cpf."' name='cpf' pattern='.{14,}' ";} ?> required type="text"/>
                    </div>
                </div>


            <input id="cnpjUpdate" type="hidden" name="cpf_cnpj">

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
                    <input class="cutAllSpace" value="<?php echo $dadosentidade->email; ?>" name="email" required type="email"/>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l4 offset-l2">
                    <label><?php echo $this->lang->line('percentual_fisico'); ?>:</label>
                    <input class="<?= $this->lang->line('classPercent') ?>"
                           value="<?php echo $dadospercentual->percentual_fisico; ?>" name="percentual_fisico" required
                           type="text"/>
                </div>
                <div class="input-field col s12 m6 l4">
                    <label><?php echo $this->lang->line('percentual_digital'); ?>:</label>
                    <input class="<?= $this->lang->line('classPercent') ?>"
                           value="<?php echo $dadospercentual->percentual_digital; ?>" name="percentual_digital" required
                           type="text"/>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l8 offset-l2 IdEntityCheckBox">
                    <label><?php echo $this->lang->line('identificacao'); ?></label></label>
                    <p>
                        <input type="checkbox" <?php if($dadosidentificacao->idTipo_Entidade==1) echo "checked"?> class="filled-in" id="checkArtist" name="identificacao[]" value=1>
                        <label for="checkArtist"><?php echo $this->lang->line('artista'); ?></label>
                       
                        <input type="checkbox" <?php if($dadosidentificacao->idTipo_Entidade==2) echo "checked"?> class="filled-in" id="checkAutor" name="identificacao[]" value=2>
                        <label for="checkAutor"><?php echo $this->lang->line('autor'); ?></label>
                       
                        <input type="checkbox" <?php if($dadosidentificacao->idTipo_Entidade==3) echo "checked"?> class="filled-in" id="checkProd" name="identificacao[]" value=3>
                        <label for="checkProd"><?php echo $this->lang->line('produtor'); ?></label>
                    </p>
                </div>
            </div>
            <br>
            <div id="nao_favorecido" class="row">
                <div class="input-field col s12 m12 l8 offset-l2">
                    <select name="relacao_favorecido">
                        <?php foreach ($dadosfavorecido as $row) {
                            if ($dadosentidade->idFavorecido == $row->idFavorecido) { ?>
                                <option value="<?= $row->idFavorecido ?>"
                                        selected> <?php echo $row->nome; ?>
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
            <input type="hidden" name="favoredMessageDisplay" value="<?= $this->lang->line('erro_favorecido') ?>">
            <input type="hidden" name="IdMessageDisplay" value="<?= $this->lang->line('erro_identificacao') ?>">
            <input type="hidden" name="cpfMessageDisplay" value="<?= $this->lang->line('cpf/cnpf_invalido') ?>">
            <input type="hidden" name="nomeMessageDisplay" value="<?= $this->lang->line('nome_invalido') ?>">
            <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2"
                    type="submit"><?php echo $this->lang->line('atualizar'); ?>
                <i class="mdi-content-send right"></i>
            </button>
        </form>
    </div>
</div>
<?php $this->load->view('_include/footer') ?>


