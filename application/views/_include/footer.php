<div id="footer"></div>
		<?php if ($this->session->userdata('mensagem')) {?>
			<script>
				var titulo = <?php echo json_encode($this->session->userdata('mensagem'));?> ;
				var subtitulo = <?php echo json_encode($this->session->userdata('subtitulo_mensagem')); ?>;
				var tipo = <?php echo json_encode($this->session->userdata('tipo_mensagem'));?>;
				swal({
					title : titulo,
					text: subtitulo,
					type: tipo
				});
			</script>
		<?php 
			$this->session->unset_userdata('mensagem');
			$this->session->unset_userdata('subtitulo_mensagem');
			$this->session->unset_userdata('tipo_mensagem');
		} ?>
	</body>
</html>