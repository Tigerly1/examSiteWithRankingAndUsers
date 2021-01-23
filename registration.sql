-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Gru 2019, 12:05
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `registration`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text COLLATE utf8_polish_ci NOT NULL,
  `a` text COLLATE utf8_polish_ci NOT NULL,
  `b` text COLLATE utf8_polish_ci NOT NULL,
  `c` text COLLATE utf8_polish_ci NOT NULL,
  `d` text COLLATE utf8_polish_ci NOT NULL,
  `answer` varchar(4) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `questions`
--

INSERT INTO `questions` (`id`, `question`, `a`, `b`, `c`, `d`, `answer`) VALUES
(1, 'W języku HTML, aby dodać animację FLASH (z W języku HTML, aby dodać animację FLASH (z rozszerzeniem .swf) na stronę internetową, należy użyć znacznika', 'imgokej', 'audioaa', 'video', 'objecte', 'C'),
(2, 'Aby naprawić uszkodzoną tabelę w MySQL, należy wydać polecenie', 'FIX TABLE', 'CHECK TABLE', 'REPAIR TABLE', 'RESOLVE TABLE', 'C'),
(3, 'Formatem bezstratnej kompresji dźwięku jest', 'MP3', 'AAC', 'WWA', 'FLAC', 'C'),
(4, 'W prezentowanym kodzie PHP w miejscu kropek powinno znaleźć się polecenie', 'mysqli_fetch_row($zapytanie);', 'mysqli_free_result($zapytanie);', 'mysqli_num_fields($zapytanie);', 'mysqli_query($zapytanie);', 'A'),
(5, 'W JavaScript wynik operacji jest równy wartości NaN, jeśli skrypt próbował wykonać', 'funkcję parseFloat zamiast parseInt na zmiennej liczbowej', 'działanie arytmetyczne, a zawartość zmiennej była napisem', 'działanie arytmetyczne na dwóch zmiennych liczbowych dodatnich', 'funkcję sprawdzającą długość napisu, a zawartość zmiennej była liczbą', 'D'),
(6, 'Poprzez deklarację var x=', 'Logicznego', 'Liczbowego', 'String (ciąg znaków)', 'Nieokreślonego (undefined)', 'C'),
(7, 'Jakiego formatu należy użyć do zapisu obrazu z kompresją stratną?', 'GIF', 'PNG', 'PCX', 'JPEG', 'C'),
(8, 'Który z wymienionych formatów plików NIE JEST wykorzystywany do publikacji grafiki lub animacji na stronach internetowych?', 'PNG', 'SWF', 'SVG', 'AIFF', 'D'),
(9, 'Które ze zdań jest prawdziwe w stosunku do grafiki rastrowej?', 'Podczas przekształcania polegającego na skalowaniu, skalowany obraz nie zmienia jakości', 'Zapisywany obraz jest opisywany za pośrednictwem figur geometrycznych umieszczonych w układzie współrzędnych', 'Grafika rastrowa nie jest zapisana w formacie WMF (ang. Windows Metafile Format - format metaplików w Windows)', 'Jest to prezentacja obrazu za pomocą pionowo-poziomej siatki odpowiednio kolorowanych pikseli na monitorze komputera, drukarce lub innym urządzeniu wyjściowym', 'B'),
(10, 'Zdefiniowanie klucza obcego jest niezbędne do utworzenia', 'transakcji', 'relacji 1..n', 'relacji 1..1', 'klucza podstawowego', 'A'),
(14, 'dd', 'dad', 'dadad', 'dadad', 'dada', 'C'),
(16, 'asda', 'dasdas', 'dsada', 'sdasd', 'adsa', 'A'),
(17, 'okej', 'okej', 'okej', 'aaa', 'aa', 'B');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ranking`
--

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `nick` text COLLATE utf8_polish_ci NOT NULL,
  `points` int(11) NOT NULL,
  `maxpoints` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ranking`
--

INSERT INTO `ranking` (`id`, `nick`, `points`, `maxpoints`) VALUES
(10, 'aaa', 7, 10),
(11, 'aaa', 7, 10),
(12, 'aaa', 7, 10),
(13, 'aaa', 7, 10),
(14, 'aaa', 0, 10),
(15, 'aaa', 0, 10),
(16, 'aaa', 0, 10),
(17, 'aaa', 1, 10),
(18, 'aaa', 1, 10),
(19, 'aaa', 1, 10),
(20, 'aaa', 2, 10),
(21, 'aaa', 1, 10),
(22, 'aaa', 2, 10),
(23, 'aaa', 5, 10),
(24, 'aaa', 2, 10),
(25, 'aaa', 2, 10),
(26, 'aaa', 1, 10),
(27, 'abc', 2, 10),
(28, 'abc', 2, 10),
(29, 'abc', 5, 10),
(30, 'ab', 7, 10),
(31, 'aaa', 1, 10),
(32, 'ok', 2, 10),
(33, 'aaa', 1, 10),
(34, 'aaa', 0, 10),
(35, 'aaa', 5, 10),
(36, 'aaa', 0, 10),
(37, 'aaa', 0, 10),
(38, 'aaa', 4, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rankingpytan`
--

CREATE TABLE `rankingpytan` (
  `id` int(11) NOT NULL,
  `pytanie` text COLLATE utf8_polish_ci NOT NULL,
  `niepoprawne` text COLLATE utf8_polish_ci NOT NULL,
  `ilodp` text COLLATE utf8_polish_ci NOT NULL,
  `poprawne` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `rankingpytan`
--

INSERT INTO `rankingpytan` (`id`, `pytanie`, `niepoprawne`, `ilodp`, `poprawne`) VALUES
(75, 'W języku HTML, aby dodać animację FLASH (z W języku HTML, aby dodać animację FLASH (z rozszerzeniem .swf) na stronę internetową, należy użyć znacznika', '1', '1', '0'),
(76, 'W języku HTML, aby dodać animację FLASH (z W języku HTML, aby dodać animację FLASH (z rozszerzeniem .swf) na stronę internetową, należy użyć znacznika', '1', '1', '0'),
(77, 'W języku HTML, aby dodać animację FLASH (z W języku HTML, aby dodać animację FLASH (z rozszerzeniem .swf) na stronę internetową, należy użyć znacznika', '1', '1', '0'),
(78, 'W języku HTML, aby dodać animację FLASH (z W języku HTML, aby dodać animację FLASH (z rozszerzeniem .swf) na stronę internetową, należy użyć znacznika', '1', '1', '0'),
(79, 'W języku HTML, aby dodać animację FLASH (z W języku HTML, aby dodać animację FLASH (z rozszerzeniem .swf) na stronę internetową, należy użyć znacznika', '1', '1', '0'),
(80, 'W języku HTML, aby dodać animację FLASH (z W języku HTML, aby dodać animację FLASH (z rozszerzeniem .swf) na stronę internetową, należy użyć znacznika', '1', '1', '0'),
(81, 'W języku HTML, aby dodać animację FLASH (z W języku HTML, aby dodać animację FLASH (z rozszerzeniem .swf) na stronę internetową, należy użyć znacznika', '1', '1', '0'),
(82, 'W języku HTML, aby dodać animację FLASH (z W języku HTML, aby dodać animację FLASH (z rozszerzeniem .swf) na stronę internetową, należy użyć znacznika', '1', '1', '0'),
(83, 'W języku HTML, aby dodać animację FLASH (z W języku HTML, aby dodać animację FLASH (z rozszerzeniem .swf) na stronę internetową, należy użyć znacznika', '1', '1', '0'),
(84, 'W języku HTML, aby dodać animację FLASH (z W języku HTML, aby dodać animację FLASH (z rozszerzeniem .swf) na stronę internetową, należy użyć znacznika', '1', '1', '0'),
(85, 'asda', '1', '1', '0'),
(86, 'Aby naprawić uszkodzoną tabelę w MySQL, należy wydać polecenie', '1', '1', '0'),
(87, 'Formatem bezstratnej kompresji dźwięku jest', '1', '1', '0'),
(88, 'W języku HTML, aby dodać animację FLASH (z W języku HTML, aby dodać animację FLASH (z rozszerzeniem .swf) na stronę internetową, należy użyć znacznika', '1', '1', '0'),
(89, 'Jakiego formatu należy użyć do zapisu obrazu z kompresją stratną?', '1', '1', '0'),
(90, 'W prezentowanym kodzie PHP w miejscu kropek powinno znaleźć się polecenie', '1', '1', '0'),
(91, 'dd', '1', '1', '0'),
(92, 'Który z wymienionych formatów plików NIE JEST wykorzystywany do publikacji grafiki lub animacji na stronach internetowych?', '1', '1', '0'),
(93, 'Zdefiniowanie klucza obcego jest niezbędne do utworzenia', '1', '1', '0'),
(94, 'W JavaScript wynik operacji jest równy wartości NaN, jeśli skrypt próbował wykonać', '1', '1', '0'),
(95, 'Aby naprawić uszkodzoną tabelę w MySQL, należy wydać polecenie', '0', '1', '1'),
(96, 'asda', '1', '1', '0'),
(97, 'Który z wymienionych formatów plików NIE JEST wykorzystywany do publikacji grafiki lub animacji na stronach internetowych?', '1', '1', '0'),
(98, 'okej', '1', '1', '0'),
(99, 'Jakiego formatu należy użyć do zapisu obrazu z kompresją stratną?', '0', '1', '1'),
(100, 'W JavaScript wynik operacji jest równy wartości NaN, jeśli skrypt próbował wykonać', '1', '1', '0'),
(101, 'Poprzez deklarację var x=', '0', '1', '1'),
(102, 'Które ze zdań jest prawdziwe w stosunku do grafiki rastrowej?', '1', '1', '0'),
(103, 'W prezentowanym kodzie PHP w miejscu kropek powinno znaleźć się polecenie', '1', '1', '0'),
(104, 'W języku HTML, aby dodać animację FLASH (z W języku HTML, aby dodać animację FLASH (z rozszerzeniem .swf) na stronę internetową, należy użyć znacznika', '0', '1', '1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, 'qweq', 'ewqeq@aa.pl', '47bce5c74f589f4867dbd57e9ca9f808'),
(4, 'admin', 'abb@abb.ba', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'aaa', 'aaa@aaa.aa', '47bce5c74f589f4867dbd57e9ca9f808'),
(7, 'ab', 'abb@abb.baaa', '187ef4436122d1cc2f40dc2b92f0eba0'),
(8, 'ok', 'ok@ok.pl', '444bcb3a3fcf8389296c49467f27e1d6'),
(9, 'abbaabba', 'ok@okl.ok', '0debdbbdde6b0be050e7322954a83064'),
(11, 'abcabcab', 'a@a.apl', '848d93ed4ee299c40529b8e30f41bd01');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rankingpytan`
--
ALTER TABLE `rankingpytan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT dla tabeli `rankingpytan`
--
ALTER TABLE `rankingpytan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
