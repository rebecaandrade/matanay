<?php $this->load->view('_include/header') ?>
<?php $dataFrom30Ago = date('j F, Y', strtotime("-30 days")); ?>
<?php $dataToday = date('j F, Y'); ?>
<div id="wrapper-body">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-action-assignment"></i>
                <?php echo $this->lang->line('ralatorio_opcoes'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <form name="coisa" id="relOpt" action="<?= base_url() . 'index.php/relatorio/gera_relatorio' ?>" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input required id="datainicio" type="text" class="datepicker" name="datainicio"
                           value="<?= $dataFrom30Ago ?>">
                    <label for="datainicio"><?= $this->lang->line('data_inicio') ?></label>
                </div>
                <div class="col s6 input-field">
                    <input required id="datafim" type="text" class="datepicker" name="datafim"
                           value="<?= $dataToday ?>">
                    <label for="datainicio"><?= $this->lang->line('data_fim') ?></label>
                </div>
            </div>
            <div class="row">
                <h5><?= $this->lang->line('tipo_relatorio') ?></h5>

                <div class="input-field col s12 m10 110 myTypeRel" style="padding-bottom:3%">
                    <p>
                        <input id="tipoRelatorioFisico" type="checkbox" class="filled-in" value="1"
                               name="tiporelatorio[]">
                        <label for="tipoRelatorioFisico"><?= $this->lang->line('fisico') ?></label>
                    </p>

                    <p>
                        <input id="tipoRelatorioDigital" type="checkbox" class="filled-in" value="2"
                               name="tiporelatorio[]">
                        <label for="tipoRelatorioDigital"><?= $this->lang->line('digital') ?></label>
                    </p>
                </div>
            </div>
            <input type="hidden" name="startDateIsGreaterMessegeDisplay"
                   value="<?= $this->lang->line('data_inicio_maior_que_data_fim') ?>">
            <input type="hidden" name="invalidDatesMessegeDisplay"
                   value="<?= $this->lang->line('datas_invalidas') ?>">
            <input type="hidden" name="typeReportMessegeDisplay" value="<?=$this->lang->line('tipo_relatorio_erro')?>">
            <button class="btn waves-effect waves-light col s12 m10 offset-m1 l10 offset-l1"
                    type="submit"><?php echo $this->lang->line('cadastrar'); ?>
                <i class="mdi-content-send right"></i>
            </button>
        </form>
    </div>
</div>
<script src="<?= base_url() . 'complemento/js/relatorio.js' ?>"></script>
<?php $this->load->view('_include/footer') ?>
