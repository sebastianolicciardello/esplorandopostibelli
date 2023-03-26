-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 14, 2021 alle 19:28
-- Versione del server: 10.4.19-MariaDB
-- Versione PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exploration`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `favorites`
--

INSERT INTO `favorites` (`id`, `place`, `user`) VALUES
(1, 17, 25),
(2, 23, 25),
(3, 31, 25),
(4, 26, 25),
(5, 33, 25),
(6, 5, 1),
(7, 32, 1),
(8, 39, 1),
(9, 41, 1),
(10, 15, 1),
(11, 36, 1),
(12, 38, 1),
(13, 33, 1),
(14, 9, 1),
(15, 5, 26),
(16, 38, 26),
(17, 9, 26),
(18, 5, 27),
(19, 32, 27),
(20, 38, 27),
(22, 31, 8),
(23, 38, 8),
(24, 33, 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `images`
--

INSERT INTO `images` (`id`, `place`, `url`) VALUES
(6, 5, 'https://i.postimg.cc/tR3ynVyj/photo-2021-06-24-14-34-30.jpg'),
(7, 5, 'https://i.postimg.cc/RVGBX5Np/photo-2021-06-24-14-34-38.jpg'),
(8, 5, 'https://i.postimg.cc/BQJ3TQQ1/photo-2021-06-24-14-34-41.jpg'),
(9, 5, 'https://i.postimg.cc/Vk6chGtf/photo-2021-06-24-14-34-45.jpg'),
(10, 5, 'https://i.postimg.cc/br9j74LJ/photo-2021-06-24-14-34-48.jpg'),
(11, 7, 'https://i.postimg.cc/FzGJrrxk/photo-2021-06-24-15-07-28.jpg'),
(12, 7, 'https://i.postimg.cc/43ht6TXj/photo-2021-06-24-15-07-31.jpg'),
(13, 7, 'https://i.postimg.cc/MHzQJM18/photo-2021-06-24-15-07-34.jpg'),
(14, 8, 'https://i.postimg.cc/FKZM9wLk/photo-2021-06-24-15-18-48.jpg'),
(15, 8, 'https://i.postimg.cc/bJwKdLxC/photo-2021-06-24-15-18-51.jpg'),
(16, 8, 'https://i.postimg.cc/hGcFRKfq/photo-2021-06-24-15-18-56.jpg'),
(17, 8, 'https://i.postimg.cc/LXQGPfvH/photo-2021-06-24-15-19-05.jpg'),
(18, 9, 'https://i.postimg.cc/ryr9x38B/photo-2021-06-24-15-35-48.jpg'),
(19, 9, 'https://i.postimg.cc/zXwSPhHp/photo-2021-06-24-15-35-50.jpg'),
(20, 9, 'https://i.postimg.cc/63DLFLhb/photo-2021-06-24-15-35-53.jpg'),
(30, 15, 'https://i.postimg.cc/DwnZBJ1r/photo-2021-06-24-15-46-50.jpg'),
(31, 15, 'https://i.postimg.cc/PxPNYgY0/photo-2021-06-24-15-46-56.jpg'),
(32, 15, 'https://i.postimg.cc/8PhcRBfk/photo-2021-06-24-15-47-07.jpg'),
(33, 17, 'https://i.postimg.cc/bYLhYZKx/photo-2021-06-25-17-55-10.jpg'),
(34, 17, 'https://i.postimg.cc/HxHqdmzv/photo-2021-06-25-17-55-15.jpg'),
(35, 17, 'https://i.postimg.cc/2SLRx23G/photo-2021-06-25-17-55-18.jpg'),
(36, 17, 'https://i.postimg.cc/Dz1990rb/photo-2021-06-25-17-55-22.jpg'),
(37, 17, 'https://i.postimg.cc/YSccDYWH/photo-2021-06-25-17-55-27.jpg'),
(45, 23, 'https://i.postimg.cc/63MsLnNQ/photo-2021-07-04-11-00-17.jpg'),
(46, 23, 'https://i.postimg.cc/9Mm571KS/photo-2021-07-04-11-00-21.jpg'),
(47, 23, 'https://i.postimg.cc/LsBF5GCL/photo-2021-07-04-11-00-30.jpg'),
(48, 26, 'https://i.postimg.cc/VvRxRz66/photo-2021-07-14-09-35-35.jpg'),
(49, 26, 'https://i.postimg.cc/wjGdZxkR/photo-2021-07-14-09-35-40.jpg'),
(50, 26, 'https://i.postimg.cc/xCKDXvVL/photo-2021-07-14-09-35-46.jpg'),
(51, 26, 'https://i.postimg.cc/QtLZN6wX/photo-2021-07-14-09-35-50.jpg'),
(52, 26, 'https://i.postimg.cc/jjnrbV8g/photo-2021-07-14-09-35-52.jpg'),
(53, 31, 'https://i.postimg.cc/VN617G0g/photo-2021-07-14-10-19-19.jpg'),
(54, 31, 'https://i.postimg.cc/76J445VT/photo-2021-07-14-10-19-28.jpg'),
(55, 31, 'https://i.postimg.cc/Mptqm2HX/photo-2021-07-14-10-19-31.jpg'),
(56, 31, 'https://i.postimg.cc/7LW4j3gk/photo-2021-07-14-10-19-35.jpg'),
(57, 31, 'https://i.postimg.cc/9Qcc9FWv/photo-2021-07-14-10-19-42.jpg'),
(58, 32, 'https://i.postimg.cc/c4rb5pFr/photo-2021-07-14-10-30-50.jpg'),
(59, 32, 'https://i.postimg.cc/9ft87CQN/photo-2021-07-14-10-31-03.jpg'),
(60, 32, 'https://i.postimg.cc/VktHzjQw/photo-2021-07-14-10-31-10.jpg'),
(61, 32, 'https://i.postimg.cc/TPXN1pfD/photo-2021-07-14-10-31-18.jpg'),
(62, 33, 'https://i.postimg.cc/XJnVfjcZ/photo-2021-07-14-10-33-58.jpg'),
(63, 33, 'https://i.postimg.cc/KYPG3kLS/photo-2021-07-14-10-34-02.jpg'),
(64, 33, 'https://i.postimg.cc/3w5rwCkF/photo-2021-07-14-10-34-06.jpg'),
(65, 33, 'https://i.postimg.cc/gjTmbv9R/photo-2021-07-14-10-34-11.jpg'),
(66, 33, 'https://i.postimg.cc/SsVmVBDg/photo-2021-07-14-10-34-16.jpg'),
(67, 34, 'https://i.postimg.cc/c4xXVVTQ/photo-2021-07-14-10-37-32.jpg'),
(68, 34, 'https://i.postimg.cc/ZKwVZVDX/photo-2021-07-14-10-37-37.jpg'),
(69, 34, 'https://i.postimg.cc/ZR6wSm1L/photo-2021-07-14-10-37-41.jpg'),
(70, 34, 'https://i.postimg.cc/NG7dCg8s/photo-2021-07-14-10-37-46.jpg'),
(71, 35, 'https://i.postimg.cc/02zJMnyT/photo-2021-07-14-10-43-40.jpg'),
(72, 35, 'https://i.postimg.cc/fT1Sxd3J/photo-2021-07-14-10-43-42.jpg'),
(73, 35, 'https://i.postimg.cc/wjJyFBJF/photo-2021-07-14-10-43-47.jpg'),
(74, 36, 'https://i.postimg.cc/vTV3GVDk/photo-2021-07-14-10-48-56.jpg'),
(75, 36, 'https://i.postimg.cc/Kck9PdQf/photo-2021-07-14-10-49-02.jpg'),
(76, 36, 'https://i.postimg.cc/Qds0rVDY/photo-2021-07-14-10-49-08.jpg'),
(77, 36, 'https://i.postimg.cc/CLbmtk3f/photo-2021-07-14-10-49-13.jpg'),
(78, 37, 'https://i.postimg.cc/59gtmR0H/photo-2021-07-14-10-57-56.jpg'),
(79, 37, 'https://i.postimg.cc/J4d4fHjM/photo-2021-07-14-10-58-06.jpg'),
(80, 37, 'https://i.postimg.cc/kGTXXBZN/photo-2021-07-14-10-58-09.jpg'),
(81, 37, 'https://i.postimg.cc/9QRFCXBT/photo-2021-07-14-10-58-12.jpg'),
(82, 38, 'https://i.postimg.cc/Wp5k430f/photo-2021-07-14-11-02-39.jpg'),
(83, 38, 'https://i.postimg.cc/L67gzbCt/photo-2021-07-14-11-02-46.jpg'),
(84, 38, 'https://i.postimg.cc/MG0cJKW5/photo-2021-07-14-11-03-02.jpg'),
(85, 38, 'https://i.postimg.cc/6Qx7PGNT/photo-2021-07-14-11-03-07.jpg'),
(86, 39, 'https://i.postimg.cc/4ysq2PWw/photo-2021-07-14-11-10-53.jpg'),
(87, 39, 'https://i.postimg.cc/DfPt4VzN/photo-2021-07-14-11-10-57.jpg'),
(88, 39, 'https://i.postimg.cc/656FdH2p/photo-2021-07-14-11-11-00.jpg'),
(89, 39, 'https://i.postimg.cc/gjs5Ch5p/photo-2021-07-14-11-11-04.jpg'),
(90, 40, 'https://i.postimg.cc/wTSc6MpY/photo-2021-07-14-11-14-16.jpg'),
(91, 40, 'https://i.postimg.cc/Dzcqdcb7/photo-2021-07-14-11-14-19.jpg'),
(92, 40, 'https://i.postimg.cc/L8LkhS9Y/photo-2021-07-14-11-14-21.jpg'),
(93, 40, 'https://i.postimg.cc/9MFyxqGZ/photo-2021-07-14-11-14-26.jpg'),
(94, 41, 'https://i.postimg.cc/mkCGzht1/photo-2021-07-14-11-38-20.jpg'),
(95, 41, 'https://i.postimg.cc/BQ50J8rd/photo-2021-07-14-11-38-23.jpg'),
(96, 41, 'https://i.postimg.cc/XNCWD1QN/photo-2021-07-14-11-38-29.jpg'),
(97, 41, 'https://i.postimg.cc/28NYpdKQ/photo-2021-07-14-11-38-32.jpg'),
(98, 41, 'https://i.postimg.cc/dVqK3svD/photo-2021-07-14-11-38-35.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `messages`
--

INSERT INTO `messages` (`id`, `user`, `text`, `created_at`, `updated_at`) VALUES
(1, 4, 'BENVENUTI A TUTTI!', '2021-07-14 09:49:59', '2021-07-14 11:49:59'),
(2, 25, 'WOW quanti posti belli! 😍', '2021-07-14 09:51:02', '2021-07-14 11:51:02'),
(4, 1, 'Buongiorno! Puoi aggiungere il sentiero che porta a Montagnola? Grazie 🙏', '2021-07-14 09:58:53', '2021-07-14 11:58:53'),
(5, 4, 's_licciardello lo aggiungerò appena possibile!', '2021-07-14 09:59:39', '2021-07-14 11:59:39'),
(6, 26, 'Ciaooo aggiungete più coste e spiagge! Bellissimo Plemmirio !', '2021-07-14 10:06:20', '2021-07-14 12:06:20'),
(8, 8, 'Sono stato alle Rocche di Argimusco, un posto magico!!!', '2021-07-14 15:29:43', '2021-07-14 17:29:43');

-- --------------------------------------------------------

--
-- Struttura della tabella `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `primaryImg` varchar(255) NOT NULL,
  `routeImg` varchar(255) NOT NULL,
  `routeUrl` varchar(255) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `difficulty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `places`
--

INSERT INTO `places` (`id`, `nome`, `primaryImg`, `routeImg`, `routeUrl`, `locality`, `difficulty`) VALUES
(5, 'Acque del Ferro', 'https://i.postimg.cc/KvpPPjr9/photo-2021-06-24-14-34-18.jpg', 'https://i.postimg.cc/3rS4664N/photo-2021-06-24-14-35-52.jpg', 'http://share.mapbbcode.org/brkbc', 'Santa Caterina', 8),
(7, 'Pietra Monaca', 'https://i.postimg.cc/pTfFSYhZ/photo-2021-06-24-15-07-37.jpg', 'https://i.postimg.cc/B69FNw6b/photo-2021-06-24-15-07-22.jpg', 'http://share.mapbbcode.org/xygqq', 'Santa Caterina', 5),
(8, 'Gazzena', 'https://i.postimg.cc/fy3pfLgY/photo-2021-06-24-15-19-00.jpg', 'https://i.postimg.cc/pLDNSmVZ/photo-2021-06-24-15-19-13.jpg', 'http://share.mapbbcode.org/muzyg', 'Capo Mulini', 5),
(9, 'Torre del Greco', 'https://i.postimg.cc/KvhDNfjR/photo-2021-06-24-15-35-39.jpg', 'https://i.postimg.cc/J0Zc8D6r/photo-2021-06-24-15-36-09.jpg', 'http://share.mapbbcode.org/rljjv', 'Santa Tecla', 4),
(15, 'Ilice di Carrinu', 'https://i.postimg.cc/hPFhQ3j3/photo-2021-06-24-15-47-01.jpg', 'https://i.postimg.cc/prjT1K0Z/photo-2021-06-24-15-46-39.jpg', 'http://share.mapbbcode.org/aelnr', 'Milo', 7),
(17, 'Acqua Rocca', 'https://i.postimg.cc/3JcQpPrW/photo-2021-06-25-17-55-06.jpg', 'https://i.postimg.cc/zXB1yJr9/photo-2021-06-25-17-55-29.jpg', 'http://share.mapbbcode.org/ezxea', 'Valle del Bove', 8),
(23, 'Monte Fontane', 'https://i.postimg.cc/zf11Jqjq/photo-2021-07-04-11-00-25.jpg', 'https://i.postimg.cc/JzXLVsjT/photo-2021-07-04-11-00-11.jpg', 'http://share.mapbbcode.org/ufasx', 'Milo', 5),
(26, 'Monte Zoccolaro', 'https://i.postimg.cc/L52dLJmw/photo-2021-07-14-09-35-42.jpg', 'https://i.postimg.cc/pLTHs5Kt/photo-2021-07-14-09-35-23.jpg', 'http://share.mapbbcode.org/qbvkp', 'Valle del Bove', 7),
(31, 'Monte Gemellaro', 'https://i.postimg.cc/qMskgCds/photo-2021-07-14-10-19-22.jpg', 'https://i.postimg.cc/c4yxsBP1/photo-2021-07-14-10-19-13.jpg', 'http://share.mapbbcode.org/mbisb', 'Nicolosi', 7),
(32, 'Caldaia del Drago', 'https://i.postimg.cc/DfCN6vd9/photo-2021-07-14-10-31-00.jpg', 'https://i.postimg.cc/XqDDYLYj/photo-2021-07-14-10-30-46.jpg', 'http://share.mapbbcode.org/hkcxi', 'Mongiuffi', 10),
(33, 'Rocche Argimusco', 'https://i.postimg.cc/Wz3Ty5yT/photo-2021-07-14-10-33-54.jpg', 'https://i.postimg.cc/vZ6HMSZm/photo-2021-07-14-10-33-49.jpg', 'http://share.mapbbcode.org/qjvqa', 'Montalbano Elicona', 4),
(34, 'Lago Pozzillo', 'https://i.postimg.cc/vTM38jyw/photo-2021-07-14-10-37-44.jpg', 'https://i.postimg.cc/FKMT8znR/photo-2021-07-14-10-37-26.jpg', 'http://share.mapbbcode.org/pgllc', 'Regalbuto', 5),
(35, 'Cascate Catafurco', 'https://i.postimg.cc/sf6hgqsP/photo-2021-07-14-10-43-38.jpg', 'https://i.postimg.cc/D0MJpJBp/photo-2021-07-14-10-43-24.jpg', 'http://share.mapbbcode.org/zoiqp', 'Galati Mamertino', 7),
(36, 'Lago Malauzzo', 'https://i.postimg.cc/gcCgNNTW/photo-2021-07-14-10-48-59.jpg', 'https://i.postimg.cc/bJMmXTY1/photo-2021-07-14-10-48-51.jpg', 'http://share.mapbbcode.org/yhaey', 'Alcara Li Fusi', 7),
(37, 'Rocca di Novara', 'https://i.postimg.cc/L6s8Q3Yx/photo-2021-07-14-10-58-03.jpg', 'https://i.postimg.cc/8cpzShyP/photo-2021-07-14-10-57-53.jpg', 'http://share.mapbbcode.org/yfdkb', 'Novara di Sicilia', 8),
(38, 'Plemmirio', 'https://i.postimg.cc/4x97wQqr/photo-2021-07-14-11-02-50.jpg', 'https://i.postimg.cc/YqjmLH32/photo-2021-07-14-11-03-21.jpg', 'http://share.mapbbcode.org/cdatt', 'Siracusa', 7),
(39, 'Cascate Oxena', 'https://i.postimg.cc/V6j2FpWd/photo-2021-07-14-11-10-50.jpg', 'https://i.postimg.cc/FRt23NcM/photo-2021-07-14-11-10-42.jpg', 'http://share.mapbbcode.org/nbyzp', 'Militello', 8),
(40, 'Labirinto Arianna', 'https://i.postimg.cc/jdW40NBh/photo-2021-07-14-11-14-06.jpg', 'https://i.postimg.cc/FKvyL6zP/photo-2021-07-14-11-14-13.jpg', 'http://share.mapbbcode.org/knbfm', 'Castel di Lucio', 3),
(41, 'Grotte Seracozzo', 'https://i.postimg.cc/XJZWWsW8/photo-2021-07-14-11-38-15.jpg', 'https://i.postimg.cc/3RPTx2JH/photo-2021-07-14-11-38-18.jpg', 'http://share.mapbbcode.org/ryhoi', 'Milo - Etna', 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ratings`
--

INSERT INTO `ratings` (`id`, `place`, `user`, `rate`) VALUES
(1, 17, 25, 4),
(2, 23, 25, 5),
(4, 31, 25, 5),
(5, 26, 25, 5),
(6, 32, 25, 4),
(7, 33, 25, 5),
(8, 35, 25, 5),
(9, 39, 25, 5),
(10, 8, 25, 3),
(11, 5, 25, 4),
(12, 40, 25, 3),
(13, 38, 25, 5),
(14, 5, 1, 5),
(15, 32, 1, 5),
(16, 39, 1, 5),
(17, 41, 1, 5),
(18, 15, 1, 5),
(19, 36, 1, 5),
(20, 38, 1, 5),
(21, 33, 1, 5),
(22, 9, 1, 5),
(23, 17, 1, 5),
(24, 35, 1, 4),
(25, 8, 1, 4),
(26, 40, 1, 4),
(27, 34, 1, 4),
(28, 23, 1, 4),
(29, 31, 1, 4),
(30, 26, 1, 4),
(31, 5, 26, 5),
(32, 38, 26, 5),
(33, 9, 26, 5),
(34, 17, 26, 3),
(35, 32, 26, 4),
(36, 35, 26, 3),
(37, 39, 26, 4),
(38, 8, 26, 4),
(39, 41, 26, 3),
(40, 23, 26, 2),
(41, 5, 27, 5),
(42, 41, 27, 5),
(43, 38, 27, 5),
(45, 31, 8, 5),
(46, 34, 8, 1),
(47, 17, 8, 5),
(49, 40, 8, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 's_licciardello', 'esplorando'),
(4, 'admin', 'admin'),
(8, 'francesco', '9997'),
(25, 'swallow', 'swallow1234'),
(26, 'suncat', 'suncat'),
(27, 'explorer', 'asdasd');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place` (`place`),
  ADD KEY `user` (`user`);

--
-- Indici per le tabelle `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `place` (`place`);

--
-- Indici per le tabelle `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indici per le tabelle `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indici per le tabelle `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place` (`place`),
  ADD KEY `user` (`user`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT per la tabella `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT per la tabella `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT per la tabella `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`place`) REFERENCES `places` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`place`) REFERENCES `places` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`place`) REFERENCES `places` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
