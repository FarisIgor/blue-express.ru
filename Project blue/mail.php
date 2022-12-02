<?
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && !empty($_POST['name'])) {
    $message = 'Имя: ' . $_POST['name'] . ' ';
    $message .= 'Телефон: ' . $_POST['phone'] . ' ';
    if(!empty($_POST['text'])) {
        $message .= 'Текст: ' . $_POST['text'] . ' ';
    }
    if(!empty($_POST['o-ph'])) {
        $message .= 'Способ связи: телефон' . $_POST['o-ph'] . ' ';
    }
    $mailTo = "info@kwol.ru"; // Ваш e-mail
    $subject = "Уведомления | Kwol"; // Тема сообщения
    $headers= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: info@kwol.ru <info@kwol.ru>\r\n";
    if(mail($mailTo, $subject, $message, $headers)) {
        echo "Спасибо, ".$_POST['name'].",<br /> наш консультант свяжется с Вами <br /> и обсудит все задачи <br />будущего проекта!";
    } else {
        echo "".$_POST['name'].", сообщение не отправлено, возможно что-то пошло не так. Пожалуйста, повторите попытку позже!";
    }
}
?>
