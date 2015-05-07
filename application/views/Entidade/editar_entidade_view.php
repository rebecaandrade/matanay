<?php $this->load->view('_include/header') ?>
        <div class="circulo"><img src="<?php echo base_url().'complemento/img/entity.png' ?>"></div>
    <div class="dados_entidade">
    <?php echo $this->lang->line('edit_entitys'); ?>
        <?php if (isset($sucesso)){echo $sucesso;}?><br>
        <?php echo form_open('Entidade/atualizar') ?>
            <input type="hidden" name='idEntidade' value="<?php echo $dadosentidade->idEntidade; ?>" />
            <input type="hidden" name='favorecido' value="<?php echo $dadosentidade->favorecido; ?>" />
            <input type="hidden" name='idtelefone1' value="<?php echo $telefone1->idTelefone; ?>" />
            <input type="hidden" name='idtelefone2' value="<?php echo $telefone2->idTelefone; ?>" />
            <table>
                <thead>
                </thead>
                <tbody>
                    <tr class='refe'>
                        <td><span><?php echo $this->lang->line('nome_entidade'); ?></span></td>
                        <td><input class="nome" value="<?php echo $dadosentidade->nome; ?>" name="nome" required type="text"/></td>
                    </tr>
                    <tr class='refe'>
                        <td><span><?php echo $this->lang->line('cpf_cnpj'); ?></span></td>
                        <td><input class="nome" value="<?php echo $dadosentidade->cpf_cnpj; ?>" name="cpf_cnpj" required type="text"/></td>
                    </tr>
                        <tr class='refe'>
                        <td><span><?php echo $this->lang->line('telefone'); ?>:</span></td>
                        <td> <input class="nome" value="<?php echo $telefone1->numero; ?>" name="telefone1" required type="text"/></td>
                    </tr>
                    </tr>
                        <tr class='refe'>
                        <td><span><?php echo $this->lang->line('telefone_alternativo'); ?>:</span></td>
                        <td> <input class="nome" value="<?php echo $telefone2->numero; ?>" name="telefone2" required type="text"/></td>
                    </tr>
                    <tr class='refe'>
                        <td><span><?php echo $this->lang->line('contato'); ?>:</span></td>
                        <td><input class="nome" value="<?php echo $dadosentidade->contato; ?>" name="contato" required type="text"/></td>
                    </tr>
                    <tr class='refe'>
                        <td><span><?php echo $this->lang->line('email'); ?>:</span></td>
                        <td><input class="nome" value="<?php echo $dadosentidade->email; ?>" name="email" required type="text"/></td>
                    </tr>
                    <tr class='refe'>
                        <td><span><?php echo $this->lang->line('percentual_fisico'); ?>:</span></td>
                        <td><input class="nome" value="<?php echo $dadosentidade->percentual_fisico; ?>" name="percentual_fisico" required type="text"/></td>
                    </tr>
                    <tr class='refe'>
                        <td><span><?php echo $this->lang->line('percentual_digital'); ?>:</span></td>
                        <td><input class="nome" value="<?php echo $dadosentidade->percentual_digital; ?>" name="percentual_digital" required type="text"/></td>
                    </tr>
                    <tr class='refe'>
                        <td><span><?php echo $this->lang->line('identificacao'); ?>|| <?php echo $this->lang->line('atual'); ?>:<?php echo $this->lang->line($dadosidentificacao->descricao);  ?></span></td>
                        <td>
                                <select required name="identificacao">
                                <option value="" disabled selected> ------- <?php echo $this->lang->line('selecione');?> ------- </option>
                                <option value=1 ><?php echo $this->lang->line('artista'); ?></option>
                                <option value=2 ><?php echo $this->lang->line('autor'); ?></option>
                                <option value=3 ><?php echo $this->lang->line('produtor'); ?></option><br>
                                </select>
                        </td>
                    </tr>
                    <tr class='refe'>
                        <td><span><?php echo $this->lang->line('banco'); ?>:</span></td>
                        <td><input class="nome" value="<?php echo $dadosfavorecido->banco; ?>" name="banco" required type="text"/></td>
                    </tr>
                    <tr class='refe'>
                        <td><span><?php echo $this->lang->line('conta'); ?>:</span></td>
                        <td><input class="nome" value="<?php echo $dadosfavorecido->conta; ?>" name="conta" required type="text"/></td>
                    </tr>
                    <tr class='refe'>
                        <td><span><?php echo $this->lang->line('agencia'); ?>:</span></td>
                        <td><input class="nome" value="<?php echo $dadosfavorecido->agencia; ?>" name="agencia" required type="text"/></td>
                    </tr>
                    <tr>    <td></td><td><input class="botoes1" id="botoes3"required type="submit" value="<?php echo $this->lang->line('editar'); ?>!" /></td></tr>
                    </tbody>
            </table>
    </div>
    <?php $this->load->view('_include/footer') ?>
