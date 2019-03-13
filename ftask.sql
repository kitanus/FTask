-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 13 2019 г., 19:22
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
-- База данных: `ftask`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bank`
--

CREATE TABLE `bank` (
  `id` int(20) NOT NULL,
  `name` varchar(70) NOT NULL,
  `BIK` int(10) NOT NULL,
  `сorresponding_account` varchar(50) NOT NULL,
  `сhecking_account` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bank`
--

INSERT INTO `bank` (`id`, `name`, `BIK`, `сorresponding_account`, `сhecking_account`) VALUES
(1, 'ФИЛИАЛ ПРИВОЛЖСКИЙ ПАО БАНК \"ФК ОТКРЫТИЕ\"', 42282881, '30101810300000000884', '40702810000190012886'),
(2, 'ОАО \"Сбербанк России\"', 44525225, '555555555555555555555', '444444444444444444444');

-- --------------------------------------------------------

--
-- Структура таблицы `building`
--

CREATE TABLE `building` (
  `id` int(20) NOT NULL,
  `number` int(20) NOT NULL,
  `house_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `building`
--

INSERT INTO `building` (`id`, `number`, `house_id`) VALUES
(1, 1, 1),
(2, 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int(20) NOT NULL,
  `name` varchar(10) NOT NULL,
  `subjects_of_the_country_id` int(20) NOT NULL,
  `country_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`, `subjects_of_the_country_id`, `country_id`) VALUES
(1, 'Москва', 0, 1),
(2, 'Казань', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Россия');

-- --------------------------------------------------------

--
-- Структура таблицы `direction`
--

CREATE TABLE `direction` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type_of_passage_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `direction`
--

INSERT INTO `direction` (`id`, `name`, `type_of_passage_id`, `city_id`) VALUES
(1, 'Сибгата Хакима', 1, 2),
(2, 'Строителей', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `house`
--

CREATE TABLE `house` (
  `id` int(30) NOT NULL,
  `number` int(20) NOT NULL,
  `direction_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `house`
--

INSERT INTO `house` (`id`, `number`, `direction_id`) VALUES
(1, 23, 1),
(2, 16, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `inventory_items`
--

CREATE TABLE `inventory_items` (
  `id` int(20) NOT NULL,
  `inventory_items_number` int(15) NOT NULL,
  `material_values` varchar(150) NOT NULL,
  `unit_of_measurement_id` int(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `power_of_attorney_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `inventory_items`
--

INSERT INTO `inventory_items` (`id`, `inventory_items_number`, `material_values`, `unit_of_measurement_id`, `quantity`, `power_of_attorney_id`) VALUES
(1, 1, 'Услуга 1', 1, '1 (Один)', 1),
(2, 1, 'Услуга 2', 1, '2 (Два)', 2),
(3, 1, 'Матерьяльная ценность 1', 3, '3 (Три)', 3),
(4, 1, 'Матерьяльная ценность 2', 2, '4 (Четыре)', 4),
(5, 1, 'Услуга 11', 1, '5 (Пять)', 5),
(6, 1, 'Услуга 1', 1, '5 (Пять)', 6),
(7, 1, 'Услуга 1', 3, '5 (Пять)', 7),
(8, 1, 'Услуга 112', 1, '6 (Шесть)', 8),
(9, 1, 'Услуга 123', 1, '11 (Одинадцать)', 9),
(10, 1, 'Услуга 123', 1, '11 (Одинадцать)', 10),
(11, 1, 'Услуга 1', 1, '20 (Двадцать)', 11),
(12, 1, 'Услуга 1', 1, '20 (Двадцать)', 12),
(13, 1, 'Услуга 1', 1, '20 (Двадцать)', 13),
(14, 1, 'шуруп', 2, '23 (Двадцать три)', 14),
(15, 1, 'Услуга 12', 1, '25 (Двадцать пять)', 13),
(16, 1, 'Услуга 12', 1, '25 (Двадцать пять)', 15),
(17, 1, 'Услуга 12', 1, '25 (Двадцать пять)', 16),
(18, 1, 'Услуга 12', 1, '25 (Двадцать пять)', 17),
(19, 1, 'Услуга 12', 1, '25 (Двадцать пять)', 18),
(20, 1, '221', 2, '12', 24),
(21, 1, '221', 2, '12', 24),
(22, 1, '221', 2, '123', 26);

-- --------------------------------------------------------

--
-- Структура таблицы `office`
--

CREATE TABLE `office` (
  `id` int(20) NOT NULL,
  `number` int(20) NOT NULL,
  `building_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `office`
--

INSERT INTO `office` (`id`, `number`, `building_id`) VALUES
(1, 3, 1),
(2, 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `organization`
--

CREATE TABLE `organization` (
  `id` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `INN` varchar(13) DEFAULT NULL,
  `KPP` varchar(10) DEFAULT NULL,
  `OKPO` varchar(11) DEFAULT NULL,
  `postcode` int(7) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `type_of_organization_id` int(11) DEFAULT NULL,
  `director_id` int(20) DEFAULT NULL,
  `office_id` int(20) DEFAULT NULL,
  `bank_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `organization`
--

INSERT INTO `organization` (`id`, `name`, `INN`, `KPP`, `OKPO`, `postcode`, `phone`, `type_of_organization_id`, `director_id`, `office_id`, `bank_id`) VALUES
(1, 'ООО \"ИТ-ПСГ\"', '1657221199', '165701001', '645885', 420124, '8(843)514-88-66', 1, 1, 1, 1),
(2, 'ООО \"ТАТИНКОМ-КОМПЬЮТЕРС\"', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL),
(3, 'ООО \"Лиана\"', '2222222222', '3333333333', '111111111', 129054, NULL, 1, NULL, 2, NULL),
(4, 'ООО \"Валенсия\"', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `passport`
--

CREATE TABLE `passport` (
  `id` int(20) NOT NULL,
  `series` int(5) NOT NULL,
  `number` int(10) NOT NULL,
  `issued_by` varchar(100) NOT NULL,
  `date_of_issue` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `passport`
--

INSERT INTO `passport` (`id`, `series`, `number`, `issued_by`, `date_of_issue`) VALUES
(1, 234, 123456789, 'Г. КАЗАНЬ НОВО-САВИНОВСКИЙ ПАСПОРТНЫЙ СТОЛ', '1986-05-13'),
(2, 4320, 987654321, 'Г. КАЗАНЬ АВИАСТРОИТЕЛЬНЫЙ ПАСПОРТНЫЙ СТОЛ', '1992-11-06'),
(3, 8453, 36346667, 'выдан кем надо', '1988-07-14'),
(4, 8453, 36346667, 'выдан кем надо', '1988-07-14'),
(5, 8453, 36346667, 'выдан кем надо', '1988-07-14');

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE `position` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `organization_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `position`
--

INSERT INTO `position` (`id`, `name`, `organization_id`) VALUES
(1, 'Директор', 1),
(2, 'Системный администратор', 1),
(3, 'Менеджер по закупкам', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `power_of_attorney`
--

CREATE TABLE `power_of_attorney` (
  `id` int(20) NOT NULL,
  `code` int(10) NOT NULL,
  `date` date NOT NULL,
  `date_end` date NOT NULL,
  `date_change` date DEFAULT NULL,
  `organization_id` int(10) NOT NULL,
  `consumer_id` int(10) NOT NULL,
  `bank_id` int(10) NOT NULL,
  `issued_to_user_id` int(10) NOT NULL,
  `provider_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `power_of_attorney`
--

INSERT INTO `power_of_attorney` (`id`, `code`, `date`, `date_end`, `date_change`, `organization_id`, `consumer_id`, `bank_id`, `issued_to_user_id`, `provider_id`) VALUES
(1, 315001, '2019-03-03', '2019-03-13', NULL, 1, 1, 1, 2, 2),
(2, 315001, '2019-03-03', '2019-03-13', NULL, 1, 1, 2, 2, 4),
(3, 315001, '2019-03-04', '2019-03-14', NULL, 3, 3, 1, 3, 2),
(4, 315001, '2019-03-04', '2019-03-14', NULL, 3, 3, 1, 3, 2),
(5, 315001, '2019-03-04', '2019-03-14', NULL, 1, 1, 1, 3, 2),
(6, 315001, '2019-03-04', '2019-03-14', NULL, 1, 1, 1, 2, 2),
(7, 315001, '2019-03-04', '2019-03-14', NULL, 1, 1, 1, 3, 2),
(8, 315001, '2019-03-05', '2019-03-15', NULL, 3, 3, 2, 3, 4),
(10, 315001, '2019-03-05', '2019-03-15', NULL, 1, 3, 1, 3, 2),
(11, 315001, '2019-03-05', '2019-03-15', NULL, 1, 3, 1, 2, 2),
(12, 315001, '2019-03-05', '2019-03-15', NULL, 1, 3, 1, 2, 2),
(13, 315001, '2019-03-05', '2019-03-15', NULL, 1, 3, 1, 2, 2),
(15, 315001, '2019-03-11', '2019-03-21', NULL, 1, 3, 1, 4, 2),
(16, 315001, '2019-03-11', '2019-03-21', NULL, 1, 3, 1, 4, 2),
(17, 315001, '2019-03-11', '2019-03-21', NULL, 1, 3, 1, 4, 2),
(18, 315001, '2019-03-11', '2019-03-21', NULL, 1, 3, 1, 4, 2),
(19, 315001, '2019-03-11', '2019-03-21', NULL, 1, 3, 1, 4, 2),
(20, 315001, '2019-03-11', '2019-03-21', NULL, 1, 3, 1, 4, 4),
(21, 315001, '2019-03-11', '2019-03-21', NULL, 1, 3, 1, 4, 4),
(22, 315001, '2019-03-11', '2019-03-21', NULL, 1, 3, 1, 4, 4),
(23, 315001, '2019-03-11', '2019-03-21', NULL, 1, 3, 1, 4, 4),
(24, 315001, '2019-03-11', '2019-03-21', NULL, 1, 3, 1, 4, 4),
(25, 315001, '2019-03-11', '2019-03-21', NULL, 1, 3, 1, 4, 4),
(26, 315001, '2019-03-11', '2019-03-21', '2019-03-11', 1, 3, 1, 4, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'administrator'),
(2, 'user'),
(3, 'guest');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects_of_the_country`
--

CREATE TABLE `subjects_of_the_country` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `view_of_the_subject_of_the_country_id` int(10) NOT NULL,
  `country_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subjects_of_the_country`
--

INSERT INTO `subjects_of_the_country` (`id`, `name`, `view_of_the_subject_of_the_country_id`, `country_id`) VALUES
(1, 'Татарстан', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `type_of_organization`
--

CREATE TABLE `type_of_organization` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_of_organization`
--

INSERT INTO `type_of_organization` (`id`, `name`) VALUES
(1, 'customer'),
(2, 'provider');

-- --------------------------------------------------------

--
-- Структура таблицы `type_of_passage`
--

CREATE TABLE `type_of_passage` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_of_passage`
--

INSERT INTO `type_of_passage` (`id`, `name`) VALUES
(1, 'Улица'),
(2, 'Проспект');

-- --------------------------------------------------------

--
-- Структура таблицы `unit_of_measurement`
--

CREATE TABLE `unit_of_measurement` (
  `id` int(20) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `unit_of_measurement`
--

INSERT INTO `unit_of_measurement` (`id`, `name`) VALUES
(1, 'усл'),
(2, 'шт'),
(3, 'уп');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `name` varchar(22) NOT NULL,
  `surname` varchar(22) NOT NULL,
  `patronymic` varchar(22) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status_id` int(20) NOT NULL,
  `position_id` int(20) NOT NULL,
  `passport_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `patronymic`, `login`, `password`, `status_id`, `position_id`, `passport_id`) VALUES
(1, 'Марат', 'Юсупов', 'Равильевич', 'marat', 'taram', 1, 1, 0),
(2, 'Иван', 'Иванов', 'Иванович', 'ivan', 'navi', 2, 2, 1),
(3, 'Егор', 'Антонов', 'Александрович', 'egor', 'roge', 3, 3, 2),
(4, 'Радион', 'Раскольников', 'Александрович', 'radion', 'noidar', 2, 3, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `view_of_the_subject_of_the_country`
--

CREATE TABLE `view_of_the_subject_of_the_country` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `view_of_the_subject_of_the_country`
--

INSERT INTO `view_of_the_subject_of_the_country` (`id`, `name`) VALUES
(1, 'Республика'),
(2, 'Область');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `direction`
--
ALTER TABLE `direction`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `passport`
--
ALTER TABLE `passport`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `power_of_attorney`
--
ALTER TABLE `power_of_attorney`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subjects_of_the_country`
--
ALTER TABLE `subjects_of_the_country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_of_organization`
--
ALTER TABLE `type_of_organization`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_of_passage`
--
ALTER TABLE `type_of_passage`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `unit_of_measurement`
--
ALTER TABLE `unit_of_measurement`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `view_of_the_subject_of_the_country`
--
ALTER TABLE `view_of_the_subject_of_the_country`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `building`
--
ALTER TABLE `building`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `direction`
--
ALTER TABLE `direction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `house`
--
ALTER TABLE `house`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `inventory_items`
--
ALTER TABLE `inventory_items`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `office`
--
ALTER TABLE `office`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `passport`
--
ALTER TABLE `passport`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `position`
--
ALTER TABLE `position`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `power_of_attorney`
--
ALTER TABLE `power_of_attorney`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `subjects_of_the_country`
--
ALTER TABLE `subjects_of_the_country`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `type_of_organization`
--
ALTER TABLE `type_of_organization`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `type_of_passage`
--
ALTER TABLE `type_of_passage`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `unit_of_measurement`
--
ALTER TABLE `unit_of_measurement`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `view_of_the_subject_of_the_country`
--
ALTER TABLE `view_of_the_subject_of_the_country`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
