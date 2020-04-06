
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

    if(name == '' || email == '' || text == ''){


        $("#empty_fields").html("<b style='color: red'>Соответствующие поля не заполнены</b>");
    } else {
        $(this).unbind().submit();
    }


});



$('#email').on('blur', function () {
    let email = $(this).val();

    if (email.length > 0
        && (email.match(/.+?\@.+/g) || []).length !== 1) {
        console.log('invalid');
        alert('Вы ввели некорректный e-mail!');
    } else {
        console.log('valid');
        alert('Вы ввели корректный e-mail!');
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
