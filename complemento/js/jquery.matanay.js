$(function(){
	// Função jquery que desliza a underbar do menu
    $(".opcao-menu").hover(function(){
        $("#trilho").width($(this).width());
        $("#trilho").css({"left": $(this).position().left });
    },function(){
        $("#trilho").width(0);
    });
});