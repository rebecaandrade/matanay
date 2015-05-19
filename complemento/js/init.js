(function($){
  $(function(){

    $('.button-collapse').sideNav();

  }); 
})(jQuery); 


$(document).ready(function() {
    $('select').material_select();
});


$(document).ready(function() {
    $('.datepicker').pickadate({
        selectMonths: true, 
        selectYears: 15 
    });
});


$(document).ready(function() {
    $(".button-collapse").sideNav();
});


$(document).ready(function() {
    $(".dropdown-button").dropdown();
});


$(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false 
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


$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input class="col l8 offset-l2" type="text" name="mytext[]"/><a href="#" class="remove_field col l2">Remover</a></div>'); //add input box
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

