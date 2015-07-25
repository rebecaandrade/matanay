<?php $this->load->view('_include/header') ?>
<div id="wrapper-body" xmlns="http://www.w3.org/1999/html">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-action-assignment"></i>
                <?= $this->lang->line('relatorios'); ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <form id="formRelImport" enctype="multipart/form-data"
                  action="<?= base_url() . 'index.php/relatorio/importar' ?>" method="post">
                <div class="col s7 m4 input-field offset-m1 offset-s1">
                    <h5><?= $this->lang->line('selecione_modelo') ?></h5>
                    <select class="browser-default" name="relModel" id="relModel">
                        <option value="-1" selected><?= $this->lang->line('modelos') ?></option>
                        <?php if (isset($modelos)) { ?>
                            <?php foreach ($modelos as $modelo) { ?>
                                <option value="<?= $modelo->idModelo ?>"><?= $modelo->nome ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="input-field col s5 offset-s1 offset-m1 m4">
                    <h5><?= $this->lang->line('rel_file') ?></h5>

                    <div id="activeExcelFile" class="btn waves-effect"><p>ADD</p></div>
                    <input type="file" name="excelFile" style="display: none">
                </div>
                <input type="hidden" name="modelMessegeDisplay" value="<?= $this->lang->line('selecione_modelo') ?>">
                <input type="hidden" name="fileMessegeDisplay" value="<?= $this->lang->line('rel_file') ?>">
                <button class="btn waves-effect waves-light col s12 m10 offset-m1 l10 offset-l1"
                        type="submit"><?php echo $this->lang->line('cadastrar'); ?>
                    <i class="mdi-content-send right"></i>
                </button>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url() . 'complemento/js/relatorio.js' ?>"></script>
<?php $this->load->view('_include/footer') ?>
