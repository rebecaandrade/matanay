<?php $this->load->view('_include/header') ?>

    <div class="fadein">
        <div class="circulo"><img src="<?php echo base_url().'complemento/img/entity.png' ?>"></div>

    </div>

<?php $this->load->view('_include/footer') ?>
<div>
    <?php $flag="ingles"; ?>
    <?php if(isset($sucesso)){if ($flag=="ingles"){?>The entity was registed successevely<br><?php  }else{ ?>Entidada cadastrada com sucesso<br><?php } } ?>


    <?php echo form_open('/ENTIDADE/cadastrar')?>
        <?php if (isset($variavel)){echo $variavel;}?><br>
        <table>
            <tr>
                <td><span><?php if ($flag=="ingles"){?>Name of the Entity<?php }else{ ?>Nome da Entidade<?php  } ?>: </span></td>
                <td><input class="nome" type="text" value="" name="nomeentidade" ><br></td>
            </tr>
            <tr>
                <td><span>CPF<input class="nome" type="radio" value="cpf" name="cpf/cnpj" >CNPJ<input class="nome" type="radio" value="cpnj" name="cpf/cnpj" >:  </span></td>
                <td><input class="nome" type="text" value="" name="cpf_cnpj" ><br>    </td>
            </tr>
            <tr>
                <td><span><?php if ($flag=="ingles"){?>Telephone number<?php }else{ ?>Numero para contato<?php  } ?>: </span></td>
                <td><input class="nome" type="text" value="" name="telefone1" ><br></td>
            </tr> 
            <tr>
                <td><span><?php if ($flag=="ingles"){?>Alternative telephone number<?php }else{ ?>Numero para contato alternativo<?php  } ?>: </span></td>
                <td><input class="nome" type="text" value="" name="telefone2" ><br></td>
            </tr>
            <tr>
                <td><span><?php if ($flag=="ingles"){?>One to be contacted<?php }else{ ?>Pessoa a ser contatada<?php  } ?>: </span></td>
                <td><input class="nome" type="text" value="" name="contato" ><br></td>
            </tr>
            <tr>
                <td><span><?php if ($flag=="ingles"){?>One's email<?php }else{ ?>Email do contato<?php  } ?>: </span></td>
                <td><input class="nome" type="text" value="" name="email" ><br></td>
            </tr>
            <tr>
                <td><span><?php if ($flag=="ingles"){?>Percentage of gain with phisical media<?php }else{ ?>Percentual de ganho com midia fisica<?php  } ?>: </span></td>
                <td><input class="nome" type="text" value="" name="porcentagemganhofisico" ><br></td>
            </tr>
            <tr>
                <td><span><?php if ($flag=="ingles"){?>Percentage of gain with digital media<?php }else{ ?>Percentual de ganho com midia digital<?php  } ?>: </span></td>
                <td><input class="nome" type="text" value="" name="porcentagemganhodigital" ><br></td>
            </tr>
            <tr>
                <td><span><?php if ($flag=="ingles"){?>Is it a Favored?<?php }else{ ?>Eh um Favorecido?<?php  } ?> </span></td>
                <td><?php if ($flag=="ingles"){?>Yes<?php }else{ ?>Sim<?php  } ?><input class="nome" type="radio" value="1" name="favorecido" ><?php if ($flag=="ingles"){?>No<?php }else{ ?>Nao<?php  } ?><input class="nome" type="radio" value="0" name="favorecido" ><br></td>
            </tr>
            <tr>
                <td><span><?php if ($flag=="ingles"){?>Identification<?php }else{ ?>Identificacao<?php  } ?>: </span></td>
                <td>
                    <select name="identificacao">
                    <?php if ($flag=="ingles"){?><option value=1 >Artist</option><?php }else{ ?><option value=1 >Artista</option>
                    <?php  } ?><?php if ($flag=="ingles"){?><option value=2 >Autor</option><?php }else{ ?><option value=2 >Autor</option>
                    <?php  } ?><?php if ($flag=="ingles"){?><option value=3 >Producer</option><?php }else{ ?><option value=3 >Produtor</option><?php  } ?><br>
                    </select>
                </td>
            </tr>
            <tr>
                <td><span><?php if ($flag=="ingles"){?>Bank<?php }else{ ?>Banco<?php  } ?>: </span></td>
                <td><input class="nome" type="text" value="" name="banco" ><br></td>
            </tr>
            <tr>
                <td><span><?php if ($flag=="ingles"){?>Checking account<?php }else{ ?>Conta corrente<?php  } ?>: </span></td>
                <td><input class="nome" type="text" value="" name="contacorrente" ><br></td>
            </tr>
            <tr>
                <td><span><?php if ($flag=="ingles"){?>Bank Branch<?php }else{ ?>Agencia bancaria<?php  } ?>: </span></td>
                <td><input class="nome" type="text" value="" name="agencia" ><br></td>
            </tr>
            <?php if (($dadofavorecido!=null)&&($dadoentidade!=null)){?><tr>
                <td><span><?php if ($flag=="ingles"){?>Registed favoreds<?php }else{ ?>Favoritos cadastrados<?php  } ?>: </span></td>
                <td>
                    <select name="favorecidorelacionado">
                    <?php foreach ($dadofavorecido as $row){ //verifica se a entidade ja foi cadastrada como favorecido

                        foreach($dadoentidade as $row1){
                            
                            if (($row->idEntidade)==($row1->Entidade_idEntidade)){?>
                                <option value= <?php echo $row1->idEntidade;?>><?php echo $row1->nome;?></option>
                    <?php }}}} ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td ></td>
                <td colspan="2"><input  class="botoes1" type="submit" value="Enviar"><br></td>
            </tr>
        </table>
    <?php form_close() ?>
</div>