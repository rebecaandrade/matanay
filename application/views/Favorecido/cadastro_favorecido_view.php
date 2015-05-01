<div>
    <?php if ($flag=="ingles"){ $flag1=1;?><h4>Register Entity</h4><?php }else{ $flag1=0;?><h4>Cadastrar Entidade</h4><?php  } ?>
    <a href="<?php echo base_url().'index.php/entidade/index?id='. 0?>" >Ingles</a>
    <a href="<?php echo base_url().'index.php/entidade/index?id='. 1?>" >Portugues</a>
    <?php echo form_open('/entidade/cadastrar')?>
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
            <tr>
                <td ></td>
                <td colspan="2"><input  class="botoes1" type="submit" value="Enviar"><br></td>
            </tr>
        </table>
    <?php form_close() ?>
</div>