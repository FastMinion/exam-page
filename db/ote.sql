-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Jún 25. 22:52
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `ote`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ote__category`
--

CREATE TABLE `ote__category` (
  `category_id` int(11) NOT NULL,
  `cname` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `ote__category`
--

INSERT INTO `ote__category` (`category_id`, `cname`, `status`) VALUES
(1, 'Káresemények', 1),
(3, 'Gyakorlatok', 1),
(4, 'Társadalmi munka', 1),
(5, 'Ifjúsági tűzoltók', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ote__gallery`
--

CREATE TABLE `ote__gallery` (
  `gallery_id` int(11) NOT NULL,
  `gcategory` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `uploaded` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `ote__gallery`
--

INSERT INTO `ote__gallery` (`gallery_id`, `gcategory`, `image`, `uploaded`, `status`) VALUES
(15, 2, 'Gy.jpg', '2020-06-19', 1),
(16, 3, 'DSC_7994.JPG', '2020-06-21', 1),
(17, 3, 'DSC_7995.JPG', '2020-06-21', 1),
(18, 3, 'DSC_8068.JPG', '2020-06-21', 1),
(19, 3, 'DSC_8071.JPG', '2020-06-21', 1),
(23, 3, 'DSC_8106.JPG', '2020-06-21', 1),
(27, 2, 'DSC_0071.JPG', '2020-06-21', 1),
(28, 2, 'DSC_0104.JPG', '2020-06-21', 1),
(29, 2, 'DSC_0133.JPG', '2020-06-21', 1),
(30, 2, 'DSC_9879.JPG', '2020-06-21', 1),
(31, 4, '20200407_110325.jpg', '2020-06-21', 1),
(32, 4, 'IMG_20200407_092355.jpg', '2020-06-21', 1),
(33, 4, 'IMG_20200407_111500.jpg', '2020-06-21', 1),
(34, 1, 'IMG_20200614_202411.jpg', '2020-06-21', 1),
(35, 1, 'IMG_20200614_202842.jpg', '2020-06-21', 1),
(36, 1, 'IMG_20200614_202937.jpg', '2020-06-21', 1),
(37, 1, 'IMG_20200614_202942.jpg', '2020-06-21', 1),
(38, 1, 'IMG_20200614_203750.jpg', '2020-06-21', 1),
(39, 1, 'IMG_20200407_172145.jpg', '2020-06-21', 1),
(40, 1, 'IMG_20200407_174213.jpg', '2020-06-21', 1),
(41, 1, 'IMG_20200407_174305.jpg', '2020-06-21', 1),
(42, 1, 'IMG_20200407_175849.jpg', '2020-06-21', 1),
(43, 1, 'IMG_20200407_175900.jpg', '2020-06-21', 0),
(44, 1, 'IMG_20200407_175919.jpg', '2020-06-21', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ote__gallerycat`
--

CREATE TABLE `ote__gallerycat` (
  `gallerycat_id` int(11) NOT NULL,
  `gcname` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `ote__gallerycat`
--

INSERT INTO `ote__gallerycat` (`gallerycat_id`, `gcname`, `image`, `status`) VALUES
(1, 'Káresemények', 'IMG_20200407_174305.jpg', 1),
(2, 'Ifjúsági tűzoltók', 'DSC_9879.jpg', 1),
(3, 'Gyakorlatok', '103655203_959918854461161_6017639951364722883_o.jpg', 1),
(4, 'Társadalmi munka', '104332454_961030654349981_3726888388018289249_n.jpg', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ote__ifjnev`
--

CREATE TABLE `ote__ifjnev` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `intro` varchar(256) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `created` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ote__ifjnevcat`
--

CREATE TABLE `ote__ifjnevcat` (
  `icategory_id` int(11) NOT NULL,
  `icname` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `ote__ifjnevcat`
--

INSERT INTO `ote__ifjnevcat` (`icategory_id`, `icname`, `status`) VALUES
(1, 'Versenyek', 1),
(2, 'Táborok', 1),
(3, 'Bemutatók', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ote__news`
--

CREATE TABLE `ote__news` (
  `news_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `intro` varchar(256) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `created` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `ote__news`
--

INSERT INTO `ote__news` (`news_id`, `category`, `title`, `intro`, `image`, `body`, `created`, `status`) VALUES
(12, 3, 'Gyakorlat és ünneplés', 'A mai nap délutánján egyesületünk gyakorlatot tartott.', 'Gy.jpg', 'Feltételezés szerint egy középmagas épületben tűz keletkezett. Az épület egyik helyiségében egy kisgyerek elesett, súlyosan megsérült.\r\n\r\nA gyakorlat alkalmával történt szerelés létrán át, személykeresés, mentés természetesen feljárón, valamint mentés alpintechnika segítségével.\r\n\r\nA mentendő személy egyesületünk legkisebb tagja volt, aki nagy örömmel vállalta be ezt a szerepet, és nagyon élvezte.\r\n\r\nTermészetesen édesanyja, aki elkísért bennünket - árgus szemekkel figyelte tevékenységünket. :)\r\n\r\nA gyakorlatot követően szakmai vezetőnk és egyik ifjú tagunk születésnapját ünnepeltük meg.\r\n\r\nJól esett elkölteni pár falat ízletes tortát az elfáradás után.\r\n\r\nEzúton is nagyra nőjenek!\r\n\r\nA hangulat ismételten remek volt mindvégig.', '2020-06-11', 1),
(14, 4, 'Támogatás az állatmenhelynek', 'Az emberekkel párhuzamosan az állatok is segítségre tudnak szorulni.', 'Misina.jpg', '<p>&nbsp;</p>\r\n\r\n<p>Az emberekkel p&aacute;rhuzamosan az &aacute;llatok is seg&iacute;ts&eacute;gre tudnak szorulni.<br />\r\nPl&aacute;ne, ha mindez olyan k&ouml;r&uuml;lm&eacute;nyek k&ouml;z&ouml;tt van, hogy nem csak egy-egy &aacute;llat &eacute;l egy helyen, hanem sok. &Iacute;gy van ez a Misina &aacute;llatmenhely eset&eacute;ben is. Ma meglept&uuml;k őket, &eacute;s 110 kg kutyat&aacute;pot &eacute;s 72 doboz cicakonzervet adott &aacute;t nekik egyes&uuml;let&uuml;nk.</p>\r\n\r\n<p>Tov&aacute;bbi kitart&oacute; munk&aacute;t k&iacute;v&aacute;nunk Nekik!</p>\r\n', '2020-05-26', 1),
(15, 4, 'Hétvégi fiatalítás', 'A mai napon a Dombay-tó melletti egyik lakóház udvarában négy fenyőfát fiatalítottunk vissza.', 'favagas.jpg', '<p>A mai napon a Dombay-t&oacute; melletti egyik lak&oacute;h&aacute;z udvar&aacute;ban n&eacute;gy fenyőf&aacute;t fiatal&iacute;tottunk vissza. Az eredeti terv a tulajdonos r&eacute;sz&eacute;ről a teljes kiv&aacute;g&aacute;s volt, de ugyanakkor szerette volna, ha a megszokott &aacute;rny&eacute;kos r&eacute;sz is megmaradt volna. &Iacute;gy j&ouml;tt sz&oacute;ba a fiatal&iacute;t&aacute;s. Annyira v&aacute;gtuk vissza a fenyőf&aacute;kat, amennyi az elsz&aacute;radt &aacute;gak, &eacute;s a tetőt, ereszcsatorn&aacute;t vesz&eacute;lyeztető &aacute;gak elt&aacute;vol&iacute;t&aacute;s&aacute;hoz sz&uuml;ks&eacute;ges volt.</p>\r\n\r\n<p>Az elv&eacute;gzett munk&aacute;&eacute;rt kapott t&aacute;mogat&aacute;st g&eacute;pj&aacute;rműveink fenntart&aacute;s&aacute;ra ford&iacute;tjuk.<br />\r\nK&ouml;sz&ouml;nj&uuml;k sz&eacute;pen!</p>\r\n', '2020-06-14', 1),
(16, 4, 'Fecskementés', 'Ma estére befutott még egy riasztás...', 'fecske.jpg', '<p>Ma est&eacute;re befutott m&eacute;g egy riaszt&aacute;s: P&eacute;csett, egyik emeletes h&aacute;z szellőzőj&eacute;re kifesz&iacute;tett h&aacute;l&oacute;ba egy fecske akadt be, aki a menek&uuml;l&eacute;s rem&eacute;ny&eacute;ben csak egyre jobban belegabalyodott a h&aacute;l&oacute;ba. A helysz&iacute;nre ki&eacute;rkezve, felder&iacute;tve a megk&ouml;zel&iacute;t&eacute;si &uacute;tvonalat, a madarat &oacute;vatosan megfogva levitt&uuml;k az udvarra. Ott szint&eacute;n &oacute;vatosan leszedt&uuml;k a h&aacute;l&oacute;t r&oacute;la. Szeg&eacute;ny nagyon kimer&uuml;l volt. Megitattuk, majd a v&eacute;lhető lak&oacute;helyhez k&ouml;zel egyik lak&oacute;nak &aacute;tadtuk, aki biztons&aacute;gosan az erk&eacute;ly&eacute;n elhelyezte.</p>\r\n\r\n<p>B&iacute;zunk a teljes fel&eacute;p&uuml;l&eacute;s&eacute;ben.</p>\r\n', '2020-06-14', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ote__users`
--

CREATE TABLE `ote__users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `ote__users`
--

INSERT INTO `ote__users` (`user_id`, `username`, `password`, `status`) VALUES
(5, 'admin', 'admin', 1),
(6, 'Feri', 'ferivagyok', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `ote__category`
--
ALTER TABLE `ote__category`
  ADD PRIMARY KEY (`category_id`);

--
-- A tábla indexei `ote__gallery`
--
ALTER TABLE `ote__gallery`
  ADD PRIMARY KEY (`gallery_id`),
  ADD KEY `gcategory` (`gcategory`);

--
-- A tábla indexei `ote__gallerycat`
--
ALTER TABLE `ote__gallerycat`
  ADD PRIMARY KEY (`gallerycat_id`);

--
-- A tábla indexei `ote__ifjnev`
--
ALTER TABLE `ote__ifjnev`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- A tábla indexei `ote__ifjnevcat`
--
ALTER TABLE `ote__ifjnevcat`
  ADD PRIMARY KEY (`icategory_id`);

--
-- A tábla indexei `ote__news`
--
ALTER TABLE `ote__news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `category` (`category`);

--
-- A tábla indexei `ote__users`
--
ALTER TABLE `ote__users`
  ADD PRIMARY KEY (`user_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `ote__category`
--
ALTER TABLE `ote__category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `ote__gallery`
--
ALTER TABLE `ote__gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT a táblához `ote__gallerycat`
--
ALTER TABLE `ote__gallerycat`
  MODIFY `gallerycat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `ote__ifjnev`
--
ALTER TABLE `ote__ifjnev`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `ote__ifjnevcat`
--
ALTER TABLE `ote__ifjnevcat`
  MODIFY `icategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `ote__news`
--
ALTER TABLE `ote__news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT a táblához `ote__users`
--
ALTER TABLE `ote__users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `ote__gallery`
--
ALTER TABLE `ote__gallery`
  ADD CONSTRAINT `ote__gallery_ibfk_1` FOREIGN KEY (`gcategory`) REFERENCES `ote__gallerycat` (`gallerycat_id`);

--
-- Megkötések a táblához `ote__ifjnev`
--
ALTER TABLE `ote__ifjnev`
  ADD CONSTRAINT `ote__ifjnev_ibfk_1` FOREIGN KEY (`category`) REFERENCES `ote__ifjnevcat` (`icategory_id`);

--
-- Megkötések a táblához `ote__news`
--
ALTER TABLE `ote__news`
  ADD CONSTRAINT `ote__news_ibfk_1` FOREIGN KEY (`category`) REFERENCES `ote__category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
