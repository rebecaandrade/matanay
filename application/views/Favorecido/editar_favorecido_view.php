<?php /*FEITO POR MIM JADIEL*/
$this->load->view('_include/header') ?>

<div id="wrapper-body">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-action-perm-identity"></i>
                <?php echo $this->lang->line('edicao_favorecido'); ?>
            </div>
        </div>
    </div><br>
    <div class="row">
        <form id="myForm" action="<?=base_url().'index.php/Favorecido/atualizar'?>" method="post" >
            <input type="hidden" name='idFavorecido' value="<?php echo $dadosfavorecido->idFavorecido; ?>"/>
            <input type="hidden" name='idTipo_Favorecido' value="<?= $dadosidentificacao->idTipo_Favorecido; ?>"/>
            <?php if($dadosfavorecido->cpf==null) { ?> <!--informacao que nos diz se o proprietario tem cpf ou cnpj-->
                <input id="cnpjCadastre" type="hidden" name='cpf/cnpj' value="cnpj"/>
            <?php }if($dadosfavorecido->cnpj==null) { ?>
                <input type="hidden" name='cpf/cnpj' value="cpf"/>    
            <?php } ?>        
            <input type="hidden" name='idtelefone1' value="<?= $telefone1->idTelefone_Favorecido; ?>"/>
            <input type="hidden" name='idtelefone2' value="<?= $telefone2->idTelefone_Favorecido; ?>"/>

            <div class="row">
                <div class="input-field col s12 m12 l8 offset-l2">
                    <i class="mdi-action-perm-identity prefix"></i>
                    <label><?php echo $this->lang->line('nome_favorecido'); ?></label>
                    <input class="cutSpace" value="<?php echo $dadosfavorecido->nome; ?>" name="nome" required type="text"/>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l8 offset-l2">
                    <label><?= $this->lang->line('cpf_cnpj'); ?></label>
                    <input  id="cpf/cnpjUpdate" <?php if($dadosfavorecido->cpf==null){ echo "value='".$dadosfavorecido->cnpj."' class='cnpjCadastreInput' name='cnpj' pattern='.{18,}' ";}else{echo "value='".$dadosfavorecido->cpf."' class='cpfCadastreInput' 'name='cpf' pattern='.{14,}' ";} ?> required type="text"/>
                    </div>
                </div>
            <div class="row">
                <div class="input-field col s12 m6 l4 offset-l2">
                    <label><?php echo $this->lang->line('telefone'); ?></label>
                    <input id="telefone" maxlength="14" class="telefone" value="<?php echo $telefone1->numero; ?>"
                           name="telefone1" required type="text"/>
                </div>
                <div class="input-field col s12 m6 l4">
                    <label><?php echo $this->lang->line('telefone_alternativo'); ?></label>
                    <input id="telefone1" maxlength="14" id="telefone1" value="<?php echo $telefone2->numero; ?>"
                           name="telefone2" required type="text"/>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l4 offset-l2">
                    <label><?php echo $this->lang->line('contato'); ?></label>
                    <input value="<?php echo $dadosfavorecido->contato; ?>" name="contato" required type="text"/>
                </div>
                <div class="input-field col s12 m6 l4">
                    <label><?php echo $this->lang->line('email'); ?></label>
                    <input class="cutAllSpace" value="<?php echo $dadosfavorecido->email; ?>" name="email" required type="email"/>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l4 offset-l2">
                    <label><?php echo $this->lang->line('percentual_fisico'); ?></label>
                    <input class="<?= $this->lang->line('classPercent') ?>" value="<?php echo $dadospercentual->percentual_fisico; ?>" name="percentual_fisico" required
                           type="text"/>
                </div>
                <div class="input-field col s12 m6 l4">
                    <label><?php echo $this->lang->line('percentual_digital'); ?></label>
                    <input class="<?= $this->lang->line('classPercent') ?>" value="<?php echo $dadospercentual->percentual_digital; ?>" name="percentual_digital" required
                           type="text"/>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l8 offset-l2 IdEntityCheckBox">
                    <label><?php echo $this->lang->line('identificacao'); ?></label></label>
                    <p>
                        <input type="checkbox" <?php if($dadosidentificacao->idTipo_Favorecido==1) echo "checked"?> class="filled-in" id="checkArtist" name="identificacao[]" value=1>
                        <label for="checkArtist"><?php echo $this->lang->line('artista'); ?></label>
                       
                        <input type="checkbox" <?php if($dadosidentificacao->idTipo_Favorecido==2) echo "checked"?> class="filled-in" id="checkAutor" name="identificacao[]" value=2>
                        <label for="checkAutor"><?php echo $this->lang->line('autor'); ?></label>
                       
                        <input type="checkbox" <?php if($dadosidentificacao->idTipo_Favorecido==3) echo "checked"?> class="filled-in" id="checkProd" name="identificacao[]" value=3>
                        <label for="checkProd"><?php echo $this->lang->line('produtor'); ?></label>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l2 offset-l2">
                    <label><?php echo $this->lang->line('banco'); ?></label>
                    <input value="<?php echo $dadosfavorecido->banco; ?>" name="banco" required type="text"/>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input value="<?php echo $dadosfavorecido->conta; ?>" name="conta" required type="text"/>
                    <label><?php echo $this->lang->line('conta'); ?></label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <label><?php echo $this->lang->line('agencia'); ?></label>
                    <input value="<?php echo $dadosfavorecido->agencia; ?>" name="agencia" required type="text"/>
                </div>
            </div>
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
