$(document).ready(function () {
    $('#relLojas').chosen();
    $('#relSubLojas').chosen();
    $('#relTerritorio').chosen();
    $('#relArtista').chosen();
    $('#relAutor').chosen();
    $('#relProdutor').chosen();
    $('#relAlbum').chosen();
    $('#relFaixa').chosen();
    $('#relOpt').on("submit", function () {
        var mensagem = "";
        var dataInicio = ($('input[name=datainicio]').val());
        var dataFim = ($('input[name=datafim]').val());
        if (dataInicio.length < 1 || dataFim.length < 1) {
            mensagem += "*" + $('input[name=invalidDatesMessegeDisplay]').val() + "\n";
        }
        else if (new Date(dataInicio) > new Date(dataFim)) {
            mensagem += "*" + $('input[name=startDateIsGreaterMessegeDisplay]').val() + "\n";
        }
        var tipoRel = [];
        $(".myTypeRel :checked").each(function(){
            tipoRel.push($(this).val());
        });
        if(tipoRel.length < 1){
            mensagem+="*"+$('input[name=typeReportMessegeDisplay]').val()+"\n";
        }
        if (mensagem.length > 3) {
            swal(mensagem, "", "error");
            return false;
        }
        else return true;
    });
});