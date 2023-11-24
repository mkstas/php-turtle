-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 21 2022 г., 08:53
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `turtle`
--

-- --------------------------------------------------------

--
-- Структура таблицы `code`
--

CREATE TABLE `code` (
  `code_id` int NOT NULL,
  `user_id` int NOT NULL,
  `html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `css` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `js` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `code`
--

INSERT INTO `code` (`code_id`, `user_id`, `html`, `css`, `js`) VALUES
(1, 1, '', '', ''),
(4, 21, '<div class=\"kik\">\n  <span>Я</span>\n  <span>Кик</span>\n</div>', '.kik {\n  display: flex;\n  justify-content: space-between;\n  padding: 0 50px 0;\n}\n\n.kik span {\n  font-size: 50px;\n}', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `nickname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `nickname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@mail.com', '$2y$10$msfSuynnyoe5ti6fMMJcjOFeVniKrfh6cQA2oSwf2OA3DhS.vS0mS', '2022-11-29 19:46:15', '2022-11-29 19:46:15'),
(19, 'nic', 'nic@mail.com', '$2y$10$FnPj4bA0BBMotLTFjloIyu3zEIEiASFM4fprObguq1g5GUbqWVyrS', '2022-12-10 19:17:30', '2022-12-10 19:17:30'),
(21, 'Kik', 'kik@mail.com', '$2y$10$0Wy9/6IKMjaoGwXvNwBXaexTfcYTui3SOWzBs6HFrnCGNgiPNf4Qq', '2022-12-11 20:03:27', '2022-12-11 20:03:27');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`code_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `code`
--
ALTER TABLE `code`
  MODIFY `code_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `code`
--
ALTER TABLE `code`
  ADD CONSTRAINT `code_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
