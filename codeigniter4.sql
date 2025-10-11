/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `imagenes`;
CREATE TABLE `imagenes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `data` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `pelicula_imagen`;
CREATE TABLE `pelicula_imagen` (
  `pelicula_id` int unsigned NOT NULL,
  `imagen_id` int unsigned NOT NULL,
  KEY `pelicula_imagen_pelicula_id_foreign` (`pelicula_id`),
  KEY `pelicula_imagen_imagen_id_foreign` (`imagen_id`),
  CONSTRAINT `pelicula_imagen_imagen_id_foreign` FOREIGN KEY (`imagen_id`) REFERENCES `imagenes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pelicula_imagen_pelicula_id_foreign` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE `peliculas` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci,
  `categoria_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `products_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` enum('admin','regular') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'regular',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categorias` (`id`, `titulo`) VALUES
(1, 'Categoría 1'),
(21, 'Categoría 1'),
(22, 'Categoría 2'),
(23, 'Categoría 3'),
(24, 'Categoría 4'),
(25, 'Categoría 5'),
(26, 'Categoría 6'),
(27, 'Categoría 7'),
(28, 'Categoría 8'),
(29, 'Categoría 9'),
(30, 'Categoría 10'),
(31, 'Categoría 11'),
(32, 'Categoría 12'),
(33, 'Categoría 13'),
(34, 'Categoría 14'),
(35, 'Categoría 15'),
(36, 'Categoría 16'),
(37, 'Categoría 17'),
(38, 'Categoría 18'),
(39, 'Categoría 19'),
(40, 'Categoría 20');

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-01-21-180032', 'App\\Database\\Migrations\\Peliculas', 'default', 'App', 1760192287, 1),
(2, '2022-01-25-210713', 'App\\Database\\Migrations\\Categorias', 'default', 'App', 1760192287, 1),
(3, '2022-02-06-181718', 'App\\Database\\Migrations\\Usuarios', 'default', 'App', 1760192287, 1),
(4, '2022-02-08-190647', 'App\\Database\\Migrations\\AgregarCategoriaAPelicula', 'default', 'App', 1760192287, 1),
(5, '2022-02-10-182014', 'App\\Database\\Migrations\\Imagenes', 'default', 'App', 1760192287, 1),
(6, '2022-02-10-183022', 'App\\Database\\Migrations\\PeliculaImagen', 'default', 'App', 1760192287, 1);

INSERT INTO `peliculas` (`id`, `titulo`, `descripcion`, `categoria_id`) VALUES
(1, 'Pelicula 1', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(2, 'Pelicula 2', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(3, 'Pelicula 3', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(4, 'Pelicula 4', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(5, 'Pelicula 5', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(6, 'Pelicula 6', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(7, 'Pelicula 7', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(8, 'Pelicula 8', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(9, 'Pelicula 9', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(10, 'Pelicula 10', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(11, 'Pelicula 11', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(12, 'Pelicula 12', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(13, 'Pelicula 13', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(14, 'Pelicula 14', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(15, 'Pelicula 15', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(16, 'Pelicula 16', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(17, 'Pelicula 17', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(18, 'Pelicula 18', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(19, 'Pelicula 19', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1),
(20, 'Pelicula 20', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum quasi iusto voluptate...', 1);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;