<?php $this->load->view('_include/header') ?>

	<div class="circulo"><img src="<?php echo base_url().'complemento/img/faixa.png' ?>"></div>

	<div id="dados">
	<?php echo form_open('faixas_videos/cadastrar_faixa') ?>
			<label><?php echo $this->lang->line('titulo'); ?> <input type='text' name='nome'></label>
			<label>ISRC <input type='text' name='isrc'></label></br>

			<label><?php echo $this->lang->line('video'); ?>     
                    <?php echo $this->lang->line('sim'); ?> <input required type="radio" value="1" name="video" >
                    <?php echo $this->lang->line('nao'); ?> <input required type="radio" value="0" name="video" >
            </label><br><br>

		<div class="container-faixa">
			<label class="entidade-faixa"><?php echo $this->lang->line('artista'); ?> <select name='artista'>
                <?php
                if(isset($artistas)){
                    foreach ($artistas as $artista) { ?>
                    	<option value="" disabled selected> ------- Selecione ------- </option>
                        <option value="<?php echo $artista->idEntidade; ?>"> <?php echo $artista->nome; ?>
                <?php }}?>
            </select></label>
            <label class='percentual'><input type='text' name='percentual_artista'> %</label>
        </div>
        <div class="container-faixa">	
            <label class="entidade-faixa"><?php echo $this->lang->line('compositor'); ?> <select name='autor'>
                <?php
                if(isset($autores)){
                    foreach ($autores as $autor) { ?>
                    	<option value="" disabled selected> ------- Selecione ------- </option>
                        <option value="<?php echo $autor->idEntidade; ?>"> <?php echo $autor->nome; ?>
                <?php }}?>
            </select></label>
            <label class='percentual'><input type='text' name='percentual_autor'> %</label>
        </div>
        <div class="container-faixa">	
            <label class="entidade-faixa"><?php echo $this->lang->line('produtor'); ?> <select name='produtor'>
                <?php
                if(isset($produtores)){
                    foreach ($produtores as $produtor) { ?>
                    	<option value="" disabled selected> ------- Selecione ------- </option>
                        <option value="<?php echo $produtor->idEntidade; ?>"> <?php echo $produtor->nome; ?>
                <?php }}?>
            </select></label>
            <label class='percentual'><input type='text' name='percentual_produtor'> %</label>
        </div>

			<input type='submit' value='<?php echo $this->lang->line('cadastrar'); ?>'>
	<?php echo form_close() ?>
	</div>

<?php $this->load->view('_include/footer') ?>