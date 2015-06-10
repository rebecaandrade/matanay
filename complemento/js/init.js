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
$(document).ready(function(){
    $('#myForm').submit(function(){
        var $cpf = $('#cpfCadastreInput').val();
        var $cnpj = $('#cnpjCadastreInput').val();
        var $cpf_cnpj = null;
        if($cpf.length > 1){
            $cpf_cnpj = $cpf;
        }else{
            $cpf_cnpj = $cnpj;
        }
        $('#cpf_cnpj').prop('value',$cpf_cnpj);
    });
});
$(document).ready(function(){
    $('.cpfCadastreInput').mask("000.000.000-00");
});
$(document).ready(function(){
    $('#cnpjCadastreInput').mask("00.000.000/0000-00");
});

$(document).ready(function(){
    $('#cnpjCadastreInput').mask("00.000.000/0000-00");
});
