-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 06 2022 г., 01:10
-- Версия сервера: 5.6.51
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ledi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `surname` varchar(16) NOT NULL,
  `birthday` varchar(16) NOT NULL,
  `gender` int(1) NOT NULL,
  `city` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `birthday`, `gender`, `city`) VALUES
(27, 'Nikita', 'Grinfeld', '1998-03-07', 0, 'Kirovsk'),
(28, 'Nikita', 'Grinfeld', '1998-03-07', 0, 'Kirovsk'),
(29, 'Nikita', 'Grinfeld', '1998-03-07', 0, 'Kirovsk'),
(30, 'Nikita', 'Grinfeld', '1998-03-07', 0, 'Kirovsk'),
(31, 'Nikita', 'Grinfeld', '1998-03-07', 0, 'Kirovsk'),
(32, 'Nikita', 'Grinfeld', '1998-03-07', 0, 'Kirovsk'),
(33, 'Nikita', 'Grinfeld', '1998-03-07', 0, 'Kirovsk'),
(34, 'Nikita', 'Grinfeld', '1998-03-07', 0, 'Kirovsk');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
