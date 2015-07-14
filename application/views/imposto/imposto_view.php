<?php $this->load->view('_include/header') ?> <!-- Jadiel -->
    <div id="wrapper-body">
        <div id="titulo_lista">
            <div class="row">
                <div class="input-field col s12 m8 l9">
                    <i class="mdi-content-content-paste"></i>
                    <?php echo $this->lang->line('cadastro_imposto'); ?>
                </div>
            </div>
        </div><br>
        <div class="row">

            <?php echo form_open('imposto/cadastrar') ?>
            <div class="row">
                <div class="aviso_entidade"><?php if ($this->session->flashdata('sucesso') != null) {
                        echo $this->lang->line($this->session->flashdata('sucesso'));
                    } ?></div>
                <div class="aviso_entidade"><?php if ($this->session->flashdata('aviso') != null) {
                        echo $this->lang->line($this->session->flashdata('aviso'));
                    } ?></div>
                <div class="input-field col s12 m10 offset-m1 l8 offset-l2">
                    <label><?php echo $this->lang->line('imposto_nome'); ?></label>
                    <input required id="icon-prefix" type="text" name="nome">
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12 m10 offset-m1 l8 offset-l2">
                    <label><?php echo $this->lang->line('valor'); ?></label>
                    <input required class="<?=$this->lang->line('classPercent')?>" name="valor" type="text">
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l8 offset-l2 IdEntity">
                    <h5><?php echo $this->lang->line('tipo'); ?></label></h5>

                    <p>
                        <input type="radio" required class="filled-in" id="checkArtist" name="tipoImposto" value=1>
                        <label for="checkArtist"><?php echo $this->lang->line('fisico'); ?> </label>
                    </p>

                    <p>
                        <input type="radio" required class="filled-in" id="checkAutor" name="tipoImposto" value=2>
                        <label for="checkAutor"><?php echo $this->lang->line('digital'); ?> </label>
                    </p>
                </div>
            </div>

            <br>
            <button class="btn waves-effect waves-light col s12 m10 offset-m1 l8 offset-l2"
                    type="submit"><?php echo $this->lang->line('cadastrar'); ?>
                <i class="mdi-content-send right"></i>
            </button>
            <?php echo form_close() ?>

        </div>
    </div>

<?php $this->load->view('_include/footer') ?>