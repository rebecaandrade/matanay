(function ($) {
    $(function () {
        $('.button-collapse').sideNav();
    });
})(jQuery);

$(document).ready(function () {
    $('#cadastro').click(function () {
        $("#sub_menu2").hide();
        $("#sub_menu").toggle();
    });
});

$(document).ready(function () {
    $('#relatorio').click(function () {
        $("#sub_menu").hide();
        $("#sub_menu2").toggle();
    });
});

$(document).ready(function () {
    $('select').material_select();
});

$(document).ready(function () {
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 15
    });
});

$(document).ready(function () {
    $(".button-collapse").sideNav();
});

$(document).ready(function () {
    $(".dropdown-button").dropdown();
});

$(document).ready(function () {
    $('.collapsible').collapsible({
        accordion: false
    });
});

$(document).ready(function () {
    $('input[type="radio"]').click(function () {
        if ($(this).attr("value") == "0") {
            $("#favorecido").hide();
            $("#nao_favorecido").show();
        }
        if ($(this).attr("value") == "1") {
            $("#nao_favorecido").hide();
            $("#favorecido").show();
        }
    });
});

$(document).ready(function () {
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
});

function mascara(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmascara()", 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function mtel(v) {
    v = v.replace(/\D/g, "");
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
    v = v.replace(/(\d)(\d{4})$/, "$1-$2");
    return v;
}

function mtel1(v) {
    v = v.replace(/\D/g, "");
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
    v = v.replace(/(\d)(\d{4})$/, "$1-$2");
    return v;
}

function id(el) {
    return document.getElementById(el);
}

window.onload = function () {
    id('telefone').onkeypress = function () {
        mascara(this, mtel);
    }
    id('telefone1').onkeypress = function () {
        mascara(this, mtel1);
    }
}

var excluirEntidade = function (url) {
    swal({
        title: "Tem Certeza?",
        text: "A entidade selecionada será excluida",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, pode excluir!",
        cancelButtonText: "Não, cancele!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location.href = url;
        }
    });
}

var excluirFavorecido = function (url) {
    swal({
        title: "Tem Certeza?",
        text: "O favorecido selecionado será excluido",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, pode excluir!",
        cancelButtonText: "Não, cancele!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location.href = url;
        }
    });
}
$(document).ready(function () {
    $('a').css('cursor', 'pointer')
});

$(document).ready(function () {
    $('#lupa').css('cursor', 'pointer');
    $('#lupa').click(function () {
        $('#linkLupa').click();
    });
});

$(document).ready(function () {
    $('#test1').click(function () {
        $('#cnpjCadastre').hide();
        $('#cnpjCadastreInput').prop('value', null);
        $('#cpfCadastre').show();
        $('#cpfCadastreInput').prop('required', true);
        $('#cnpjCadastreInput').prop('required', false);
    })
});

$(document).ready(function () {
    $('#test2').click(function () {
        $('#cpfCadastre').hide();
        $('#cpfCadastreInput').prop('value', null);
        $('#cnpjCadastre').show();
        $('#cnpjCadastreInput').prop('required', true);
        $('#cpfCadastreInput').prop('required', false);
    });
});

$(document).ready(function () {
    $('#myForm').submit(function () {
        var $cpf = $('#cpfCadastreInput').val();
        var $cnpj = $('#cnpjCadastreInput').val();
        var $cpf_cnpj = null;
        if ($cpf.length > 1) {
            $cpf_cnpj = $cpf;
        } else {
            $cpf_cnpj = $cnpj;
        }
        $('#cpf_cnpj').prop('value', $cpf_cnpj);
    });
});

$(document).ready(function () {
    $('.cpfCadastreInput').mask("000.000.000-00");
});

$(document).ready(function () {
    $('#cnpjCadastreInput').mask("00.000.000/0000-00");
});

$(document).ready(function () {
    $('#cnpjCadastreInput').mask("00.000.000/0000-00");
});

$(document).ready(function () {
    $('.percentage').mask("00.00%", {reverse: true});
});

$(document).ready(function () {
    $('.porcentagem').mask("00,00%", {reverse: true});
});

$(document).ready(function () {
    $('#updateFormEntidade').submit(function () {
        var $cpf = $('#cpfUpdate').val();
        var $cnpj = $('#cnpjUpdate').val();
        var $cpf_cnpj = null;
        if ($cpf != null) {
            $cpf_cnpj = $cpf;
        } else {
            $cpf_cnpj = $cnpj;
        }
        $('#cppjUpdate').prop('value', $cpf_cnpj);
    });
});
$(document).ready(function () {
    $('#updateFormFavorecido').submit(function () {
        var $cpf = $('#cpfUpdate').val();
        var $cnpj = $('#cnpjUpdate').val();
        var $cpf_cnpj = null;
        if ($cpf != null) {
            $cpf_cnpj = $cpf;
        } else {
            $cpf_cnpj = $cnpj;
        }
        $('#cppjUpdate').prop('value', $cpf_cnpj);
    });
});

/********** radio button pra dizer se vai cadastrar faixa ou video **********/

$(document).ready(function () {
    $('#n_video').click(function () {
        $('#youtubeCadastre').hide();
        $('#youtubeCadastreInput').prop('value', null);
        $('#isrcCadastre').show();
        $('#isrcCadastreInput').prop('required', true);
        $('#youtubeCadastreInput').prop('required', false);
    })
});

$(document).ready(function () {
    $('#eh_video').click(function () {
        $('#isrcCadastre').hide();
        $('#isrcCadastreInput').prop('value', null);
        $('#youtubeCadastre').show();
        $('#youtubeCadastreInput').prop('required', true);
        $('#isrcCadastreInput').prop('required', false);
    });
});

/********** select entidades com chosen e função que impede selecionar o mesmo valor 2x **********/

function addSelectEntidade(entidades, selecione, label, participacao, mask) {
    var nameLower = label;
    var nameLower = nameLower.toLowerCase();

    $('#Select' + label).append('<div class="row"><div class="input-field col s11 m8 l8 offset-l1">' +
    '<select id="select' + label + '" class="addEntidade browser-default" name="' + nameLower + 's[]">' +
    geraOpcoesEntidade(entidades, selecione) + '</select><label id="selectLabel">' + label + '</label></div>' +
    '<div class="input-field col s12 m3 l2"><label>' + participacao + '</label>' +
    '<input class="porcentagem" name="percentual' + label + '[]" type="text"></div>' +
    '<a onclick="remove' + label + '()"" class="btn-floating btn-medium waves-effect waves-light btn tooltipped"' +
    'data-position="right" data-delay="50" data-tooltip="Remover" id="remove' + label + '">' +
    '<i class="mdi-content-remove"></i></a></div>');

    $('.addEntidade').chosen({search_contains: true});
    $('.porcentagem').mask("00,00%", {reverse: true});
}

function geraOpcoesEntidade(entidades, selecione) {
    var opcoes = "<option value='' disabled selected>" + selecione + "</option>";
    for (var i = 0; i < entidades.length; i++) {
        opcoes += "<option value=" + entidades[i].idEntidade + ">" + entidades[i].nome + "</option>";
    }
    return opcoes;
}

$(function () {
    $(document).on('change', '.addEntidade', function (e) {
        geraEntidadesSelecionadas();
    });

    function geraEntidadesSelecionadas() {
        var selectedValues = [];

        $('.addEntidade option').each(function () {
            $(this).prop('disabled', false);
        });

        $('.addEntidade option:selected').each(function () {
            var select = $(this).parent(),
                optValue = $(this).val();

            if ($(this).val() != '') {
                $('.addEntidade').not(select).children().filter(function (e) {
                    if ($(this).val() == optValue)
                        return e
                }).prop('disabled', true);
                $('.addEntidade').trigger("chosen:updated");
            }
        });
    }
});

$(function () {
    $("#SelectArtista").on("click", "#removeArtista", function (e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
        geraEntidadesSelecionadas();
    });

    $("#SelectAutor").on("click", "#removeAutor", function (e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
        geraEntidadesSelecionadas();
    });

    $("#SelectProdutor").on("click", "#removeProdutor", function (e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
        geraEntidadesSelecionadas();
    });
});

/********** select faixas com chosen e função que impede selecionar o mesmo valor 2x **********/

function addSelectFaixa(faixas, selecione, label) {
    var nameLower = label;
    var nameLower = nameLower.toLowerCase();

    $('#SelectFaixas').append('<div class="row"><div class="input-field col s11 m8 l8 offset-l2">' +
    '<select id="select' + label + '" class="addFaixa browser-default" name="' + nameLower + 's[]">' +
    geraOpcoesFaixa(faixas, selecione) + '</select><label id="selectLabel">' + label + '</label></div>' +
    '<a onclick="remove' + label + '()"" class="btn-floating btn-medium waves-effect waves-light btn tooltipped"' +
    'data-position="right" data-delay="50" data-tooltip="Remover" id="remove' + label + '">' +
    '<i class="mdi-content-remove"></i></a></div>');

    $('.addFaixa').chosen({search_contains: true});
}

function geraOpcoesFaixa(faixas, selecione) {
    var opcoes = "<option value='' disabled selected>" + selecione + "</option>";
    for (var i = 0; i < faixas.length; i++) {
        opcoes += "<option value=" + faixas[i].idFaixa + ">" + faixas[i].nome + "</option>";
    }
    return opcoes;
}

$(function () {
    $(document).on('change', '.addFaixa', function (e) {
        geraFaixasSelecionadas();
    });

    function geraFaixasSelecionadas() {
        var selectedValues = [];

        $('.addFaixa option').each(function () {
            $(this).prop('disabled', false);
        });

        $('.addFaixa option:selected').each(function () {
            var select = $(this).parent(),
                optValue = $(this).val();

            if ($(this).val() != '') {
                $('.addFaixa').not(select).children().filter(function (e) {
                    if ($(this).val() == optValue)
                        return e
                }).prop('disabled', true);
                $('.addFaixa').trigger("chosen:updated");
            }
        });
    }
});

$(function () {
    $("#SelectFaixas").on("click", "#removeFaixa", function (e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
        geraFaixasSelecionadas();
    });
});

/********** select faixas com chosen e função que impede selecionar o mesmo valor 2x **********/

function geraSelect(faixas, selecione, label) {
    var numFaixas = $('#n_faixas').val();
    var container = document.getElementById("tracklist");
    // Clear previous contents of the container
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }

    for (var count = 0; count < numFaixas; count++) {

        $('#tracklist').append('<div class="row"><div class="input-field col s12 m12 l8 offset-l2">' +
        '<select id="select_faixas' + count + '" class="autocomplete browser-default" name="faixas[]">' +
        geraOpcoes(faixas, selecione) + '</select>' +
        '<label>' + label + '</label></div></div>');

        $('.autocomplete').chosen({search_contains: true});

    }
}

function geraOpcoes(faixas, selecione) {
    var opcoes = "<option value='' disabled selected>" + selecione + "</option>";
    for (var i = 0; i < faixas.length; i++) {
        opcoes += "<option value=" + faixas[i].idFaixa + ">" + faixas[i].nome + "</option>";
    }
    return opcoes;
}

$(function () {
    $(document).on('change', '.autocomplete', function (e) {
        geraFaixasSelecionadas();
    });

    function geraFaixasSelecionadas() {
        var selectedValues = [];

        $('.autocomplete option').each(function () {
            $(this).prop('disabled', false);
        });

        $('.autocomplete option:selected').each(function () {
            var select = $(this).parent(),
                optValue = $(this).val();

            if ($(this).val() != '') {
                $('.autocomplete').not(select).children().filter(function (e) {
                    if ($(this).val() == optValue)
                        return e
                }).prop('disabled', true);
                $('.autocomplete').trigger("chosen:updated");
            }
        });
    }
});

/********** editar sem haver passagem de parametro pela url **********/

function passaParamentroEntidade(param, url) {
    $('#editarEntInput').prop('value', param);
    $('#sendUserToEdit').prop('action', url + "index.php/entidade/camposatualizacao");
    $('#sendUserToEdit').submit();
}

function passaParametroAlbum(param, url) {
    $('#editarEntInput').prop('value', param);
    $('#sendUserToEdit').prop('action', url + "index.php/albuns/camposatualizacao");
    $('#sendUserToEdit').submit();
}

function passaParametroFaixa(param, url) {
    $('#editarEntInput').prop('value', param);
    $('#sendUserToEdit').prop('action', url + "index.php/faixas_videos/camposatualizacao");
    $('#sendUserToEdit').submit();
}

function passaParamentroFavorecido(param, url) {
    $('#editarEntInput').prop('value', param);
    $('#sendUserToEdit').prop('action', url + "index.php/favorecido/camposatualizacao");
    $('#sendUserToEdit').submit();
}

/************************* dataTables *************************/

$(document).ready(function () {
    $('#myTable').dataTable({
        //"LengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        "pageLength": 25,
        "language": {
            "emptyTable": "Nenhum Resultado Encontrado",
            "info": "Mostrando _START_ à _END_ de _TOTAL_ elementos",
            "infoEmpty": "mostrando 0 à 0 of 0 elementos",
            "infoFiltered": "(Filtrado de _MAX_ elementos)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "",
            "loadingRecords": "Carregando...",
            "processing": "Processando...",
            "search": "Procurar:",
            "zeroRecords": "Nenhum resultado encontrado",
            "paginate": {
                "first": "Primeira",
                "last": "Última",
                "next": "PRÓX",
                "previous": "ANT"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    });
});
$(document).ready(function () {
    var newTable = null;
    $('.tableSelect').change(function () {
        var length = $('.tableSelect option:selected').val();
        var Settings = newTable.fnSettings();
        Settings._iDisplayLength = length;
        newTable.fnDraw();
    });
    newTable = $('#myTable').dataTable();
});


/*! DataTables 1.10.7
 * Â©2008-2015 SpryMedia Ltd - datatables.net/license
 */
