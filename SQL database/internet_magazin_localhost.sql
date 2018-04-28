-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 28 2018 г., 16:12
-- Версия сервера: 10.1.29-MariaDB
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `internet_magazin_localhost`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `prim` text NOT NULL,
  `ID_UUID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `good_name` varchar(255) NOT NULL,
  `good_price` int(11) NOT NULL,
  `good_id_category` varchar(255) NOT NULL,
  `good_status` int(11) NOT NULL,
  `good_foto` varchar(255) DEFAULT NULL,
  `good_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `good_view` int(4) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `good_short_description` text NOT NULL,
  `ID_UUID` varchar(250) NOT NULL DEFAULT 'SELECT UUID()'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `good_name`, `good_price`, `good_id_category`, `good_status`, `good_foto`, `good_date`, `good_view`, `description`, `good_short_description`, `ID_UUID`) VALUES
(1, 'Mango People T-shirt', 152, 'Мужская одежда', 1, '/img/Index_Mango_People1.jpg', '2018-03-11 09:02:06', 20, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(2, 'Mango People T-shirt', 152, 'Женская одежда', 1, '/img/Index_Mango_People2.jpg', '2018-03-11 09:07:00', 1, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(3, 'Mango People T-shirt', 152, 'Мужская одежда', 1, '/img/Index_Mango_People3.jpg', '2018-03-11 09:08:58', 1, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(4, 'Mango People T-shirt', 152, 'Женская одежда', 1, '/img/Index_Mango_People4.jpg', '2018-03-11 09:11:37', 1, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(5, 'Mango People T-shirt', 152, 'Женская одежда', 1, '/img/Index_Mango_People5.jpg', '2018-03-11 09:11:37', 1, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(6, 'Mango People T-shirt', 152, 'Головные уборы', 1, '/img/Index_Mango_People6.jpg', '2018-03-11 09:11:37', 3, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(7, 'Mango People T-shirt', 152, 'Мужская одежда', 1, '/img/Index_Mango_People7.jpg', '2018-03-11 09:11:37', 1, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(8, 'Mango People T-shirt', 152, 'Головные уборы', 1, '/img/Index_Mango_People8.jpg', '2018-03-11 09:11:37', 1, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(9, 'Mango People T-shirt', 152, 'Мужская одежда', 1, '/img/Product_Mango_People1.jpg', '2018-03-11 09:22:09', 1, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(10, 'Mango People T-shirt', 152, 'Мужская одежда', 1, '/img/Product_Mango_People2.jpg', '2018-03-11 09:22:09', 5, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(11, 'Mango People T-shirt', 152, 'Мужская одежда', 1, '/img/Product_Mango_People4.jpg', '2018-03-11 09:22:09', 1, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(12, 'Mango People T-shirt', 152, 'Мужская одежда', 1, '/img/Product_Mango_People6.jpg', '2018-03-11 09:22:09', 1, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(13, 'Mango People T-shirt', 152, 'Мужская одежда', 1, '/img/Product_Mango_People8.jpg', '2018-03-11 09:22:09', 1, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(14, 'Mango People T-shirt', 152, 'Мужская одежда', 1, '/img/Product_Mango_People9.jpg', '2018-03-11 09:22:09', 1, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(15, 'Mango People T-shirt', 152, 'Женская одежда', 1, '/img/SP_big_picture.jpg', '2018-03-11 09:26:22', 10, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(16, 'BLAZE LEGGINGS', 152, 'Женская одежда', 1, '/img/SP_small_picture1.jpg', '2018-03-11 09:26:22', 1, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(17, 'ALEXA SWEATER', 152, 'Женская одежда', 1, '/img/SP_small_picture2.jpg', '2018-03-11 09:26:22', 13, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(18, 'AGNES TOP', 152, 'Женская одежда', 1, '/img/SP_small_picture3.jpg', '2018-03-11 09:26:22', 1, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(19, 'SYLVA SWEATER', 152, 'Женская одежда', 1, '/img/SP_small_picture4.jpg', '2018-03-11 09:26:22', 10, 'Какое-то описание товара', 'Это какой-то товар', '11111'),
(21, 'Новый товар', 100500, 'Мужская одежда', 9, '/img/Index_Mango_People1.jpg', '2018-03-19 12:21:33', 0, 'Новый това, добавленный через AdminTools', 'Новый това, добавленный через AdminTools', 'SELECT UUID()'),
(49, 'Неведома зверушка', 100500, 'Неведома зверушка', 111, '/img/1521910973-1307750137_39.jpg', '2018-03-24 17:02:53', 0, 'Неведома зверушка', 'Неведома зверушка', 'SELECT UUID()'),
(50, 'Неведома зверушка 2', 100500, 'Неведома зверушка', 111, '/img/1522062343-1307750137_39.jpg', '2018-03-26 11:05:43', 0, 'Неведома зверушка', 'Неведома зверушка', 'SELECT UUID()'),
(52, 'Муха ХА', 111, 'Неведома зверушка', 111, '/img/1522165487-foto10.jpg', '2018-03-27 15:44:47', 0, '111', '111', 'SELECT UUID()'),
(56, 'front-end-&-back-end', 100500, 'Неведома зверушка', 123, '/img/1522247583-HuRVHGG.jpg', '2018-03-28 13:25:32', 0, 'front-back-end', 'front-back-end', 'SELECT UUID()');

-- --------------------------------------------------------

--
-- Структура таблицы `goods_category`
--

CREATE TABLE `goods_category` (
  `id` int(11) NOT NULL,
  `value` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `goods_category`
--

INSERT INTO `goods_category` (`id`, `value`) VALUES
(1, 'Головные уборы'),
(2, 'Мужская одежда'),
(3, 'Женская одежда'),
(4, 'Обувь'),
(5, 'Неведома зверушка');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `role_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_name`, `login`, `password`, `role`, `role_id`) VALUES
(1, 'admin', 'admin', '63a9f0ea7bb98050796b649e85481845', 'admin', 255),
(2, 'user', 'user', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'user', 1),
(5, 'uzver', 'uzver', '79b73d38bcf4fb5f223790fedd57ae02', 'user', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods_category`
--
ALTER TABLE `goods_category`
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
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `goods_category`
--
ALTER TABLE `goods_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
