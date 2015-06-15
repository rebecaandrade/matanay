(function ($) {
    $(function () {

        $('.button-collapse').sideNav();

    });
})(jQuery);


$(document).ready(function () {
    $('#cadastro').click(function () {
        $("#sub_menu").toggle();
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
    $('input[type="checkbox"]').change(function () {
        if ($(this).attr("value") == "1") {
            $("#n_video").hide();
            $("#eh_video").show();
        } else {
            $("#eh_video").hide();
            $("#n_video").show();
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
})

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
/**************************** a parada do iput select  ********/
$(document).ready(function () {
    $('.mySelect').change(function (e) {
        console.log("vai_SeFUdezou");
        //generateSelectedAreas();
    });
    /*function generateSelectedAreas() {
     var selectedValues = [];

     //enable all options, otherwise they overlap and cause probl
     $('.mySelect option').each(function () {
     $(this).prop('disabled', false);
     });
     $('.mySelect option:selected').each(function () {
     var select = $(this).parent(),
     optValue = $(this).val();

     if ($(this).val() != '') {
     $('.mySelect').not(select).children().filter(function (e) {
     if ($(this).val() == optValue)
     return e
     }).prop('disabled', true);
     }
     });
     }*/
});
function executaSelect(faixas, selecione) {
    var numFaixas = $('#n_faixas').val();
    var container = document.getElementById("tracklist");
    // Clear previous contents of the container
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }

    for (var count = 0; count < numFaixas; count++) {
        $('#tracklist').append(
            "<div class='input-field col s12 m12 l8 offset-l2'><select class='anotherSelect autocomplete browser-default' name='faixas[]'>" + generateOptions(faixas, selecione) + "</select></div>"
        );
    }

}
function generateOptions(faixas, selecione) {
    var opcoes = "<option value='' disabled selected>" + selecione + "</option>";
    for (var i = 0; i < faixas.length; i++) {
        opcoes += "<option value=" + faixas[i].idFaixa + ">" + faixas[i].nome + "</option>";
    }
    return opcoes;
}
/*function mudaSelect() {
    console.log("cheguei");
    var $selects = $('.anotherSelect');
    //console.log($selects);
    $('.anotherSelect').change(function () {
        //console.log("torkei\n");
        $('option:hidden', $selects).each(function () {
            var self = this,
                toShow = true;
            $selects.not($(this).parent()).each(function () {
                if (self.value == this.value) toShow = false;
            })
            if (toShow) $(this).show();
        });
        if (this.value != 0) //to keep default option available
            $selects.not(this).children('option[value=' + this.value + ']').hide();
    });
}*/
$(function () {
    $(document).on('change', '.anotherSelect', function (e) {
        generateSelectedAreas();
    });

    function generateSelectedAreas() {
        var selectedValues = [];

        //enable all options, otherwise they overlap and cause probl
        $('.anotherSelect option').each(function () {
            $(this).prop('disabled', false);
        });

        $('.anotherSelect option:selected').each(function () {
            var select = $(this).parent(),
                optValue = $(this).val();

            if ($(this).val() != '') {
                $('.anotherSelect').not(select).children().filter(function (e) {
                    if ($(this).val() == optValue)
                        return e
                }).prop('disabled', true);
            }
        });
    }
});
/************ editar entidade submit para nao haver passagem de parametro pela url */
function passaParamentro(param, url) {
    $('#editarEntInput').prop('value', param);
    $('#sendUserToEdit').prop('action', url + "index.php/entidade/camposatualizacao");
    $('#sendUserToEdit').submit();
}


/*************************  dataTables   **************************************************/
$(document).ready(function () {
    $('#myTable').dataTable({
        "language": {
            "emptyTable": "Nenhum Resultado Encontrado",
            "info": "Mostrando _START_ à _END_ de _TOTAL_ elementos",
            "infoEmpty": "mostrando 0 à 0 of 0 elementos",
            "infoFiltered": "(Filtrado de _MAX_ elementos)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "mostrando _MENU_ linhas",
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
    $('.dataTables_length').addClass('col s6');
    $('fuckingTable_filter').addClass('col s6 align-left');
});
/*! DataTables 1.10.7
 * Â©2008-2015 SpryMedia Ltd - datatables.net/license
 */
