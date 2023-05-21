-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 21 2023 г., 21:30
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bagshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `login` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`login`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `card`
--

CREATE TABLE `card` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `final_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `card`
--

INSERT INTO `card` (`id`, `user_id`, `product_id`, `quantity`, `final_price`) VALUES
(3, 30, 24, 1, 40),
(4, 30, 22, 1, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(24, 'Небольшие рюкзаки'),
(25, 'Сумки'),
(26, 'Большие рюкзаки');

-- --------------------------------------------------------

--
-- Структура таблицы `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'artyom@mail.ru'),
(2, 'artyom@mail.ru'),
(3, 'artyom@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `final_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `user_id`, `product_id`, `quantity`, `final_price`) VALUES
(13, 30, 20, 1, 60),
(14, 30, 21, 1, 70),
(15, 30, 22, 1, 20),
(16, 30, 23, 1, 30),
(17, 30, 24, 4, 160),
(18, 30, 22, 3, 60),
(19, 30, 23, 5, 150),
(20, 30, 22, 1, 20),
(21, 30, 23, 1, 30);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(120) NOT NULL,
  `cat_id` int NOT NULL,
  `image` varchar(60) NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `cat_id`, `image`, `price`) VALUES
(20, 'Небольшой рюкзак 1', 'Хороший продукт', 24, 'Небольшой-рюкзак1.png', 90),
(21, 'Небольшой рюкзак 2', 'Хороший продукт', 24, 'Небольшой-рюкзак2.png', 70),
(22, 'Сумка 1', 'Хороший продукт', 25, 'сумка1.png', 20),
(23, 'Сумка 2', 'Хороший продукт', 25, 'сумка2.png', 30),
(24, 'Большой рюкзак 1', 'Хороший продукт', 26, 'большой-рюкзак1.png', 40),
(25, 'Большой рюкзак 2', 'Хороший продукт', 26, 'большой-рюкзак2.png', 50);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(30, 'Artyom', 'tyom_05', 'artyom.a2.a@mail.ru', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `user_contacts`
--

CREATE TABLE `user_contacts` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user_contacts`
--

INSERT INTO `user_contacts` (`id`, `name`, `email`, `tel`, `message`) VALUES
(1, 'name', 'artyom@mail.ru', '654654', 'asdfasdf'),
(2, 'name', 'artyom@mail.ru', '645654', 'asdfasdfasdfasdfasdf'),
(3, 'name', 'artyom@mail.ru', '654654', 'asasdasd'),
(4, 'name', 'artyom@mail.ru', '654654', 'qerqwerqwer');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `card`
--
ALTER TABLE `card`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `user_contacts`
--
ALTER TABLE `user_contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
