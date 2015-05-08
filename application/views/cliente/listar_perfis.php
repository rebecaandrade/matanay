<?php $this->load->view('_include/header'); ?>

	<div class="fadein">
		<div class="circulo"><img src="<?php echo base_url().'complemento/img/entity.png' ?>"></div>

	</div>
	<div >
		<h4><?php echo $this->lang->line('perfis'); ?></h4>
		<?php if(!empty($perfis)){ ?>
			<table >
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
							<td><a href="#"><?php echo $this->lang->line('deletar'); ?></a>||<a href="#"><?php echo $this->lang->line('editar'); ?></a></td>
						</tr> 
					<?php } ?>
				</tbody>
			</table>
		<?php }else{ ?>
			<span><?php echo $this->lang->line('cliente_erro_listar'); ?></span><br>
		<?php } ?>
		<a href="<?php echo base_url().'index.php/cliente/cadastrar_perfil' ?>"><?php echo $this->lang->line('novo'); ?></a>
	</div>
<?php $this->load->view('_include/footer') ?>