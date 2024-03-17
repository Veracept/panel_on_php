<?php
require_once __DIR__ . '/src/helpers.php';

checkAuth();

$user = currentUser();
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
    <title>Панель Модерации</title>
    <style>

@media screen and (max-width: 768px) {
  .inner-header h1 {
    display: none;
  }
}

/* Расположить текст выше кнопок на мобильных устройствах */
@media screen and (max-width: 768px) {
  .inner-header {
    flex-direction: column;
    align-items: flex-start;
  }
}

@media screen and (max-width: 768px) {
  .container {
    margin-right: 0 !important;
  }
}

    </style>
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


    <div class="headerr">
        <div class="inner-header flex">
        <h1 style="margin-left: 150px"><img src="https://rodina-nexus.com/data/assets/logo/ico.png" style="width: 25; height: 25px;"> Панель Модерации || Хранитель</h1>

        <section style="margin-right: -200px;" class="py-5 text-center container">
            <div class="row py-lg-5">
              <div class="col-lg-6 col-md-8 mx-auto">
                <h2 class="fw-light">Добро пожаловать, <?php echo $user['name'] ?></h2>
                <p class="lead text-muted">Выбери опцию, которая тебе нужна</p>
                <p>
                  <a href="table.php" class="btn btn-primary my-2">Таблица Модерации</a>
                  <a href="inactive.php" class="btn btn-secondary my-2">Взять неактив</a>
                  <a href="https://rodina-nexus.com/threads/1619/" class="btn btn-secondary my-2">Обменять Модер-Марки</a>
                  <a href="/moder/profile.php" class="btn btn-secondary my-2">Профиль</a>
                </p>
              </div>
            </div>
          </section>

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