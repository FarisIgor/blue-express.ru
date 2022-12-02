$(document).ready(function () {
    $("form").submit(function () {
        // Получение ID формы
        var formID = $(this).attr('id');
        // Добавление решётки к имени ID
        var formNm = $('#' + formID);
        $.ajax({
            type: "POST",
            url: 'mail.php',
            data: formNm.serialize(),
            beforeSend: function () {
                // Вывод текста в процессе отправки
                $(formNm).html('<p class="send-text">Отправка...</p>');
            },
            success: function (data) {
                // Вывод текста результата отправки
                $(formNm).html('<p class="send-text">'+data+'</p>');
            },
            error: function (jqXHR, text, error) {
                // Вывод текста ошибки отправки
                $(formNm).html(error);
            }
        });
        return false;
    });
});
