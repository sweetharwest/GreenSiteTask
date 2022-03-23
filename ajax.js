$( document ).ready(function() {
    $("#btn").click(
		function(){
			sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');
			return false; 
		}
	);
});
 
function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:       url, 
        type:     "POST", 
        dataType: "html", 
        data: $("#"+ajax_form).serialize(), 
        success: function(response) { 
        	result = $.parseJSON(response);
            if(result.suc == 1){//Проверка успешно ли проведена валидация
                document.querySelector("#"+result_form).style.opacity = 1;//Окно с результатом становится видимым
                document.querySelector("#"+result_form).style.top = '300px';
                document.querySelector("#"+result_form).style.height = '50px';
                document.querySelector("#"+result_form).style.padding = '10px';
                $("#"+ajax_form).hide();
                $("#"+result_form).html(result.text);
            }else{
                document.querySelector("#"+result_form).style.opacity = 1;
                $("#"+result_form).html(result.text);
            }
    	},
    	error: function(response) { 
            $("#"+result_form).html('Ошибка. Данные не отправлены.');
    	}
 	});
}