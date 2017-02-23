-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2016 a las 16:40:42
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

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
(2, 'The Martian', 'Andy Weir', 'Science fiction', 'Scott Free Productions', 2015, 1165, 'New', 'The Martian is a 2015 American science fiction film directed by Ridley Scott, based on Andy Weir''s 2011 novel The Martian. Matt Damon stars as an astronaut who is mistakenly presumed dead and left behind on Mars. The film depicts his struggle to survive and others'' efforts to rescue him. The film''s ensemble cast also features Jessica Chastain, Kristen Wiig, Jeff Daniels, Michael Peña, Kate Mara, Sean Bean, Sebastian Stan, Aksel Hennie, Donald Glover and Chiwetel Ejiofor.\r\n\r\nProducer Simon Kinberg began developing the film after 20th Century Fox optioned the novel in March 2013, which Drew Goddard adapted into a screenplay and was initially attached to direct, but the film did not move forward. Scott replaced Goddard, and with Damon in place as the main character, production was approved. Filming began in November 2014 and lasted approximately seventy days. Twenty sets were built on a sound stage in Budapest, Hungary, one of the largest in the world. Wadi Rum in Jordan was also used as a backdrop for filming.\r\n\r\nThe film premiered at the 2015 Toronto International Film Festival on September 11, 2015, followed by the United States'' theatrical release on October 2, 2015, by 20th Century Fox. The film was released in 2D, 3D, IMAX 3D and 4DX.[5] It received positive reviews and has grossed over $630 million worldwide, becoming Scott''s highest-grossing film to date, as well as the tenth-highest-grossing film of 2015. It received several accolades, including the Golden Globe Award for Best Motion Picture – Musical or Comedy, seven Academy Award nominations, including Best Picture and Best Adapted Screenplay for Goddard, and the 2016 long form Hugo Award for Best Dramatic Presentation. Damon won the Golden Globe for Best Actor in a Musical or Comedy and was nominated for several awards including the Academy Award for Best Actor, the BAFTA for Best Actor, and the Critic''s Choice Award for Best Actor.', 8, 0, 2),
(3, 'Star Trek Beyond', 'Simon Pegg', 'Science fiction', 'Skydance Media', 2016, 1789, 'New', 'Star Trek Beyond is a 2016 American science fiction adventure film directed by Justin Lin from a screenplay by Simon Pegg and Doug Jung, based on the series Star Trek, created by Gene Roddenberry. It is the thirteenth film in the Star Trek film franchise and the third installment in the reboot series, following Star Trek (2009) and Star Trek Into Darkness (2013). Chris Pine and Zachary Quinto reprise their roles as Captain James T. Kirk and Commander Spock, with Pegg, Karl Urban, Zoe Saldana, John Cho, and Anton Yelchin reprising their roles from the previous films. Idris Elba and Sofia Boutella also join the cast.', 7, 0, 2),
(4, 'Star Wars: Episode VIII', 'Rian Johnson', 'Science fiction', 'Lucasfilm Ltd.\r\n', 2015, 1657, 'New', 'Star Wars: The Force Awakens (also known as Star Wars: Episode VII – The Force Awakens) is a 2015 American space opera epic film directed, co-produced, and co-written by J. J. Abrams. The first installment of the Star Wars sequel trilogy, it stars Harrison Ford, Mark Hamill, Carrie Fisher, Adam Driver, Daisy Ridley, John Boyega, Oscar Isaac, Lupita Nyong''o, Andy Serkis, Domhnall Gleeson, Anthony Daniels, Peter Mayhew, and Max von Sydow. Produced by Lucasfilm Ltd. and Abrams'' production company Bad Robot Productions and distributed worldwide by Walt Disney Studios Motion Pictures, The Force Awakens marks a break in creative control from the original series as the first Star Wars film not produced by franchise creator George Lucas. Set 30 years after Return of the Jedi, it follows Rey, Finn, and Poe Dameron''s search for Luke Skywalker and their fight alongside the Resistance, led by veterans of the Rebel Alliance, against Kylo Ren and the First Order, a successor group to the Galactic Empire.\r\n\r\nThe Force Awakens was announced after Disney''s acquisition of Lucasfilm in October 2012. It was produced by Abrams, his longtime collaborator Bryan Burk, and Lucasfilm president Kathleen Kennedy. Abrams and Lawrence Kasdan, co-writer of the original trilogy films The Empire Strikes Back (1980) and Return of the Jedi (1983), rewrote an initial script by Michael Arndt. John Williams, composer for the previous six films, returned to compose the film''s score. Lucas served as creative consultant during the film''s early production. Filming began in April 2014 in Abu Dhabi and Iceland, with principal photography also taking place in Ireland and Pinewood Studios in England, and concluded in November 2014. It is the first live-action film in the franchise since Star Wars: Episode III – Revenge of the Sith, released ten years prior in 2005.', 8, 0, 2);

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
(18, 'Admin', 'Admin', 'admin@admin.com', 'admin', 'C/ admin', '1234', 'admin'),
(19, 'User', 'User', 'user@user.com', 'user', 'C/ User', '12345', 'peasant'),
(21, 'Librarian', 'Librarian', 'librarian@librarian.com', 'librarian', 'c/ librarian', '1234', 'librarian');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
