<?php /*FEITO POR MIM JADIEL*/
$this->load->view('_include/header') ?>    
    <div class="container"> 
  
        <div id="titulo_lista">
            <i class="mdi-action-perm-identity"></i>
                <?php echo $this->lang->line('favorecido'); ?>
                <a href="<?php echo base_url(); ?>index.php/favorecido/mostrar_cadastro" 
                    class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
                    data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('nova'); ?>" id="addButton">
                    <i class="mdi-content-add"></i>
                </a>
        </div>   
        <br>
        <?php echo $this->lang->line('entitys'); ?>
        <?php if ($dadoentidade!=NULL){?>
            <table id="tabela_listagem">
                <thead>
                    <tr>
                        <th>   <?php echo $this->lang->line('nome_favorecido'); ?>  </th>
                        <th>   CPF/CNPJ    </th>
                        <th>      <?php echo $this->lang->line('acao'); ?>      </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($dadoentidade)){
                            foreach($dadoentidade as $row1){
                                if($row1->favorecido==1){?>
                                    <tr>
                                        <td><?php echo $row1->nome;?></td>
                                        <td><?php echo $row1->cpf_cnpj;?></td> 
                                        <td><a href="#"><?php echo $this->lang->line('deletar'); ?> </a> || <a href="<?php echo base_url().'index.php/Favorecido/camposatualizacao?id='.$row1->idEntidade ?>"><?php echo $this->lang->line('editar'); ?></a></td>
                                    </tr> 
                                <?php } ?>
                        <?php }} ?>                  
                </tbody>
            </table>
        <?php }else{?>
            <span><?php echo $this->lang->line('nao_ha_entadades'); ?></span><br>
        <?php } ?>

        </div>
        <?php $this->load->view('_include/footer') ?>