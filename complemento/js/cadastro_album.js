/**
 * Created by Uriel on 29/08/2015.
 */

$(document).ready(function () {
    $('#btnSalvarFaixa').on('click', function () {

        //var divEditar = $('.popUp');f

        var url = $('#baseUrl').val() + 'index.php/faixas_videos/cadastrar_faixa_ajax';
        $.ajax({
            url: url,
            type: 'POST',
            data: montarDadosFaixa(),
            success: function (data) {
                var json = $.parseJSON(data);
                var row = "<tr> <td>"+json.nome+"</td></td>";
                if($('#tableFaixas tbody').children().length  == 0) {
                    $('#tableFaixas tbody').html(row);
                } else {
                    console.log("oieoie");
                    $('#tableFaixas tbody tr:last').after(row);
                }
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

