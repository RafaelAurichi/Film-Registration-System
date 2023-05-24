
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `tbpremio` (
  `id` integer NOT NULL,
  `titulo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbpremio` (`id`, `titulo`) VALUES
(1, 'BAFTA'),
(2, 'Oscar'),
(3, 'Palma de Ouro');


CREATE TABLE `tbfilme` (
  `id` integer NOT NULL,
  `idPremio` integer NOT NULL,
  `nome` varchar(100) NOT NULL,
  `ano` integer NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbmoto` (`id`, `idPremio`, `nome`, `ano`) VALUES
(1, 1, 'Ladrões de Bicicleta', 1948),
(2, 2, 'Trama Fantasma', 2017),
(3, 3, 'O Sétimo Selo', 1957);


ALTER TABLE `tbpremio`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbfilme`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbpremio`
  MODIFY `id` integer NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `tbfilme`
  MODIFY `id` integer NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;