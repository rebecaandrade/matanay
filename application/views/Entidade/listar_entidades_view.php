<?php /*FEITO POR MIM JADIEL*/
$this->load->view('_include/header') ?>
    

    <div class="container"> 
        <div id="titulo_lista">
            <div class="row">
                <div class="input-field col s12 m8 l9">
                    <i class="mdi-action-assignment-ind"></i>
                    <?php echo $this->lang->line('entidades'); ?>
                    <a href="<?php echo base_url(); ?>index.php/entidade/mostrar_cadastro" 
                        class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
                        data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('nova'); ?>" id="addButton">
                        <i class="mdi-content-add"></i>
                    </a>
                </div>
                <?php if($dadoentidade!=NULL){
                    echo form_open('/Entidade/procurar') ?>
                        <div class="input-field col s12 m4 l3">
                            <i class="mdi-action-search prefix"></i>
                            <label><?php echo $this->lang->line('procurar'); ?></label>
                            <input required type="text" value="" name="procurar" >
                        </div>
                <?php form_close(); } ?>
            </div>
        </div><br>
        <?php echo $this->lang->line('entitys'); ?>
        <?php if (($dadoentidade!=NULL)&&(!isset($busca))){?>
            <table class="hoverable bordered">
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
                                    <?php if($row1->cpf!=null){?><td><?php echo $row1->cpf;?></td><?php } ?>
                                    <?php if($row1->cnpj!=null){?><td><?php echo $row1->cnpj;?></td> <?php } ?>
                                    <td><a id="acao" href="<?php echo base_url().'index.php/Entidade/camposatualizacao?id='.$row1->idEntidade ?>"><?php echo $this->lang->line('editar'); ?></a>
                                     | <a id="acao" href="#"><?php echo $this->lang->line('deletar'); ?> </a></td>
                                </tr> 
                        <?php }} ?>                  
                </tbody>
            </table>
        <?php }else //SE OUVER UMA BUSCA OU NAO OUVEREM FAVORECIDOS CADASTRADOS OCORRE O SEGUINTE
                    if(!isset($busca)){?>
                        <span><?php echo $this->lang->line('nao_ha_entidades'); ?></span><br>
                    <?php } else //PARA O RESULTADO DA BUSCA TEM-SE
                                if($busca!=null){ ?>
                                    <table id="tabela_listagem">
                                        <thead>
                                            <tr>
                                                <th>   <?php echo $this->lang->line('nome_favorecido'); ?>  </th>
                                                <th>   CPF/CNPJ    </th>
                                                <th>      <?php echo $this->lang->line('acao'); ?>      </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($busca)){
                                                    foreach($busca as $row1){?>
                                                        <tr>
                                                            <td><?php echo $row1->nome;?></td>
                                                            <?php if($row1->cpf!=null){?><td><?php echo $row1->cpf;?></td><?php } ?>
                                                            <?php if($row1->cnpj!=null){?><td><?php echo $row1->cnpj;?></td> <?php } ?>
                                                            <td><a href="#"><?php echo $this->lang->line('deletar'); ?> </a> || <a href="<?php echo base_url().'index.php/Favorecido/camposatualizacao?id='.$row1->idFavorecido ?>"><?php echo $this->lang->line('editar'); ?></a></td>
                                                        </tr> 
                                                <?php }} ?>                  
                                        </tbody>
                                    </table>
                                <?php } else{ ?>
                                    <span><?php echo $this->lang->line('nada_encontrado');?><span>
                                <?php } ?>

    <div id="paginacao">
        <?php if($paginas) echo $paginas; ?>
    </div>

    </div>
<?php  $this->load->view('_include/footer') ?>