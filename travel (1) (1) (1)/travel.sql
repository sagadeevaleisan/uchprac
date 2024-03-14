-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Мар 14 2024 г., 14:41
-- Версия сервера: 5.7.39
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `travel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `number` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrival` date NOT NULL,
  `departure` date NOT NULL,
  `first_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `room_pref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `number`, `status`, `reason`, `arrival`, `departure`, `first_name`, `last_name`, `phone`, `email`, `adults`, `children`, `room_pref`, `created_at`, `updated_at`) VALUES
(183, '1670923990', 'Новый', NULL, '2024-02-18', '2024-02-24', 'nasty', 'nabaly', '79658963214', 'elalala24@mail.ru', 1, 0, 'Standard', '2024-02-05 12:52:48', '2024-02-05 12:52:48'),
(184, '1561349351', 'Новый', NULL, '2024-02-03', '2024-02-24', '[p;', 'l;,pmkl', '87*94', 'lokp@k.cf', 1, 1, 'Standard', '2024-02-06 12:04:35', '2024-02-06 12:04:35'),
(185, '1075761811', 'Новый', NULL, '2024-03-22', '2024-03-28', 'Лейсан', 'Сагадеева', '89000000000', 'sahah@hm', 1, 0, 'Standard', '2024-03-14 06:25:28', '2024-03-14 06:25:28');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `hotel`, `price`, `created_at`, `image`) VALUES
(300, 'Байкал', '', 80000, '2023-11-02 09:40:41', 'asset/img/1.png'),
(500, 'Грузия', '', 84000, '2023-11-02 09:40:41', 'asset/img/2.png'),
(501, 'Мальдивы', '', 56500, '2023-11-02 09:40:41', 'asset/img/3.png'),
(502, 'Шри-Ланка', '', 79600, '2023-11-02 09:40:41', 'asset/img/4.png'),
(503, 'Кипр', '', 54600, '2023-11-02 09:40:41', 'asset/img/image16.png'),
(504, 'Пуэрто-Рико', '', 95000, '2023-11-02 09:40:41', 'asset/img/image17.png'),
(505, 'Египет', '', 45000, '2023-11-02 09:40:41', 'asset/img/image18.png'),
(506, 'Дубай', '', 60000, '2023-11-02 09:40:41', 'asset/img/image19.png'),
(507, 'Сидней', '', 50000, '2023-11-02 09:40:41', 'asset/img/image20.png'),
(508, 'Пхукет', 'sun', 90000, '2023-11-02 09:40:41', 'asset/img/image12.png'),
(509, 'Пхукет', 'sun+', 120000, '2023-11-02 09:40:41', 'asset/img/image12.png'),
(510, 'Тайланд', 'cap', 85000, '2023-11-02 09:40:41', 'asset/img/image13.png'),
(511, 'Пхукет', 'piple', 100000, '2023-11-02 09:40:41', 'asset/img/image12.png'),
(512, 'Тайланд', 'cat', 94000, '2023-11-02 09:40:41', 'asset/img/image13.png'),
(513, 'Тайланд', 'namber 1', 100000, '2023-11-02 09:40:41', 'asset/img/image13.png'),
(514, 'Сидней', 'may', 50000, '2023-11-02 09:40:41', 'asset/img/image20.png'),
(515, 'Сидней', 'moon', 54000, '2023-11-02 09:40:41', 'asset/img/image20.png'),
(516, 'Сидней', 'kaila', 59000, '2023-11-02 09:40:41', 'asset/img/image20.png'),
(517, 'Дубай', 'akra', 80000, '2023-11-02 09:40:41', 'asset/img/image19.png'),
(518, 'Дубай', 'ikra', 90000, '2023-11-02 09:40:41', 'asset/img/image19.png'),
(519, 'Дубай', 'room', 100000, '2023-11-02 09:40:41', 'asset/img/image19.png'),
(520, 'Египет', 'la minor', 55000, '2023-11-02 09:40:41', 'asset/img/image18.png'),
(521, 'Египет', 'le papa', 65000, '2023-11-02 09:40:41', 'asset/img/image18.png'),
(522, 'Египет', 'centroom', 75000, '2023-11-02 09:40:41', 'asset/img/image18.png'),
(523, 'Пуэрто-Рико', 'pyerto', 95000, '2023-11-02 09:40:41', 'asset/img/image17.png'),
(524, 'Пуэрто-Рико', 'riko', 98000, '2023-11-02 09:40:41', 'asset/img/image17.png'),
(525, 'Пуэрто-Рико', 'rikosun', 100000, '2023-11-02 09:40:41', 'asset/img/image17.png'),
(526, 'Куба', 'cuba', 80600, '2023-11-02 09:40:41', 'asset/img/image15.png'),
(527, 'Куба', 'cuba-libra', 82600, '2023-11-02 09:40:41', 'asset/img/image15.png'),
(528, 'Куба', 'cub', 85600, '2023-11-02 09:40:41', 'asset/img/image15.png'),
(529, 'Турция', 'tento', 56500, '2023-11-02 09:40:41', 'asset/img/image14.png'),
(530, 'Турция', 'sun-shain', 66500, '2023-11-02 09:40:41', 'asset/img/image14.png'),
(531, 'Турция', 'index', 76500, '2023-11-02 09:40:41', 'asset/img/image14.png'),
(532, 'Кипр', 'kipr', 55600, '2023-11-02 09:40:41', 'asset/img/image16.png'),
(533, 'Кипр', 'kap', 64600, '2023-11-02 09:40:41', 'asset/img/image16.png'),
(534, 'Кипр', 'krop', 66600, '2023-11-02 09:40:41', 'asset/img/image16.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@ds', 'admin', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=535;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
