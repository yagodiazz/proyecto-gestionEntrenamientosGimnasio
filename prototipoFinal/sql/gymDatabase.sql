-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2024 a las 19:55:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gymapp4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_rutina`
--

CREATE TABLE `detalle_rutina` (
  `id` int(11) NOT NULL,
  `rutina_id` int(11) NOT NULL,
  `ejercicio_id` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `series` int(11) NOT NULL,
  `repeticiones_por_serie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_rutina`
--

INSERT INTO `detalle_rutina` (`id`, `rutina_id`, `ejercicio_id`, `peso`, `series`, `repeticiones_por_serie`) VALUES
(75, 21, 11, 35, 3, 8),
(76, 21, 13, 45, 2, 8),
(77, 21, 8, 60, 3, 8),
(78, 22, 11, 45, 45, 4),
(79, 23, 12, 40, 3, 8),
(80, 23, 9, 90, 3, 8),
(81, 23, 7, 25, 2, 12),
(82, 23, 7, 25, 2, 12),
(83, 23, 7, 25, 2, 12),
(84, 23, 7, 25, 2, 12),
(85, 24, 11, 98, 45, 8),
(86, 24, 8, 9, 8, 3),
(92, 28, 15, 20, 3, 3),
(93, 28, 9, 25, 3, 3),
(94, 29, 20, 100, 3, 8),
(95, 29, 15, 30, 3, 3),
(96, 29, 7, 20, 3, 8),
(97, 30, 12, 35, 3, 8),
(98, 30, 11, 20, 3, 8),
(99, 31, 12, 25, 3, 3),
(100, 31, 12, 25, 3, 3),
(101, 31, 12, 25, 3, 3),
(102, 31, 12, 25, 3, 3),
(103, 31, 12, 25, 3, 3),
(104, 31, 12, 25, 3, 3),
(105, 31, 12, 25, 3, 3),
(106, 31, 12, 25, 3, 3),
(107, 31, 12, 25, 3, 3),
(108, 31, 12, 25, 3, 3),
(109, 31, 12, 25, 3, 3),
(110, 31, 12, 25, 3, 3),
(111, 31, 12, 25, 3, 3),
(112, 31, 12, 25, 3, 3),
(113, 31, 12, 25, 3, 3),
(114, 32, 2, 100, 3, 8),
(115, 32, 3, 35, 3, 8),
(116, 33, 12, 40, 3, 8),
(117, 33, 12, 40, 3, 8),
(118, 33, 12, 40, 3, 8),
(119, 33, 12, 40, 3, 8),
(120, 33, 12, 40, 3, 8),
(121, 33, 12, 40, 3, 8),
(122, 33, 12, 40, 3, 8),
(123, 34, 11, 40, 2, 9),
(124, 35, 11, 40, 4, 8),
(125, 36, 2, 120, 3, 8),
(126, 36, 3, 8, 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240404171626', '2024-04-20 15:24:54', 278);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `id` int(11) NOT NULL,
  `maquina_id` int(11) DEFAULT NULL,
  `grupo_muscular_id` int(11) NOT NULL,
  `nombre_ejercicio` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`id`, `maquina_id`, `grupo_muscular_id`, `nombre_ejercicio`, `descripcion`) VALUES
(1, 1, 4, 'Sentadilla hack', 'Ejercicio de levantamiento de pesas que trabaja principalmente los músculos de las piernas, especialmente los cuádriceps, los glúteos y los músculos isquiotibiales.'),
(2, 2, 4, 'Prensa', 'Máquina que se basa en el movimiento de empuje para desarrollar la fuerza y resistencia de los cuádriceps y los gemelos'),
(3, 3, 4, 'Curl femoral sentado', 'Ejercicio básico de aislamiento que trabaja principalmente dos grupos musculares: los músculos de la pantorrilla y los isquiotibiales.'),
(4, 4, 4, 'Curl femoral tumbado', 'Ejercicio básico de aislamiento que trabaja principalmente dos grupos musculares: los músculos de la pantorrilla y los isquiotibiales.'),
(5, 5, 4, 'Elevación de gemelos', 'Las elevaciones de pantorrilla activan los dos músculos que se extienden por la parte posterior de la parte inferior de la pierna: el gastrocnemio y el sóleo.'),
(6, 6, 5, 'Máquina curl de bíceps', 'Para ejecutarlo tomamos la barra, pegamos los codos a los costados de nuestro cuerpo y tiramos los codos hacia atrás y debemos subir el peso y bajarlo lentamente hasta estirar el brazo completamente.'),
(7, 7, 6, 'Extension de tríceps', 'Extiende las piernas hacia delante apoyando únicamente los talones en el suelo. Empuja hacia arriba con las manos para extender los brazos y elevar tu cuerpo hacia la posición inicial.'),
(8, 8, 3, 'Jalón al pecho', 'Este es un ejercicio que implica múltiples músculos de la parte superior de la espalda (deltoides posterior, los romboides y el trapecio, aunque los bíceps también se ven implicados.)'),
(9, 9, 3, 'Remo gironda', 'El remo Gironda es un ejercicio de tracción que trabaja los músculos de la espalda en general, particularmente el dorsal ancho. También trabaja los músculos del antebrazo y los músculos de la parte superior del brazo.'),
(10, 10, 3, 'Remo sentado', ' Su finalidad es enfocar el desarrollo de las fibras musculares de la zona media de los dorsales realizando un movimiento de tracción, es decir, jalando un peso.'),
(11, 11, 1, 'Press Hombro con máquina', 'El press de hombro es un ejercicio básico de diversas rutinas para trabajar la parte superior del cuerpo incluyendo la espalda.'),
(12, 22, 2, 'Press superior con mancuerna', ' Es un ejercicio destinado a desarrollar tus pectorales,sobre todo la parte superior de estos. Obviamente, se realiza con dos mancuernas y para ejecutarlo bien deberías de estar en posición inclinada.'),
(13, 23, 2, 'Press plano con mancuerna', ' Es un ejercicio destinado a desarrollar tus pectorales. Obviamente, se realiza con dos mancuernas y para ejecutarlo bien deberías de estar en posición horizontal.'),
(14, 12, 1, 'Máquina elevaciones laterales', 'Las elevaciones laterales es un ejercicio para trabajar los hombros. Es muy utilizado porque permite ganar fuerza y resistencia en esta zona del cuerpo. '),
(15, 13, 2, 'Press plano en máquina', ' Es un ejercicio destinado a desarrollar tus pectorales.'),
(16, 14, 2, 'Press superior en máquina', ' Es un ejercicio destinado a desarrollar tus pectorales, en especial la parte superior de estos'),
(20, 18, 2, 'Press de banca', 'El levantador se tumba sobre su espalda en un banco, levantando y bajando la barra directamente por encima del pecho. Está pensado para el desarrollo de los músculos del pecho, los deltoides anterior y los serratos anteriores.'),
(21, 29, 4, 'Sentadila', 'Ejercicio que consiste en flexionar las piernas bajando el cuerpo recto hasta quedar en cuclillas.'),
(22, 30, 3, 'Peso muerto', 'La técnica peso muerto trabaja un gran número de grupos musculares. Entre ellos los del área inferior de la espalda e isquiotibiales, tonificando glúteos, gemelos y cúadriceps así como en el área superior de la espalda y los brazos además de los trapecios'),
(23, 21, 2, 'Flexiones', 'Ejercicio físico realizado estando en posición inclinada, recostado hacia abajo, levantando el cuerpo únicamente con los brazos y bajando de nuevo al suelo.'),
(24, 28, 7, 'Abdominales', 'Consisten en pasar de una posición tumbada a una sentada al llevar el pecho hacia los muslos. Este movimiento lo podemos realizar especialmente gracias al músculo recto abdominal.'),
(27, 32, 1, 'Elevaciones frontales con mancuenas', 'La elevación frontal es el mejor ejercicio para desarrollar la parte frontal del hombro, las elevaciones frontales se pueden realizar tanto de forma unilateral como bilateral.'),
(28, 33, 1, 'Hombro posterior', 'Este ejercicio es excelente para trabajar los deltoides posteriores, pero también activa otros músculos de la parte superior de la espalda.'),
(29, 34, 1, 'Face pull con polea', 'Este ejercicio te permite fortalecer el hombro y la espalda, trabaja los siguiente músculos:deltoides posterior y lateral, el bíceps, el trapecio medio y bajo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_muscular`
--

CREATE TABLE `grupo_muscular` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `grupo_muscular`
--

INSERT INTO `grupo_muscular` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'hombro', 'El hombro extiende desde el borde inferior de la clavícula hasta la apófisis coracoides de la escápula.', 'hombro.png'),
(2, 'pecho', 'El pecho​ se sitúa en la parte frontal del cuerpo humano, en oposición a la espalda y comprende la región desde la base del cuello y los hombros hasta el abdomen. ', 'pecho.png'),
(3, 'espalda', 'La espalda es la parte posterior del cuerpo humano que va de la base del cuello y hombros hasta la cintura.', 'espalda.png'),
(4, 'pierna', 'La pierna es todo aquello que se encuentra entre la rodilla y la articulación del tobillo.', 'pierna.png'),
(5, 'bíceps', 'El bíceps  se ubica superficial a los músculos braquial y coracobraquial, y básicamente forma el lado anterior del brazo.', 'biceps.png'),
(6, 'tríceps', 'El tríceps es un músculo grande que ocupa aproximadamente dos tercios de la parte superior del brazo, extendiéndose por la parte posterior del húmero, el hueso del brazo.', 'triceps.png'),
(7, 'abdominal', ' El abdominal encuentra situada entre el tórax, hacia arriba, y la pelvis, hacia abajo.', 'abdominal.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

CREATE TABLE `maquina` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`id`, `nombre`, `marca`, `imagen`) VALUES
(1, 'Máquina Sentadilla hack', 'Cibex', 'hacka.jpg'),
(2, 'Máquina Prensa', 'Nautilus', 'prensa.jpg'),
(3, 'Máquina Curl femoral sentado', 'Prime USA', 'femoralSentado.jpg'),
(4, 'Máquina Curl femoral tumbado', 'Hammer Strength', 'femoralTumbado.jpg'),
(5, 'Máquina Elevación de gemelos', 'Force USA', 'elevacionGemelo.jpg'),
(6, 'Máquina curl de bíceps', 'ProGym', 'curlBicepsMaquina.jpg'),
(7, 'Máquina Extension de tríceps', 'ProGym', 'extensionTricepsMaquina.jpg'),
(8, 'Máquina Jalón al pecho', 'TechnoGym', 'jalon.jpg'),
(9, 'Máquina Remo gironda', 'TechnoGym', 'remoGironda.jpg'),
(10, 'Máquina Remo sentado', 'Prime USA', 'remoSentado.jpg'),
(11, 'Máquina Press Hombro', 'Prime USA', 'pressHombro.jpg'),
(12, 'Máquina elevaciones laterales', 'ProGym', 'lateralesMaquina.jpg'),
(13, 'Máquina press plano', 'Titanium Strngth', 'maquinaPlano.jpg'),
(14, 'Máquina press superior', 'Prime Usa', 'maquinaSuperior.jpg'),
(15, 'Cinta de correr', 'Technogym', 'cinta.jpg'),
(16, 'Elíptica', 'Cecotec', 'eliptica.jpg'),
(17, 'Bicicleta estática', 'Technogym', 'cinta.jpg'),
(18, 'Rag Press de banca', 'ATX', 'pressBanca.jpg'),
(19, 'Barra', 'Ruster fitness', 'barra.jpg'),
(20, 'Mancuernas', 'Etenon', 'mancuernas.jpg'),
(21, 'Cuerpo', '', 'libre.jpg'),
(22, 'Press superior mancuernas', 'Prime Usa', 'pressSuperiorMancuerna.jpg'),
(23, 'Press plano mancuernas', 'Prime Usa', 'pressPlanoMancuerna.jpg'),
(24, 'Press hombro con mancuernas', 'ProGym', 'pressHombroMancuerna.jpg'),
(25, 'Curl de bíceps con mancuernas', 'ProGym', 'curlBicepsMancuerna.jpg'),
(26, 'Extensión de tríceps con mancuernas', 'ProGym', 'extensionTricepsMancuerna.jpg'),
(27, 'Elevaciones laterales con mancuernas', 'ProGym', 'lateralesMancuerna.jpg'),
(28, 'Máquina abdominales', 'TechnoGym', 'abdominales.png'),
(29, 'Barra Sentadilla', 'Force USA', 'sentadilla.jpg'),
(30, 'Barra Peso Muerto', 'TechnoGym', 'pesoMuerto.jpg'),
(32, 'Elevaciones frontales con mancuernas', '.', 'hombroAnterior.webp'),
(33, 'Máquina hombro posterior', 'Panatta', 'hombroPosterior.jpg'),
(34, 'Face pull con polea', 'ProGym', 'facePull.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutina`
--

CREATE TABLE `rutina` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rutina`
--

INSERT INTO `rutina` (`id`, `usuario_id`, `fecha_creacion`) VALUES
(21, 1, '2024-04-28'),
(22, 1, '2024-04-28'),
(23, 1, '2024-04-28'),
(24, 1, '2024-04-28'),
(28, 1, '2024-05-11'),
(29, 1, '2024-05-11'),
(30, 1, '2024-05-11'),
(31, 1, '2024-05-12'),
(32, 1, '2024-05-17'),
(33, 1, '2024-05-18'),
(34, 1, '2024-05-22'),
(35, 1, '2024-05-23'),
(36, 1, '2024-05-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'yago@gmail.com', '[\"ROLE_USER\",\"ROLE_ADMIN\"]', '$2y$13$pNqFkNsubZShnN91fdMpcOhr0WgAW6XqQeIzzoTo/zNyNzOWuPWTW'),
(5, 'rudi@gmail.com', '[\"ROLE_USER\"]', '$2y$13$DHi/3Nrg0a3SyH7/g/ZqU.Q.wOBq5BA0D.cuKfhvDjpAu/tnSBc2a'),
(6, 'yago2@gmail.com', '[\"ROLE_USER\"]', '$2y$13$r6YZXV1yLyzB2bW5CQ2hP.HlcSdswZVQgORBbLqkofzOn5CZ1QZum'),
(7, 'julio@gmail.com', '[\"ROLE_USER\"]', '$2y$13$lNV1n4zuCCLmb.nsR4Opd.KI6rxjdWD23empt4TgE5Zh6wlC4LFV2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_rutina`
--
ALTER TABLE `detalle_rutina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C85251F2D7A88FCB` (`rutina_id`),
  ADD KEY `IDX_C85251F230890A7D` (`ejercicio_id`);

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_95ADCFF441420729` (`maquina_id`),
  ADD KEY `IDX_95ADCFF45BEE8638` (`grupo_muscular_id`);

--
-- Indices de la tabla `grupo_muscular`
--
ALTER TABLE `grupo_muscular`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maquina`
--
ALTER TABLE `maquina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rutina`
--
ALTER TABLE `rutina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A48AB255DB38439E` (`usuario_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_rutina`
--
ALTER TABLE `detalle_rutina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `grupo_muscular`
--
ALTER TABLE `grupo_muscular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `maquina`
--
ALTER TABLE `maquina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `rutina`
--
ALTER TABLE `rutina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_rutina`
--
ALTER TABLE `detalle_rutina`
  ADD CONSTRAINT `FK_C85251F230890A7D` FOREIGN KEY (`ejercicio_id`) REFERENCES `ejercicio` (`id`),
  ADD CONSTRAINT `FK_C85251F2D7A88FCB` FOREIGN KEY (`rutina_id`) REFERENCES `rutina` (`id`);

--
-- Filtros para la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD CONSTRAINT `FK_95ADCFF441420729` FOREIGN KEY (`maquina_id`) REFERENCES `maquina` (`id`),
  ADD CONSTRAINT `FK_95ADCFF45BEE8638` FOREIGN KEY (`grupo_muscular_id`) REFERENCES `grupo_muscular` (`id`);

--
-- Filtros para la tabla `rutina`
--
ALTER TABLE `rutina`
  ADD CONSTRAINT `FK_A48AB255DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
