<?php
// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $nickname = $_POST['nickname'];
    $reason = $_POST['reason'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Далее вы можете обработать эти данные, сохранить их в базе данных
    // или отправить их на страницу accept-inactive.php для рассмотрения модератором
    // Например:
    header("Location: moder/accept-inactive.php?nickname=$nickname&reason=$reason&start_date=$start_date&end_date=$end_date");
    exit;
} else {
    // Если форма не была отправлена, выводим сообщение об ошибке
    echo "Ошибка: форма не была отправлена.";
}
?>