<?php $this->load->view('_include/header') ?>

	<div class="fadein">
		<div class="circulo"><img src=""></div>

	</div>
	<div >
		<h4><?php echo $this->lang->line('moeda'); ?></h4>
		<?php if (isset($moedas)){?>
			<table >
				<thead>
					<tr>
						<th>   <?php echo $this->lang->line('moeda_nome'); ?>  </th>
						<th>   <?php echo $this->lang->line('moeda_sigla'); ?>    </th>
						<th>   <?php echo $this->lang->line('moeda_cambio'); ?>      </th>
						<th>   <?php echo $this->lang->line('acao'); ?>      </th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($moedas as $moeda){?>
						<tr>
							<td><?php echo $moeda->nome;?></td>
							<td><?php echo $moeda->sigla;?></td>
							<td><?php echo $moeda->taxa_cambio;?></td> 
							<td><a href="#"><?php echo $this->lang->line('deletar'); ?></a>||<a href="#"><?php echo $this->lang->line('editar'); ?></a></td>
						</tr> 
						<?php }?>
				</tbody>
			</table>
		<?php }else{?>
		<span><?php echo $this->lang->line('moeda_erro_listar'); ?></span><br>
		<?php } ?>

	</div>
<?php $this->load->view('_include/footer') ?>