<?php
require_once('src/config.php');
require_once __DIR__ . '/src/helpers.php';

checkAuth();

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

    <title>Таблица Модерации</title>

    <script>
        // Устанавливаем таймер на 24 часа (в миллисекундах)
        setTimeout(function() {
            // Отправляем запрос на сервер для выполнения инкрементации
            fetch('src/actions/increment.php', {
                method: 'POST'
            }).then(response => {
                if (response.ok) {
                    console.log('Значения days успешно инкрементированы.');
                } else {
                    console.error('Ошибка при инкрементации значений days.');
                }
            }).catch(error => {
                console.error('Ошибка:', error);
            });
        }, 24 * 60 * 60 * 1000); // 24 часа
    </script>

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
      <h2 class="forh2">Таблица Модерации || Восточный Округ</h2>
      

      <div class="table-responsive">

        <table  class="table table-striped custom-table">
          <thead>
            <tr>
              
              <th scope="col"> № </th>
              <th scope="col">Nickname Модератора</th>
              <th scope="col">Уровень</th>
              <th scope="col">Префикс</th>
              <th scope="col">ФА</th>
              <th scope="col">Кол-во дней(уровень)</th>
              <th scope="col">Кол-во дней(вообщем)</th>
              <th scope="col">Строгие</th>
              <th scope="col">Устные</th>
              <th scope="col">Дата повышения</th>
              <th scope="col">Кол-во действий</th>
              <th scope="col">Модер-Марки</th>
          <tbody>

            <?php

            // Подключение к базе данных
            $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

            // Проверка подключения
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Запрос данных из базы данных
            $sql = "SELECT * FROM moderators ORDER BY
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
    END";
            $result = $conn->query($sql);
            
            $count = 1;

            if ($result->num_rows > 0) {
                // Вывод данных в таблицу
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $count++ . "</td>"; // id столбец должен быть в вашей таблице базы данных
                    echo "<td><a href='" . $row['vk'] . "' target='_blank'>" . $row['nickname'] . "</a></td>";
                    echo "<td>" . $row['level'] . "<small class='d-block'>" . $row['notes'] . "</small></td>";
                    echo "<td>" . $row['prefix'] . "</td>";
                    echo "<td><a href='" . $row["forum"] . "' target='_blank'>ФА</a></td>";
                    echo "<td>" . $row['days_level']. "</td>"; // Форматирование даты
                    echo "<td>" . $row['days_ever'] . "</td>"; // Форматирование даты
                    echo "<td>" . $row['reprimands'] . "</td>";
                    echo "<td>" . $row['warns'] . "</td>";
                    echo "<td>" . date("Y-m-d", strtotime($row['date_lvl_up'])) . "</td>"; // Форматирование даты
                    echo "<td>" . $row['number_of_actions'] . "</td>";
                    echo "<td>" . $row['moder_marks'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "0 результатов";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    </div>
          </div>
          </div>
    <script src="js/main.js"></script>
</body>
</html>