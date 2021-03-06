<?php $this->load->view('_include/header') ?>
    <div id="wrapper-body" xmlns="http://www.w3.org/1999/html">
        <div id="titulo_lista">
            <div class="row">
                <div class="input-field col s12 m8 l9">
                    <i class="mdi-action-account-circle"></i>
                    <?php echo $this->lang->line('perfil_cadastro'); ?>
                    <a href="<?php echo base_url(); ?>index.php/cliente/lista_perfis/<?php echo $id_cliente?>"
                        class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
                        data-position="top" data-delay="50" data-tooltip="<?php echo $this->lang->line('voltar'); ?>" id="backButton">
                        <i class="mdi-hardware-keyboard-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <?php if (isset($id_cliente)) { ?>
            <div class="row">
                <form action="<?= base_url() . 'index.php/cliente/cadastrar_perfil' ?>" method="post"
                      id="createPerfil">
                    <div class="row">
                        <div class="input-field col s12 m10 offset-m1 l5 offset-l1">
                            <i class="mdi-action-perm-identity prefix"></i>
                            <label><?php echo $this->lang->line('cliente_nome'); ?></label>
                            <input required title = "<?php echo $this->lang->line('min3char'); ?>" pattern=".{3,35}" type='text' class="cutSpace" name='nome'
                                   value="<?= $antigos['nome'] ?>">
                        </div>
                        <div class="input-field col s12 m10 offset-m1 l5">
                            <label><?php echo $this->lang->line('cliente_login'); ?></label>
                            <input required title = "<?php echo $this->lang->line('min6char'); ?>" pattern=".{6,35}" type='text' class="cutAllSpace" name='login'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m10 offset-m1 l10 offset-l1">
                            <label><?php echo $this->lang->line('cliente_email'); ?></label>
                            <input required title = "<?php echo $this->lang->line('min6char'); ?>" pattern=".{6,35}" class="cutAllSpace" type='email' name='email'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m5 offset-m1 l5 offset-l1">
                            <label><?php echo $this->lang->line('cliente_senha'); ?></label>
                            <input required title = "<?php echo $this->lang->line('min6char'); ?>" pattern=".{6,35}" class="cutAllSpace" type='password' name='senha'>
                        </div>
                        <div class="input-field col s12 m5 l5">
                            <label><?php echo $this->lang->line('cliente_confirmar_senha'); ?></label>
                            <input required pattern=".{6,35}" type='password' class="cutAllSpace"
                                   name='confirmar_senha'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m10 offset-m1 l10 offset-l1 funcionalidades">
                            <?php $nada = "" ?>
                            <h5><?php echo $this->lang->line('cliente_funcionalidades'); ?></h5>
                            <?php if (isset($funcionalidades)) { ?>
                                <div class="checkAll">
                                    <input type="checkbox" class="filled-in" id="markAllFunc"/>
                                    <label for="markAllFunc"><?= $this->lang->line('marcar_todas') ?></label>
                                </div>         
                                <?php foreach ($funcionalidades as $func) { 
                                    if ($direitoSobreCliente){ ?>
                                        <div class="col s4 m4 l3 minhasFuncionalidades">
                                            <p>
                                                <?php $index = $func->idFuncionalidades ?>
                                                <input type='checkbox' class="filled-in"
                                                       id="<?php echo $func->idFuncionalidades ?>"
                                                       name="func[<?= $index ?>]"
                                                       value="<?php echo $func->idFuncionalidades ?>" <?= (isset($antigos['func'][$index]) ? "checked" : $nada) ?>/>
                                                <label
                                                    for="<?php echo $func->idFuncionalidades ?>"> <?= $this->lang->line($func->nome); ?></label>
                                            </p>
                                        </div>
                                <?php }
                                    else{ 
                                        if ($func->nome != 'func_manter_cliente'){ ?>
                                            <div class="col s4 m4 l3 minhasFuncionalidades">
                                                <p>
                                                    <?php $index = $func->idFuncionalidades ?>
                                                    <input type='checkbox' class="filled-in"
                                                           id="<?php echo $func->idFuncionalidades ?>"
                                                           name="func[<?= $index ?>]"
                                                           value="<?php echo $func->idFuncionalidades ?>" <?= (isset($antigos['func'][$index]) ? "checked" : $nada) ?>/>
                                                    <label
                                                        for="<?php echo $func->idFuncionalidades ?>"> <?= $this->lang->line($func->nome); ?></label>
                                                </p>
                                            </div>
                                <?php   }
                                    }
                                }
                            } ?>
                        </div>
                    </div>
                    <input type='hidden' name='id' value="<?= $id_cliente ?>"/>
                    <input type="hidden" name="passMessageDisplay" value="<?= $this->lang->line('password_error') ?>">
                    <input type="hidden" name="checkBoxMessageDisplay"
                           value="<?= $this->lang->line('checkbox_erro') ?>">
                    <input type="hidden" name="nomeMessageDisplay" value="<?= $this->lang->line('nome_invalido') ?>">
                    <button class="btn waves-effect waves-light col s12 m10 offset-m1 l10 offset-l1"
                            type="submit"><?php echo $this->lang->line('cadastrar'); ?>
                        <i class="mdi-content-send right"></i>
                    </button>
                </form>
            </div>
        <?php } ?>
    </div>
<?php $this->load->view('_include/footer') ?>