<?php
require_once __DIR__ . '/src/helpers.php';

checkAuth();
checkAuthorizedUserId($allowedIds);

?>

<?php
// Подключаем файл конфигурации и файл с функциями для работы с базой данных
require_once('src/config.php');

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
            $vk = $_POST['vk'];
            $discord_id = $_POST['discord_id'];
            $level = $_POST['level'];
            $notes = $_POST['notes'];
            $prefix = $_POST['prefix'];
            $forum = $_POST['forum'];
            // $days_level = $_POST['days_level'];
            $days_ever = $_POST['days_ever'];
            $reprimands = $_POST['reprimands'];
            $warns = $_POST['warns'];
            $date_lvl_up = $_POST['date_lvl_up'];
            $number_of_actions = $_POST['number_of_actions'];
            $moder_marks = $_POST['moder_marks'];
            
            // Обновляем запись в базе данных
            $sql_update = "UPDATE moderators SET 
                nickname = '$nickname', 
                vk = '$vk', 
                discord_id = '$discord_id',
                level = '$level', 
                notes = '$notes', 
                prefix = '$prefix', 
                forum = '$forum', 
                days_ever = '$days_ever', 
                reprimands = '$reprimands', 
                warns = '$warns', 
                date_lvl_up = '$date_lvl_up', 
                number_of_actions = '$number_of_actions', 
                moder_marks = '$moder_marks' 
            WHERE id = $id";

            if ($conn->query($sql_update) === TRUE) {
                echo "Запись успешно обновлена";
            } else {
                echo "Ошибка при обновлении записи: " . $conn->error;
            }
        }
    } else {
        // Если запись с указанным идентификатором не найдена, перенаправляем пользователя на страницу с данными
        header("Location: table.php");
        exit();
    }
} else {
    // Если не был передан идентификатор записи, перенаправляем пользователя на страницу с данными
    header("Location: table.php");
    exit();
}
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

    <title>Обновление Записи</title>

  </head>

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


  <body>

<style>

    label{
        color:rgb(107, 107, 107);
    }

    input{
        width: auto;
        height: auto;
        background-color: white;
    }
    
    .qwwe{
        padding-top: 20px;
        padding-bottom: 20px;
        width:600px;
        height: auto;
        background-color: rgb(171, 167, 167);
        border-radius: 10px;
        text-align: center;
        margin: 0 auto;
        margin-top: 50px;
        margin-bottom: 10px;
        border: 2px solid grey;
        box-shadow: 4px 4px 20px black;
    }

    @media screen and (max-width: 768px) {
        .qwwe{
            padding: 30px;
            width: auto;
        }
}
</style>

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


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>" method="post" class="qwwe">

    
    <h2>Обновление записи</h2>
        <!-- Форма для обновления данных -->
        <label for="nickname">Nickname Модератора:</label>
        <input type="text" id="nickname" name="nickname" value="<?php echo $row['nickname']; ?>"><br><br>

        <label for="vk">VK Модератора:</label>
        <input type="text" id="vk" name="vk" value="<?php echo $row['vk']; ?>"><br><br>

        <label for="discord_id">Discord ID:</label>
        <input type="text" id="discord_id" name="discord_id" value="<?php echo $row['discord_id']; ?>"><br><br>
        
        <label for="level">Уровень:</label>
        <select id="level" name="level">
            <option value="Тех.Админ Discord">Тех.Админ Discord</option>
            <option value="Главный Модератор">Главный Модератор</option>
            <option value="Зам.Главного Модератора">Зам.Главного Модератора</option>
            <option value="Куратор Модерации">Куратор Модерации</option>
            <option value="Специальный Модератор">Специальный Модератор</option>
            <option value="Модератор 3 lvl">Модератор 3 lvl</option>
            <option value="Модератор 2 lvl">Модератор 2 lvl</option>
            <option value="Модератор 1 lvl">Модератор 1 lvl</option>
        </select><br><br>

        <label for="notes">Доп. Инфа(заметки):</label>
        <input type="text" id="notes" name="notes" value="<?php echo $row['notes']; ?>"><br><br>
        
        <label for="prefix">Префикс:</label>
        <input type="text" id="prefix" name="prefix" value="<?php echo $row['prefix']; ?>"><br><br>
        
        <label for="forum">ФА:</label>
        <input type="text" id="forum" name="forum" value="<?php echo $row['forum']; ?>"><br><br>
        
        <!-- <label for="days_level">Дата постановления:</label>
        <input type="text" id="days_level" name="days_level" value="<?php echo $row['days_level']; ?>"><br><br> -->
        
        <label for="days_ever">Дата постановления:</label>
        <input type="text" id="days_ever" name="days_ever" value="<?php echo $row['days_ever']; ?>"><br><br>
        
        <label for="reprimands">Строгие:</label>
        <input type="text" id="reprimands" name="reprimands" value="<?php echo $row['reprimands']; ?>"><br><br>
        
        <label for="warns">Устные:</label>
        <input type="text" id="warns" name="warns" value="<?php echo $row['warns']; ?>"><br><br>
        
        <label for="date_lvl_up">Дата повышения:</label>
        <input type="text" id="date_lvl_up" name="date_lvl_up" value="<?php echo $row['date_lvl_up']; ?>"><br><br>
        
        <label for="number_of_actions">Кол-во действий:</label>
        <input type="text" id="number_of_actions" name="number_of_actions" value="<?php echo $row['number_of_actions']; ?>"><br><br>
        
        <label for="moder_marks">Модер-Марки:</label>
        <input type="text" id="moder_marks" name="moder_marks" value="<?php echo $row['moder_marks']; ?>"><br><br>
        
        <input type="submit" value="Обновить">
    </form>

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
<script src="js/main.js"></script>
</html>
