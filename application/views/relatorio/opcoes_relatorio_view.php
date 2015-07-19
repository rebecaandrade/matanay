<?php $this->load->view('_include/header') ?>
<?php $dataFrom30Ago = date('Y-m-d', strtotime("-30 days")); ?>
<div id="wrapper-body">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-action-assignment"></i>
                <?php echo $this->lang->line('ralatorio_opcoes'); ?>
            </div>
        </div>
    </div>

    <form name="coisa" id="relOpt" action="<?= base_url() . 'index.php/entidade/testeEntidadeForm' ?>" method="post">
        <div class="input-field col s6">
            <input type="date" class="datepicker" name="datainicio" value="<?= $dataFrom30Ago ?>">
            <input type="text" name="teste" value="">
            <button class="btn">GO</button>
        </div>
    </form>
</div>
<script src="<?= base_url() . 'complemento/js/relatorio.js' ?>"></script>
<?php $this->load->view('_include/footer') ?>
