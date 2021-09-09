-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Sze 09. 16:08
-- Kiszolgáló verziója: 10.4.14-MariaDB
-- PHP verzió: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `siopix`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `image`
--

INSERT INTO `image` (`id`, `path`) VALUES
(4, 'upload/612f9d4e9a281.png'),
(5, 'upload/6138bffdd44cf.png'),
(6, 'upload/6138c03f9825a.png');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` text NOT NULL DEFAULT 'Nincs',
  `address` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `email`, `comment`, `address`, `user_id`, `image_path`) VALUES
(1, 'Teszt Ernő', '234324234234', 'tezterno@gmail.hu', 'Nincs', 'saddélasdk, 21312 ', 0, ''),
(2, 'Teszt Ernő', '234324234234', 'tezterno@gmail.hu', 'Nincs', 'saddélasdk, 21312 ', 1, '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `post_code` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `door` varchar(10) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `ring` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `access_level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `post_code`, `city`, `address`, `door`, `floor`, `ring`, `password`, `salt`, `access_level`) VALUES
(9, 'Teszt András', 'teszta@gj.ji', '2342343223', 2343, 'Szeged', 'hehe u. 9', '3', '1', 1, 'a2782f961ad761ce8523e4a4a7ceb59e711165b87302643a6fd05789c1538b3c6350b60d03034ec76e11e3ce5db4a8a0e03d869d57cdff5ceedcced78e54f9d6', 'RiBMiaJ5Yl9N2sii8x909w==', 0),
(10, 'Dencsik Attila', 'redhun71@gmail.com', '', 0, '', '', '', '', 0, 'f3f51d6b88f0e93f10b331f20f7a6d79459de5684590d1910c9f53a434b8bce5310b7f8eeffb7ab0f3b00a8fb26f8c3a63d720b09ba67b8ba5400008063ee8ea', 'bIaMG5JEvoFjFP9qcvYX6A==', 1),
(11, 'Endreffy Petra', 'endreffy@gmail.hu', '', 0, '', '', '', '', 0, '61e3119823b8091977a592fbec26afdd7fc08e7a2a67f6f2de4034a7fdcfaab0812691ed7d38287d02cf69d5572fa3010ce3f54dc527ec96d5a8f7dda9f2630a', 'tkbndsVlfSHRSi0iO3HxsA==', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `path` (`path`);

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
