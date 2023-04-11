-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 11 2023 г., 21:14
-- Версия сервера: 5.6.51
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
  `id_shop` int(11) NOT NULL,
  `name_shop` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `activate_in`
--

INSERT INTO `activate_in` (`id_shop`, `name_shop`) VALUES
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
  `id_developer` int(11) NOT NULL,
  `name_developer` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `developers`
--

INSERT INTO `developers` (`id_developer`, `name_developer`) VALUES
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
  `id_os` int(11) NOT NULL,
  `name_os` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `os`
--

INSERT INTO `os` (`id_os`, `name_os`) VALUES
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
-- Структура таблицы `pocessor_models`
--

CREATE TABLE `pocessor_models` (
  `id_pmodel` int(11) NOT NULL,
  `name_pmodel` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pocessor_models`
--

INSERT INTO `pocessor_models` (`id_pmodel`, `name_pmodel`) VALUES
(3, 'Ryzen 3 1200'),
(4, 'Ryzen 3 2200'),
(5, 'Ryzen 3 3200'),
(6, 'Ryzen 3 5200'),
(7, 'Ryzen 5 1600'),
(8, 'Ryzen 5 2600'),
(9, 'Ryzen 5 3600'),
(10, 'Ryzen 5 5600'),
(11, 'Ryzen 5 7600'),
(12, 'Ryzen 7 1700'),
(13, 'Ryzen 7 2700'),
(14, 'Ryzen 7 3700'),
(15, 'Ryzen 7 5700'),
(16, 'Ryzen 7 7700'),
(17, 'Core i3 4300'),
(18, 'Core i3 6300'),
(19, 'Core i3 7300'),
(20, 'Core i3 8300'),
(21, 'Core i3 9300'),
(22, 'Core i3 10300');

-- --------------------------------------------------------

--
-- Структура таблицы `processor_generations`
--

CREATE TABLE `processor_generations` (
  `id_generation` int(11) NOT NULL,
  `name_generation` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `processor_generations`
--

INSERT INTO `processor_generations` (`id_generation`, `name_generation`) VALUES
(1, 'Intel'),
(2, 'AMD');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(4096) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sale_cost` int(11) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `product_image` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` int(11) NOT NULL,
  `developers` int(11) NOT NULL,
  `activate_in` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `processor_model` int(11) NOT NULL,
  `processor_generation` int(11) NOT NULL,
  `videocard` int(11) DEFAULT NULL,
  `videomemory` int(11) NOT NULL,
  `ram` int(11) NOT NULL,
  `need_memory` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `publishers`
--

CREATE TABLE `publishers` (
  `id_publisher` int(11) NOT NULL,
  `name_publisher` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `publishers`
--

INSERT INTO `publishers` (`id_publisher`, `name_publisher`) VALUES
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
  `id_ram` int(11) NOT NULL,
  `name_ram` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ram`
--

INSERT INTO `ram` (`id_ram`, `name_ram`) VALUES
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
  `id_review` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `review_text` varchar(4096) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
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
  `id_user` int(11) NOT NULL,
  `name_user` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `balance` int(11) NOT NULL,
  `avatar` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `videocard_models`
--

CREATE TABLE `videocard_models` (
  `id_vmodel` int(11) NOT NULL,
  `name_vmodel` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `videocard_models`
--

INSERT INTO `videocard_models` (`id_vmodel`, `name_vmodel`) VALUES
(1, 'Nvidia'),
(2, 'AMD');

-- --------------------------------------------------------

--
-- Структура таблицы `videomemory_vars`
--

CREATE TABLE `videomemory_vars` (
  `id_vmv` int(11) NOT NULL,
  `name_vmv` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `videomemory_vars`
--

INSERT INTO `videomemory_vars` (`id_vmv`, `name_vmv`) VALUES
(1, '<2GB'),
(2, '2GB'),
(3, '4GB'),
(4, 'Gtx 1050 '),
(5, 'Gtx 1050 Ti'),
(6, 'Gtx 1060'),
(7, 'Gtx 1070'),
(8, 'Gtx 1080'),
(9, 'Gtx 1650'),
(10, 'Gtx 1660'),
(11, 'Rtx 2060'),
(12, 'Rtx 2070'),
(13, 'Rtx 3060'),
(14, 'Gtx 780'),
(15, 'Gtx 750 Ti'),
(16, 'Gtx 960'),
(17, 'Gtx 970'),
(18, 'Gtx 680'),
(19, 'RX 470'),
(20, 'RX 480'),
(21, 'RX 570'),
(22, 'RX 580'),
(23, 'RX 5700 XT'),
(24, 'RX 6700XT'),
(25, 'Radeon Vega 56'),
(26, 'Radeon Vega 64'),
(27, 'RX 6500XT'),
(28, 'Radeon R9 M295X');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `activate_in`
--
ALTER TABLE `activate_in`
  ADD PRIMARY KEY (`id_shop`);

--
-- Индексы таблицы `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id_developer`);

--
-- Индексы таблицы `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id_os`);

--
-- Индексы таблицы `pocessor_models`
--
ALTER TABLE `pocessor_models`
  ADD PRIMARY KEY (`id_pmodel`);

--
-- Индексы таблицы `processor_generations`
--
ALTER TABLE `processor_generations`
  ADD PRIMARY KEY (`id_generation`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `publisher` (`publisher`,`developers`,`activate_in`),
  ADD KEY `developers` (`developers`),
  ADD KEY `activate_in` (`activate_in`),
  ADD KEY `os` (`os`,`processor_model`),
  ADD KEY `processor_generation` (`processor_generation`),
  ADD KEY `processor_model` (`processor_model`),
  ADD KEY `videocard` (`videocard`,`videomemory`),
  ADD KEY `videomemory` (`videomemory`),
  ADD KEY `ram` (`ram`);

--
-- Индексы таблицы `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id_publisher`);

--
-- Индексы таблицы `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id_ram`);

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
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role` (`role`);

--
-- Индексы таблицы `videocard_models`
--
ALTER TABLE `videocard_models`
  ADD PRIMARY KEY (`id_vmodel`);

--
-- Индексы таблицы `videomemory_vars`
--
ALTER TABLE `videomemory_vars`
  ADD PRIMARY KEY (`id_vmv`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `activate_in`
--
ALTER TABLE `activate_in`
  MODIFY `id_shop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `developers`
--
ALTER TABLE `developers`
  MODIFY `id_developer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `os`
--
ALTER TABLE `os`
  MODIFY `id_os` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `pocessor_models`
--
ALTER TABLE `pocessor_models`
  MODIFY `id_pmodel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `processor_generations`
--
ALTER TABLE `processor_generations`
  MODIFY `id_generation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id_publisher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `ram`
--
ALTER TABLE `ram`
  MODIFY `id_ram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `videocard_models`
--
ALTER TABLE `videocard_models`
  MODIFY `id_vmodel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `videomemory_vars`
--
ALTER TABLE `videomemory_vars`
  MODIFY `id_vmv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`publisher`) REFERENCES `publishers` (`id_publisher`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`developers`) REFERENCES `developers` (`id_developer`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`activate_in`) REFERENCES `activate_in` (`id_shop`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`os`) REFERENCES `os` (`id_os`),
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`processor_model`) REFERENCES `pocessor_models` (`id_pmodel`),
  ADD CONSTRAINT `products_ibfk_6` FOREIGN KEY (`processor_generation`) REFERENCES `processor_generations` (`id_generation`),
  ADD CONSTRAINT `products_ibfk_7` FOREIGN KEY (`videomemory`) REFERENCES `videomemory_vars` (`id_vmv`),
  ADD CONSTRAINT `products_ibfk_8` FOREIGN KEY (`videocard`) REFERENCES `videocard_models` (`id_vmodel`),
  ADD CONSTRAINT `products_ibfk_9` FOREIGN KEY (`ram`) REFERENCES `ram` (`id_ram`);

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product`) REFERENCES `products` (`id_product`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
