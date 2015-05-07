<?php $this->load->view('_include/header') ?>
    <div class="circulo"><img src="<?php echo base_url().'complemento/img/entity.png' ?>"></div>
    
    <div class="dados_entidade">        
        <?php echo $this->lang->line('entitys'); ?>
        <?php if ($dadoentidade!=NULL){?>
            <table id="tabela_listagem">
                <thead>
                    <tr>
                        <th>   <?php echo $this->lang->line('nome_entidade'); ?>  </th>
                        <th>   CPF/CNPJ    </th>
                        <th>      <?php echo $this->lang->line('acao'); ?>      </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($dadoentidade)){
                            foreach($dadoentidade as $row1){?>
                                <tr>
                                    <td><?php echo $row1->nome;?></td>
                                    <td><?php echo $row1->cpf_cnpj;?></td> 
                                    <td><a href="#"><?php echo $this->lang->line('deletar'); ?> </a> || <a href="<?php echo base_url().'index.php/Entidade/camposatualizacao?id='.$row1->idEntidade ?>"><?php echo $this->lang->line('editar'); ?></a></td>
                                </tr> 
                        <?php }}?>                  
                </tbody>
            </table>
        <?php }else{?>
            <span><?php echo $this->lang->line('nao_ha_entadades'); ?></span><br>
        <?php } ?>

        </div>