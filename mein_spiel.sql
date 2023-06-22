-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 22 2023 г., 19:56
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mein_spiel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `activate_in`
--

CREATE TABLE `activate_in` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `activate_in`
--

INSERT INTO `activate_in` (`id`, `name`) VALUES
(1, 'Steam '),
(2, 'Origin'),
(3, 'Epic Games'),
(4, 'Mail.ru'),
(5, 'Riot Games'),
(6, 'VK PLAY'),
(7, 'GOG Games'),
(8, 'GameFly'),
(9, 'PS Store'),
(10, 'Microsoft Store');

-- --------------------------------------------------------

--
-- Структура таблицы `developers`
--

CREATE TABLE `developers` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `developers`
--

INSERT INTO `developers` (`id`, `name`) VALUES
(1, 'Capcom'),
(2, 'Bethesda Softworks'),
(3, 'Activision '),
(4, 'Naughty Dog'),
(5, 'Nintendo'),
(6, 'Blizzard'),
(7, 'Valve Corporation'),
(8, 'Electronic Arts'),
(9, 'RockStar Games'),
(10, 'Ubisoft'),
(11, 'CD Project RED'),
(12, 'Mundfish'),
(13, 'GSC Game World'),
(14, '4A Games'),
(15, 'Dynamic Pixels'),
(16, 'MOB Games'),
(17, 'Massive Entertainment'),
(18, ' Hello Games');

-- --------------------------------------------------------

--
-- Структура таблицы `os`
--

CREATE TABLE `os` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `os`
--

INSERT INTO `os` (`id`, `name`) VALUES
(1, 'Windows 95'),
(2, 'Windows 2000'),
(3, 'Windows XP'),
(4, 'Windows Vista'),
(5, 'Windows 7'),
(6, 'Windows 8'),
(7, 'Windows 8.1'),
(8, 'Windows 10'),
(9, 'Windows 11');

-- --------------------------------------------------------

--
-- Структура таблицы `processor_manufacturers`
--

CREATE TABLE `processor_manufacturers` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `processor_manufacturers`
--

INSERT INTO `processor_manufacturers` (`id`, `name`) VALUES
(1, 'Intel'),
(2, 'AMD');

-- --------------------------------------------------------

--
-- Структура таблицы `processor_models`
--

CREATE TABLE `processor_models` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `manafacturer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `processor_models`
--

INSERT INTO `processor_models` (`id`, `name`, `manafacturer`) VALUES
(3, 'Ryzen 3 1200', 2),
(4, 'Ryzen 3 2200', 2),
(5, 'Ryzen 3 3200', 2),
(6, 'Ryzen 3 5200', 2),
(7, 'Ryzen 5 1600', 2),
(8, 'Ryzen 5 2600', 2),
(9, 'Ryzen 5 3600', 2),
(10, 'Ryzen 5 5600', 2),
(11, 'Ryzen 5 7600', 2),
(12, 'Ryzen 7 1700', 2),
(13, 'Ryzen 7 2700', 2),
(14, 'Ryzen 7 3700', 2),
(15, 'Ryzen 7 5700', 2),
(16, 'Ryzen 7 7700', 2),
(17, 'Core i3 4300', 1),
(18, 'Core i3 6300', 1),
(19, 'Core i3 7300', 1),
(20, 'Core i3 8300', 1),
(21, 'Core i3 9300', 1),
(22, 'Core i3 10300', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(4096) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `sale_cost` int DEFAULT NULL,
  `cost` int NOT NULL,
  `product_image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` int NOT NULL,
  `developers` int NOT NULL,
  `activate_in` int NOT NULL,
  `os` int NOT NULL,
  `processor_model` int NOT NULL,
  `videomemory` int NOT NULL,
  `ram` int NOT NULL,
  `need_memory` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `publishers`
--

CREATE TABLE `publishers` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `publishers`
--

INSERT INTO `publishers` (`id`, `name`) VALUES
(1, 'Electronic Arts'),
(2, 'WARNER BROS. GAMES'),
(3, 'Capcom'),
(4, 'Nintendo'),
(5, 'Bandai Namco'),
(6, 'TinyBuild'),
(7, 'Konami'),
(8, 'Ubisoft'),
(9, 'Square Enix'),
(10, 'Tencent Games'),
(11, 'Rockstar Games'),
(12, 'id Software');

-- --------------------------------------------------------

--
-- Структура таблицы `ram`
--

CREATE TABLE `ram` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ram`
--

INSERT INTO `ram` (`id`, `name`) VALUES
(1, '<2GB'),
(2, '2GB'),
(3, '4GB'),
(4, '6GB'),
(5, '8GB'),
(6, '10GB'),
(7, '12GB'),
(8, '16GB');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int NOT NULL,
  `product` int NOT NULL,
  `author` int NOT NULL,
  `created_at` datetime NOT NULL,
  `review_text` varchar(4096) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int NOT NULL,
  `name_role` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `name_role`) VALUES
(1, 'Администратор'),
(2, 'Клиент');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `balance` int NOT NULL,
  `avatar` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `balance`, `avatar`, `email`, `role`) VALUES
(1, 'testAcc', 'qweqwe', 0, 'default.png', 'test@acc', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `videocard_manufacturers`
--

CREATE TABLE `videocard_manufacturers` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `videocard_manufacturers`
--

INSERT INTO `videocard_manufacturers` (`id`, `name`) VALUES
(1, 'Nvidia'),
(2, 'AMD'),
(3, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `videomemory_vars`
--

CREATE TABLE `videomemory_vars` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `videomemory_vars`
--

INSERT INTO `videomemory_vars` (`id`, `name`, `manufacturer`) VALUES
(1, '<2GB', 3),
(2, '2GB', 3),
(3, '4GB', 3),
(4, 'Gtx 1050 ', 1),
(5, 'Gtx 1050 Ti', 1),
(6, 'Gtx 1060', 1),
(7, 'Gtx 1070', 1),
(8, 'Gtx 1080', 1),
(9, 'Gtx 1650', 1),
(10, 'Gtx 1660', 1),
(11, 'Rtx 2060', 1),
(12, 'Rtx 2070', 1),
(13, 'Rtx 3060', 1),
(14, 'Gtx 780', 1),
(15, 'Gtx 750 Ti', 1),
(16, 'Gtx 960', 1),
(17, 'Gtx 970', 1),
(18, 'Gtx 680', 1),
(19, 'RX 470', 2),
(20, 'RX 480', 2),
(21, 'RX 570', 2),
(22, 'RX 580', 2),
(23, 'RX 5700 XT', 2),
(24, 'RX 6700XT', 2),
(25, 'Radeon Vega 56', 2),
(26, 'Radeon Vega 64', 2),
(27, 'RX 6500XT', 2),
(28, 'Radeon R9 M295X', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `activate_in`
--
ALTER TABLE `activate_in`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `processor_manufacturers`
--
ALTER TABLE `processor_manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `processor_models`
--
ALTER TABLE `processor_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manafacturer` (`manafacturer`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher` (`publisher`,`developers`,`activate_in`),
  ADD KEY `developers` (`developers`),
  ADD KEY `activate_in` (`activate_in`),
  ADD KEY `os` (`os`,`processor_model`),
  ADD KEY `processor_model` (`processor_model`),
  ADD KEY `videocard` (`videomemory`),
  ADD KEY `videomemory` (`videomemory`),
  ADD KEY `ram` (`ram`);

--
-- Индексы таблицы `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `product` (`product`,`author`),
  ADD KEY `author` (`author`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Индексы таблицы `videocard_manufacturers`
--
ALTER TABLE `videocard_manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `videomemory_vars`
--
ALTER TABLE `videomemory_vars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturer` (`manufacturer`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `activate_in`
--
ALTER TABLE `activate_in`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `os`
--
ALTER TABLE `os`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `processor_manufacturers`
--
ALTER TABLE `processor_manufacturers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `processor_models`
--
ALTER TABLE `processor_models`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `ram`
--
ALTER TABLE `ram`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `videocard_manufacturers`
--
ALTER TABLE `videocard_manufacturers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `videomemory_vars`
--
ALTER TABLE `videomemory_vars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `processor_models`
--
ALTER TABLE `processor_models`
  ADD CONSTRAINT `processor_models_ibfk_1` FOREIGN KEY (`manafacturer`) REFERENCES `processor_manufacturers` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`publisher`) REFERENCES `publishers` (`id`),
  ADD CONSTRAINT `products_ibfk_10` FOREIGN KEY (`processor_model`) REFERENCES `processor_models` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`developers`) REFERENCES `developers` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`activate_in`) REFERENCES `activate_in` (`id`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`os`) REFERENCES `os` (`id`),
  ADD CONSTRAINT `products_ibfk_7` FOREIGN KEY (`videomemory`) REFERENCES `videomemory_vars` (`id`),
  ADD CONSTRAINT `products_ibfk_9` FOREIGN KEY (`ram`) REFERENCES `ram` (`id`);

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id_role`);

--
-- Ограничения внешнего ключа таблицы `videomemory_vars`
--
ALTER TABLE `videomemory_vars`
  ADD CONSTRAINT `videomemory_vars_ibfk_1` FOREIGN KEY (`manufacturer`) REFERENCES `videocard_manufacturers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
