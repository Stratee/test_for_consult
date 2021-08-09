-- DBNAME = s90322j4_db

-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Авг 09 2021 г., 23:07
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `s90322j4_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appeal`
--
-- Создание: Авг 04 2021 г., 12:05
-- Последнее обновление: Авг 09 2021 г., 20:06
--

DROP TABLE IF EXISTS `appeal`;
CREATE TABLE `appeal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text,
  `reason_id` int(11) NOT NULL,
  `service_id` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `call_reasons`
--
-- Создание: Авг 01 2021 г., 17:04
--

DROP TABLE IF EXISTS `call_reasons`;
CREATE TABLE `call_reasons` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `call_reasons`
--

INSERT INTO `call_reasons` (`id`, `name`) VALUES
(1, 'Подключение'),
(2, 'Смена тарифа'),
(3, 'Технические проблемы'),
(4, 'Другое');

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--
-- Создание: Авг 01 2021 г., 17:04
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Санкт-Петербург'),
(2, 'Новосибирск'),
(3, 'Екатеринбург'),
(4, 'Казань'),
(5, 'Нижний Новгород'),
(6, 'Челябинск'),
(7, 'Самара'),
(8, 'Омск'),
(9, 'Ростов-на-Дону'),
(10, 'Уфа'),
(11, 'Красноярск'),
(12, 'Воронеж'),
(13, 'Пермь'),
(14, 'Волгоград');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--
-- Создание: Авг 01 2021 г., 17:04
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `description`, `type`) VALUES
(1, '300 р. - 15 ГБ', 'mobile'),
(2, '400 р. - 30 ГБ', 'mobile'),
(3, '500 р. - 50 ГБ', 'mobile'),
(4, '500 р. - 100 Мбит/сек', 'home'),
(5, '600 р. - 150 Мбит/сек', 'home'),
(6, '700 р. - 250 Мбит/сек', 'home'),
(7, '650 р. - 100 Мбит/сек + 50 каналов', 'home+tv'),
(8, '850 р. - 150 Мбит/сек + 70 каналов', 'home+tv'),
(9, '1050 р. - 250 Мбит/сек + 150 каналов', 'home+tv');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Авг 03 2021 г., 13:07
-- Последнее обновление: Авг 09 2021 г., 20:06
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `phone_add` text,
  `city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appeal`
--
ALTER TABLE `appeal`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `call_reasons`
--
ALTER TABLE `call_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `appeal`
--
ALTER TABLE `appeal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `call_reasons`
--
ALTER TABLE `call_reasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
