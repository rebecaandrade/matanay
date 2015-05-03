<?php $this->load->view('_include/header') ?>

    <div class="fadein">
        <div class="circulo"><img src="<?php echo base_url().'complemento/img/entity.png' ?>"></div>

    </div>

<?php $this->load->view('_include/footer') ?>

<?php if (isset($sucesso)){echo $sucesso;}?><br>
<?php echo form_open('ENTIDADE/atualizar') ?>
    <?php $flag="ingles";if ($flag=="ingles"){ $flag1=1;?><h4>Edit Favored</h4><?php }else{ $flag1=0;?><h4>Editar favorecido</h4><?php  } ?>
    <input type="hidden" name='idEntidade' value="<?php echo $dadosentidade->idEntidade; ?>" />
    <input type="hidden" name='favorecido' value="<?php echo $dadosentidade->favorecido; ?>" />
    <table>
        <thead>
        </thead>
        <tbody>
            <tr class='refe'>
                <td><span><?php if ($flag=="ingles"){?>Name of the Entity<?php }else{ ?>Nome da Entidade<?php  } ?></span></td>
                <td><input class="nome" value="<?php echo $dadosentidade->nome; ?>" name="nome" type="text"/></td>
            </tr>
            <tr class='refe'>
                <td><span>CPF/CNPJ</span></td>
                <td><input class="nome" value="<?php echo $dadosentidade->cpf_cnpj; ?>" name="cpf_cnpj" type="text"/></td>
            </tr>
                <tr class='refe'>
                <td><span><?php if ($flag=="ingles"){?>Telephone number<?php }else{ ?>Numero para contato<?php  } ?>:</span></td>
                <td> <input class="nome" value="<?php echo $telefone1->numero; ?>" name="telefone1" type="text"/></td>
            </tr>
            </tr>
                <tr class='refe'>
                <td><span><?php if ($flag=="ingles"){?>Telephone number<?php }else{ ?>Numero para contato<?php  } ?>:</span></td>
                <td> <input class="nome" value="<?php echo $telefone2->numero; ?>" name="telefone2" type="text"/></td>
            </tr>
            <tr class='refe'>
                <td><span><?php if ($flag=="ingles"){?>One to be contacted<?php }else{ ?>Pessoa a ser contatada<?php  } ?>:</span></td>
                <td><input class="nome" value="<?php echo $dadosentidade->contato; ?>" name="contato" type="text"/></td>
            </tr>
            <tr class='refe'>
                <td><span><?php if ($flag=="ingles"){?>One's email<?php }else{ ?>Email do contato<?php  } ?>:</span></td>
                <td><input class="nome" value="<?php echo $dadosentidade->email; ?>" name="email" type="text"/></td>
            </tr>
            <tr class='refe'>
                <td><span><?php if ($flag=="ingles"){?>Percentage of gain with phisical media<?php }else{ ?>Percentual de ganho com midia fisica<?php  } ?>:</span></td>
                <td><input class="nome" value="<?php echo $dadosentidade->percentual_fisico; ?>" name="percentual_fisico" type="text"/></td>
            </tr>
            <tr class='refe'>
                <td><span><?php if ($flag=="ingles"){?>Percentage of gain with digital media<?php }else{ ?>Percentual de ganho com midia digital<?php  } ?>:</span></td>
                <td><input class="nome" value="<?php echo $dadosentidade->percentual_digital; ?>" name="percentual_digital" type="text"/></td>
            </tr>
            <tr class='refe'>
                <td><span><?php if ($flag=="ingles"){?>Identification  <?php }else{ ?>Identificacao  <?php  } ?><?php if ($flag=="ingles"){?>|| Actual:<?php echo $dadosidentificacao->descricao; }else{ ?>Atual:<?php echo $dadosidentificacao->descricao; } ?></span></td>
                <td>
                        <select name="identificacao">
                        <?php if ($flag=="ingles"){?><option value=1 >Artist</option><?php }else{ ?><option value=1 >Artista</option>
                        <?php  } ?><?php if ($flag=="ingles"){?><option value=2 >Autor</option><?php }else{ ?><option value=2 >Autor</option>
                        <?php  } ?><?php if ($flag=="ingles"){?><option value=3 >Producer</option><?php }else{ ?><option value=3 >Produtor</option><?php  } ?><br>
                        </select>
                </td>
            </tr>
            <tr class='refe'>
                <td><span><?php if ($flag=="ingles"){?>Bank<?php }else{ ?>Banco<?php  } ?>:</span></td>
                <td><input class="nome" value="<?php echo $dadosfavorecido->banco; ?>" name="banco" type="text"/></td>
            </tr>
            <tr class='refe'>
                <td><span><?php if ($flag=="ingles"){?>Checking account<?php }else{ ?>Conta corrente<?php  } ?>:</span></td>
                <td><input class="nome" value="<?php echo $dadosfavorecido->conta; ?>" name="conta" type="text"/></td>
            </tr>
            <tr class='refe'>
                <td><span><?php if ($flag=="ingles"){?>Bank Branch<?php }else{ ?>Agencia bancaria<?php  } ?>:</span></td>
                <td><input class="nome" value="<?php echo $dadosfavorecido->agencia; ?>" name="agencia" type="text"/></td>
            </tr>
            <tr>    <td></td><td><input class="botoes1" id="botoes3"type="submit" value="Enviar!" /></td></tr>
            </tbody>
    </table>