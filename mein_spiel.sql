-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 27 2023 г., 12:14
-- Версия сервера: 5.7.39
-- Версия PHP: 8.1.9

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
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
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
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `developers`
--

INSERT INTO `developers` (`id`, `name`) VALUES
(1, 'Независимый разработчик'),
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
(18, ' Hello Games'),
(19, 'Capcom'),
(20, 'Maxis');

-- --------------------------------------------------------

--
-- Структура таблицы `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `key` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `keys`
--

INSERT INTO `keys` (`id`, `key`, `game`) VALUES
(1, 'C6MCJL6W6C7JF1LX', 5),
(4, 'XWWR7X0XXX9A104B', 6),
(5, 'MGKQ0QP7F4FFON3P', 4),
(6, 'T8SNRHP5QNOZWJ0Z', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `game` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `client`, `game`, `count`, `status`) VALUES
(8, 1, 6, 1, 2),
(9, 1, 5, 1, 2),
(10, 1, 12, 2, 2),
(11, 1, 4, 2, 2),
(12, 1, 3, 1, 2),
(13, 1, 12, 2, 2),
(17, 1, 3, 1, 2),
(18, 1, 12, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `os`
--

CREATE TABLE `os` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
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
-- Структура таблицы `processor_models`
--

CREATE TABLE `processor_models` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `processor_models`
--

INSERT INTO `processor_models` (`id`, `name`) VALUES
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
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(4096) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_cost` int(11) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` int(11) NOT NULL,
  `developer` int(11) NOT NULL,
  `shop` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `processor` int(11) NOT NULL,
  `videocard` int(11) NOT NULL,
  `ram` int(11) NOT NULL,
  `memory` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `ssd` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `sale_cost`, `cost`, `image`, `publisher`, `developer`, `shop`, `os`, `processor`, `videocard`, `ram`, `memory`, `release_date`, `ssd`) VALUES
(3, 'Atomic Heart', 'Atomic Heart — приключенческий ролевой боевик с открытым миром, действие которого разворачивается в альтернативном Советском Союзе 1955 года.\r\nВнимание: для запуска игры требуется постоянное подключение к сети Интернет', 1649, 2499, 'f11ab0933f3b5559b797b12abdf963c4.jpg', 12, 12, 6, 5, 3, 5, 4, '75', '1970-01-01', 1),
(4, 'Resident Evil Village', 'Игра начинается через несколько лет после ужасных событий признанной критиками Resident Evil 7: Biohazard. Новая сюжетная линия начинается с того, что Итан Уинтерс и его жена Миа мирно живут на новом месте, свободные от прошлого. \r\n\r\nОни делают первые шаги в совместной жизни, как вдруг случается новая трагедия.', NULL, 2000, '8a42f801c2b892b018d2021a76379e6e.jpg', 3, 19, 1, 5, 3, 5, 3, '27', '2021-05-07', 0),
(5, 'Minecraft', '', NULL, 1999, '1264e54b59d3bbec68f37151d9449b19.png', 12, 1, 10, 3, 3, 3, 3, '2', '1970-01-01', 1),
(6, 'Assasins Creed Odyssey', 'Отправляйтесь в невероятное путешествие и пройдите путь от неприметного спартанского наемника до легендарного героя Греции. Играя за Алексиоса или Кассандру, раскройте тайны своего прошлого. Вы сможете добраться до самых дальних берегов Эгейского моря, по пути наживая врагов и обретая союзников. Вам встретятся исторические личности, мифические персонажи и не только, и ни одна из этих встреч не пройдет бесследно.', 1499, 1999, 'c03e15fafd3f6b4c113c951b3be39ad1.jpg', 8, 10, 1, 5, 7, 5, 5, '46', '2018-06-01', 0),
(7, 'Enter The Gungeon', 'Пули, пушки, каламбур', NULL, 349, '5b52ec3d487c350e5afe214a7c8e7bf1.png', 1, 1, 1, 5, 3, 5, 2, '2', '2016-04-05', 0),
(8, 'Far Cry 5', 'Судьба округа Хоуп - в ваших руках. Вступите в борьбу с сектой в одиночку или в совместном режиме, чтобы расстроить планы Иосифа Сида и его последователей. В самой масштабной игре серии в вашем распоряжении окажутся наемники, обученные животные и самый грозный арсенал по эту сторону Миссисипи.', 849, 1499, 'd8de17a6ca175eb1b32c9b13b150bc75.png', 8, 10, 1, 5, 7, 5, 5, '40', '2018-03-26', 0),
(9, 'Cyberpunk 2077', 'Откройте для себя мир киберпанка во всём его многообразии, от многогранной истории Cyberpunk 2077 и шпионских интриг в дополнении «Призрачная свобода» до трогательных эпизодов популярного аниме Cyberpunk: Edgerunners, завоевавшего множество наград. Опасный мегаполис Найт-Сити всегда найдёт, чем вас удивить', 1399, 1999, 'f176d00915286713af568169a38b7bd4.jpg', 1, 11, 1, 5, 12, 5, 6, '70', '2020-12-11', 1),
(12, 'Hotline Miami', 'Hotline Miami — это адреналиновый боевик, полный первобытной жестокости, смертельно опасных перестрелок и крышесносящих драк.', 199, 499, '4e97b4c6875a3e800f522a2f5511bd90.jpg', 12, 1, 1, 3, 3, 3, 1, '2.29', '2012-10-23', 0),
(14, 'Star Wars Battlefront 2', 'Воюйте рядом с друзьями и персонажами на разных планетах из всех трех эпох «Звёздных войн». Устраивайте дуэли на мокрых от дождя платформах Камино, сражайтесь с бойцами Первого ордена на базе «Старкиллер» в тундре и отбивайте нападение сепаратистов на дворец Тида на Набу.', 1049, 1999, '9f0b897a901c4beccd87d72363e4515a.jpg', 1, 1, 1, 8, 4, 8, 5, '80', '2017-11-17', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
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
(12, 'id Software'),
(13, 'Devolver digital');

-- --------------------------------------------------------

--
-- Структура таблицы `ram`
--

CREATE TABLE `ram` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
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
(8, '16GB'),
(9, '32GB'),
(10, '64GB');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `text` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Администратор'),
(2, 'Клиент');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(2, 'Завершён'),
(1, 'Ожидание оплаты');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `balance` int(11) NOT NULL,
  `avatar` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `balance`, `avatar`, `email`, `role`) VALUES
(1, 'testAcc', 'qweqwe', 953, 'default.png', 'test@acc', 1),
(2, 'testAcc12', 'qweqwe', 603, 'default.png', 'arturved07@gmail.com', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `videomemory_vars`
--

CREATE TABLE `videomemory_vars` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `videomemory_vars`
--

INSERT INTO `videomemory_vars` (`id`, `name`) VALUES
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
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game` (`game`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order` (`client`,`game`),
  ADD KEY `game` (`game`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `processor_models`
--
ALTER TABLE `processor_models`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher` (`publisher`,`developer`,`shop`),
  ADD KEY `developers` (`developer`),
  ADD KEY `activate_in` (`shop`),
  ADD KEY `os` (`os`,`processor`),
  ADD KEY `processor_model` (`processor`),
  ADD KEY `videocard` (`videocard`),
  ADD KEY `videomemory` (`videocard`),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`,`author`),
  ADD KEY `author` (`author`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Индексы таблицы `videomemory_vars`
--
ALTER TABLE `videomemory_vars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `activate_in`
--
ALTER TABLE `activate_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `processor_models`
--
ALTER TABLE `processor_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `ram`
--
ALTER TABLE `ram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `videomemory_vars`
--
ALTER TABLE `videomemory_vars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `keys`
--
ALTER TABLE `keys`
  ADD CONSTRAINT `keys_ibfk_1` FOREIGN KEY (`game`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`game`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`client`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`publisher`) REFERENCES `publishers` (`id`),
  ADD CONSTRAINT `products_ibfk_10` FOREIGN KEY (`processor`) REFERENCES `processor_models` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`developer`) REFERENCES `developers` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`shop`) REFERENCES `activate_in` (`id`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`os`) REFERENCES `os` (`id`),
  ADD CONSTRAINT `products_ibfk_7` FOREIGN KEY (`videocard`) REFERENCES `videomemory_vars` (`id`),
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
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
