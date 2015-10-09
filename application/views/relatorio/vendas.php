<?php $this->load->view('_include/header') ?>
<?php $dataFrom30Ago = date('j F, Y', strtotime("-30 days")); ?>
<?php $dataToday = date('j F, Y'); ?>
<div id="wrapper-body" xmlns="http://www.w3.org/1999/html">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-action-trending-up"></i>
                <?php echo $this->lang->line('vendas_min'); ?>
            </div>
        </div>
    </div>
    <div class="container">

        <table class="bordered hoverable">
            <thead>
                <tr>
                    <th data-field="id"><?php echo $this->lang->line('entidade'); ?></th>
                    <th data-field="name"><?php echo $this->lang->line('album_min'); ?></th>
                    <th data-field="name"><?php echo $this->lang->line('faixa_min'); ?></th>
                    <th data-field="price"><?php echo $this->lang->line('vendas_total'); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alvin</td>
                    <td>Album 1</td>
                    <td>Faixa 1</td>
                    <td>R$ 0.87</td>
                </tr>
                <tr>
                    <td>Alan</td>
                    <td>Album 2</td>
                    <td>Faixa 2</td>
                    <td>R$ 3.76</td>
                </tr>
                <tr>
                    <td>Jonathan</td>
                    <td>Album 3</td>
                    <td>Faixa 3</td>
                    <td>R$ 7.00</td>
                </tr>
            </tbody>
        </table>

        <div id="grafico">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>R$ 25.000,00</h5>
                </div>
                <div class="panel-body">
                    <div id="morris-bar-chart"></div>
                </div>
            </div>
        </div>

    </div>
</div>

    <script src="<?= base_url() . 'complemento/js/relatorio.js' ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?= base_url() . 'complemento/bower_components/raphael/raphael-min.js' ?>"></script>
    <script src="<?= base_url() . 'complemento/bower_components/morrisjs/morris.min.js' ?>"></script>
    <script src="<?= base_url() . 'complemento/js/morris-chart.js' ?>"></script>

<?php $this->load->view('_include/footer') ?>
