-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 05 2021 г., 15:04
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel_portalnews`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(9, 'Образование', '2020-12-23', '2020-12-23'),
(10, 'Медицина', '2020-12-23', '2020-12-23'),
(11, 'Политика', '2020-12-23', '2020-12-23'),
(13, 'test', '2021-05-03', '2021-05-03');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `body`, `user_id`, `task_id`, `created_at`, `updated_at`) VALUES
(4, 'First comment', 8, 21, '2021-05-05', '2021-05-05');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoryId` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `image`, `categoryId`, `created_at`, `updated_at`) VALUES
(20, 'Какие ограничения отменяются или смягчаются в Эстонии с 3 мая?', 'Напомним, что первыми с 26 апреля были смягчены правила для занятий спортом, тренировок и деятельности по интересам на свежем воздухе.\r\n\r\nС 3 мая частично открываются общеобразовательные школы и магазины, также можно будет есть на открытых террасах заведений общепита, учитывая ограничения, связанные с часами работы, правилами передвижения, рассадки и заполняемости. Если эпидемиологическая обстановка позволит, в течение мая ограничения будут ослаблены дополнительно.\r\n\r\nПри движении в общественных помещениях останутся в силе правило 2+2 и обязанность носить маску.', '13677259t1h6d32.jpg', 10, '2021-05-03', '2021-05-03'),
(21, 'Более сотни эстонских мотоциклистов открыли сезон', 'В субботу, 1 мая, в полдень около 170 мотоциклистов собрались, чтобы организовать мотопарад в Раквере. Этим заездом они хотели привлечь внимание к безопасности мотоциклистов на дороге и проинформировать водителей о том, что двухколесные транспортные средства снова участвуют в дорожном движении.', '13756497t1h721e.jpg', 9, '2021-05-03', '2021-05-03'),
(22, 'Правительство одобрило реформу системы поддержки детей с особыми потребностями', 'Правительство на прошлой неделе поддержало предложения по обновлению системы поддержки детей с особыми потребностями, как было указано в коалиционном договоре. Министерство социальных дел и министерство образования и науки совместно запустят реформу системы поддержки детей с особыми потребностями, цель которой – обеспечить детям получение более полноценной помощи быстрее и результативнее.', '13539575t1h0006.jpg', 11, '2021-05-03', '2021-05-03');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('user','admin','manager','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `name`, `created_at`, `updated_at`) VALUES
(6, 'admin@news.ee', '$2y$10$rj54J0u4wcUtVAEy/teQH.n4R8Zmk7m.1XxC/HdJMbhxxXnfgpg4u', 'admin', 'admin', '2021-05-05', '2021-05-05'),
(7, 'manager@news.ee', '$2y$10$a9GcHhiDbbAarBBD1si2huene4cXDj4N8Z6xlfmM9rGIwQ.WoYQeG', 'manager', 'manager', '2021-05-05', '2021-05-05'),
(8, 'user1@news.ee', '$2y$10$bWhllffTUcAD8MgjLcmP8.Aw.VslV.cQqFaJiyqdebSzNu7V5PQeK', 'user', 'user1', '2021-05-05', '2021-05-05'),
(9, 'user2@news.ee', '$2y$10$htN/4JoG.M2ZZpMW0f1Veu4e2QnTuTDiRxhYI8Robp4SmwNf0X9Mm', 'user', 'user2', '2021-05-05', '2021-05-05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
