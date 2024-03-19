<?php

require_once __DIR__ . '/../helpers.php';


// Получение данных из формы
$nickname = $_POST['nickname'];
$vk = $_POST['vk'];
$discord_id = $_POST['discord_id'];
$level = $_POST['level'];
$notes = $_POST['notes'];
$prefix = $_POST['prefix'];
$forum = $_POST['forum'];
$days_ever = $_POST['days_ever'];
$reprimands = $_POST['reprimands'];
$warns = $_POST['warns'];
$date_lvl_up = $_POST['date_lvl_up'];
$number_of_actions = $_POST['number_of_actions'];
$moder_marks = $_POST['moder_marks'];
// Получите остальные данные из формы

// Вставка данных в базу данных
$sql = "INSERT INTO moderators (nickname, level, notes, prefix, vk, discord_id, forum, days_ever, reprimands, warns, date_lvl_up, number_of_actions, moder_marks) VALUES ('$nickname', '$level','$notes', '$prefix', '$vk', '$discord_id', '$forum', '$days_ever', '$reprimands', '$warns', '$date_lvl_up', '$number_of_actions', '$moder_marks')";
// Добавьте остальные поля в запрос SQL

if ($conn->query($sql) === TRUE) {
    redirect('/moder/table.php');
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
