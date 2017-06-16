-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Чрв 16 2017 р., 11:50
-- Версія сервера: 10.1.21-MariaDB
-- Версія PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `guestbook`
--

-- --------------------------------------------------------

--
-- Структура таблиці `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment`, `published`, `created_at`, `modified_at`) VALUES
(1, 5, 'Well done!\r\nAww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.\r\n\r\nWhenever you need to, be sure to use margin utilities to keep things nice and tidy.', 1, '2017-06-15 17:21:47', '2017-06-15 17:21:47'),
(2, 1, 'В городе Александрия, штат Вирджиния, неизвестный ранил из огнестрельного оружия конгрессмена США от Республиканской партии Стива Скелиза\r\nКак передает Цензор.НЕТ, об этом пишет Reuters.\r\n\r\nУтром 14 июня неизвестный начал стрельбу по конгрессмену и его помощникам. Инцидент произошел на бейсбольной площадке в Александрии, штат Вирджиния, где законодатели проводили тренировку.', 1, '2017-06-15 17:23:13', '2017-06-15 17:23:13'),
(10, 1, 'Ну ка добавим ещё один коммент. И шо, не? Было не, теперь да', 1, '2017-06-16 01:38:00', '2017-06-16 01:38:00'),
(11, 6, 'Ну это ж просто песня ) И ещё какая!', 1, '2017-06-16 01:45:49', '2017-06-16 01:45:49');

-- --------------------------------------------------------

--
-- Структура таблиці `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `role` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `roles`
--

INSERT INTO `roles` (`id`, `role`, `name`) VALUES
(1, 'admin', 'Администратор'),
(2, 'registered', 'Зарегистрированный');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_visit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `password`, `avatar`, `published`, `created_at`, `modified_at`, `last_visit`) VALUES
(1, 1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'avatar.png', 1, '2017-06-15 09:15:25', '2017-06-15 09:15:25', '2017-06-15 09:15:25'),
(4, 2, 'test', 'Test@test.com', '098f6bcd4621d373cade4e832627b4f6', 'avatar.png', 1, '2017-06-15 09:15:30', '2017-06-16 11:46:49', '2017-06-15 09:15:30'),
(5, 2, 'Vasya Pupkin', 'vasya@mail.ua', '202cb962ac59075b964b07152d234b70', 'avatar.png', 1, '2017-06-15 17:07:19', '2017-06-16 00:56:56', '2017-06-15 17:07:19'),
(6, 2, 'Monster', 'monster@mail.ua', '202cb962ac59075b964b07152d234b70', 'avatar.png', 1, '2017-06-16 01:45:24', '2017-06-16 01:45:24', '2017-06-16 01:45:24');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблиці `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
