-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 20 2019 г., 18:53
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `geek_brains_php`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `url`, `views`, `title`, `size`) VALUES
(1, 'img/1.jpg', 77, 'Картинка 1', 0),
(2, 'img/2.jpg', 6, 'Картинка 2', 0),
(3, 'img/3.jpg', 16, 'Картинка 3', 0),
(4, 'img/4.jpg', 2, 'Картинка 4', 0),
(5, 'img/5.jpg', 0, 'Картинка 5', 0),
(6, 'img/6.jpg', 3, 'Картинка 6', 0),
(7, 'img/7.jpg', 19, 'Картинка 7', 0),
(8, 'img/8.jpg', 5, 'Картинка 8', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date_create`) VALUES
(1, 'Новый сайт', 'Нам удалось создать сайтик с новостями', '2019-06-17 18:26:02'),
(2, 'Список новостей', 'Мы научились выводить новости на главной', '2019-06-21 18:31:31');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(11,2) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'img/no-image.jpeg',
  `dateCreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateChange` timestamp NULL DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `categoryId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `dateCreate`, `dateChange`, `isActive`, `categoryId`) VALUES
(1, 'товарчик изменен', 'стал новым', '101.00', 'img/2.jpg', '2019-03-29 06:40:16', NULL, 1, 1),
(2, 'товар', 'из модели 22', '101.00', 'img/2.jpg', '2019-03-29 06:40:16', NULL, 1, 1),
(3, 'товар', 'из модели', '100.00', 'img/3.jpg', '2019-03-29 06:40:16', NULL, 1, 1),
(4, 'товар', 'из модели', '100.00', 'img/4.jpg', '2019-03-29 06:40:16', NULL, 1, 2),
(5, 'товар', 'из модели', '100.00', 'img/5.jpg', '2019-03-29 06:40:16', NULL, 1, 2),
(6, 'товар', 'из модели', '100.00', 'img/6.jpg', '2019-03-29 06:40:16', NULL, 1, 2),
(7, 'товар', 'из модели', '100.00', 'img/8.jpg', '2019-03-29 06:40:16', NULL, 1, 2),
(8, 'товар', 'из модели', '100.00', 'img/1.jpg', '2019-03-29 06:40:16', NULL, 1, 2),
(9, 'товар', 'из модели', '100.00', 'img/2.jpg', '2019-03-29 06:40:16', NULL, 1, 3),
(10, 'товар', 'из модели', '100.00', 'img/3.jpg', '2019-03-29 06:40:16', NULL, 1, 3),
(11, 'товар', 'из модели', '100.00', 'img/4.jpg', '2019-03-29 06:40:16', NULL, 1, 3),
(12, 'товар', 'из модели', '100.00', 'img/5.jpg', '2019-03-29 06:40:16', NULL, 1, 3),
(15, 'Носок', 'Хлопок, желтые, с пальцами', '100.00', 'img/6.jpg', '2019-05-16 17:06:26', NULL, 1, NULL),
(21, 'test', 'test test test test', '300.00', '/img/products/5d33377a43dab0.28642016.jpg', '2019-07-20 15:47:06', NULL, 1, NULL),
(22, 'test2', 'test test test test', '566.00', '/img/products/5d333796a144a5.02472502.jpg', '2019-07-20 15:47:34', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `author`, `text`) VALUES
(6, 'Name', 'Comment'),
(7, 'Новый ', 'Новый коммент'),
(12, 'Имя', 'Hello'),
(13, 'test', 'test test'),
(14, 'Имя', 'Hello'),
(16, '', '\'&quot;;--/?&gt;&gt;');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `isActive` (`isActive`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
