-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 19 2024 г., 16:46
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `moderators`
--

CREATE TABLE `moderators` (
  `id` int(255) UNSIGNED NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `vk` varchar(255) DEFAULT NULL,
  `discord_id` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `forum` varchar(255) DEFAULT NULL,
  `days_level` varchar(255) DEFAULT NULL,
  `days_ever` varchar(255) DEFAULT NULL,
  `reprimands` varchar(255) DEFAULT NULL,
  `warns` varchar(255) DEFAULT NULL,
  `date_lvl_up` date DEFAULT NULL,
  `number_of_actions` varchar(255) DEFAULT NULL,
  `moder_marks` varchar(255) DEFAULT NULL,
  `inactive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `moderators`
--

INSERT INTO `moderators` (`id`, `nickname`, `vk`, `discord_id`, `level`, `notes`, `prefix`, `forum`, `days_level`, `days_ever`, `reprimands`, `warns`, `date_lvl_up`, `number_of_actions`, `moder_marks`, `inactive`) VALUES
(7, 'Jon_Ramirez', 'https://vk.com/veracept', '869533477345849365', 'Зам.Главного Модератора', '♕', '//Ramirez', 'https://rodina-nexus.com/members/7/', '400', '600', '5', '5', '2024-03-14', '1018', '0', 0),
(10, 'Pavel_Cherenkov', 'https://vk.com/lapa_paha', '528841007924772865', 'Тех.Админ Discord', '♕', '//Черенков', 'https://rodina-nexus.com/members/1/', '400', '900', '0', '1', '2024-03-15', '15', '0', 0),
(11, 'Yuri_Green', 'https://vk.com/balaboy', '922206772826107915', 'Главный Модератор', '♕', '//Green', 'https://rodina-nexus.com/members/16/', '400', '200', '5', '5', '2024-03-14', '10', '0', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `password`) VALUES
(1, 'Илья', 'jonikrmz@gmail.com', 'uploads/avatar_1710258171.jfif', '$2y$10$I5bRtr5yH9aHFwbHc4Xx1uAAOv4sQDS3Xft2F2nDq25XPtvWdTIzG'),
(6, 'Jon_Ramirez', 'admin@gmail.com', 'uploads/avatar_1710260053.jfif', '$2y$10$I5bRtr5yH9aHFwbHc4Xx1uAAOv4sQDS3Xft2F2nDq25XPtvWdTIzG'),
(11, 'Kamil_Homer', 'looool@gmail.com', 'uploads/avatar_1710265859.jfif', '$2y$10$I5bRtr5yH9aHFwbHc4Xx1uAAOv4sQDS3Xft2F2nDq25XPtvWdTIzG');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `moderators`
--
ALTER TABLE `moderators`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
