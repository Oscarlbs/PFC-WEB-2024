-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2024 a las 10:11:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carproject`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` varchar(255) NOT NULL,
  `ADMIN_PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `ADMIN_PASSWORD`) VALUES
('ADMIN', 'ADMIN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking`
--

CREATE TABLE `booking` (
  `BOOK_ID` int(11) NOT NULL,
  `CAR_ID` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `BOOK_PLACE` varchar(255) NOT NULL,
  `BOOK_DATE` date NOT NULL,
  `DURATION` int(11) NOT NULL,
  `PHONE_NUMBER` bigint(20) NOT NULL,
  `DESTINATION` varchar(255) NOT NULL,
  `RETURN_DATE` date NOT NULL,
  `PRICE` int(11) NOT NULL,
  `BOOK_STATUS` varchar(255) NOT NULL DEFAULT 'PROCESANDO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars`
--

CREATE TABLE `cars` (
  `CAR_ID` int(11) NOT NULL,
  `CAR_NAME` varchar(255) NOT NULL,
  `FUEL_TYPE` varchar(255) NOT NULL,
  `CAPACITY` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `CAR_IMG` varchar(255) NOT NULL,
  `AVAILABLE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cars`
--

INSERT INTO `cars` (`CAR_ID`, `CAR_NAME`, `FUEL_TYPE`, `CAPACITY`, `PRICE`, `CAR_IMG`, `AVAILABLE`) VALUES
(1, 'Ferrari California', 'Gasolina', 2, 3500, 'ferrari2.jpg', 'Y'),
(2, 'Lamborghini huracan', 'Gasolina', 2, 3000, 'lamborghini.webp', 'Y'),
(3, 'Porche Taycan ', 'Eléctrico', 5, 1500, 'porsche.jpg', 'Y'),
(4, 'BMW Serie 3', 'Gasolina', 5, 2000, 'bmw2.jpg', 'Y'),
(5, 'Audi A4', 'Diesel', 5, 1800, 'audi2.jpg', 'Y'),
(6, 'Mercedes-Benz Clase C', 'Gasolina', 5, 2200, 'mercedes.jpg', 'Y'),
(7, 'Honda Civic', 'Gasolina', 5, 1500, 'honda.jpg', 'Y'),
(8, 'Ford Mustang', 'Gasolina', 2, 2500, 'ford.jpg', 'Y'),
(9, 'Chevrolet Camaro', 'Gasolina', 2, 2600, 'chevrolet.jpg', 'Y');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feedback`
--

CREATE TABLE `feedback` (
  `FED_ID` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `COMMENT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `PAY_ID` int(11) NOT NULL,
  `BOOK_ID` int(11) NOT NULL,
  `CARD_NO` varchar(255) NOT NULL,
  `EXP_DATE` varchar(255) NOT NULL,
  `CVV` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `FNAME` varchar(255) NOT NULL,
  `LNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `LIC_NUM` varchar(255) NOT NULL,
  `PHONE_NUMBER` bigint(11) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indices de la tabla `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BOOK_ID`),
  ADD KEY `CAR_ID` (`CAR_ID`),
  ADD KEY `EMAIL` (`EMAIL`);

--
-- Indices de la tabla `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`CAR_ID`);

--
-- Indices de la tabla `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FED_ID`),
  ADD KEY `TEST` (`EMAIL`);

--
-- Indices de la tabla `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAY_ID`),
  ADD UNIQUE KEY `BOOK_ID` (`BOOK_ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`EMAIL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `booking`
--
ALTER TABLE `booking`
  MODIFY `BOOK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `cars`
--
ALTER TABLE `cars`
  MODIFY `CAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FED_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `PAY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`CAR_ID`) REFERENCES `cars` (`CAR_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`EMAIL`) REFERENCES `users` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `TEST` FOREIGN KEY (`EMAIL`) REFERENCES `users` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`BOOK_ID`) REFERENCES `booking` (`BOOK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
