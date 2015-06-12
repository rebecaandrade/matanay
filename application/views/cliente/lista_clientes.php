<?php $this->load->view('_include/header'); ?>
<div class="container">
	<div id="titulo_lista">
		<div class="row">
			<div class="input-field col s12 m8 l9">
				<i class="mdi-action-account-box"></i>
				<?php echo $this->lang->line('clientes'); ?>
				<a href="<?php echo base_url().'index.php/cliente/cadastro_cliente' ?>" 
					class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
					data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('novo'); ?>" id="addButton">
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
				<?php foreach($clientes as $cliente){ ?>
					<tr>
						<td><?php echo $cliente->nome;?></td>
						<td>
							<a href="<?php echo base_url().'index.php/cliente/lista_perfis/'.$cliente->idCliente;?>" class="btn-floating waves-effect waves-light tooltipped" 
								data-position="top" data-delay="50" data-tooltip="<?php echo $this->lang->line('perfis'); ?>"><i class="small mdi-action-account-child"></i></a>
							<a href="<?php echo base_url().'index.php/cliente/atualiza_cliente/'.$cliente->idCliente;?>" class="btn-floating waves-effect waves-light tooltipped" 
								data-position="top" data-delay="50" data-tooltip="<?php echo $this->lang->line('editar'); ?>"><i class="small mdi-content-create"></i></a>
							<a onclick="confirmar('<?php echo $this->lang->line('confirmar_deletar') ?>','<?php echo base_url().'index.php/cliente/excluir_cliente/'.$cliente->idCliente;?>','<?php echo $this->lang->line('sim')?>','<?php echo $this->lang->line('nao')?>')"
								class="btn-floating waves-effect waves-light tooltipped" 
								data-position="top" data-delay="50" data-tooltip="<?php echo $this->lang->line('deletar'); ?>"><i class="small mdi-action-highlight-remove"></i></a>
						</td>
					</tr> 
				<?php } ?>
			</tbody>
		<?php }else{ ?>
			<span><?php echo $this->lang->line('cliente_erro_listar'); ?></span><br>
		<?php } ?>
</div>
<?php $this->load->view('_include/footer') ?>