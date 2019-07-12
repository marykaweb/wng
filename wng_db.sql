-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 12 2019 г., 21:16
-- Версия сервера: 5.6.43
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wng_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_09_161339_create_news_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `is_published` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `description`, `created_by`, `is_published`, `created_at`, `updated_at`) VALUES
(4, 'Британские ученые воссоздали истинный облик и звук Стоунхенджа', 'perspektivy-trudoustroystva-1107191025', '<p>Ученые из Университета Солфорда (Великобритания) используя последние достижения из мира компьютерных технологий смогли воссоздать изначальный облик Стоунхенджа. Для этого с помощью 3D-печати была построена мини-модель знаменитого памятника.</p>', 1, 1, '2019-07-11 07:25:38', '2019-07-12 13:10:45'),
(5, 'Экосистема языка', 'ekosistema-yazyka-1107191025', '<p>Экосистема, вероятно, является самым важным фактором в принятии решения не использовать язык программирования. К счастью для нас, PHP существует достаточно давно, и его экосистема полна крупных, хорошо поддерживаемых и полнофункциональных фреймворков, которые все ненавидят &mdash; это и Laravel, своего рода эквивалент Rails, или энтерпрайз решения на подобии Symfony и Zend.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>В отличие от PHP, разработчикам Node не нужно беспокоиться о том, чтобы найти фреймворк, который придётся ненавидеть, потому что каждый просто пишет свой собственный. Создавая свои собственные фреймворки, разработчик может действительно выделиться на фоне конкурентов, изобретая колесо таким образом, который имеет смысл только для него самого (разработчика). Эта практика также удваивает гарантию сохранения работы, что очень важно, как показано в результатах научных&trade; исследований, приведенных выше. Также, это утраивает Фактор Крутости Разработчика&trade; (Developer Cool Factor&trade;).</p>', 1, 1, '2019-07-11 07:25:51', '2019-07-12 13:10:41'),
(6, 'Превращающиеся в планшет «умные» часы запатентовали в IBM', '2-1107191206', '<p>В компании IBM придумали &laquo;умные&raquo; часы, которые умеют превращаться в планшет. Разработчик подал документацию для получения патента еще в 2016 году, теперь информация о гаджете появилась на портале USPTO (Управления США по патентам и торговым маркам).</p>', 1, 1, '2019-07-11 09:06:18', '2019-07-12 13:10:37'),
(7, 'Профессии будущего: какие из них точно останутся через 10 лет', 'professii-budushchego-kakie-iz-nikh-tochno-o-1107191832', '<p>Профессии будущего: какие из них точно останутся через 10 лет&nbsp;Профессии будущего: какие из них точно останутся через 10 лет&nbsp;Профессии будущего: какие из них точно останутся через 10 лет&nbsp;Профессии будущего: какие из них точно останутся через 10 лет&nbsp;Профессии будущего: какие из них точно останутся через 10 лет&nbsp;Профессии будущего: какие из них точно останутся через 10 лет&nbsp;Профессии будущего: какие из них точно останутся через 10 лет</p>', 1, 1, '2019-07-11 15:32:40', '2019-07-12 13:10:33'),
(8, 'На Марс отправят роботов-скалолазов', 'novost-dnya-1207-1207191211', '<p>Инженеры из Лаборатории реактивного движения&nbsp;<em>NASA</em>&nbsp;заявили о создании нового поколения роботов, которые смогут лазать по скалам и кратерам Красной планеты, выбираться из грязи, исследовать ледяные пещеры, глубины океанов и взбираться на отвесные стены. О разработках&nbsp;сообщается&nbsp;на официальном сайте Космического агентства США.</p>', 1, 1, '2019-07-12 09:11:38', '2019-07-12 13:10:29'),
(9, 'В Планетарии пройдут концерты «Классика в темноте»', 'professii-budushchego-kakie-iz-nikh-tochno-o-1207191212', '<p>Программа придется по вкусу любителям классической и инструментальной музыки, ценителям новых форм искусства и просто всем неравнодушным к эстетике&nbsp;<strong>космоса</strong>.</p>', 1, 1, '2019-07-12 09:12:38', '2019-07-12 13:10:20');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@test.ru', '$2y$10$Hhw9V./mvvif77YIyZJ4z.M9Jatr2QTwlrmzQzNq.HGjq/B63qIti', 'pdgdpkmIGZvADrVVTUjTEMpb91xOne8O26X7wklo1MLgGFBgPPwsaYDYv5C1', '2019-07-11 07:21:50', '2019-07-11 07:21:50'),
(2, 'maryka', 'maryka@test.ru', '$2y$10$lFaUyOChI34V99JD4lfPVukmWoVdv0lt.pBxauwKcFPhq/Y2yHHle', NULL, '2019-07-11 15:32:18', '2019-07-11 15:32:18');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
