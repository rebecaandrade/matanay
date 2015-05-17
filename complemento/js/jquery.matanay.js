$(function(){
	// Função jquery que desliza a underbar do menu
    $(".opcao-menu").hover(function(){
        $("#trilho").width($(this).width());
        $("#trilho").css({"left": $(this).position().left });
    },function(){
        $("#trilho").width(0);
    });
});

(function($){
  $(function(){

    $('.button-collapse').sideNav();

  }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function() {
    $('select').material_select();
});

$(document).ready(function() {
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
});


$(document).ready(function(){
        $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="0"){
                $("#favorecido").hide();
                $("#nao_favorecido").show();
            }
            if($(this).attr("value")=="1"){
                $("#nao_favorecido").hide();
                $("#favorecido").show();
            }
        });
    });