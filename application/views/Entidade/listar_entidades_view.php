<?php /*FEITO POR MIM JADIEL*/
$this->load->view('_include/header') ?>
    
    <br>
    <br>    
        
    <div class="container"> 
    <br>   
        <div class="row">
            <a href="<?php echo base_url(); ?>index.php/entidade/mostrar_cadastro">
                <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2"> <?php echo $this->lang->line('cadastrar_entidade'); ?>
                </button> 
            </a>
        </div>    
        <br>
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
        <?php $this->load->view('_include/footer') ?>