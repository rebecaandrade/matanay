<?php $this->load->view('_include/header'); ?>

<div id="wrapper-body">
	<div id="titulo_lista">
		<div class="row">
			<div class="input-field col s12 m8 l9">
				<i class="mdi-action-assignment"></i>
				<?php echo $this->lang->line('modelos'); ?>
				<a href="<?php echo base_url().'index.php/modelo_relatorio/cadastro_modelo' ?>" 
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
					<th><?php echo $this->lang->line('nome'); ?></th>
					<th><?php echo $this->lang->line('tipo'); ?></th>
					<th><?php echo $this->lang->line('acao'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($modelos as $modelo){ ?>
					<tr>
						<td><?php echo $modelo->nome;?></td>
						<td><?php echo $modelo->descricao;?></td>
						<td>
							<a href="<?php echo base_url().'index.php/modelo_relatorio/edita_modelo?param='.$modelo->idModelo ?>"><?php echo $this->lang->line('editar'); ?></a> |
							<a onclick="confirmar('<?php echo $this->lang->line('confirmar_deletar') ?>','<?php echo base_url().'index.php/modelo_relatorio/deletar_modelo?param='.$modelo->idModelo ?>','<?php echo $this->lang->line('sim')?>','<?php echo $this->lang->line('nao')?>')"><?php echo $this->lang->line('deletar'); ?></a>
						</td>
					</tr> 
					<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<?php $this->load->view('_include/footer') ?>