<?php $this->load->view('_include/header'); ?>
<div class="container">	
	<div id="titulo_lista">
		<div class="row">
			<div class="input-field col s12 m8 l9">
				<i class="mdi-editor-attach-money"></i>
				<?php echo $this->lang->line('moeda'); ?>
				<a href="<?php echo base_url().'index.php/moeda/cadastrar' ?>" 
					class="btn-floating btn-medium waves-effect waves-light btn tooltipped novo" 
					data-position="right" data-delay="50" data-tooltip="<?php echo $this->lang->line('novo'); ?>" id="addButton">
					<i class="mdi-content-add"></i>
				</a>
			</div>
		</div>
	</div></br>
		<?php if(isset($moedas)){ ?>
			<table>
				<thead>
					<tr>
						<th>   <?php echo $this->lang->line('moeda_nome'); ?>  </th>
						<th>   <?php echo $this->lang->line('moeda_sigla'); ?>    </th>
						<th>   <?php echo $this->lang->line('moeda_cambio'); ?>      </th>
						<th>   <?php echo $this->lang->line('acao'); ?>      </th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($moedas as $moeda){ ?>
						<tr>
							<td><?php echo $moeda->nome;?></td>
							<td><?php echo $moeda->sigla;?></td>
							<td><?php echo $moeda->taxa_cambio;?></td> 
							<td>
								<a href="<?php echo base_url().'index.php/moeda/editar?param='.$moeda->idMoeda ?>" class="btn-floating waves-effect waves-light tooltipped"
									data-position="top" data-delay="50" data-tooltip="<?php echo $this->lang->line('editar'); ?>"><i class="small mdi-content-create"></i></a>
								<a onclick="confirmar('<?php echo $this->lang->line('confirmar_deletar') ?>','<?php echo base_url().'index.php/moeda/deletar?param='.$moeda->idMoeda ?>','<?php echo $this->lang->line('sim')?>','<?php echo $this->lang->line('nao')?>')" class="btn-floating waves-effect waves-light tooltipped"
									data-position="top" data-delay="50" data-tooltip="<?php echo $this->lang->line('deletar'); ?>"><i class="small mdi-action-highlight-remove"></i></a>
							</td>
						</tr> 
						<?php } ?>
				</tbody>
			</table>
		<?php }else{ ?>
			<span><?php echo $this->lang->line('moeda_erro_listar'); ?></span><br>
		<?php } ?>
	
</div>
<?php $this->load->view('_include/footer') ?>