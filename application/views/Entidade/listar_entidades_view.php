    <div >
   <?php if ($flag=="ingles"){ $flag1=1;?><h4>Entities</h4><?php }else{ $flag1=0;?><h4>Entidades</h4><?php  } ?>
   <?php if ($livro!=NULL){?>
        <table >
            <thead>
                <tr>
                    <th>   <?php if ($flag=="ingles"){?>Name of the Entity<?php }else{ ?>Nome da Entidade<?php  } ?>  </th>
                    <th>    <?php if ($flag=="ingles"){?>CPF/CNPJ<?php }else{ ?>CPF/CNPJ<?php  } ?>:    </th>
                    <th>      Ações       </th>
                </tr>
            </thead>
            <tbody>

                <?php if (isset($entidades)){
                    foreach($entidade as $row){?>
                <tr  id="<?php echo alternator('test1', 'test2'); ?>">
                    <td><?php echo $row->nome;?></td>
                    <td><?php echo $row->cpf_cpnj;?></td> 
                    <?php if ($prioridade==2){?> <td><a href="<?php echo base_url().'index.php/livros/deletar?id='.$row->id?>">Deletar </a>||<a href="<?php echo base_url().'index.php/livros/atualizacao?id='.$row->id?>"> Atualizar</a></td><?php }?>
                    <?php if (($prioridade==1)&&($row->status=="Acervo Geral")){?> <td><a href="<?php echo base_url().'index.php/emprestimo/reservar_livro?id='.$row->id?>">Pegar livro</a><?php }?>
                </tr>   
                <?php }}?>
            </tbody>
        </table>
    <?php }else{?>
    <span>Não há livros cadastrados</span><br>
    <?php }?>
    <?php if ($prioridade==2){?>  <br>  
    <?php }?>
    <br><br>
    <?php if($prioridade==2){?>
    <?php }else{ ?>
    <?php }?>
</div>