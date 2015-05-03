<?php $this->load->view('_include/header') ?>

    <div class="fadein">
        <div class="circulo"><img src="<?php echo base_url().'complemento/img/entity.png' ?>"></div>

    </div>

<?php $this->load->view('_include/footer') ?>

    <div >
   <?php $flag="ingles"; if ($flag=="ingles"){ $flag1=1;?><h4>Entities</h4><?php }else{ $flag1=0;?><h4>Entidades</h4><?php  } ?>
   <?php if ($dadoentidade!=NULL){?>
        <table >
            <thead>
                <tr>
                    <th>   <?php if ($flag=="ingles"){?>Name of the Entity<?php }else{ ?>Nome da Entidade<?php  } ?>  </th>
                    <th>    <?php if ($flag=="ingles"){?>CPF/CNPJ<?php }else{ ?>CPF/CNPJ<?php  } ?>    </th>
                    <th>      <?php if ($flag=="ingles"){?>Action<?php }else{ ?>Acao<?php  } ?>      </th>
                </tr>
            </thead>
            <tbody>

                <?php if (isset($dadoentidade)){
                        foreach($dadoentidade as $row1){?>
                                <tr>
                                    <td><?php echo $row1->nome;?></td>
                                    <td><?php echo $row1->cpf_cnpj;?></td> 
                                    <td><a href="#"><?php if ($flag=="ingles"){?>Delete<?php }else{ ?>Deletar<?php  } ?> </a>||<a href="<?php echo base_url().'index.php/ENTIDADE/camposatualizacao?id='.$row1->idEntidade ?>"><?php if ($flag=="ingles"){?>Update<?php }else{ ?>Atualizar<?php  } ?></a></td>
                                </tr> 
                    <?php }}?>                  
            </tbody>
        </table>
    <?php }else{?>
    <span>Não há Entidades cadastrados</span><br>
    <?php } ?>

</div>