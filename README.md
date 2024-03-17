# panel_on_php

Панель для модерации на PHP(Проект сделан для Rodina RP 04 serv). 

Как запустить:
1)Скачайте <a href="https://sourceforge.net/projects/xampp/" target="_blank">xampp</a>
2)Запустите в нем откладку MySQL и Apache
3)Найдите в место скачивания xampp и в папке htdocs создайте папку moder
4)В эту папку скопируйте данный репозиторий с помощью команды которую надо ввести в терминал ``git clone https://github.com/Veracept/panel_on_php``
5)Зайдите на localhost/phpmyadmin/index.php -> Учетные записи -> там где имя хоста localhost кнопка Редактировать привилегии -> Change Password -> Введите пароль password
6) Зайдите в файл xampp\phpMyAdmin\config.inc.php и первая колона со значениями должна выглядеть так:
``/* Authentication type and info */
$cfg['Servers'][$i]['auth_type'] = 'cookie';
$cfg['Servers'][$i]['user'] = 'root';
$cfg['Servers'][$i]['password'] = '';
$cfg['Servers'][$i]['extension'] = 'mysqli';
$cfg['Servers'][$i]['AllowNoPassword'] = false;
$cfg['Lang'] = '';``
7) Далее заходите на localhost/phpmyadmin/index.php(вводя пароль для пользователя root) и создаете две таблицы со значениями со скринов:
Таблица moderators:
<img src="https://media.discordapp.net/attachments/949257404464390154/1219016400711192687/Screenshot_8.png?ex=6609c47e&is=65f74f7e&hm=5e1023e7609de38d52c868bfcc767b412f189a5d4f0e238fcead08824e383138&=&format=webp&quality=lossless&width=1440&height=633" alt="Таблица moderators">
Таблица users:
<img src="https://media.discordapp.net/attachments/949257404464390154/1219016400337768458/Screenshot_9.png?ex=6609c47e&is=65f74f7e&hm=9e95c6ee29c0469c53569c923ec005694bc9b66bad0b8736ce4dfe8d7267da8d&=&format=webp&quality=lossless&width=1440&height=261" alt="Таблица users">
8)Далее открываем localhost/moder и все должно работать.
