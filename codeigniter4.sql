/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE `auth_groups_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `auth_identities`;
CREATE TABLE `auth_identities` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `secret` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `secret2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `force_reset` tinyint(1) NOT NULL DEFAULT '0',
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_secret` (`type`,`secret`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE `auth_logins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `identifier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_identifier` (`id_type`,`identifier`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `auth_permissions_users`;
CREATE TABLE `auth_permissions_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `permission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_permissions_users_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `auth_remember_tokens`;
CREATE TABLE `auth_remember_tokens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hashedValidator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int unsigned NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`),
  KEY `auth_remember_tokens_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `auth_token_logins`;
CREATE TABLE `auth_token_logins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `identifier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_identifier` (`id_type`,`identifier`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `imagenes`;
CREATE TABLE `imagenes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `extension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `movie_images`;
CREATE TABLE `movie_images` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int unsigned NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `price` decimal(10,2) DEFAULT '5.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) NOT NULL DEFAULT '5.00',
  `user_id` int unsigned NOT NULL,
  `e_id` int unsigned NOT NULL,
  `model` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `payment_id` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` enum('paypal','stripe') COLLATE utf8mb4_general_ci DEFAULT 'paypal',
  PRIMARY KEY (`id`),
  KEY `payments_user_id_foreign` (`user_id`),
  CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `categoria_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `products_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `product_tag`;
CREATE TABLE `product_tag` (
  `product_id` int unsigned NOT NULL,
  `tag_id` int unsigned NOT NULL,
  PRIMARY KEY (`product_id`,`tag_id`),
  KEY `product_tag_tag_id_foreign` (`tag_id`),
  CONSTRAINT `product_tag_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `entry` int unsigned NOT NULL,
  `exit` int unsigned NOT NULL,
  `stock` int unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `products_control`;
CREATE TABLE `products_control` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `count` int unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  `type` enum('exit','entry') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'entry',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `user_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_control_product_id_foreign` (`product_id`),
  KEY `products_control_user_id_foreign` (`user_id`),
  CONSTRAINT `products_control_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_control_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `products_users_control`;
CREATE TABLE `products_users_control` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `product_control_id` int unsigned NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `direction` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_users_control_product_control_id_foreign` (`product_control_id`),
  CONSTRAINT `products_users_control_product_control_id_foreign` FOREIGN KEY (`product_control_id`) REFERENCES `products_control` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `type` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'string',
  `context` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` enum('admin','regular') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'regular',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(1, 1, 'user', '2026-05-29 19:43:27');
INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'email_password', NULL, 'admin@admin.com', '$2y$12$9wrDrihld7ex.f5.brvuM.kFtqz60yZXyLnKbHFClkLinfbOGAIeC', NULL, NULL, 0, NULL, '2026-05-29 19:43:27', '2026-05-29 19:43:27');

INSERT INTO `auth_permissions_users` (`id`, `user_id`, `permission`, `created_at`) VALUES
(1, 1, 'beta.access', '2026-05-29 20:20:07'),
(2, 1, 'admin.access', '2026-05-29 20:22:20'),
(3, 1, 'users.detail', '2026-05-29 20:22:20');


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
(6, '2022-02-10-183022', 'App\\Database\\Migrations\\PeliculaImagen', 'default', 'App', 1760192287, 1),
(7, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1779726551, 2),
(8, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1779726551, 2),
(9, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'CodeIgniter\\Settings', 1779726551, 2),
(10, '2023-04-14-152119', 'App\\Database\\Migrations\\Payments', 'default', 'App', 1780154089, 3),
(11, '2023-04-17-131649', 'App\\Database\\Migrations\\AlterPaymentsAddColumns', 'default', 'App', 1780154089, 3),
(12, '2023-10-14-183725', 'App\\Database\\Migrations\\Categories', 'default', 'App', 1780154089, 3),
(13, '2023-10-14-183731', 'App\\Database\\Migrations\\Tags', 'default', 'App', 1780154089, 3),
(14, '2023-10-14-185159', 'App\\Database\\Migrations\\Products', 'default', 'App', 1780154089, 3),
(15, '2023-10-22-135811', 'App\\Database\\Migrations\\Movies', 'default', 'App', 1780154089, 3),
(16, '2023-10-29-153929', 'App\\Database\\Migrations\\ProductControl', 'default', 'App', 1780154089, 3),
(17, '2023-11-11-180934', 'App\\Database\\Migrations\\AddUserToProductsControl', 'default', 'App', 1780154089, 3),
(18, '2023-11-14-131453', 'App\\Database\\Migrations\\AlterMoviesAddPrice', 'default', 'App', 1780154089, 3),
(19, '2023-11-27-174438', 'App\\Database\\Migrations\\ProductsUsersControl', 'default', 'App', 1780154089, 3),
(20, '2023-11-28-163534', 'App\\Database\\Migrations\\MovieImages', 'default', 'App', 1780154089, 3),
(21, '2023-12-19-155819', 'App\\Database\\Migrations\\AddCategoryToProduct', 'default', 'App', 1780154090, 3),
(22, '2023-12-20-152716', 'App\\Database\\Migrations\\ProductTag', 'default', 'App', 1780154090, 3);




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






INSERT INTO `users` (`id`, `username`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', NULL, NULL, 1, NULL, '2026-05-29 19:43:27', '2026-05-29 19:43:27', NULL);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;