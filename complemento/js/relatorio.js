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
    $('#select').chosen();
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

$.fn.dataTableExt.afnFiltering.push(function (oSettings, aoData, iDataIndex) {
    var valido = true;
    var validoFlag = false;
    var validoFlagExcluir = false;

    //oSettings.aoData[iDataIndex]._aData[0] -> DATA
    var min = Date.parse($('#datainicio').val());
    var max = Date.parse($('#datafim').val());
    var dateAr =  ('01/'+aoData[0]).split('/');
    var newDate = dateAr[1] + '-' + dateAr[0] + '-' + dateAr[2];
    var date = new Date(newDate);
    date = Date.parse(date);
    if ( !(( isNaN( min ) && isNaN( max ) ) ||
         ( isNaN( min ) && date <= max ) ||
         ( min <= date   && isNaN( max ) ) ||
         ( min <= date   && date <= max )) ) {

        valido = false;
    }
    //oSettings.aoData[iDataIndex]._aData[1] -> TIPO
    //Feito na View por motivos de PHP
    
    //oSettings.aoData[iDataIndex]._aData[2] -> LOJA
    var lojasFiltros = {};
    $("select[name^='lojas']").map(function(i, opt) {
        lojasFiltros[opt.value] = $("select[name^='lojaSelect']")[i].value;
    });

    $.each(lojasFiltros , function( key, type ) {
        if(type == "Incluir"){
            if(oSettings.aoData[iDataIndex]._aData[2] == key || key == '-1'){
                validoFlag = validoFlag || true;
            }
        }
        else if(type == "Excluir"){
            if(oSettings.aoData[iDataIndex]._aData[2] == key){
                validoFlagExcluir = validoFlagExcluir || true;
            }
        }
    });

    if(!validoFlag)
        valido = false;
    if(validoFlagExcluir)
        valido = false;
    validoFlag = false;

    //oSettings.aoData[iDataIndex]._aData[3] -> SUB-LOJA
    var subLojasFiltros = {};
    $("select[name^='sub-lojas']").map(function(i, opt) {
        subLojasFiltros[opt.value] = $("select[name^='sub-lojaSelect']")[i].value;
    })

    $.each(subLojasFiltros , function( key, type ) {
        if(type == "Incluir"){
            if(oSettings.aoData[iDataIndex]._aData[3] == key || key == '-1'){
                validoFlag = validoFlag || true;
            }
        }
        else if(type == "Excluir"){
            if(oSettings.aoData[iDataIndex]._aData[3] == key){
                validoFlagExcluir = validoFlagExcluir || true;
            }
        }
    });

    if(!validoFlag)
        valido = false;
    if(validoFlagExcluir)
        valido = false;
    validoFlag = false;

    //oSettings.aoData[iDataIndex]._aData[4] - TERRITORIO
    var territoriosFiltros = {};
    $("select[name^='territorios']").map(function(i, opt) {
        territoriosFiltros[opt.value] = $("select[name^='territorioSelect']")[i].value;
    })

    $.each(territoriosFiltros , function( key, type ) {
        if(type == "Incluir"){
            if(oSettings.aoData[iDataIndex]._aData[4] == key || key == '-1'){
                validoFlag = validoFlag || true;
            }
        }
        else if(type == "Excluir"){
            if(oSettings.aoData[iDataIndex]._aData[4] == key){
                validoFlagExcluir = validoFlagExcluir || true;
            }
        }
    });

    if(!validoFlag)
        valido = false;
    if(validoFlagExcluir)
        valido = false;
    validoFlag = false;

    //oSettings.aoData[iDataIndex]._aData[5] -> ARTISTA
    var artistasFiltros = {};
    $("select[name^='artistas']").map(function(i, opt) {
        artistasFiltros[opt.value] = $("select[name^='artistaSelect']")[i].value;
    })

    $.each(artistasFiltros , function( key, type ) {
        if(type == "Incluir"){
            if(oSettings.aoData[iDataIndex]._aData[5] == key || key == '-1'){
                validoFlag = validoFlag || true;
            }
        }
        else if(type == "Excluir"){
            if(oSettings.aoData[iDataIndex]._aData[5] == key){
                validoFlagExcluir = validoFlagExcluir || true;
            }
        }
    });

    if(!validoFlag)
        valido = false;
    if(validoFlagExcluir)
        valido = false;
    validoFlag = false;

    //oSettings.aoData[iDataIndex]._aData[7] -> PRODUTOR
    var produtorsFiltros = {};
    $("select[name^='produtors']").map(function(i, opt) {
        produtorsFiltros[opt.value] = $("select[name^='produtorSelect']")[i].value;
    })

    $.each(produtorsFiltros , function( key, type ) {
        if(type == "Incluir"){
            if(oSettings.aoData[iDataIndex]._aData[7] == key || key == '-1'){
                validoFlag = validoFlag || true;
            }
        }
        else if(type == "Excluir"){
            if(oSettings.aoData[iDataIndex]._aData[7] == key){
                validoFlagExcluir = validoFlagExcluir || true;
            }
        }
    });

    if(!validoFlag)
        valido = false;
    if(validoFlagExcluir)
        valido = false;
    validoFlag = false;

    //oSettings.aoData[iDataIndex]._aData[8] -> FAIXA
    var faixasFiltros = {};
    $("select[name^='faixas']").map(function(i, opt) {
        faixasFiltros[opt.value] = $("select[name^='faixaSelect']")[i].value;
    })

    $.each(faixasFiltros , function( key, type ) {
        if(type == "Incluir"){
            if(oSettings.aoData[iDataIndex]._aData[8] == key || key == '-1'){
                validoFlag = validoFlag || true;
            }
        }
        else if(type == "Excluir"){
            if(oSettings.aoData[iDataIndex]._aData[8] == key){
                validoFlagExcluir = validoFlagExcluir || true;
            }
        }
    });

    if(!validoFlag)
        valido = false;
    if(validoFlagExcluir)
        valido = false;
    validoFlag = false;

    //oSettings.aoData[iDataIndex]._aData[9] -> PRODUTO
    // var produtosFiltros = {};
    // $("select[name^='produtos']").map(function(i, opt) {
    //     produtosFiltros[opt.value] = $("select[name^='produtoSelect']")[i].value;
    // })

    // $.each(produtosFiltros , function( key, type ) {
    //     if(type == "Incluir"){
    //         if(oSettings.aoData[iDataIndex]._aData[9] == key || key == '-1'){
    //             validoFlag = validoFlag || true;
    //         }
    //     }
    //     else if(type == "Excluir"){
    //         if(oSettings.aoData[iDataIndex]._aData[9] == key){
    //             validoFlagExcluir = validoFlagExcluir || true;
    //         }
    //     }
    // });

    // if(!validoFlag)
    //     valido = false;
    if(validoFlagExcluir)
        valido = false;
    // validoFlag = false;

    //oSettings.aoData[iDataIndex]._aData[10] -> COD. CATALOGO
    var catalogosFiltros = {};
    $("select[name^='catalogos']").map(function(i, opt) {
        catalogosFiltros[opt.value] = $("select[name^='catalogoSelect']")[i].value;
    })

    $.each(catalogosFiltros , function( key, type ) {
        if(type == "Incluir"){
            if(oSettings.aoData[iDataIndex]._aData[10] == key || key == '-1'){
                validoFlag = validoFlag || true;
            }
        }
        else if(type == "Excluir"){
            if(oSettings.aoData[iDataIndex]._aData[10] == key){
                validoFlagExcluir = validoFlagExcluir || true;
            }
        }
    });

    if(!validoFlag)
        valido = false;
    if(validoFlagExcluir)
        valido = false;
    validoFlag = false;


    //oSettings.aoData[iDataIndex]._aData[11] -> ISRC
    var isrcsFiltros = {};
    $("select[name^='isrcs']").map(function(i, opt) {
        isrcsFiltros[opt.value] = $("select[name^='isrcSelect']")[i].value;
    })

    $.each(isrcsFiltros , function( key, type ) {
        if(type == "Incluir"){
            if(oSettings.aoData[iDataIndex]._aData[11] == key || key == '-1'){
                validoFlag = validoFlag || true;
            }
        }
        else if(type == "Excluir"){
            if(oSettings.aoData[iDataIndex]._aData[11] == key){
                validoFlagExcluir = validoFlagExcluir || true;
            }
        }
    });

    if(!validoFlag)
        valido = false;
    if(validoFlagExcluir)
        valido = false;
    validoFlag = false;

    //oSettings.aoData[iDataIndex]._aData[12] -> UPC
    var upcsFiltros = {};
    $("select[name^='upcs']").map(function(i, opt) {
        upcsFiltros[opt.value] = $("select[name^='upcSelect']")[i].value;
    })

    $.each(upcsFiltros , function( key, type ) {
        if(type == "Incluir"){
            if(oSettings.aoData[iDataIndex]._aData[12] == key || key == '-1'){
                validoFlag = validoFlag || true;
            }
        }
        else if(type == "Excluir"){
            if(oSettings.aoData[iDataIndex]._aData[12] == key){
                validoFlagExcluir = validoFlagExcluir || true;
            }
        }
    });

    if(!validoFlag)
        valido = false;
    if(validoFlagExcluir)
        valido = false;
    validoFlag = false;

    if(valido){
        return true;
    }
    return false
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