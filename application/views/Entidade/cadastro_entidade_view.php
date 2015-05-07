<?php $this->load->view('_include/header') ?>
        <div class="circulo"><img src="<?php echo base_url().'complemento/img/entity.png' ?>"></div>
    <?php $teste=0;echo $this->lang->line('entitys'); ?>
    <div class="dados_entidade">

        <?php echo form_open('/ENTIDADE/cadastrar')?>
            <?php if (isset($variavel)){echo $variavel;}?><br>
            <table>
                <tr>
                    <td><span><?php echo $this->lang->line('nome_entidade'); ?>: </span></td>
                    <td><input class="nome" required type="text" value="" name="nomeentidade" ><br></td>
                </tr>
                <tr>
                    <td><span>CPF<input class="nome" required type="radio" value="cpf" name="cpf/cnpj" >CNPJ<input class="nome" required type="radio" value="cpnj" name="cpf/cnpj" >:  </span></td>
                    <td><input class="nome" required type="text" value="" name="cpf_cnpj" ><br>    </td>
                </tr>
                <tr>
                    <td><span><?php echo $this->lang->line('telefone'); ?>: </span></td>
                    <td><input class="nome" required type="text" value="" name="telefone1" ><br></td>
                </tr> 
                <tr>
                    <td><span><?php echo $this->lang->line('telefone_alternativo'); ?>: </span></td>
                    <td><input class="nome" required type="text" value="" name="telefone2" ><br></td>
                </tr>
                <tr>
                    <td><span><?php echo $this->lang->line('contato'); ?>: </span></td>
                    <td><input class="nome" required type="text" value="" name="contato" ><br></td>
                </tr>
                <tr>
                    <td><span><?php echo $this->lang->line('email'); ?>: </span></td>
                    <td><input class="nome" required type="text" value="" name="email" ><br></td>
                </tr>
                <tr>
                    <td><span><?php echo $this->lang->line('percentual_fisico'); ?>: </span></td>
                    <td><input class="nome" required type="text" value="" name="porcentagemganhofisico" ><br></td>
                </tr>
                <tr>
                    <td><span><?php echo $this->lang->line('percentual_digital'); ?>: </span></td>
                    <td><input class="nome" required type="text" value="" name="porcentagemganhodigital" ><br></td>
                </tr>
                <tr>
                    <td><span><?php echo $this->lang->line('eh_favorecido'); ?> </span></td>
                    <td><?php echo $this->lang->line('sim'); ?><input class="nome" required type="radio" value="1" name="favorecido" ><?php echo $this->lang->line('nao'); ?><input class="nome" required type="radio" value="0" name="favorecido" ><br></td>
                </tr>
                <tr>
                    <td><span><?php echo $this->lang->line('identificacao'); ?>: </span></td>
                    <td>
                        <select name="identificacao" required>
                                    <option value="" disabled selected> ------- <?php echo $this->lang->line('selecione');?> ------- </option>
                        <option value=1 ><?php echo $this->lang->line('artista'); ?></option>
                        <option value=2 ><?php echo $this->lang->line('autor'); ?></option>
                        <option value=3 ><?php echo $this->lang->line('produtor'); ?></option><br>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><span><?php echo $this->lang->line('banco'); ?>: </span></td>
                    <td><input class="nome" required type="text" value="" name="banco" ><br></td>
                </tr>
                <tr>
                    <td><span><?php echo $this->lang->line('conta'); ?>: </span></td>
                    <td><input class="nome" required type="text" value="" name="contacorrente" ><br></td>
                </tr>
                <tr>
                    <td><span><?php echo $this->lang->line('agencia'); ?>: </span></td>
                    <td><input class="nome" required type="text" value="" name="agencia" ><br></td>
                </tr>
                <?php if (($dadofavorecido!=null)&&($dadoentidade!=null)){?><tr>
                    <td><span><?php echo $this->lang->line('favorecido_cadastrado'); ?>: </span></td>
                    <td>
                        <select name="favorecidorelacionado" >
                        <option value="" disabled selected> ------- <?php echo $this->lang->line('selecione');?> ------- </option>
                        <?php foreach ($dadoentidade as $row){//verifica se a entidade ja foi cadastrada como favorecido
                            
                            foreach($dadofavorecido as $row1){
                                if (($row->idEntidade)==($row1->Entidade_idEntidade)){  ?>
                                    <option value= _<?php echo $row->idEntidade;?>><?php echo $row->nome;?></option>
                        <?php }}}} ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td ></td>
                    <td colspan="2"><input  class="botoes1" required type="submit" value="<?php echo $this->lang->line('cadastrar'); ?>"><br></td>
                </tr>
            </table>
        <?php form_close() ?>
    </div>
</div>

    <?php $this->load->view('_include/footer') ?>
