<?php $this->load->view('_include/header'); ?>
<div class="container">
	<div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
          		<?php echo $this->lang->line('perfis'); ?>
          		<a href="<?php echo base_url().'index.php/cliente/cadastro_perfil/'.$id?>" 
          			class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
        			data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('novo');; ?>" id="addButton">
        			<i class="mdi-content-add"></i>
        		</a>
            </div>
        </div>
  	</div></br>
		<?php if(!empty($perfis)){ ?>
			 <table class="hoverable bordered">
            <thead>
                <tr>
                    <th>   <?php echo $this->lang->line('cliente_nome'); ?>  </th>
					<th>   <?php echo $this->lang->line('cliente_login'); ?>    </th>
					<th>   <?php echo $this->lang->line('acao'); ?>      </th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach($perfis as $perfil){ ?>
						<tr>
							<td><?php echo $perfil->nome;?></td>
							<td><?php echo $perfil->login;?></td>
							<td><a href=<?php echo base_url().'index.php/cliente/excluir_perfil/'.$perfil->idPerfis;?>><?php echo $this->lang->line('deletar'); ?></a>||<a href="#"><?php echo $this->lang->line('editar'); ?></a></td>
						</tr> 
					<?php } ?>                
            </tbody>
		<?php }else{ ?>
			<span><?php echo $this->lang->line('cliente_erro_listar'); ?></span><br>
		<?php } ?>
</div>
<?php $this->load->view('_include/footer') ?>