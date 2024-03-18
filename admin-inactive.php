<?php
// Подключение к базе данных (необходимо заменить параметры подключения на свои)
require_once __DIR__ . '/src/config.php';
require_once __DIR__ . '/src/helpers.php';

checkAuth();
checkAuthorizedUserId($allowedIds);

// Подключение к базе данных
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Запрос данных о модераторах с информацией о неактивности
$sql = "SELECT id, nickname, IFNULL(inactive, false) AS inactive FROM moderators";
$result = $conn->query($sql);
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
            <th scope="col">№</th>
            <th scope="col">Nickname</th>
            <th scope="col">Неактивен</th>
            <th scope="col">Действие</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            $count = 1;
            // Вывод данных о модераторах в виде таблицы
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $count++ . "</td>";
                echo "<td>" . $row['nickname'] . "</td>";
                echo "<td>" . ($row['inactive'] ? 'Да' : 'Нет') . "</td>";
                echo "<td>";
                if ($row['inactive']) {
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='moderator_id' value='" . $row['id'] . "'>";
                    echo "<input type='submit' name='cancel_inactive' value='Отменить неактив'>";
                    echo "</form>";
                }
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Нет данных</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
// Обработка действия кнопки "Отменить неактив"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancel_inactive'])) {
    $id = $_POST['moderator_id'];

    // Получаем текущее значение неактивности модератора
    $sql_get_inactive = "SELECT inactive FROM moderators WHERE id = $id";
    $result_inactive = $conn->query($sql_get_inactive);
    if ($result_inactive->num_rows > 0) {
        $row_inactive = $result_inactive->fetch_assoc();
        $current_inactive = $row_inactive['inactive'];

        // Обновляем значение неактивности на противоположное
        $new_inactive = $current_inactive ? 0 : 1;

        // Обновляем запись в таблице moderators, устанавливая значение поля inactive в новое значение
        $sql_update_inactive = "UPDATE moderators SET inactive = $new_inactive WHERE id = $id";
        if ($conn->query($sql_update_inactive) === TRUE) {
            echo "<script>console.log('Статус неактивности обновлен.');</script>";
        } else {
            echo "Ошибка при обновлении статуса неактивности: " . $conn->error;
        }
    } else {
        echo "Ошибка: Модератор с указанным ID не найден.";
    }
}
?>

</body>
</html>

<?php
// Закрываем соединение с базой данных
$conn->close();
?>
