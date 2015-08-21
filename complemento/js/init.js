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
            $('input[name=banco]').prop("required", false);
            $('input[name=contacorrente]').prop("required", false);
            $('input[name=agencia]').prop("required", false);
            $('input[name=porcentagemganhofisico]').prop("required", false);
            $('input[name=porcentagemganhodigital]').prop("required", false);
            $("#favorecido").hide();
            $("#nao_favorecido").show();
        }
        if ($(this).attr("value") == "1") {
            $('input[name=banco]').prop("required", true);
            $('input[name=contacorrente]').prop("required", true);
            $('input[name=agencia]').prop("required", true);
            $('input[name=banco]').prop("pattern", ".{2,25}");
            $('input[name=contacorrente]').prop("pattern", ".{4,15}");
            $('input[name=agencia]').prop("pattern", ".{2,15}");
            $('input[name=porcentagemganhofisico]').prop("required", true);
            $('input[name=porcentagemganhodigital]').prop("required", true);
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

var excluirEntidade = function (url, langOpt) {
    var thisTitle = ["Tem Certeza?", "Are you sure?"];
    var thisText = ["A entidade selecionada será excluida", "The Selected Entity Will be deleted"];
    var confirmation = ["Sim, pode excluir!", "Yes, You may delete it"];
    var canceltext = ["Não, cancele!", "No, cancel it!"];
    swal({
        title: thisTitle[langOpt],
        text: thisText[langOpt],
        type: "warning",
        showCancelButton: true,
        confirmButtonText: confirmation[langOpt],
        cancelButtonText: canceltext[langOpt],
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location.href = url;
        }
    });
}

var excluirFavorecido = function (url, langOpt) {
    var thisTitle = ["Tem Certeza?", "Are you sure?"];
    var thisText = ["O Favorecido selecionada será excluido", "The Selected Favored Will be deleted"];
    var confirmation = ["Sim, pode excluir!", "Yes, You may delete it"];
    var canceltext = ["Não, cancele!", "No, cancel it!"];
    swal({
        title: thisTitle[langOpt],
        text: thisText[langOpt],
        type: "warning",
        showCancelButton: true,
        confirmButtonText: confirmation[langOpt],
        cancelButtonText: canceltext[langOpt],
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location.href = url;
        }
    });
}

var excluirImposto = function (url, langOpt) {
    var thisTitle = ["Tem Certeza?", "Are you sure?"];
    var thisText = ["O Imposto selecionada será excluido", "The Selected Tax Will be deleted"];
    var confirmation = ["Sim, pode excluir!", "Yes, You may delete it"];
    var canceltext = ["Não, cancele!", "No, cancel it!"];
    swal({
        title: thisTitle[langOpt],
        text: thisText[langOpt],
        type: "warning",
        showCancelButton: true,
        confirmButtonText: confirmation[langOpt],
        cancelButtonText: canceltext[langOpt],
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location.href = url;
        }
    });
}

var excluirAlbum = function (url, langOpt) {
    var thisTitle = ["Tem Certeza?", "Are you sure?"];
    var thisText = ["O Álbum selecionado será excluido.", "The selected Album will be deleted."];
    var confirmation = ["Sim, pode excluir.", "Yes, You may delete it."];
    var canceltext = ["Não, cancele!", "No, cancel it!"];
    swal({
        title: thisTitle[langOpt],
        text: thisText[langOpt],
        type: "warning",
        showCancelButton: true,
        confirmButtonText: confirmation[langOpt],
        cancelButtonText: canceltext[langOpt],
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location.href = url;
        }
    });
}

var excluirFaixa = function (url, langOpt) {
    var thisTitle = ["Tem Certeza?", "Are you sure?"];
    var thisText = ["A Faixa selecionada será excluida.", "The selected Track will be deleted."];
    var confirmation = ["Sim, pode excluir.", "Yes, You may delete it."];
    var canceltext = ["Não, cancele!", "No, cancel it!"];
    swal({
        title: thisTitle[langOpt],
        text: thisText[langOpt],
        type: "warning",
        showCancelButton: true,
        confirmButtonText: confirmation[langOpt],
        cancelButtonText: canceltext[langOpt],
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
/* validacao do cadasto de entidades */
$(document).ready(function () {
    $('#myForm').on("submit", function () {
        var $cpf = $('#cpfCadastreInput').val();
        var $cnpj = $('#cnpjCadastreInput').val();
        var $cpf_cnpj = null;
        var mensagem = "";

        var regx = /^[A-Za-z0-9\s]+$/;
        var testeNome = $('input[name=nomeentidade]').val();
        if (!regx.test(testeNome)) {
            mensagem += "*" + $('input[name=nomeMessageDisplay]').val() + "\n";
        }

        if ($cpf.length > 1) {
            $cpf_cnpj = $cpf;
            if (!validaCpf($cpf_cnpj)) {
                mensagem += "*" + $('input[name=cpfMessageDisplay]').val() + "\n";
            }
        } else {
            $cpf_cnpj = $cnpj;
            if (!validarCNPJ($cpf_cnpj)) {
                mensagem += "*" + $('input[name=cpfMessageDisplay]').val() + "\n";
            }
        }
        $('#cpf_cnpj').prop('value', $cpf_cnpj);

        var identificacao = [];
        $('.IdEntity :checked').each(function () {
            identificacao.push($(this).val());
        });
        if (identificacao.length < 1) {
            mensagem += "*" + $('input[name=IdMessageDisplay]').val() + "\n";
        }
        var isFavorecido = $('input[name=favorecido]:checked', '#myForm').val();
        console.log("cheguei aqui no eh favorecido" + isFavorecido + "...");
        if (isFavorecido < 1) {
            var favorecido = $('#favorecido_relacionado option:selected').val();
            if (favorecido < 0) {
                console.log("cheguei no favorecido -1");
                mensagem += "*" + $('input[name=favoredMessageDisplay]').val();
            }
        }
        if (mensagem.length > 3) {
            swal(mensagem, "", "error");
            return false;
        }
    });
});

$(document).ready(function () {
    $('#myForm1').on("submit", function () {
        var $cpf = $('#cpfCadastreInput1').val();
        var $cnpj = $('#cnpjCadastreInput1').val();
        var $cpf_cnpj = null;
        var mensagem = "";

        var regx = /^[A-Za-z0-9\s]+$/;
        var testeNome = $('input[name=nomeentidade]').val();
        if (!regx.test(testeNome)) {
            mensagem += "*" + $('input[name=nomeMessageDisplay]').val() + "\n";
        }


        if ($cpf.length > 1) {

            $cpf_cnpj = $cpf;
            if (!validaCpf($cpf_cnpj)) {
                mensagem += "*" + $('input[name=cpfMessageDisplay]').val() + "\n";
            }
        } else {
            $cpf_cnpj = $cnpj;
            if (!validarCNPJ($cpf_cnpj)) {
                mensagem += "*" + $('input[name=cpfMessageDisplay]').val() + "\n";
            }
        }
        $('#cpf_cnpj').prop('value', $cpf_cnpj);

        var identificacao = [];
        $('.IdEntity :checked').each(function () {
            identificacao.push($(this).val());
        });
        if (identificacao.length < 1) {
            mensagem += "*" + $('input[name=IdMessageDisplay]').val() + "\n";
        }
        if (mensagem.length > 3) {
            swal(mensagem, "", "error");
            return false;
        }
    });
});

/* validacao do cpf */
function validaCpf(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
    strCPF = strCPF.match(/\d/g).join("");
    //console.log(strCPF);

    if ((strCPF == "00000000000") ||
        (strCPF == "11111111111") ||
        (strCPF == "22222222222") ||
        (strCPF == "33333333333") ||
        (strCPF == "44444444444") ||
        (strCPF == "55555555555") ||
        (strCPF == "66666666666") ||
        (strCPF == "77777777777") ||
        (strCPF == "88888888888") ||
        (strCPF == "99999999999")) return false;

    for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10))) return false;

    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11))) return false;
    return true;
}

/* validacao do codigo do catalogo */
function validaCodCatalogo(codCat) {
    console.log(codCat);

    if ((codCat == "0000000000") ||
        (codCat == "1111111111") ||
        (codCat == "2222222222") ||
        (codCat == "3333333333") ||
        (codCat == "4444444444") ||
        (codCat == "5555555555") ||
        (codCat == "6666666666") ||
        (codCat == "7777777777") ||
        (codCat == "8888888888") ||
        (codCat == "9999999999")) return false;
    else
        return true;
}

/* validacao cnpj */
function validarCNPJ(cnpj) {

    cnpj = cnpj.replace(/[^\d]+/g, '');
    if (cnpj == '') return false;
    if (cnpj.length != 14)
        return false;

    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999") {
        return false;
    }
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0, tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0, tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
        return false;

    return true;
}
/* validacao form cadastro perfil */
$(document).ready(function () {
    $('#createPerfil').on("submit", function () {
        var mensagem = "";
        var senha = $('input[name=senha]').val();
        var confirmaSenha = $('input[name=confirmar_senha]').val();
        if (senha !== confirmaSenha) {
            mensagem += "*" + $('input[name=passMessageDisplay]').val() + "\n";
        }

        var isChecked = 0;
        $('.minhasFuncionalidades :checked').each(function () {
            isChecked++
        });
        if (!isChecked) {
            mensagem += "*" + $('input[name=checkBoxMessageDisplay]').val() + "\n";
        }

        var regx = /^[A-Za-z0-9\s]+$/;
        var testeNome = $('input[name=nome]').val();
        if (!regx.test(testeNome)) {
            mensagem += "*" + $('input[name=nomeMessageDisplay]').val() + "\n";
        }

        if (mensagem.length > 3) {
            //console.log("cheguei no swal\n" + mensagem + "numero");
            swal(mensagem, "", "error");
            return false;
        } else {
            return true;
        }
        //return false;
    });
    $("#markAllFunc").change(function () {
        $(".minhasFuncionalidades :input[type=checkbox]").prop('checked', $(this).prop("checked"));
    });
});
$(document).ready(function () {
    $('#formUpdatePerfil').on("submit", function () {
        var mensagem = "";
        var isChecked = $("input[name='func[]']:checked").length > 0;
        if (!isChecked) {
            mensagem += "*" + $('input[name=checkBoxMessageDisplay]').val() + "\n";
        }
        var regx = /^[A-Za-z0-9\s]+$/;
        var testeNome = $('input[name=nome]').val();
        if (!regx.test(testeNome)) {
            mensagem += "*" + $('input[name=nomeMessageDisplay]').val() + "\n";
        }
        if (mensagem.length > 3) {
            swal(mensagem, "", "error");
            return false;
        } else {
            return true;
        }
    });
    $("#updateMarkAllFunc").change(function () {
        $(".checkFunc :input[type=checkbox]").prop('checked', $(this).prop("checked"));
    });
});

$(document).ready(function () {
    $('.cpfCadastreInput').mask("000.000.000-00");
});

$(document).ready(function () {
    $('#cnpjCadastreInput').mask("00.000.000/0000-00");
});

$(document).ready(function () {
    $('.cnpjCadastreInput').mask("00.000.000/0000-00");
});

$(document).ready(function () {
    $('.percentage').mask("000.00%", {reverse: true});
    $('.percentage').on("blur", function () {
        //console.log("entrei no change");
        var troca = false;
        var valor = $(this).val();
        var valor = valor.slice(0, valor.length - 1);
        var testeValor = valor.split(".");
        if (testeValor[0] == 100) {
            if (testeValor[1] > 0) troca = true;
        }
        if (testeValor[0] > 100) {
            troca = true;
        }
        if (troca == true) $(this).prop("value", null);
    });
});

$(document).ready(function () {
    $('.porcentagem').mask("000,00%", {reverse: true});
    $('.porcentagem').on("blur", function () {
        //console.log("entrei no change");
        var troca = false;
        var valor = $(this).val();
        var valor = valor.slice(0, valor.length - 1);
        var testeValor = valor.split(",");
        if (testeValor[0] == 100) {
            if (testeValor[1] > 0) troca = true;
        }
        if (testeValor[0] > 100) {
            troca = true;
        }
        if (troca == true) $(this).prop("value", null);
    });
});
var maskBrOptions = {
    translation: {
        'Z': {
            pattern: /[0]/, optional: true
        },
        'S': {
            pattern: /[0 - 1]/, optional: true
        }
    },
    reverse: true,
    onChange: function (porc, e, field, maskBrOptions) {
        maskOne = "000,00%";
        maskTwo = "SZZ,ZZ%";
        var mask = (porc.length <= 6) ? maskOne : maskTwo;
        $('.porcentagem').mask(mask, maskBrOptions);
    }
};
var maskUsOptions = {
    translation: {
        'Z': {
            pattern: /[0]/, optional: true
        },
        'S': {
            pattern: /[0 - 1]/, optional: true
        }
    },
    reverse: true,
    onChange: function (porc, e, field, maskBrOptions) {
        maskOne = "000.00%";
        maskTwo = "SZZ.ZZ%";
        var mask = (porc.length <= 6) ? maskOne : maskTwo;
        $('.percentage').mask(mask, maskBrOptions);
    }
};
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

/********** validar cadastro de album **********/

$(document).ready(function () {
    $('#cadastro_album').on("submit", function () {
        var mensagem = "";

        var ano = $('input[name=ano]').val();
        if (ano < 1950) {
            mensagem += "*" + $('input[name=msg_erro_ano]').val();
        } else if (ano > 2050) {
            mensagem += "*" + $('input[name=msg_erro_ano]').val();
        }

        var $codCat = $('#codCatalogo').val();
        if (validaCodCatalogo($codCat) == false) {
            console.log(!validaCodCatalogo($codCat));
            mensagem += "*" + $('input[name=codMessageDisplay]').val() + "\n";
        }

        var tipo = $('#tipo option:selected').val();
        if (tipo < 0) {
            mensagem += "*" + $('input[name=msg_erro_tipo]').val();
        }

        var artista = $('#artista option:selected').val();
        if (artista < 0) {
            mensagem += "*" + $('input[name=msg_erro_artista]').val();
        }

        var faixas = $('select[name="faixas[]"]').map(function () {
            if ($(this).val())
                return $(this).val();
        }).get();

        if (faixas.indexOf("-1") != -1) {
            mensagem += "*" + $('input[name=msg_erro_faixas]').val();
        }

        if (mensagem.length > 3) {
            swal(mensagem, "", "error");
            return false;
        }
    });
});

/********** validar edição de album **********/

$(document).ready(function () {
    $('#edicao_album').on("submit", function () {
        var mensagem = "";

        var ano = $('input[name=ano]').val();
        if (ano < 1950) {
            mensagem += "*" + $('input[name=msg_erro_ano]').val();
        } else if (ano > 2050) {
            mensagem += "*" + $('input[name=msg_erro_ano]').val();
        }

        var $codCat = $('#codCatalogo1').val();
        if (validaCodCatalogo($codCat) == false) {
            console.log(!validaCodCatalogo($codCat));
            mensagem += "*" + $('input[name=codMessageDisplay]').val() + "\n";
        }

        if (mensagem.length > 3) {
            swal(mensagem, "", "error");
            return false;
        }
    });
});

/********** validar cadastro de faixa **********/

$(document).ready(function () {
    $('#cadastro_faixa').on("submit", function () {
        var mensagem = "";

        var artista = $('#artista option:selected').val();
        if (artista < 0) {
            mensagem += "*" + $('input[name=msg_erro_artistas]').val();
        }
        else {
            var perc_artista = new Array();
            $("input[name*=percentualArtista]").each(function () {
                perc_artista.push($(this).val());
            });
            var perc_total = 0;
            $.each(perc_artista, function () {
                perc_total += parseFloat(this) || 0;
            });
            if (perc_total != 100) {
                mensagem += "*" + $('input[name=msg_perc_artista]').val();
            }
        }

        var autor = $('#autor option:selected').val();
        if (autor < 0) {
            mensagem += "*" + $('input[name=msg_erro_autores]').val();
        }
        else {
            var perc_autor = new Array();
            $("input[name*=percentualAutor]").each(function () {
                perc_autor.push($(this).val());
            });
            var perc_total = 0;
            $.each(perc_autor, function () {
                perc_total += parseFloat(this) || 0;
            });
            if (perc_total != 100) {
                mensagem += "*" + $('input[name=msg_perc_autor]').val();
            }
        }

        var produtor = $('#produtor option:selected').val();
        if (produtor > 0) {
            var perc_produtor = new Array();
            $("input[name*=percentualProdutor]").each(function () {
                perc_produtor.push($(this).val());
            });
            var perc_total = 0;
            $.each(perc_produtor, function () {
                perc_total += parseFloat(this) || 0;
            });
            if (perc_total != 100) {
                mensagem += "*" + $('input[name=msg_perc_produtor]').val();
            }
        }

        if (mensagem.length > 3) {
            swal(mensagem, "", "error");
            return false;
        }
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

/********** iniciando selects com chosen no cadastro de faixa **********/

$(document).ready(function () {
    $('.addArtista').chosen({search_contains: true});
    $('.addAutor').chosen({search_contains: true});
    $('.addProdutor').chosen({search_contains: true});
});

/********** cadastro/edição de faixas com chosen no select de entidades e função que impede selecionar o mesmo valor 2x **********/

function addSelectEntidade(entidades, selecione, label, participacao, mask) {
    var nameLower = label;
    var nameLower = nameLower.toLowerCase();

    $('#Select' + label).append('<div class="row"><div class="input-field col s11 m8 l8 offset-l1">' +
        '<select id="select' + label + '" class="add' + label + ' browser-default" name="' + nameLower + 's[]">' +
        geraOpcoesEntidade(entidades, selecione) + '</select><label id="selectLabel">' + label + '</label></div>' +
        '<div class="input-field col s12 m3 l2"><label>' + participacao + '</label>' +
        '<input class="porcentagem" name="percentual' + label + '[]" type="text"></div>' +
        '<a onclick="remove' + label + '()"" class="btn-floating btn-medium waves-effect waves-light btn tooltipped"' +
        'data-position="right" data-delay="50" data-tooltip="Remover" id="remove' + label + '">' +
        '<i class="mdi-content-remove"></i></a></div>');

    $('.add' + label).chosen({search_contains: true});
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
    $(document).on('change', '.addArtista', function (e) {
        geraArtistasSelecionados();
    });

    function geraArtistasSelecionados() {
        var selectedValues = [];

        $('.addArtista option').each(function () {
            $(this).prop('disabled', false);
        });

        $('.addArtista option:selected').each(function () {
            var select = $(this).parent(),
                optValue = $(this).val();

            if ($(this).val() != '') {
                $('.addArtista').not(select).children().filter(function (e) {
                    if ($(this).val() == optValue)
                        return e
                }).prop('disabled', true);
                $('.addArtista').trigger("chosen:updated");
            }
        });
    }
});

$(function () {
    $(document).on('change', '.addAutor', function (e) {
        geraAutoresSelecionados();
    });

    function geraAutoresSelecionados() {
        var selectedValues = [];

        $('.addAutor option').each(function () {
            $(this).prop('disabled', false);
        });

        $('.addAutor option:selected').each(function () {
            var select = $(this).parent(),
                optValue = $(this).val();

            if ($(this).val() != '') {
                $('.addAutor').not(select).children().filter(function (e) {
                    if ($(this).val() == optValue)
                        return e
                }).prop('disabled', true);
                $('.addAutor').trigger("chosen:updated");
            }
        });
    }
});

$(function () {
    $(document).on('change', '.addProdutor', function (e) {
        geraProdutoresSelecionados();
    });

    function geraProdutoresSelecionados() {
        var selectedValues = [];

        $('.addProdutor option').each(function () {
            $(this).prop('disabled', false);
        });

        $('.addProdutor option:selected').each(function () {
            var select = $(this).parent(),
                optValue = $(this).val();

            if ($(this).val() != '') {
                $('.addProdutor').not(select).children().filter(function (e) {
                    if ($(this).val() == optValue)
                        return e
                }).prop('disabled', true);
                $('.addProdutor').trigger("chosen:updated");
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

/********** ediçao de album com chosen no select de faixas e função que impede selecionar o mesmo valor 2x **********/

function addSelectFaixa(faixas, selecione, label) {
    var nameLower = label;
    var nameLower = nameLower.toLowerCase();

    $('#SelectFaixas').append('<div class="row"><div class="input-field col s11 m8 l8 offset-l2">' +
        '<select id="select' + label + '" class="addFaixa browser-default" name="' + nameLower + 's[]">' +
        geraOpcoesFaixa(faixas, selecione) + '</select><label id="selectLabel">' + label + '</label></div>' +
        '<a onclick="remove' + label + '()"" class="btn-floating btn-medium waves-effect waves-light btn"' +
        'id="remove' + label + '"><i class="mdi-content-remove"></i></a></div>');

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

/********** cadastro de album com chosen no select de faixas e função que impede selecionar o mesmo valor 2x **********/

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
    var opcoes = "<option value='-1' disabled selected>" + selecione + "</option>";
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
        "LengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        "pageLength": 100,
        "language": {
            "emptyTable": "Nenhum Resultado Encontrado",
            "info": "Mostrando _START_ à _END_ de _TOTAL_ elementos",
            "infoEmpty": "mostrando 0 à 0 of 0 elementos",
            "infoFiltered": "(Filtrado de _MAX_ elementos)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "mostrando _MENU_ resultados por pagina",
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
    $('#usTable').dataTable({
        "LengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        "pageLength": 100,
        "language": {
            "emptyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "Showing 0 to 0 of 0 entries",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Show _MENU_ entries",
            "loadingRecords": "Loading...",
            "processing": "Processing...",
            "search": "Search:",
            "zeroRecords": "No matching records found",
            "paginate": {
                "first": "First",
                "last": "Last",
                "next": "Next",
                "previous": "Previous"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    });
});

$(document).ready(function () {
    $('#nome').on("change", function () {
        var myName = $('#nome').val().split(" ");
        var newName = "";
        for (var i = 0; i < myName.length; i++) {
            if (myName[i].length > 0) {
                newName += myName[i];
                newName += " ";
            }
        }
        newName = newName.slice(0, newName.length - 1);
        $('#nome').prop('value', newName);
    });
});
$(document).ready(function () {
    $('#contato').on("change", function () {
        var myName = $('#contato').val().split(" ");
        var newName = "";
        var i;
        for (i = 0; i < myName.length; i++) {
            if (myName[i].length > 0) {
                newName += myName[i];
                newName += " ";
            }
        }
        newName = newName.slice(0, newName.length - 1);
        $('#contato').prop('value', newName);
    });
});
$(document).ready(function () {
    $('#email').on("change", function () {
        var myName = $('#email').val().split(" ");
        var newName = "";
        for (var i = 0; i < myName.length; i++) {
            if (myName[i].length > 0) {
                newName += myName[i];
            }
        }
        $('#email').prop('value', newName);
    });
});

$(document).ready(function () {
    $('.cutSpace').on("change", function () {
        var myName = $(this).val().split(" ");
        var newName = "";
        for (var i = 0; i < myName.length; i++) {
            if (myName[i].length > 0) {
                newName += myName[i];
                newName += " ";
            }
        }
        newName = newName.slice(0, newName.length - 1);
        $(this).prop('value', newName);
    });
});
$(document).ready(function () {
    $('.cutAllSpace').on("change", function () {
        var myName = $(this).val().split(" ");
        var newName = "";
        for (var i = 0; i < myName.length; i++) {
            if (myName[i].length > 0) {
                newName += myName[i];
            }
        }
        $(this).prop('value', newName);
    });
});

function validaformupdateentidade() {
    var cpf_cnpj = $('#cpf_cnpjUpdate').val();

    //var cnpj= $('input[name=cnpj]').val();
    var isCpf = $('input[name=isCpf]').val();
    /*swal(cpf_cnpj+"\n"+isCpf);
     return false;*/

    var mensagem = "";
    if (isCpf == 1) {
        $('input[name=cpf]').prop("value", cpf_cnpj);
        if (!validaCpf(cpf_cnpj)) {
            mensagem += "*" + $('input[name=cpfMessageDisplay]').val() + "\n";
        }
    } else {
        $('input[name=cnpj]').prop("value", cpf_cnpj);
        if (!validarCNPJ(cpf_cnpj)) {
            mensagem += "*" + $('input[name=cpfMessageDisplay]').val() + "\n";
        }
    }
    var identificacao = [];
    $('.IdEntityCheckBox :checked').each(function () {
        identificacao.push($(this).val());
    });
    if (identificacao.length < 1) {
        mensagem += "*" + $('input[name=IdMessageDisplay]').val() + "\n";
    }
    console.log(identificacao);
    if (mensagem.length > 3) {
        swal(mensagem, "", "error");
        return false;
    } else {
        return true;
    }
}


function notificacaoMensagem(langOpt) {
    var thisTitle = ["Alerta!", "Alert!"];
    var thisText = ["Existem contratos perto da data de vencimento.", "There are contracts close to the expiration date."];
    swal({
        type: "warning",
        title: thisTitle[langOpt],
        text: thisText[langOpt],  
        timer: 4000,
    });
}