
$(document).ready(function () {

 $("#signin").submit(function (e) {
   e.preventDefault();

   let login = $.trim($("#login").val());
   let password = $.trim($("#password").val());


   if(login == '' || password == ''){


       $("#auth").html("<b style='color: red'>Поля логин/пароль не заполнены</b>");
   } else {
       $(this).unbind().submit();
   }


 });




});
// add post
$("#add_post").submit(function (e) {
    e.preventDefault();

    let name = $.trim($("#name").val());
    let email = $.trim($("#email").val());
    let text = $.trim($("#text").val());
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(name == '' || email == '' || text == ''){

        $("#empty_fields").html("<b style='color: red'>Соответствующие поля не заполнены</b>");
    }else{
        if(re.test(email)){
            $(this).unbind().submit();
        }else{
            $("#empty_fields").html("<b style='color: red'>Не валидный email</b>");
        }
    }







});




// редактирование поста

$(document).on("input",function(ev){
    $('#save').prop('disabled', false);
});


// статус
$(document).ready(function () {

    $('input').on("click",function(){


        let id = $(this).val();

        $.ajax({
            url: '/admin/updateStatus',
            type: 'post',
            data: {'status': id},
            success: function (data) {
              console.log(data);
            }
        });

    });

});
