<?php
require_once __DIR__ . '/src/helpers.php';

// Проверяем, авторизован ли пользователь
checkAuth();

// Получаем данные текущего пользователя из обеих таблиц
$user = currentModerator();

$user2 = currentUser();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
                      
    <title>Профиль модератора <?php echo $user['nickname']; ?></title>
    <script>
        console.log(<?php echo json_encode($_SESSION); ?>);
        console.log("Привет, <?php echo $user['nickname']; ?>!");
        console.log("Уровень: <?php echo $user['level']; ?>");
        console.log("Строгие: <?php echo $user['reprimands']; ?>");
        console.log("Устные: <?php echo $user['warns']; ?>");
        console.log("Префикс: <?php echo $user['prefix']; ?>");
        console.log("Дата постановления: <?php echo $user['days_ever']; ?>");
        console.log("Дата повышения: <?php echo date("Y-m-d", strtotime($user['date_lvl_up'])); ?>");
        console.log("Кол-во действий: <?php echo $user['number_of_actions']; ?>");
        console.log("Модер-Марки: <?php echo $user['moder_marks']; ?>");
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
                  <li><a href="https://vk.com/tattoo_odi" class="text-white">Группа ВК</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
          <a href="/moder/index.php" class="navbar-brand d-flex align-items-center">
              <img src="https://rodina-nexus.com/data/assets/logo/logo.png" srcset="" alt="Rodina Nexus" width="225" height="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <?php if ($user): ?>

      <div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="<?php echo $user2['avatar'] ?>" alt="<?php echo $user2['name'] ?>">
                <div class="card-body text-center">
                    <h5 class="card-title">Привет, <?php echo $user['nickname']; ?>!</h5>
                    <p class="card-text">Восточный Округ</p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Ваш Профиль</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Уровень:</strong> <?php echo $user['level']; ?></li>
                        <li class="list-group-item"><strong>Строгие:</strong> <?php echo $user['reprimands']; ?></li>
                        <li class="list-group-item"><strong>Устные:</strong> <?php echo $user['warns']; ?></li>
                        <li class="list-group-item"><strong>Префикс:</strong> <?php echo $user['prefix']; ?></li>
                        <li class="list-group-item"><strong>Дата постановления:</strong> <?php echo $user['days_ever']; ?></li>
                        <li class="list-group-item"><strong>Дата повышения:</strong> <?php echo date("Y-m-d", strtotime($user['date_lvl_up'])); ?></li>
                        <li class="list-group-item"><strong>Кол-во действий:</strong> <?php echo $user['number_of_actions']; ?></li>
                        <li class="list-group-item"><strong>Модер-Марки:</strong> <?php echo $user['moder_marks']; ?></li>
                    </ul>
                    <div class="text-center mt-3">
                        <form action="src/actions/logout.php" method="post">
                            <button type="submit" class="btn btn-primary">Выйти из Аккаунта</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



        <?php else: ?>
            <p>Пользователь не найден.</p>
            <form action="src/actions/logout.php" method="post">
                            <button type="submit" class="btn btn-primary">Выйти из Аккаунта</button>
                        </form>
        <?php endif; ?>
    </div>


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
