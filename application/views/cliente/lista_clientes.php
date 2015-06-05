<?php $this->load->view('_include/header'); ?>
<div class="container">
	<div id="titulo_lista">
        <div class="row">
            <div class="input-field col s12 m8 l9">
          		<?php echo $this->lang->line('perfis'); ?>
          		<a href="<?php echo base_url().'index.php/cliente/cadastro_cliente' ?>" 
          			class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
        			data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('novo');; ?>" id="addButton">
        			<i class="mdi-content-add"></i>
        		</a>
            </div>
        </div>
  	</div></br>
		<?php if(!empty($clientes)){ ?>
			 <table class="hoverable bordered">
            <thead>
                <tr>
                    <th>   <?php echo $this->lang->line('cliente_nome'); ?>  </th>
					<th>   <?php echo $this->lang->line('acao'); ?>      </th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach($clientes as $cliente){ ?>
						<tr>
							<td><?php echo $cliente->nome;?></td>
							<td><a href="<?php echo base_url().'index.php/cliente/excluir_cliente/'.$cliente->idCliente;?>"><?php echo $this->lang->line('deletar'); ?></a>||<a href="<?php echo base_url().'index.php/cliente/lista_perfis/'.$cliente->idCliente;?>"><?php echo $this->lang->line('perfis'); ?></a></td>
						</tr> 
					<?php } ?>                
            </tbody>
		<?php }else{ ?>
			<span><?php echo $this->lang->line('cliente_erro_listar'); ?></span><br>
		<?php } ?>
</div>
<?php $this->load->view('_include/footer') ?>