<?php /*FEITO POR JADIEL*/
$this->load->view('_include/header') ?>

<div id="wrapper-body">
    <div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
                <i class="mdi-alert-warning"></i>
                <?php echo $this->lang->line('notificacao'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        </div>
    <div class="row">
        <table id="<?=$this->lang->line('myTable')?>" class="hoverable bordered">
            <thead>
                <tr>
                    <th>   <?php echo $this->lang->line('contrato_nome'); ?>    </th>
                    <th>   <?php echo $this->lang->line('data_fim'); ?>         </th>
                    <th>   <?php echo $this->lang->line('nome_entidade'); ?>    </th>
                    <th>   <?php echo $this->lang->line('nome_favorecido'); ?>  </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dadoNotificacao as $notificacao) { 
                    /*verificao das datas atuais e convercoes para unix*/
                    $unix =  mysql_to_unix($notificacao->data_fim);
                    $now = now();

                    $tempo = timespan($now,$unix  );
                    /*verificacao do numero de meses*/
                    $meses=0;
                    if($tempo[2] == "Y"){
                        $meses = $tempo[0] *12 + $tempo[8];
                    }
                    else
                        if($tempo[2] == "M"){
                            $meses = $tempo[0] + $tempo[10] / 4 ;
                        }
                    if((($meses <= $notificacao->alerta)&&($meses != 0))||(($meses <= $notificacao->alerta)&&($tempo != '1 Second'))){ ?>
                        <tr>
                            <td>    <?php echo $notificacao->nome; ?>           </td>
                            <td>    <?php echo $notificacao->data_fim; ?>       </td>
                            <?php foreach ($dadosEntidade as $entidade){
                                if ($entidade->idEntidade == $notificacao->idEntidade){ ?>
                                    <td>    <?php echo $entidade->nome; ?>      </td> 
                                    <?php break; ?>                                   
                            <?php } } foreach ($dadosFavorecido as $favorecido) {
                                if ($favorecido->idFavorecido == $notificacao->idFavorecido) { ?>
                                    <td>    <?php echo $favorecido->nome; ?>      </td>                                    
                                    <?php break; ?>                                   
                            <?php } } ?>
                        </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('_include/footer') ?>