<?php $this->load->view('_include/header'); ?>

<div id="wrapper-body">
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
				<a href="<?php echo base_url(); ?>index.php/cliente/home"
                    class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
                    data-position="top" data-delay="50" data-tooltip="<?php echo $this->lang->line('voltar'); ?>" id="backButton">
                    <i class="mdi-hardware-keyboard-arrow-left"></i>
                </a>
			</div>
		</div>
	</div>
	<div class="row">
		<table id="myTable" class="hoverable bordered">
			<thead>
				<tr>
					<th><?php echo $this->lang->line('cliente_nome'); ?></th>
					<th><?php echo $this->lang->line('status'); ?></th>
					<th><?php echo $this->lang->line('acao'); ?></th>
				</tr>
			</thead>
				<?php foreach($clientes as $cliente){ ?>
					<tr>
						<td><?php echo $cliente->nome;?></td>
						<td>
							<?php if($cliente->bloqueado){
								echo $this->lang->line('bloqueado');
							}else
								echo $this->lang->line('desbloqueado');
							?>
						</td>
						<td>
							<a href="<?php echo base_url().'index.php/cliente/lista_perfis/'.$cliente->idCliente;?>"><?php echo $this->lang->line('perfis_row'); ?></a> |
							<a href="<?php echo base_url().'index.php/cliente/atualiza_cliente/'.$cliente->idCliente;?>"><?php echo $this->lang->line('editar'); ?></a> |
							<a onclick="excluirCliente('<?= base_url() . 'index.php/cliente/excluir_cliente/' . $cliente->idCliente ?>','<?=$this->lang->line('langOpt')?>')"><?php echo $this->lang->line('deletar'); ?></a> | 
							<?php if($cliente->bloqueado){?>
								<a onclick="desbloquearCliente('<?= base_url() . 'index.php/cliente/desbloquear_cliente/' . $cliente->idCliente ?>','<?=$this->lang->line('langOpt')?>')"><?php echo $this->lang->line('desbloquear'); ?></a>
							<?php }else{ ?>
								<a onclick="bloquearCliente('<?= base_url() . 'index.php/cliente/bloquear_cliente/' . $cliente->idCliente ?>','<?=$this->lang->line('langOpt')?>')"><?php echo $this->lang->line('bloquear'); ?></a>
							<?php } ?>

						</td>
					</tr> 
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php $this->load->view('_include/footer') ?>