<?php
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

    <title>Обновление Записи</title>

  </head>
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


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="qwwe">
<h2>Заказать неактив</h2>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Обработка формы и отправка данных на страницу обработки
    $nickname = $_POST['nickname'];
    $reason = $_POST['reason'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Путь к файлу с номером последней заявки
    $file_path = 'src\actions\last_request_number.txt';

    // Получение текущего номера заявки из файла
    $current_number = intval(file_get_contents($file_path));

    // Увеличение номера заявки на 1
$new_number = $current_number + 1;

// Сохранение нового номера в файл
file_put_contents($file_path, $new_number);


    // Обработка формы и вывод номера заявки
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nickname = $_POST['nickname'];
    $reason = $_POST['reason'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Вывод номера заявки
    echo "Ваша заявка на неактивность принята. Номер заявки: " . $current_number;
}

    // Здесь вы можете добавить код для валидации и сохранения данных в базу данных
echo "<br>";
    // Формирование ссылки на страницу accept-inactive.php
    $link = 'accept-inactive.php?' . http_build_query($_POST);
    echo "<p><a href='" . $link . "'>Ссылка на заявку, скопируйте ее и отправьте вашему руководству для одобрения</a></p>";
}
?>
    <label for="nickname">Ваш Nickname:</label>
    
    <input type="text" id="nickname" name="nickname"><br><br>
    
    <label for="reason">Причина неактивности(подробно):</label>
    <input type="text" id="reason" name="reason"><br><br>
    
    <label for="start_date">От какого числа неактив:</label>
    <input type="date" id="start_date" name="start_date"><br><br>
    
    <label for="end_date">До какого числа неактив:</label>
    <input type="date" id="end_date" name="end_date"><br><br>


    <input type="submit" value="Отправить запрос">

    <p id="links"></p>
</form>
</body>
</html>