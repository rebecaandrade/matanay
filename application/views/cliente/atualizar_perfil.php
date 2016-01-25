<?php $this->load->view('_include/header') ?>
    <div id="wrapper-body">
        <div id="titulo_lista">
            <div class="row">
                <div class="input-field col s12 m8 l9">
                    <i class="mdi-action-account-circle"></i>
                    <?php echo $this->lang->line('perfil_edicao'); ?>
                    <a href="<?php echo base_url(); ?>index.php/cliente/lista_perfis/<?php echo $perfil->idCliente ?>"
                        class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
                        data-position="top" data-delay="50" data-tooltip="<?php echo $this->lang->line('voltar'); ?>" id="backButton">
                        <i class="mdi-hardware-keyboard-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>
        <br>

        <div class="row">
            <form id="formUpdatePerfil" action="<?= base_url() . 'index.php/cliente/atualizar_perfil_admin' ?>"
                  method="post">
                <div class="row">
                    <div class="input-field col s12 m9 l8 offset-l2">
                        <i class="mdi-action-perm-identity prefix"></i>
                        <input required title = "<?php echo $this->lang->line('min3char'); ?>" pattern=".{3,35}" type='text' name='nome' class="cutSpace"
                               value="<?php echo $perfil->nome ?>" >
                        <label><?php echo $this->lang->line('cliente_nome'); ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m9 l8 offset-l2">
                        <i class="mdi-action-perm-identity prefix"></i>
                        <input required title = "<?php echo $this->lang->line('min6char'); ?>"  pattern=".{6,35}" type='email' name='email' class="cutSpace"
                               value="<?php echo $perfil->email ?>" >
                        <label><?php echo $this->lang->line('cliente_email'); ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m9 l8 offset-l2">
                        <input required title = "<?php echo $this->lang->line('min6char'); ?>" pattern=".{6,35}" class="cutAllSpace" type='text' name='login'
                               value="<?php echo $perfil->login ?>">
                        <label><?php echo $this->lang->line('cliente_login'); ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m9 l8 offset-l2 funcionalidades">
                        <h5><?php echo $this->lang->line('cliente_funcionalidades'); ?></h5>
                        <?php if (isset($funcionalidades)) { ?>
                            <div class="checkAll">
                                <input type="checkbox" class="filled-in" id="updateMarkAllFunc"/>
                                <label for="updateMarkAllFunc"><?= $this->lang->line('marcar_todas') ?></label>
                            </div>
                            <?php foreach ($funcionalidades as $func) { 
                                if ($direitoSobreCliente){ ?>
                                    <div class="col s4 m4 checkFunc">
                                        <p>
                                            <input type='checkbox' class="filled-in"
                                                   id="<?php echo $func->idFuncionalidades ?>"
                                                   name='func[]'
                                                   value="<?php echo $func->idFuncionalidades ?>"<?= (($func->checked) ? "checked" : "") ?>/>
                                            <label
                                                for="<?php echo $func->idFuncionalidades ?>"> <?= $this->lang->line($func->nome); ?></label>
                                        </p>
                                    </div>
                            <?php 
                                } else{
                                    if ($func->nome != 'func_manter_cliente'){ ?>
                                        <div class="col s4 m4 checkFunc">
                                            <p>
                                                <input type='checkbox' class="filled-in"
                                                       id="<?php echo $func->idFuncionalidades ?>"
                                                       name='func[]'
                                                       value="<?php echo $func->idFuncionalidades ?>"<?= (($func->checked) ? "checked" : "") ?>/>
                                                <label
                                                    for="<?php echo $func->idFuncionalidades ?>"> <?= $this->lang->line($func->nome); ?></label>
                                            </p>
                                        </div>
                                <?php } 
                                }   
                            }
                        } ?>
                    </div>
                </div>
                <input type='hidden' name='id_cliente' value="<?php echo $perfil->idCliente ?>"/>
                <input type='hidden' name='id_usuario' value="<?php echo $perfil->idUsuario ?>"/>
                <input type="hidden" name="checkBoxMessageDisplay" value="<?= $this->lang->line('checkbox_erro') ?>">
                <input type="hidden" name="nomeMessageDisplay" value="<?= $this->lang->line('nome_invalido') ?>">
                <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2"
                        type="submit"><?php echo $this->lang->line('atualizar'); ?>
                    <i class="mdi-content-send right"></i>
                </button>
            </form>
        </div>
    </div>
<?php $this->load->view('_include/footer') ?>