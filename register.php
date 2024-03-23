<?php
require_once __DIR__ . '/src/helpers.php';

checkAuth();
checkAuthorizedUserId($allowedIds);
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
                      
    <title>Регистрация</title>
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


      <h2 class="forh22">Панель Модерации || Регистрация</h2>

    <div class="login" style="width: 450px">
        <div class="login-screen">
            <div class="app-title">
                <h1>Добро пожаловать!</h1>
            </div>

            <div class="login-form">

<form action="src/actions/register.php" method="post" enctype="multipart/form-data">

<div class="control-group">
<div class="login-form">

    <label for="name">
        <input
            type="text"
            id="name"
            name="name"
            placeholder="NickName модератора"
            value="<?php echo old('name') ?>"
            <?php echo validationErrorAttr('name'); ?>
        >
        <?php if(hasValidationError('name')): ?>
            <small><?php echo validationErrorMessage('name'); ?></small>
        <?php endif; ?>
    </label>

    <label class="login-field-icon fui-user" for="login-name"></label>
                  </div>

                  <div class="control-group">

    <label for="email">
        <input
            type="text"
            id="email"
            name="email"
            placeholder="email модератора"
            value="<?php echo old('email') ?>"
            <?php echo validationErrorAttr('email'); ?>
        >
        <?php if(hasValidationError('email')): ?>
            <small><?php echo validationErrorMessage('email'); ?></small>
        <?php endif; ?>
    </label>

    <label class="login-field-icon fui-lock" for="login-pass"></label>
                  </div>

    <label for="avatar">
        <input
            type="file"
            id="avatar"
            name="avatar"
            <?php echo validationErrorAttr('avatar'); ?>
        >
        <?php if(hasValidationError('avatar')): ?>
            <small><?php echo validationErrorMessage('avatar'); ?></small>
        <?php endif; ?>
    </label>

    <div class="control-group">

    <div class="grid">
        <label for="password">
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Пароль"
                <?php echo validationErrorAttr('password'); ?>
            >
            <?php if(hasValidationError('password')): ?>
                <small><?php echo validationErrorMessage('password'); ?></small>
            <?php endif; ?>
        </label>

            </div>


            <div class="control-group">
        <label for="password_confirmation">
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Подтверждение"
            >
        </label>

            </div>
    </div>

    <button
        type="submit"
        id="submit"
        
    >Зарегестрировать</button>
</form>
</div>
    </div>

<!-- <p style="text-align: center; color: white;">Уже есть аккуант?<a href="/moder/login.php"> Войти</a></p> -->

<script src="js/main.js"></script>
</body>
</html>
