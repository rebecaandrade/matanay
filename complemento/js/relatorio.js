$(document).ready(function () {
    //opcoes relatorio view
    $('#relLojas').chosen();
    $('#relFaixa').chosen();
    $('#relAlbum').chosen();
    $('#relProdutor').chosen();
    $('#relAutor').chosen();
    $('#relArtista').chosen();
    $('#relTerritorio').chosen();
    $('#relSubLojas').chosen();
    $('#relIsrc').chosen();
    $('#relUpc').chosen();
    $('#relCatalogo').chosen();
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
    $('input[name=apuracao]').mask("00/0000");
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
        var apuracao = $('input[name=apuracao]').val().split('/');
        var currentYear = new String(new Date().getFullYear());
        if (apuracao[0] > 13 || apuracao[0] < 1 || 1960 > apuracao[1] || currentYear < apuracao[0]) {
            mensagem += "*" + $('input[name=apuracaoMessegeDisplay]').val() + "\n";
        }
        if (mensagem.length > 3) {
            swal(mensagem, "", "error");
            return false;
        }
        return true;
    });
});

$.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
    for (var i = 0; i < $('select[name^="lojas"]').length; i++) {
        var lojas = ($("select[name^='lojas']")[i]).value;
        if (lojas == -1) {
            return true;
        }
        if((lojas == oSettings.aoData[iDataIndex]._aData[2])){
            return true;
        }
    }
    return false;
});

$.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
    for (var i = 0; i < $('select[name^="sub-lojas"]').length; i++) {
        var subLojas = ($("select[name^='sub-lojas']")[i]).value;
        if (subLojas == -1) {
            return true;
        }
        if((subLojas == oSettings.aoData[iDataIndex]._aData[3])){
            return true;
        }
    }
    return false;
});

$.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
    for (var i = 0; i < $('select[name^="territorios"]').length; i++) {
        var territorios = ($("select[name^='territorios']")[i]).value;
        if (territorios == -1) {
            return true;
        }
        if((territorios == oSettings.aoData[iDataIndex]._aData[4])){
            return true;
        }
    }
    return false;
});

$.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
    for (var i = 0; i < $('select[name^="artistas"]').length; i++) {
        var artistas = ($("select[name^='artistas']")[i]).value;
        if (artistas == -1) {
            return true;
        }
        if((artistas == oSettings.aoData[iDataIndex]._aData[5])){
            return true;
        }
    }
    return false;
});

// $.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
//     for (var i = 0; i < $('select[name^="editoras"]').length; i++) {
//         var editoras = ($("select[name^='editoras']")[i]).value;
//         if (editoras == -1) {
//             return true;
//         }
//         if((editoras == oSettings.aoData[iDataIndex]._aData[3])){
//             return true;
//         }
//     }
//     return false;
// });

$.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
    for (var i = 0; i < $('select[name^="produtors"]').length; i++) {
        var produtors = ($("select[name^='produtors']")[i]).value;
        if (produtors == -1) {
            return true;
        }
        if((produtors == oSettings.aoData[iDataIndex]._aData[7])){
            return true;
        }
    }
    return false;
});

$.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
    for (var i = 0; i < $('select[name^="isrcs"]').length; i++) {
        var isrcs = ($("select[name^='isrcs']")[i]).value;
        if (isrcs == -1) {
            return true;
        }
        if((isrcs == oSettings.aoData[iDataIndex]._aData[11])){
            return true;
        }
    }
    return false;
});

$.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
    for (var i = 0; i < $('select[name^="upcs"]').length; i++) {
        var upcs = ($("select[name^='upcs']")[i]).value;
        if (upcs == -1) {
            return true;
        }
        if((upcs == oSettings.aoData[iDataIndex]._aData[12])){
            return true;
        }
    }
    return false;
});

// $.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
//     for (var i = 0; i < $('select[name^="albums"]').length; i++) {
//         var albums = ($("select[name^='albums']")[i]).value;
//         if (albums == -1) {
//             return true;
//         }
//         if((albums == oSettings.aoData[iDataIndex]._aData[3])){
//             return true;
//         }
//     }
//     return false;
// });

$.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
    for (var i = 0; i < $('select[name^="faixass"]').length; i++) {
        var faixas = ($("select[name^='faixass']")[i]).value;
        if (faixas == -1) {
            return true;
        }
        if((faixas == oSettings.aoData[iDataIndex]._aData[8])){
            return true;
        }
    }
    return false;
});

$.fn.dataTableExt.afnFiltering.push(function (oSettings, aData, iDataIndex) {
    for (var i = 0; i < $('select[name^="catalogos"]').length; i++) {
        var catalogos = ($("select[name^='catalogos']")[i]).value;
        if (catalogos == -1) {
            return true;
        }
        if((catalogos == oSettings.aoData[iDataIndex]._aData[10])){
            return true;
        }
    }
    return false;
});

 
$(document).ready(function() {
    var table = $('#myTable').DataTable();
          
    $('#datainicio, #datafim, #tipoRelatorioFisico, #tipoRelatorioDigital, .myLojas, .mySubLojas, .myTerritorios, .myArtista, .myEditora, .myProdutor, .myISRC, .myUPC, .myAlbum, .myFaixa, .myCatalogo').change( function() {
        table.draw();
    } );
} );
$(document).ready(function() {
    var table = $('#usTable').DataTable();
     
    $('#datainicio, #datafim, #tipoRelatorioFisico, #tipoRelatorioDigital, .myLojas, .mySubLojas, .myTerritorios, .myArtista, .myEditora, .myProdutor, .myISRC, .myUPC, .myAlbum, .myFaixa, .myCatalogo').change( function() {
        table.draw();
    } );
} );

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = Date.parse($('#datainicio').val());
        var max = Date.parse($('#datafim').val());
        var dateAr =  ('01/'+data[0]).split('/');
        var newDate = dateAr[1] + '-' + dateAr[0] + '-' + dateAr[2];
        var date = new Date(newDate);
        date = Date.parse(date);
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && date <= max ) ||
             ( min <= date   && isNaN( max ) ) ||
             ( min <= date   && date <= max ) )
        {

            return true;
        }
        return false;
    }
);