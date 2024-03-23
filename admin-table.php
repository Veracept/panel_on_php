<?php
require_once __DIR__ . '/src/helpers.php';

checkAuth();
checkAuthorizedUserId($allowedIds);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Таблица Модерации[Admin]</title>
  </head>
  <body>
    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Панель Модерации</h4>
              <p class="text-muted">Панель для легкого взаимодейсвия с модерацией, заменяет рутинные таблицы, легче в использовании. Разработано <a href = "https://veracept.pro" target="_blank">Veracept'ом</a>.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Полезные ссылки</h4>
              <ul class="list-unstyled">
                  <li><a href="https://rodina-nexus.com" class="text-white">Форум</a></li>
                  <li><a href="/moder/login.php" class="text-white">Войти</a></li>
                  <li><a href="https://vk.com/modersvo" class="text-white">Группа ВК</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
          <a href="/moder/index_if_login.php" class="navbar-brand d-flex align-items-center">
              <img src="https://rodina-nexus.com/data/assets/logo/logo.png" srcset="" alt="Rodina Nexus" width="225" height="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

  <div class="content">
    
    <div class="container">
      <h2 class="forh2">Таблица Модерации || Восточный Округ [Admin]</h2>

      <div class="table-responsive">

<table  class="table table-striped custom-table">
  <thead>
    <tr>
      
      <th scope="col"> № </th>
      <th scope="col">Nickname Модератора</th>
      <th scope="col">Уровень</th>
      <th scope="col">Действия</th>
  <tbody>

            <?php
            // Подключаем файл конфигурации
            require_once __DIR__ . '/src/config.php';


            // Выбираем всех модераторов из базы данных
            $sql = "SELECT id, nickname, level, notes,
            CASE 
                WHEN level = 'Тех.Админ Discord' THEN 1
                WHEN level = 'Главный Модератор' THEN 2
                WHEN level = 'Зам.Главного Модератора' THEN 3
                WHEN level = 'Куратор Модерации' THEN 4
                WHEN level = 'Специальный Модератор' THEN 5
                WHEN level = 'Модератор 3 lvl' THEN 6
                WHEN level = 'Модератор 2 lvl' THEN 7
                WHEN level = 'Модератор 1 lvl' THEN 8
                ELSE 9
            END AS level_order
        FROM moderators
        ORDER BY level_order ASC";
            $result = $conn->query($sql);
            $count = 1;

            if ($result->num_rows > 0) {
                // Выводим данные в таблицу
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $count++ . '.' . "</td>";
                    echo "<td>" . $row['nickname'] . "</td>";
                    echo "<td>" . $row['level'] . "<small class='d-block'>" . $row['notes'] . "</small></td>";
                    echo "<td>";
                    // Ссылка на страницу редактирования модератора
                    echo "<a href='updatemoder.php?id=" . $row['id'] . "'>Редактировать</a>";
                    // Ссылка на страницу удаления модератора
                    echo " | <a href='src\actions\deletemoder.php?id=" . $row['id'] . "'>Удалить</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Нет данных</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
<br>

<div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
        <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
        </g>
        </svg>
        </div>
        </div>
        <div class="contentt flex">
          <p>Keeper Inc 2021 - 2024 </p>
        </div>

    
</body>
</html>
