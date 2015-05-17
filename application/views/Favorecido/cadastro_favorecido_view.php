<?php /*FEITO POR MIM, JADIEL*/

$this->load->view('_include/header') ?>
    
    
    <!--<div class="aviso_entidade"><?php if($this->session->flashdata('sucesso')!=null){echo $this->session->flashdata('sucesso');} ?></div class="row">-->
    <div class="container">
        
        <div class="row">
            <?php echo form_open('/Favorecido/cadastrar')?>
                <?php if (isset($variavel)){echo $variavel;}?><br>
                <div class="row">
                    <div class="aviso_entidade"><?php if($this->session->flashdata('sucesso')!=null){echo $this->lang->line($this->session->flashdata('sucesso'));} ?></div>
                    <div class="aviso_entidade"><?php if($this->session->flashdata('aviso')!=null){echo $this->lang->line($this->session->flashdata('aviso'));} ?></div>
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <i class="mdi-action-assignment-ind prefix"></i>
                        <input  id="icon-prefix" required type="text" value="" name="nomeentidade" ><br>
                        <label><?php echo $this->lang->line('nome_entidade'); ?></label>
                    </div>
                </div>
                <div class="row"><!--a paradinha de dizer se eh CPF ou CNPJ-->
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <label>CPF/CNPJ</label>
                        <input class="nome" required type="text" value="" name="cpf_cnpj" ><br>    
                     </div>
                     <div class="switch col s6 offset-s6 m3 l2">
                        <p>
                          <input  type="radio" value="cpf" name="cpf/cnpj" id="test1" />
                          <label for="test1">CPF</label>

                          <input  type="radio" value="cpnj" name="cpf/cnpj" id="test2" />
                          <label for="test2">CNPJ</label>
                        </p>
                    </div>
                        
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <label><?php echo $this->lang->line('telefone'); ?></label>
                        <input class="nome" required type="text" value="" name="telefone1" ><br>
                    </div> 
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <label><?php echo $this->lang->line('telefone_alternativo'); ?></label>
                        <input class="nome" required type="text" value="" name="telefone2" ><br>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <label><?php echo $this->lang->line('contato'); ?></label>
                        <input class="nome" required type="text" value="" name="contato" ><br>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <label><?php echo $this->lang->line('email'); ?></label>
                        <input class="nome" required type="text" value="" name="email" ><br>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <label><?php echo $this->lang->line('percentual_fisico'); ?></label>
                        <input class="nome" required type="text" value="" name="porcentagemganhofisico" ><br>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <label><?php echo $this->lang->line('percentual_digital'); ?></label>
                        <input class="nome" required type="text" value="" name="porcentagemganhodigital" ><br>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                        <select name="identificacao" >
                            <option value="" disabled selected><?php echo $this->lang->line('selecione');?></option>
                            <option value=1 ><?php echo $this->lang->line('artista'); ?></option>
                            <option value=2 ><?php echo $this->lang->line('autor'); ?></option>
                            <option value=3 ><?php echo $this->lang->line('produtor'); ?></option><br>
                        </select>
                        <label><?php echo $this->lang->line('identificacao'); ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                    <label><?php echo $this->lang->line('banco'); ?></label>
                    <input class="nome" required type="text" value="" name="banco" ><br>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                    <label><?php echo $this->lang->line('conta'); ?></label>
                    <input class="nome" required type="text" value="" name="contacorrente" ><br>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l8 offset-l2">
                    <label><?php echo $this->lang->line('agencia'); ?></label>
                    <input class="nome" required type="text" value="" name="agencia" ><br>
                    </div>
                </div>
                <button class="btn waves-effect waves-light col s12 m12 l8 offset-l2" type="submit"><?php echo $this->lang->line('cadastrar'); ?>
                <i class="mdi-content-send right"></i>
                </button> 
            <?php form_close() ?>
        </div>
    </div>
</div>

    <?php $this->load->view('_include/footer') ?>
