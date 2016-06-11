-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 11 Cze 2016, 14:18
-- Wersja serwera: 5.5.21-log
-- Wersja PHP: 5.3.20

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `ankieta`
--
CREATE DATABASE `ankieta` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ankieta`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `idAnswers` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(100) DEFAULT NULL,
  `selected` int(11) DEFAULT NULL,
  `Questions_idQuestions` int(11) NOT NULL,
  PRIMARY KEY (`idAnswers`,`Questions_idQuestions`),
  KEY `fk_Answers_Questions_idx` (`Questions_idQuestions`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Zrzut danych tabeli `answers`
--

INSERT INTO `answers` (`idAnswers`, `answer`, `selected`, `Questions_idQuestions`) VALUES
(72, 'Odp. a', 8, 28),
(73, 'Odp. b', 14, 28),
(74, 'To jest', 8, 29),
(75, 'pytanie', 7, 29),
(76, 'wielokrotnego', 6, 29),
(77, 'wyboru', 5, 29),
(78, '1', 0, 30),
(79, '2', 0, 30),
(80, '3', 0, 30),
(81, '4', 0, 30),
(82, '5', 1, 30),
(83, '6', 0, 30),
(84, 'w', 0, 31),
(85, 'e', 1, 31),
(86, 'r', 1, 32),
(87, 't', 1, 32);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `form`
--

CREATE TABLE IF NOT EXISTS `form` (
  `idForm` int(11) NOT NULL AUTO_INCREMENT,
  `form_name` varchar(45) DEFAULT NULL,
  `q_num` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `form_layout` varchar(45) DEFAULT NULL,
  `done` int(11) DEFAULT NULL,
  `Users_idUsers` int(11) NOT NULL,
  PRIMARY KEY (`idForm`,`Users_idUsers`),
  KEY `fk_Form_Users1_idx` (`Users_idUsers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Zrzut danych tabeli `form`
--

INSERT INTO `form` (`idForm`, `form_name`, `q_num`, `active`, `form_layout`, `done`, `Users_idUsers`) VALUES
(15, 'Ankieta testowa', 2, 1, NULL, 24, 4),
(16, 'Ankieta testowa pierwsza', 3, 0, NULL, 1, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `idQuestions` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) DEFAULT NULL,
  `q_ans_number` int(11) NOT NULL,
  `q_ans_type` int(11) NOT NULL,
  `Form_idForm` int(11) NOT NULL,
  PRIMARY KEY (`idQuestions`,`Form_idForm`),
  KEY `fk_Questions_Form1_idx` (`Form_idForm`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Zrzut danych tabeli `questions`
--

INSERT INTO `questions` (`idQuestions`, `question`, `q_ans_number`, `q_ans_type`, `Form_idForm`) VALUES
(28, 'Pytanie 1 - testowe?', 2, 1, 15),
(29, 'Pytanie 2 - wiele odpowiedzi - test?', 4, 0, 15),
(30, 's?', 6, 1, 16),
(31, 'D?', 2, 1, 16),
(32, 'ss?', 2, 0, 16);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`idUsers`, `login`, `password`, `email`, `role`) VALUES
(4, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin@admin.pl', 'admin');

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_Answers_Questions` FOREIGN KEY (`Questions_idQuestions`) REFERENCES `questions` (`idQuestions`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `fk_Form_Users1` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_Questions_Form1` FOREIGN KEY (`Form_idForm`) REFERENCES `form` (`idForm`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
