<?php $this->load->view('_include/header') ?>
    <div id="wrapper-body" xmlns="http://www.w3.org/1999/html">
        <div id="titulo_lista">
            <div class="row">
                <div class="input-field col s12 m8 l9">
                    <i class="mdi-action-account-circle"></i>
                    <?php echo $this->lang->line('perfil_cadastro'); ?>
                </div>
            </div>
        </div>
        <br>
        <?php if (isset($id_cliente)) { ?>
            <div class="row">
                <form action="<?= base_url() . 'index.php/entidade/testeEntidadeForm' ?>" method="post"
                      id="createPerfil">
                    <div class="row">
                        <div class="input-field col s12 m10 offset-m1 l8 offset-l2">
                            <i class="mdi-action-perm-identity prefix"></i>
                            <label><?php echo $this->lang->line('cliente_nome'); ?></label>
                            <input required pattern=".{3,35}" type='text' class="cutSpace" name='nome'
                                   value="<?= $antigos['nome'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m10 offset-m1 l8 offset-l2">
                            <label><?php echo $this->lang->line('cliente_login'); ?></label>
                            <input required pattern=".{6,35}" type='text' class="cutAllSpace" name='login'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m10 offset-m1 l8 offset-l2">
                            <label><?php echo $this->lang->line('cliente_senha'); ?></label>
                            <input required pattern=".{6,35}" class="cutAllSpace" type='password' name='senha'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m10 offset-m1 l8 offset-l2">
                            <label><?php echo $this->lang->line('cliente_confirmar_senha'); ?></label>
                            <input required pattern=".{6,35}" type='password' class="cutAllSpace"
                                   name='confirmar_senha'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l8 offset-l2">
                            <?php $nada = "" ?>
                            <h5><?php echo $this->lang->line('cliente_funcionalidades'); ?></h5>
                            <?php if (isset($funcionalidades)) { ?>
                                <div class="row"><div class="btn" id="markAllFunc"><p><?=$this->lang->line('marcar_todas')?></p></div></div>
                                <?php foreach ($funcionalidades as $func) { ?>
                                    <div class="col s4 m4 minhasFuncionalidades">
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
                            } ?>
                        </div>
                    </div>
                    <input type='hidden' name='id' value=<?php echo $id_cliente ?>/>
                    <input type="hidden" name="passMessageDisplay" value="<?= $this->lang->line('password_error') ?>">
                    <button class="btn waves-effect waves-light col s12 m10 offset-m1 l8 offset-l2"
                            type="submit"><?php echo $this->lang->line('cadastrar'); ?>
                        <i class="mdi-content-send right"></i>
                    </button>
                </form>
            </div>
        <?php } ?>
    </div>
<?php $this->load->view('_include/footer') ?>