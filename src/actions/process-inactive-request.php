<?php
// Проверяем, была ли отправлена форма методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Подключаемся к базе данных (необходимо заменить параметры подключения на свои)
    require_once __DIR__ . '/../config.php';
    require_once __DIR__ . '/../helpers.php';

    // Проверяем соединение с базой данных
    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    // Получаем данные из формы
    $nickname = $_POST['nickname'];


    // Проверяем, была ли нажата кнопка "Одобрить"
    if (isset($_POST['approve'])) {
        // Обновляем запись в таблице moderators, устанавливая значение поля inactive в true
        $sql = "UPDATE moderators SET inactive = true WHERE nickname = '$nickname'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Запрос на неактивность одобрен.";
            header("refresh:3; url=/moder/admin.php");
        } else {
            echo "Ошибка при одобрении запроса: " . $conn->error;
            header("refresh:3; url=/moder/admin.php");
        }
    }

    // Проверяем, была ли нажата кнопка "Отклонить"
    if (isset($_POST['reject'])) {
        // Удаляем запись из таблицы moderators_inactive
        $sql = "UPDATE moderators SET inactive = false WHERE nickname = '$nickname'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Запрос на неактивность отклонен.";
            header("refresh:3; url=/moder/admin.php");
        } else {
            echo "Ошибка при отклонении запроса: " . $conn->error;
            header("refresh:3; url=/moder/admin.php");
        }
    }

    // Проверяем записи, у которых истекает срок неактивности
    // $sql = "UPDATE moderators SET inactive = false WHERE end_date <= NOW() AND inactive = true";
    // if ($conn->query($sql) === TRUE) {
    //     echo "Записи с истекшим периодом неактивности успешно обновлены.";
    // } else {
    //     echo "Ошибка при обновлении записей: " . $conn->error;
    // }

    // Закрываем соединение с базой данных
    $conn->close();
} else {
    // Если форма не была отправлена, выводим сообщение об ошибке
    echo "Ошибка: форма не была отправлена.";
    header("refresh:3; url=/moder/admin.php");
}
?>