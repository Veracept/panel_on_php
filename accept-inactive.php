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

    <title>Одобрить неактив <?php echo $_GET['nickname']; ?></title>

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


<form action="src/actions/process-inactive-request.php" method="post" class="qwwe">
<h2>Заявка на неактивность для модератора: <?php echo $_GET['nickname']; ?></h2>
    <label for="nickname">Nickname модератора:</label>
    <input type="text" id="nickname" name="nickname" value="<?php echo $_GET['nickname']; ?>" readonly><br><br>
    
    <label for="reason">Причина неактивности:</label>
    <input type="text" id="reason" name="reason" value="<?php echo $_GET['reason']; ?>" readonly><br><br>
    
    <label for="start_date">От какого числа неактив:</label>
    <input type="text" id="start_date" name="start_date" value="<?php echo $_GET['start_date']; ?>" readonly><br><br>
    
    <label for="end_date">До какого числа неактив:</label>
    <input type="text" id="end_date" name="end_date" value="<?php echo $_GET['end_date']; ?>" readonly><br><br>
    
    <input type="submit" name="approve" value="Одобрить">
    <input type="submit" name="reject" value="Отклонить">
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
