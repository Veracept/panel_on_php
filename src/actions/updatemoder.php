<?php
// Подключаем файл конфигурации и файл с функциями для работы с базой данных
require_once __DIR__ . '/../config.php';



// Проверяем, был ли передан идентификатор записи для обновления
if(isset($_GET['id'])) {
    // Получаем идентификатор записи из URL-адреса
    $id = $_GET['id'];
    
    // Получаем данные из базы данных для записи с указанным идентификатором
    $sql = "SELECT * FROM moderators WHERE id = $id";
    $result = $conn->query($sql);
    
    // Проверяем, существует ли запись с указанным идентификатором
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        // Обработка формы обновления
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // Получаем новые данные из формы
            $nickname = $_POST['nickname'];
            $level = $_POST['level'];
            // Здесь должны быть остальные поля из формы
            
            // Обновляем запись в базе данных
            $sql_update = "UPDATE moderators SET nickname = '$nickname', level = '$level' WHERE id = $id";
            if ($conn->query($sql_update) === TRUE) {
                echo "Запись успешно обновлена";
            } else {
                echo "Ошибка при обновлении записи: " . $conn->error;
            }
        }
    } else {
        // Если запись с указанным идентификатором не найдена, перенаправляем пользователя на страницу с данными
        header("Location: /moder/table.php");
        exit();
    }
} else {
    // Если не был передан идентификатор записи, перенаправляем пользователя на страницу с данными
    header("Location: /moder/table.php");
    exit();
}
?>