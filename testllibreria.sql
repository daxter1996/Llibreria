-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2016 a las 13:02:24
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `testllibreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `company` varchar(150) NOT NULL,
  `year` int(11) NOT NULL,
  `editionNumber` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `value` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `title`, `author`, `subject`, `company`, `year`, `editionNumber`, `state`, `description`, `value`, `ISBN`, `type`) VALUES
(1, 'Interstellar', 'Jonathan Nolan', 'Science fiction', 'Legendary Pictures', 2014, 1654, 'New', 'Interstellar is a 2014 epic science fiction film co-written, co-produced and directed by Christopher Nolan. The film stars Matthew McConaughey, Anne Hathaway, Jessica Chastain, Matt Damon, and Michael Caine. In the film, a crew of astronauts travel through a wormhole in search of a new home for humanity. Brothers Christopher and Jonathan Nolan wrote the screenplay, which has its origins in a script Jonathan developed in 2007. Nolan produced the film with his wife Emma Thomas through their production company Syncopy and with Lynda Obst through Lynda Obst Productions. Caltech theoretical physicist Kip Thorne, whose work inspired the film, was an executive producer and acted as scientific consultant. Later, he also wrote a tie-in book, The Science of Interstellar. Warner Bros., Paramount Pictures, and Legendary Pictures co-financed the film.', 10, 0, 2),
(2, 'The Martian', 'Andy Weir', 'Science fiction', 'Scott Free Productions', 2015, 1165, 'New', 'The Martian is a 2015 American science fiction film directed by Ridley Scott, based on Andy Weir''s 2011 novel The Martian. Matt Damon stars as an astronaut who is mistakenly presumed dead and left behind on Mars. The film depicts his struggle to survive and others'' efforts to rescue him. The film''s ensemble cast also features Jessica Chastain, Kristen Wiig, Jeff Daniels, Michael Peña, Kate Mara, Sean Bean, Sebastian Stan, Aksel Hennie, Donald Glover and Chiwetel Ejiofor.\r\n\r\nProducer Simon Kinberg began developing the film after 20th Century Fox optioned the novel in March 2013, which Drew Goddard adapted into a screenplay and was initially attached to direct, but the film did not move forward. Scott replaced Goddard, and with Damon in place as the main character, production was approved. Filming began in November 2014 and lasted approximately seventy days. Twenty sets were built on a sound stage in Budapest, Hungary, one of the largest in the world. Wadi Rum in Jordan was also used as a backdrop for filming.\r\n\r\nThe film premiered at the 2015 Toronto International Film Festival on September 11, 2015, followed by the United States'' theatrical release on October 2, 2015, by 20th Century Fox. The film was released in 2D, 3D, IMAX 3D and 4DX.[5] It received positive reviews and has grossed over $630 million worldwide, becoming Scott''s highest-grossing film to date, as well as the tenth-highest-grossing film of 2015. It received several accolades, including the Golden Globe Award for Best Motion Picture – Musical or Comedy, seven Academy Award nominations, including Best Picture and Best Adapted Screenplay for Goddard, and the 2016 long form Hugo Award for Best Dramatic Presentation. Damon won the Golden Globe for Best Actor in a Musical or Comedy and was nominated for several awards including the Academy Award for Best Actor, the BAFTA for Best Actor, and the Critic''s Choice Award for Best Actor.', 8, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `dni` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'peasant'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `address`, `dni`, `usertype`) VALUES
(10, 'Jesus', 'Liz Alles', 'jesuslizalles@gmail.com', 'pene', 'C/ abatzer 62', '41747940L', 'peasant'),
(11, 'Eder', 'Sanchez', 'ederservera@gamil.com', 'pene', 'C/ Gloria Eterna 666', '4512417420k', 'admin'),
(14, 'tumas', 'de las cabras', '', 'peneflute', '', '', 'peasant'),
(15, 'pytxy', 'doot', 'someone@example.com', '1234', 'micasa', '41606072S', 'peasant'),
(16, 'david', 'david', 'davidjesus3@gmail.com', 'jesus', 'fead dsw ', '34523423t', 'peasant');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
