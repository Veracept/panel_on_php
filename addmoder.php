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

    <title>Добавить Модератора</title>

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
        margin-top: 10px;
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


    <form class="qwwe" action="src/actions/addmoder.php" method="post">

    <h2>Форма для модератора</h2>

    <label for="nickname">Nickname Модератора:</label>
        <input type="text" id="nickname" name="nickname"><br><br>

        <label for="vk">ВК:</label>
        <input type="text" id="vk" name="vk"><br><br>

        <label for="vk">Discord ID:</label>
        <input type="text" id="discord_id" name="vk"><br><br>

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

        <label for="level">Доп. Инфа(заметки):</label>
        <input type="text" id="level" name="notes"><br><br>

        <label for="prefix">Префикс:</label>
        <input type="text" id="prefix" name="prefix"><br><br>

        <label for="forum">Форум:</label>
        <input type="text" id="forum" name="forum"><br><br>

        <!-- <label for="days_level">Дата постановления:</label>
        <input type="text" id="days_level" name="days_level"><br><br> -->

        <label for="days_ever">Дата постановления:</label>
        <input type="text" id="days_ever" name="days_ever"><br><br>

        <label for="reprimands">Строгие:</label>
        <input type="text" id="reprimands" name="reprimands"><br><br>

        <label for="warns">Устные:</label>
        <input type="text" id="warns" name="warns"><br><br>

        <label for="date_lvl_up">Дата повышения:</label>
        <input type="date" id="date_lvl_up" name="date_lvl_up"><br><br>

        <label for="number_of_actions">Кол-во действий:</label>
        <input type="text" id="number_of_actions" name="number_of_actions"><br><br>

        <label for="moder_marks">Модер-Марки:</label>
        <input type="text" id="moder_marks" name="moder_marks"><br><br>

        <input type="submit" value="Отправить">
    </form>


  <script src="js/main.js"></script>
  </body>

</html>
