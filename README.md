# panel_on_php

<h2>Панель для модерации на PHP(Проект сделан для Rodina RP 04 serv).</h2>
<br>
<h3>Как запустить:</h3>
1)Скачайте <a href="https://sourceforge.net/projects/xampp/" target="_blank">xampp</a><br>
2)Запустите в нем откладку MySQL и Apache<br>
3)Найдите в место скачивания xampp и в папке htdocs создайте папку moder<br>
4)В эту папку скопируйте данный репозиторий с помощью команды которую надо ввести в терминал ``git clone https://github.com/Veracept/panel_on_php``<br>
5)Зайдите на localhost/phpmyadmin/index.php -> Учетные записи -> там где имя хоста localhost кнопка Редактировать привилегии -> Change Password -> Введите пароль password<br>
6) Зайдите в файл xampp\phpMyAdmin\config.inc.php и первая колона со значениями должна выглядеть так:<br>
``/* Authentication type and info */<br>
$cfg['Servers'][$i]['auth_type'] = 'cookie';<br>
$cfg['Servers'][$i]['user'] = 'root';<br>
$cfg['Servers'][$i]['password'] = '';<br>
$cfg['Servers'][$i]['extension'] = 'mysqli';<br>
$cfg['Servers'][$i]['AllowNoPassword'] = false;<br>
$cfg['Lang'] = '';``<br>
7) Далее заходите на localhost/phpmyadmin/index.php(вводя пароль для пользователя root) и создаете две таблицы со значениями со скринов:<br>
Таблица moderators:
<img src="https://media.discordapp.net/attachments/949257404464390154/1219016400711192687/Screenshot_8.png?ex=6609c47e&is=65f74f7e&hm=5e1023e7609de38d52c868bfcc767b412f189a5d4f0e238fcead08824e383138&=&format=webp&quality=lossless&width=1440&height=633" alt="Таблица moderators">
Таблица users:<br>
<img src="https://media.discordapp.net/attachments/949257404464390154/1219016400337768458/Screenshot_9.png?ex=6609c47e&is=65f74f7e&hm=9e95c6ee29c0469c53569c923ec005694bc9b66bad0b8736ce4dfe8d7267da8d&=&format=webp&quality=lossless&width=1440&height=261" alt="Таблица users">
8)Далее открываем localhost/moder и все должно работать.
