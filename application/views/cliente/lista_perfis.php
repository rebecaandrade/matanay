<?php $this->load->view('_include/header'); ?>

<div id="wrapper-body">
	<div id="titulo_lista">
		<div class="row">
			<div class="input-field col s12 m8 l9">
				<i class="mdi-action-account-child"></i>
				<?php echo $this->lang->line('perfis'); ?>
				<a href="<?php echo base_url().'index.php/cliente/cadastro_perfil/'.$id?>" 
					class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
					data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('novo'); ?>" id="addButton">
					<i class="mdi-content-add"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<table id="myTable" class="hoverable bordered">
			<thead>
				<tr>
					<th><?php echo $this->lang->line('cliente_nome'); ?></th>
					<th><?php echo $this->lang->line('cliente_login'); ?></th>
					<th><?php echo $this->lang->line('acao'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($perfis as $perfil){ ?>
					<tr>
						<td><?php echo $perfil->nome;?></td>
						<td><?php echo $perfil->login;?></td>
						<td>
							<a href=<?php echo base_url().'index.php/cliente/atualiza_perfil_admin/'.$perfil->idCliente.'/'.$perfil->idUsuario;?> ><?php echo $this->lang->line('editar'); ?></a> |
							<a onclick="confirmar('<?php echo $this->lang->line('confirmar_deletar') ?>','<?php echo base_url().'index.php/cliente/excluir_perfil/'.$perfil->idUsuario.'/'.$perfil->idCliente;?>',
								'<?php echo $this->lang->line('sim')?>','<?php echo $this->lang->line('nao')?>')"><?php echo $this->lang->line('deletar'); ?></a>
						</td>
					</tr> 
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<?php $this->load->view('_include/footer') ?>