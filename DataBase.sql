-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2025 a las 04:32:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `general`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_07_admin`
--

CREATE TABLE `project_07_admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `EmailId` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_07_admin`
--

INSERT INTO `project_07_admin` (`id`, `UserName`, `Name`, `EmailId`, `MobileNumber`, `Password`, `updationDate`) VALUES
(1, 'admin', 'Cristian Alejandro Cisneros Villegas', 'admin@gmail.com', 5529002158, '827ccb0eea8a706c4c34a16891f84e7b', '2024-01-10 11:18:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_07_booking`
--

CREATE TABLE `project_07_booking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `FromDate` varchar(100) DEFAULT NULL,
  `ToDate` varchar(100) DEFAULT NULL,
  `Comment` mediumtext DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `CancelledBy` varchar(5) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_07_booking`
--

INSERT INTO `project_07_booking` (`BookingId`, `PackageId`, `UserEmail`, `FromDate`, `ToDate`, `Comment`, `RegDate`, `status`, `CancelledBy`, `UpdationDate`) VALUES
(10, 13, 'ana.garcia@email.com', '2021-07-15', '2021-07-22', 'Emocionada por explorar las maravillas de Machu Picchu.', '2024-05-13 23:17:11', 2, 'a', '2024-05-13 23:50:27'),
(11, 16, 'ana.garcia@email.com', '2021-08-18', '2021-08-25', 'Listos para disfrutar del sol y el mar en este crucero por las Islas Griegas.', '2024-05-13 23:21:14', 0, NULL, NULL),
(12, 14, 'ana.garcia@email.com', '2021-10-05', '2021-10-12', 'Preparada para una experiencia salvaje en el Serengeti.', '2024-05-13 23:22:09', 0, NULL, NULL),
(13, 22, 'carlos.lopez@email.com', '2021-07-03', '2021-07-10', 'Emocionado por sumergirse en la tradición japonesa en Kioto.', '2024-05-13 23:24:51', 1, NULL, '2024-05-13 23:50:32'),
(14, 19, 'carlos.lopez@email.com', '2021-09-15', '2021-09-22', 'Listo para descubrir los tesoros de la Ciudad Eterna.', '2024-05-13 23:25:41', 0, NULL, NULL),
(15, 21, 'carlos.lopez@email.com', '2021-11-05', '2021-11-12', '¡Selva amazónica, aquí vamos!', '2024-05-13 23:26:32', 0, NULL, NULL),
(16, 13, 'maria.rodriguez@email.com', '2021-07-20', '2021-07-27', 'Emocionada por explorar las maravillas de Machu Picchu.', '2024-05-13 23:28:10', 2, 'a', '2024-05-13 23:50:42'),
(17, 15, 'maria.rodriguez@email.com', '2021-09-10', '2021-09-17', 'Lista para una aventura histórica en la Gran Muralla.', '2024-05-13 23:29:34', 0, NULL, NULL),
(18, 19, 'maria.rodriguez@email.com', '2021-11-08', '2021-11-15', '¡Roma, ciudad eterna, aquí vamos!', '2024-05-13 23:30:27', 0, NULL, NULL),
(19, 20, 'javier.hernandez@email.com', '2021-07-12', '2021-07-19', 'Emocionado por explorar los Himalayas en esta emocionante expedición.', '2024-05-13 23:31:39', 1, NULL, '2024-05-13 23:50:50'),
(20, 14, 'javier.hernandez@email.com', '2021-09-03', '2021-09-10', 'Listo para vivir una experiencia salvaje en el Serengeti.', '2024-05-13 23:32:17', 0, NULL, NULL),
(21, 22, 'javier.hernandez@email.com', '2021-10-22', '2021-10-29', '¡Emocionado por sumergirse en la tradición japonesa en Kioto!', '2024-05-13 23:33:04', 0, NULL, NULL),
(22, 15, 'laura.martinez@email.com', '2021-07-18', '2021-07-25', 'Emocionada por explorar la Gran Muralla China.', '2024-05-13 23:34:23', 2, 'a', '2024-05-13 23:51:01'),
(23, 17, 'laura.martinez@email.com', '2021-08-05', '2021-08-12', 'Listos para una aventura extrema en el Gran Cañón.', '2024-05-13 23:35:05', 0, NULL, NULL),
(24, 19, 'laura.martinez@email.com', '2021-10-20', '2021-10-27', '¡Roma, ciudad eterna, aquí vamos!', '2024-05-13 23:36:22', 0, NULL, NULL),
(25, 16, 'daniel.gonzalez@email.com', '2021-07-10', '2021-07-17', 'Emocionado por explorar las islas griegas en este crucero.', '2024-05-13 23:37:35', 1, NULL, '2024-05-13 23:51:12'),
(26, 14, 'daniel.gonzalez@email.com', '2021-09-15', '2021-09-22', 'Preparado para vivir una experiencia salvaje en el Serengeti.', '2024-05-13 23:38:21', 0, NULL, NULL),
(27, 22, 'daniel.gonzalez@email.com', '2021-11-05', '2021-11-12', '¡Emocionado por sumergirse en la tradición japonesa en Kioto!', '2024-05-13 23:39:06', 0, NULL, NULL),
(28, 14, 'andrea.perez@email.com', '2021-07-12', '2021-07-19', 'Emocionada por vivir la aventura en el Serengeti.', '2024-05-13 23:40:14', 2, 'a', '2024-05-13 23:51:22'),
(29, 19, 'andrea.perez@email.com', '2021-08-25', '2021-09-01', 'Lista para descubrir la historia y el arte de Roma.', '2024-05-13 23:40:59', 0, NULL, NULL),
(30, 14, 'andrea.perez@email.com', '2021-10-10', '2021-10-17', '¡Listos para explorar la selva del Amazonas!', '2024-05-13 23:41:40', 0, NULL, NULL),
(31, 20, 'juan.garcia@email.com', '2021-07-18', '2021-07-25', 'Emocionado por explorar los Himalayas en esta aventura.', '2024-05-13 23:42:45', 1, NULL, '2024-05-13 23:51:32'),
(32, 15, 'juan.garcia@email.com', '2021-09-05', '2021-09-12', 'Listo para descubrir la grandeza de la Gran Muralla.', '2024-05-13 23:43:28', 0, NULL, NULL),
(33, 19, 'juan.garcia@email.com', '2021-10-20', '2021-10-27', '¡Roma, ciudad eterna, aquí vamos!', '2024-05-13 23:44:08', 0, NULL, NULL),
(34, 16, 'sofia.hernandez@email.com', '2021-07-22', '2021-07-29', 'Emocionada por explorar las islas griegas en este crucero.', '2024-05-13 23:45:31', 2, 'a', '2024-05-13 23:51:47'),
(35, 14, 'sofia.hernandez@email.com', '2021-09-07', '2021-09-14', 'Listos para vivir la experiencia salvaje en el Serengeti.', '2024-05-13 23:46:10', 0, NULL, NULL),
(36, 22, 'sofia.hernandez@email.com', '2021-10-25', '2021-11-01', '¡Emocionada por sumergirse en la tradición japonesa en Kioto!', '2024-05-13 23:46:54', 0, NULL, NULL),
(37, 13, 'alejandro.martinez@email.com', '2021-07-03', '2021-07-10', 'Emocionado por explorar las maravillas de Machu Picchu.', '2024-05-13 23:47:50', 1, NULL, '2024-05-13 23:51:58'),
(38, 21, 'alejandro.martinez@email.com', '2021-08-18', '2021-08-25', 'Listo para una aventura en la selva del Amazonas.', '2024-05-13 23:48:36', 0, NULL, NULL),
(39, 17, 'alejandro.martinez@email.com', '2021-10-05', '2021-10-12', '¡Gran Cañón, aquí vamos!', '2024-05-13 23:49:18', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_07_enquiry`
--

CREATE TABLE `project_07_enquiry` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_07_enquiry`
--

INSERT INTO `project_07_enquiry` (`id`, `FullName`, `EmailId`, `MobileNumber`, `Subject`, `Description`, `PostingDate`, `Status`) VALUES
(8, 'María García', 'maria.garcia@email.com', '5512345678', 'Dudas sobre los paquetes turísticos', 'Me gustaría obtener más información sobre los paquetes turísticos disponibles, especialmente aquellos que incluyen destinos dentro de México.', '2024-05-13 19:33:07', NULL),
(9, 'Juan Martínez', 'juan.martinez@email.com', '5587654321', 'Consulta sobre los servicios incluidos en los paquetes', 'Me interesa saber más sobre los servicios que están incluidos en los paquetes turísticos. ¿Hay opciones de transporte, alojamiento y actividades turísticas?', '2024-05-13 19:34:04', NULL),
(10, 'Laura Hernández', 'laura.hernandez@email.com', '5598765432', 'Información sobre destinos turísticos', 'Estoy interesada en conocer los destinos turísticos que ofrece la plataforma, especialmente aquellos que son populares entre los residentes de la Ciudad de México.', '2024-05-13 19:36:27', 1),
(11, 'Carlos López', 'carlos.lopez@email.com', '5523456789', 'Dudas sobre la plataforma', 'Tengo algunas dudas sobre cómo funciona la plataforma de gestión de viajes. ¿Podrían proporcionarme más información sobre cómo realizar reservas y pagos?', '2024-05-13 19:37:19', NULL),
(12, 'Ana Torres', 'ana.torres@email.com', '5554329876', 'Consulta sobre los paquetes familiares', 'Me gustaría saber si tienen paquetes turísticos diseñados específicamente para familias. ¿Qué actividades y servicios están incluidos en estos paquetes?', '2024-05-13 19:37:57', NULL),
(13, 'Javier Sánchez', 'javier.sanchez@email.com', '5567891234', 'Consulta sobre los servicios adicionales', 'Estoy interesado en conocer más sobre los servicios adicionales que ofrece la plataforma, como seguro de viaje, asistencia en el aeropuerto, etc.', '2024-05-13 19:38:37', 1),
(14, 'Adriana Rodríguez', 'adriana.rodriguez@email.com', '5534567891', 'Dudas sobre los destinos internacionales', 'Me gustaría obtener información sobre los destinos internacionales que ofrece la plataforma, especialmente aquellos que son populares entre los residentes de la Ciudad de México.', '2024-05-13 19:39:25', NULL),
(15, 'Luisa Pérez', 'luisa.perez@email.com', '5589123456', 'Consulta sobre la disponibilidad de fechas', 'Me gustaría saber si hay disponibilidad para viajar en ciertas fechas específicas. ¿Cómo puedo verificar la disponibilidad y realizar una reserva?', '2024-05-13 19:40:02', NULL),
(16, 'Roberto Gómez', 'roberto.gomez@email.com', '5545678912', 'Consulta sobre la política de cancelación', 'Tengo algunas preguntas sobre la política de cancelación de los paquetes turísticos. ¿Cuáles son las condiciones y restricciones para cancelar una reserva?', '2024-05-13 19:40:39', 1),
(17, 'Patricia Ramírez', 'patricia.ramirez@email.com', '5567891234', 'Información sobre actividades de aventura', 'Me interesa conocer más sobre las actividades de aventura que están disponibles en los paquetes turísticos. ¿Qué opciones hay disponibles?', '2024-05-13 19:41:14', NULL),
(18, 'Francisco Díaz', 'francisco.diaz@email.com', '5523456789', 'Consulta sobre los precios', 'Me gustaría obtener más información sobre los precios de los paquetes turísticos. ¿Hay opciones para diferentes presupuestos?', '2024-05-13 19:41:50', NULL),
(19, 'Andrea Núñez', 'andrea.nunez@email.com', '5578912345', 'Dudas sobre la seguridad en los destinos', 'Estoy interesada en saber más sobre la seguridad en los destinos turísticos que ofrece la plataforma. ¿Qué medidas se toman para garantizar la seguridad de los viajeros?', '2024-05-13 19:42:31', 1),
(20, 'Daniel Castillo', 'daniel.castillo@email.com', '5512345678', 'Consulta sobre opciones de transporte', 'Me gustaría saber qué opciones de transporte están disponibles para llegar a los destinos turísticos. ¿Ofrecen servicios de traslado desde el aeropuerto?', '2024-05-13 19:43:12', NULL),
(21, 'Verónica Ortega', 'veronica.ortega@email.com', '5587654321', 'Consulta sobre la política de reembolso', 'Tengo algunas dudas sobre la política de reembolso en caso de cancelación de una reserva. ¿Cuál es el proceso para solicitar un reembolso?', '2024-05-13 19:43:45', NULL),
(22, 'Miguel Torres', 'miguel.torres@email.com', '5598765432', 'Información sobre los destinos históricos', 'Me gustaría obtener información sobre los destinos históricos que ofrece la plataforma. ¿Qué lugares de interés histórico puedo visitar', '2024-05-13 19:44:30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_07_issues`
--

CREATE TABLE `project_07_issues` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `Issue` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminremarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_07_issues`
--

INSERT INTO `project_07_issues` (`id`, `UserEmail`, `Issue`, `Description`, `PostingDate`, `AdminRemark`, `AdminremarkDate`) VALUES
(32, 'ana.garcia@email.com', 'Estado del viaje', 'Quisiera verificar el estado de mi vuelo hacia Machu Picchu para el próximo mes.', '2024-05-14 00:02:13', NULL, NULL),
(33, 'carlos.lopez@email.com', 'Paquete vacacional', 'Estoy interesado en obtener información sobre los paquetes vacacionales disponibles para viajar a París en agosto.', '2024-05-14 00:02:52', NULL, NULL),
(34, 'maria.rodriguez@email.com', 'Cancelación de viaje', 'Necesito cancelar mi reserva para el safari en Serengeti debido a un imprevisto familiar. ¿Cómo debo proceder?', '2024-05-14 00:03:38', NULL, NULL),
(35, 'javier.hernandez@email.com', 'Otros', 'Tengo algunas preguntas sobre los requisitos de entrada para viajar a China. ¿Pueden ayudarme con eso?', '2024-05-14 00:04:29', NULL, NULL),
(36, 'laura.martinez@email.com', 'Oferta de viaje', 'Me gustaría conocer más detalles sobre el paquete turístico \'Aventura en el Gran Cañón\'. ¿Qué actividades incluye?', '2024-05-14 00:05:06', NULL, NULL),
(37, 'daniel.gonzalez@email.com', 'Estado del viaje', 'Quisiera confirmar la reserva para el tour por las Islas Griegas que realicé hace unas semanas.', '2024-05-14 00:05:35', NULL, NULL),
(38, 'andrea.perez@email.com', 'Paquete vacacional', 'Estoy buscando un paquete vacacional para viajar a Tailandia. ¿Qué opciones tienen disponibles?', '2024-05-14 00:06:04', NULL, NULL),
(39, 'juan.garcia@email.com', 'Cancelación de viaje', 'Necesito cancelar mi reserva para el crucero por las Islas Griegas debido a un cambio repentino en mis planes. ¿Cómo debo proceder?', '2024-05-14 00:06:31', NULL, NULL),
(40, 'sofia.hernandez@email.com', 'Otros', '¿Pueden proporcionarme información sobre los requisitos de visa para viajar a Estados Unidos?', '2024-05-14 00:06:57', NULL, NULL),
(41, 'alejandro.martinez@email.com', 'Oferta de viaje', 'Estoy interesado en el paquete turístico \'Descubriendo la Gran Muralla\'. ¿Pueden proporcionarme más detalles sobre las excursiones incluidas?', '2024-05-14 00:07:27', NULL, NULL),
(42, 'ana.torres@email.com', 'Estado del viaje', 'Quisiera verificar la disponibilidad de asientos para mi vuelo a Roma la próxima semana.', '2024-05-14 00:07:54', NULL, NULL),
(43, 'carlos.sanchez@email.com', 'Paquete vacacional', 'Estoy buscando un paquete vacacional para unas vacaciones familiares en Cancún. ¿Qué opciones tienen disponibles?', '2024-05-14 00:08:18', NULL, NULL),
(44, 'maria.lopez@email.com', 'Cancelación de viaje', 'Necesito cancelar mi reserva para el viaje a Machu Picchu debido a problemas de salud. ¿Cómo puedo hacerlo?', '2024-05-14 00:08:43', NULL, NULL),
(45, 'javier.rodriguez@email.com', 'Otros', 'Tengo algunas preguntas sobre el proceso de alquiler de autos durante mi viaje a Los Ángeles. ¿Pueden ayudarme?', '2024-05-14 00:09:07', NULL, NULL),
(46, 'laura.perez@email.com', 'Oferta de viaje', 'Me gustaría obtener más información sobre el paquete turístico \'Encanto en París\'. ¿Cuáles son las actividades destacadas?', '2024-05-14 00:09:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_07_pages`
--

CREATE TABLE `project_07_pages` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT '',
  `detail` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_07_pages`
--

INSERT INTO `project_07_pages` (`id`, `type`, `detail`) VALUES
(3, 'Nosotros', '<div>Bienvenido a <span style=\"font-weight: bold;\">Plataforma de Gestión de Viajes</span>, tu puerta de entrada al mundo de los viajes y la aventura. En el corazón de México, nuestra plataforma ha sido concebida con la pasión por descubrir los destinos más fascinantes del mundo y hacerlos accesibles para todos.</div><div><br></div><div>En <span style=\"font-weight: bold;\">Plataforma de Gestión de Viajes</span>, creemos que cada viaje es una oportunidad para crear recuerdos inolvidables, para explorar nuevas culturas y para sumergirse en la belleza de nuestro planeta.<span style=\"font-style: italic;\"> Nuestra misión es hacer que tus sueños de viaje se conviertan en realidad, ofreciéndote una amplia gama de paquetes turísticos cuidadosamente diseñados para satisfacer todos tus deseos y necesidades</span>.</div><div><br></div><div>Con sede en la vibrante <span style=\"text-decoration-line: underline;\">Ciudad de México</span>, estamos orgullosos de ser una plataforma global, abierta a viajeros de todas partes del mundo. Nuestro equipo está formado por expertos en viajes, apasionados por compartir su conocimiento y ayudarte a planificar la escapada perfecta, ya sea que estés buscando unas vacaciones relajantes en la playa, una emocionante aventura en la naturaleza o una inmersión cultural en una ciudad fascinante.</div><div><br></div><div>Lo que nos distingue en<span style=\"font-weight: bold;\"> Plataforma de Gestión de Viajes</span> es nuestro compromiso con la excelencia en el servicio al cliente. <span style=\"font-style: italic;\">Nos esforzamos por ofrecerte una experiencia de reserva sin complicaciones, con atención personalizada en cada paso del camino. </span>Desde el momento en que exploras nuestras opciones hasta que regresas a casa con recuerdos inolvidables, estamos aquí para asegurarnos de que tu viaje sea perfecto en todos los aspectos.</div><div><br></div><div style=\"text-align: center;\">Únete a nosotros en esta emocionante aventura de descubrimiento y aventura. Ya sea que estés planeando tu primer viaje o buscando tu próxima gran aventura, en Plataforma de Gestión de Viajes estamos aquí para hacer que cada momento sea inolvidable. <span style=\"font-weight: bold;\">¡Bienvenido a bordo!</span></div>																						<div></div>'),
(11, 'Contactanos', '																																																												<div style=\"text-align: justify;\"><div><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">En<span style=\"font-weight: bold;\"> Plataforma de Gestión de Viajes</span>, estamos aquí para ayudarte en cada paso de tu viaje. Ya sea que tengas preguntas sobre nuestros paquetes turísticos, necesites asistencia con una reserva existente o simplemente quieras compartir tus experiencias de viaje con nosotros, estamos disponibles para atenderte.</span></div><div><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><br></span></div><div><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"font-style: italic;\">Puedes comunicarte con nuestro equipo de atención al cliente a través de los siguientes canales</span>:</span></div><div><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><br></span></div><div><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"font-weight: bold;\">Correo Electrónico:</span> Para consultas generales y asistencia, no dudes en escribirnos a <span style=\"text-decoration-line: underline;\">alex220496.acv@gmail.com</span>.</span></div><div><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><br></span></div><div><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"font-weight: bold;\">Teléfono:</span> Si prefieres hablar con un representante, puedes llamarnos al 5529002158. Nuestro equipo estará encantado de ayudarte con cualquier pregunta o inquietud que puedas tener.</span></div><div><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><br></span></div><div><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"font-weight: bold;\">Formulario de Contacto:</span> También puedes completar nuestro formulario en línea con tus detalles y consulta, y nos pondremos en contacto contigo lo antes posible.</span></div><div><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><br></span></div><div><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Estamos comprometidos a brindarte el mejor servicio posible y a asegurarnos de que tu experiencia con Plataforma de Gestión de Viajes sea excepcional en todos los aspectos. <span style=\"font-style: italic;\">No dudes en ponerte en contacto con nosotros en cualquier momento.</span> <span style=\"font-weight: bold;\">¡Esperamos poder ayudarte a planificar tu próximo viaje inolvidable!</span></span></div></div>																																																							');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_07_tourpackages`
--

CREATE TABLE `project_07_tourpackages` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(200) DEFAULT NULL,
  `PackageType` varchar(150) DEFAULT NULL,
  `PackageLocation` varchar(100) DEFAULT NULL,
  `PackagePrice` int(11) DEFAULT NULL,
  `PackageFetures` varchar(255) DEFAULT NULL,
  `PackageDetails` mediumtext DEFAULT NULL,
  `PackageImage` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_07_tourpackages`
--

INSERT INTO `project_07_tourpackages` (`PackageId`, `PackageName`, `PackageType`, `PackageLocation`, `PackagePrice`, `PackageFetures`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`) VALUES
(13, 'Aventura en Machu Picchu', 'Aventura Total', 'Machu Picchu, Perú', 25000, 'Guía turístico, transporte terrestre, alojamiento en hotel de lujo, excursiones a sitios arqueológicos, comidas incluidas.', 'Descubre la legendaria ciudad inca de Machu Picchu mientras exploras sus misterios y maravillas arquitectónicas. Disfruta de senderismo emocionante y vistas impresionantes en este viaje único.', 'Macchu_Picchu.png', '2024-05-13 20:49:33', NULL),
(14, 'Safari en Serengeti', 'Experiencia Salvaje', 'Parque Nacional del Serengeti, Tanzania', 30000, 'Safaris en vehículos todo terreno, alojamiento en campamentos de lujo, comidas tradicionales, guías expertos.', 'Sumérgete en la vida salvaje africana con este safari en el Parque Nacional del Serengeti. Observa de cerca leones, elefantes, jirafas y más en su hábitat natural.', 'Serengeti.png', '2024-05-13 20:52:06', NULL),
(15, 'Descubriendo la Gran Muralla', 'Historia y Cultura', 'Gran Muralla China, China', 20000, 'Visita guiada a la Gran Muralla, alojamiento en hoteles de categoría, comidas típicas, excursiones a sitios históricos.', 'Embárcate en una aventura cultural para explorar uno de los monumentos más icónicos del mundo: la Gran Muralla China. Sumérgete en su historia milenaria y disfruta de vistas panorámicas impresionantes.', 'Chinese_Wall.png', '2024-05-13 20:52:48', NULL),
(16, 'Crucero por las Islas Griegas', 'Mar Egeo', 'Islas Griegas, Grecia', 35000, 'Alojamiento en camarotes de lujo, pensión completa a bordo, excursiones a islas paradisíacas, actividades de entretenimiento a bordo.', 'Navega por las aguas cristalinas del Mar Egeo y explora las encantadoras islas griegas de Santorini, Mykonos, y más. Disfruta del sol, el mar y la cultura griega en este inolvidable crucero.', 'Greek_Islands.png', '2024-05-13 20:53:41', NULL),
(17, 'Aventura en el Gran Cañón', 'Naturaleza Extrema', 'Gran Cañón, Estados Unidos', 15000, 'Excursiones de senderismo, alojamiento en cabañas rústicas, actividades de aventura como rafting y escalada, comidas al aire libre.', 'Vive la emoción de explorar el impresionante paisaje del Gran Cañón en este viaje de aventura. Descubre cañones escarpados, ríos tumultuosos y vistas panorámicas espectaculares.', 'Grand_Canyon.png', '2024-05-13 20:54:29', NULL),
(18, 'Encanto en París', 'Romance en la Ciudad de la Luz', 'París, Francia', 28000, 'Alojamiento en hoteles boutique, tour guiado por los lugares más románticos de París, cena en crucero por el Sena, paseo en bote por el río.', 'Sumérgete en el romance y la elegancia de París mientras paseas por sus encantadoras calles adoquinadas, disfrutas de la deliciosa gastronomía francesa y exploras sus icónicos monumentos.', 'Paris.png', '2024-05-13 20:55:15', NULL),
(19, 'Maravillas de Roma', 'Historia y Arte', 'Roma, Italia', 22000, 'Visitas guiadas a los principales sitios históricos y arqueológicos, alojamiento en hoteles céntricos, comida italiana tradicional, transporte terrestre.', 'Descubre la rica historia y el arte incomparable de la Ciudad Eterna mientras exploras el Coliseo, el Foro Romano, el Vaticano y otras joyas históricas de Roma.', 'Roma.png', '2024-05-13 22:25:32', NULL),
(20, 'Aventura en el Himalaya', 'Trekking en Altura', 'Himalayas, Nepal', 40000, 'Trekking guiado por el Himalaya, alojamiento en lodges de montaña, comidas tradicionales nepalíes, vistas panorámicas de picos nevados.', 'Embárcate en una emocionante expedición de trekking a través de los majestuosos Himalayas, explorando paisajes de montaña impresionantes y sumergiéndote en la cultura única de Nepal.', 'Himalayas.png', '2024-05-13 22:26:18', NULL),
(21, 'Experiencia en el Amazonas', 'Selva Salvaje', 'Amazonas, Brasil', 32000, 'Excursiones en bote por el río Amazonas, caminatas por la selva, alojamiento en eco-lodges, avistamiento de vida silvestre, comidas típicas amazónicas.', 'Adéntrate en la exuberante selva del Amazonas y descubre la biodiversidad única de esta región mientras exploras sus ríos, bosques y reservas naturales.', 'Amazon.png', '2024-05-13 22:27:05', NULL),
(22, 'Escapada a Kioto', 'Tradición Japonesa', 'Kioto, Japón', 26000, 'Alojamiento en ryokans tradicionales, visitas guiadas a templos y santuarios, ceremonia del té japonesa, cena kaiseki, transporte terrestre.', 'Sumérgete en la elegancia y la tradición de Kioto, la antigua capital de Japón. Explora sus majestuosos templos, santuarios y jardines zen, y participa en una auténtica ceremonia del té japonés. Disfruta de la hospitalidad japonesa en los tradicionales ryokans y deleita tu paladar con una cena kaiseki, una exquisita experiencia gastronómica que combina arte y sabor. Déjate cautivar por la belleza atemporal y la serenidad de Kioto mientras te sumerges en su rica historia y cultura.', 'Kioto.png', '2024-05-13 22:28:39', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_07_users`
--

CREATE TABLE `project_07_users` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `EmailId` varchar(70) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_07_users`
--

INSERT INTO `project_07_users` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Password`, `RegDate`, `UpdationDate`) VALUES
(15, 'Ana García', '5512345678', 'ana.garcia@email.com', '46b2aff98e3f28137de297451f42a5a8', '2024-05-13 22:48:39', '2024-05-13 22:56:03'),
(16, 'Carlos López', '5543219876', 'carlos.lopez@email.com', '4811f55e7dad5fd585010c37769a726e', '2024-05-13 22:49:20', '2024-05-13 22:56:16'),
(17, 'María Rodríguez', '5587654321', 'maria.rodriguez@email.com', '219c291702e6ae202fbf35ae6fcab33f', '2024-05-13 22:49:45', '2024-05-13 22:56:27'),
(18, 'Javier Hernández', '5567891234', 'javier.hernandez@email.com', '9017df52c5f11d19abeba381706313b5', '2024-05-13 22:50:15', '2024-05-13 22:56:39'),
(19, 'Laura Martínez', '5512345678', 'laura.martinez@email.com', '7cfc88010d9483e999cc768fdb608443', '2024-05-13 22:50:40', '2024-05-13 22:56:52'),
(20, 'Daniel González', '5543219876', 'daniel.gonzalez@email.com', '859c801a507628c8721814ad6544d432', '2024-05-13 22:51:05', '2024-05-13 22:57:11'),
(21, 'Andrea Pérez', '5587654321', 'andrea.perez@email.com', 'bc9f4e5a87093691e5da9b1f08ae7980', '2024-05-13 22:51:29', '2024-05-13 22:57:24'),
(22, 'Juan García', '5567891234', 'juan.garcia@email.com', 'fc576b28c50252b97e47940f561c7e45', '2024-05-13 22:51:57', '2024-05-13 22:57:52'),
(23, 'Sofía Hernández', '5512345678', 'sofia.hernandez@email.com', 'fe58f6dde6416ab5d06f015a7bb85c42', '2024-05-13 22:52:41', '2024-05-13 22:58:08'),
(24, 'Alejandro Martínez', '5543219876', 'alejandro.martinez@email.com', '858eb8b5934b6d2e6d9c531aa3ddfcdd', '2024-05-13 22:53:03', '2024-05-13 22:58:20'),
(25, 'Ana Torres', '5587654321', 'ana.torres@email.com', '419dd99f090e390e4fb56968e53fd49d', '2024-05-13 22:53:22', '2024-05-13 22:58:33'),
(26, 'Carlos Sánchez', '5567891234', 'carlos.sanchez@email.com', '754ca66daa275cae14a53f95b63fa46c', '2024-05-13 22:53:43', '2024-05-13 22:58:44'),
(27, 'María López', '5512345678', 'maria.lopez@email.com', '4697ef2ff6070f3b31bbaf8753f563cd', '2024-05-13 22:54:06', '2024-05-13 22:58:54'),
(28, 'Javier Rodríguez', '5543219876', 'javier.rodriguez@email.com', 'a12cbf7223d5d090523555a8567bb71d', '2024-05-13 22:54:28', '2024-05-13 22:59:05'),
(29, 'Laura Pérez', '5587654321', 'laura.perez@email.com', '83d782c2ccd2a8d287a1fcbae742593d', '2024-05-13 22:55:01', '2024-05-13 22:59:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `project_07_admin`
--
ALTER TABLE `project_07_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `project_07_booking`
--
ALTER TABLE `project_07_booking`
  ADD PRIMARY KEY (`BookingId`);

--
-- Indices de la tabla `project_07_enquiry`
--
ALTER TABLE `project_07_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `project_07_issues`
--
ALTER TABLE `project_07_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `project_07_pages`
--
ALTER TABLE `project_07_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `project_07_tourpackages`
--
ALTER TABLE `project_07_tourpackages`
  ADD PRIMARY KEY (`PackageId`);

--
-- Indices de la tabla `project_07_users`
--
ALTER TABLE `project_07_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`),
  ADD KEY `EmailId_2` (`EmailId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `project_07_admin`
--
ALTER TABLE `project_07_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `project_07_booking`
--
ALTER TABLE `project_07_booking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `project_07_enquiry`
--
ALTER TABLE `project_07_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `project_07_issues`
--
ALTER TABLE `project_07_issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `project_07_pages`
--
ALTER TABLE `project_07_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `project_07_tourpackages`
--
ALTER TABLE `project_07_tourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `project_07_users`
--
ALTER TABLE `project_07_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
