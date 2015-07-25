$(document).ready(function () {
    //opcoes relatorio view
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
        $(".myTypeRel :checked").each(function () {
            tipoRel.push($(this).val());
        });
        if (tipoRel.length < 1) {
            mensagem += "*" + $('input[name=typeReportMessegeDisplay]').val() + "\n";
        }
        if (mensagem.length > 3) {
            swal(mensagem, "", "error");
            return false;
        }
        else return true;
    });
});
$(document).ready(function () {
    //importa relatorio view
    $('#relModel').chosen();
    $('#activeExcelFile').on("click", function () {
        $('input[name=excelFile]').click();
    });
    $('#formRelImport').on("submit", function () {
        var mensagem = "";
        var tipoModelo = $('#relModel').val();
        var myFile = $('input[name=excelFile]').val();

        if (tipoModelo == -1) {
            mensagem += "*" + $('input[name=modelMessegeDisplay]').val() + "\n";
        }
        if (myFile.length < 2) {
            mensagem += "*" + $('input[name=fileMessegeDisplay]').val() + "\n";
        }
        if (mensagem.length > 3) {
            swal(mensagem, "", "error");
            return false;
        }
        return true;
    });
});