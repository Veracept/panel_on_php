<?php
// Подключаемся к базе данных
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../helpers.php';

// SQL запрос для инкрементации значений
$sql = "UPDATE moderators SET 
            days_level = days_level + 1,
            days_ever = days_ever + 1
        WHERE 1";

// Выполняем SQL запрос
if ($conn->query($sql) === TRUE) {
    http_response_code(200); // Успешный ответ
} else {
    http_response_code(500); // Ошибка сервера
}

// Закрываем соединение с базой данных
$conn->close();
?>
