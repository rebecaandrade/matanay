/**
 * Created by Uriel on 29/08/2015.
 */

$(document).ready(function () {
	$('#btnSalvarFaixa').on('click', function () {

		var url = $('#baseUrl').val() + 'index.php/faixas_videos/cadastrar_faixa_ajax';
		$.ajax({
			url: url,
			type: 'POST',
			data: montarDadosFaixa(),
			async: false,
			success: function (data) {
				var json = $.parseJSON(data);
			
				$('#modal1').closeModal();
				limparDadosModal();
			}
		});
	});

	function montarDadosFaixa() {
		var dados = {};
		dados.nome = $('#tituloFaixa').val();
		dados.isrc = $('#isrcFaixa').val();
		dados.youtube = $('#youtubeFaixa').val();
		dados.artistas = [];
		$('.selectArtista').each(function () {
			dados.artistas.push($(this).val());
		});
		dados.percentualArtista = [];
		$('.porcentagemArtista').each(function () {
			dados.percentualArtista.push($(this).val());
		});
		dados.autors = [];
		$('.selectAutor').each(function () {
			dados.autors.push($(this).val());
		});
		dados.percentualAutor = [];
		$('.porcentagemAutor').each(function () {
			dados.percentualAutor.push($(this).val());
		});
		dados.produtors = [];
		$('.selectProdutor').each(function () {
			dados.produtors.push($(this).val());
		});
		dados.percentualProdutor = [];
		$('.porcentagemProdutor').each(function () {
			dados.percentualProdutor.push($(this).val());
		});
		dados.impostos_faixa = [];
		$('.impostoFaixa:checked').each(function () {
			dados.impostos_faixa.push($(this).val());
		});

		return dados;
	}

	function limparDadosModal() {
		$('#formFaixa')[0].reset();
		$('.selectArtista').material_select();
	}
});