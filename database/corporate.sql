-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour pharmacie
CREATE DATABASE IF NOT EXISTS `pharmacie` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pharmacie`;

-- Listage de la structure de la table pharmacie. approvisionnements
CREATE TABLE IF NOT EXISTS `approvisionnements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_approvisionnement` date NOT NULL,
  `commande_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `approvisionnements_commande_id_foreign` (`commande_id`),
  CONSTRAINT `approvisionnements_commande_id_foreign` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.approvisionnements : ~0 rows (environ)
/*!40000 ALTER TABLE `approvisionnements` DISABLE KEYS */;
/*!40000 ALTER TABLE `approvisionnements` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.categories : ~2 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
	(1, 'pillule', '2022-07-22 08:10:44', '2022-07-22 08:10:44'),
	(2, 'injectable', '2022-07-22 08:10:57', '2022-07-22 08:10:57'),
	(3, 'epiderme', '2022-07-22 08:11:12', '2022-07-22 08:11:12');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numeroCNI` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.clients : ~2 rows (environ)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `nom`, `prenom`, `sexe`, `telephone`, `email`, `numeroCNI`, `adresse`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'salomon', NULL, '1', 65585641, NULL, NULL, 'douala', 0, '2022-07-22 08:09:56', '2022-07-22 08:09:56'),
	(2, 'gabrielle', NULL, '0', 656124785, NULL, NULL, 'douala', 0, '2022-07-22 08:10:21', '2022-07-22 08:10:21');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. commandes
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fournisseur_id` bigint(20) unsigned NOT NULL,
  `code_commande` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_commande` date NOT NULL,
  `date_livraison` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commandes_fournisseur_id_foreign` (`fournisseur_id`),
  CONSTRAINT `commandes_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.commandes : ~0 rows (environ)
/*!40000 ALTER TABLE `commandes` DISABLE KEYS */;
INSERT INTO `commandes` (`id`, `fournisseur_id`, `code_commande`, `date_commande`, `date_livraison`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, '', '2022-07-22', '2022-07-31', 'en cours', '2022-07-22 08:51:07', '2022-07-22 08:51:07');
/*!40000 ALTER TABLE `commandes` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. conditionnements
CREATE TABLE IF NOT EXISTS `conditionnements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.conditionnements : ~0 rows (environ)
/*!40000 ALTER TABLE `conditionnements` DISABLE KEYS */;
/*!40000 ALTER TABLE `conditionnements` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. contrats
CREATE TABLE IF NOT EXISTS `contrats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_debut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_fin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fournisseur_id` bigint(20) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reglement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contrats_fournisseur_id_foreign` (`fournisseur_id`),
  CONSTRAINT `contrats_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.contrats : ~0 rows (environ)
/*!40000 ALTER TABLE `contrats` DISABLE KEYS */;
/*!40000 ALTER TABLE `contrats` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.failed_jobs : ~0 rows (environ)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. fournisseurs
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.fournisseurs : ~2 rows (environ)
/*!40000 ALTER TABLE `fournisseurs` DISABLE KEYS */;
INSERT INTO `fournisseurs` (`id`, `nom`, `prenom`, `sexe`, `telephone1`, `telephone2`, `photo`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'kalil', 'kalil', '1', '6589562', NULL, NULL, 'kali@gmail.com', 'actif', '2022-07-22 08:42:11', '2022-07-22 08:42:11'),
	(2, 'bano', NULL, '1', '6825647', NULL, NULL, 'bamako@gmail.com', 'actif', '2022-07-22 08:42:35', '2022-07-22 08:42:35');
/*!40000 ALTER TABLE `fournisseurs` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. livraisons_tabls
CREATE TABLE IF NOT EXISTS `livraisons_tabls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `qte` int(11) NOT NULL,
  `pu` int(11) NOT NULL,
  `produit_id` bigint(20) unsigned NOT NULL,
  `unite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fournisseur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_commande` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_livraison` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commande_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `livraisons_tabls_produit_id_foreign` (`produit_id`),
  KEY `livraisons_tabls_commande_id_foreign` (`commande_id`),
  CONSTRAINT `livraisons_tabls_commande_id_foreign` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`),
  CONSTRAINT `livraisons_tabls_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.livraisons_tabls : ~4 rows (environ)
/*!40000 ALTER TABLE `livraisons_tabls` DISABLE KEYS */;
INSERT INTO `livraisons_tabls` (`id`, `qte`, `pu`, `produit_id`, `unite`, `fournisseur`, `date_commande`, `date_livraison`, `status`, `commande_id`, `created_at`, `updated_at`) VALUES
	(1, 50, 1500, 2, 'boite', 'bano', '2022-07-22', '2022-07-31', 'validé', 1, '2022-07-22 08:52:53', '2022-07-22 08:52:53'),
	(2, 90, 1500, 1, 'boite', 'bano', '2022-07-22', '2022-07-31', 'validé', 1, '2022-07-22 08:53:04', '2022-07-22 08:53:04'),
	(3, 50, 1500, 3, 'carton', 'bano', '2022-07-22', '2022-07-31', 'validé', 1, '2022-07-22 10:37:47', '2022-07-22 10:37:47'),
	(4, 50, 1900, 4, 'carton', 'bano', '2022-07-22', '2022-07-31', 'validé', 1, '2022-07-22 10:38:01', '2022-07-22 10:38:01');
/*!40000 ALTER TABLE `livraisons_tabls` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.migrations : ~23 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_resets_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(4, '2022_02_13_214422_create_fournisseurs_table', 1),
	(5, '2022_02_13_214603_create_type_articles_table', 1),
	(6, '2022_02_13_214633_create_clients_table', 1),
	(7, '2022_02_13_214704_create_pharmacies_table', 1),
	(8, '2022_02_13_214745_create_categories_table', 1),
	(9, '2022_02_13_214746_create_paiements_table', 1),
	(10, '2022_02_13_214829_create_rayons_table', 1),
	(11, '2022_02_13_214932_create_produits_table', 1),
	(12, '2022_02_13_215155_create_commandes_table', 1),
	(13, '2022_02_13_215242_create_approvisionnements_table', 1),
	(14, '2022_02_13_215302_create_roles_table', 1),
	(15, '2022_02_13_215303_create_users_table', 1),
	(16, '2022_02_13_215335_create_user_role_table', 1),
	(17, '2022_02_13_215420_create_produit_commande_table', 1),
	(18, '2022_02_13_215525_create_produit_pharmacie_table', 1),
	(19, '2022_03_14_112019_create_conditionnements_table', 1),
	(20, '2022_06_01_234029_create_livraisons_tabls', 1),
	(21, '2022_06_02_113744_create_ventes_table', 1),
	(22, '2022_06_02_135143_create_vente_produits_table', 1),
	(23, '2022_06_06_195529_create_contrats_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. paiements
CREATE TABLE IF NOT EXISTS `paiements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.paiements : ~0 rows (environ)
/*!40000 ALTER TABLE `paiements` DISABLE KEYS */;
/*!40000 ALTER TABLE `paiements` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.password_resets : ~0 rows (environ)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.personal_access_tokens : ~0 rows (environ)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. pharmacies
CREATE TABLE IF NOT EXISTS `pharmacies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.pharmacies : ~0 rows (environ)
/*!40000 ALTER TABLE `pharmacies` DISABLE KEYS */;
/*!40000 ALTER TABLE `pharmacies` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. produits
CREATE TABLE IF NOT EXISTS `produits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equivalence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qtestock` int(11) NOT NULL,
  `stock_seuil` int(11) DEFAULT NULL,
  `pu` int(11) NOT NULL,
  `pv` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_peremption` date DEFAULT NULL,
  `date_fabrication` date DEFAULT NULL,
  `grammage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rayon_id` bigint(20) unsigned DEFAULT NULL,
  `type_article_id` bigint(20) unsigned DEFAULT NULL,
  `categorie_id` bigint(20) unsigned DEFAULT NULL,
  `fournisseur_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produits_rayon_id_foreign` (`rayon_id`),
  KEY `produits_type_article_id_foreign` (`type_article_id`),
  KEY `produits_categorie_id_foreign` (`categorie_id`),
  KEY `produits_fournisseur_id_foreign` (`fournisseur_id`),
  CONSTRAINT `produits_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `produits_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`),
  CONSTRAINT `produits_rayon_id_foreign` FOREIGN KEY (`rayon_id`) REFERENCES `rayons` (`id`),
  CONSTRAINT `produits_type_article_id_foreign` FOREIGN KEY (`type_article_id`) REFERENCES `type_articles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.produits : ~6 rows (environ)
/*!40000 ALTER TABLE `produits` DISABLE KEYS */;
INSERT INTO `produits` (`id`, `designation`, `photo`, `equivalence`, `qtestock`, `stock_seuil`, `pu`, `pv`, `status`, `date_peremption`, `date_fabrication`, `grammage`, `rayon_id`, `type_article_id`, `categorie_id`, `fournisseur_id`, `created_at`, `updated_at`) VALUES
	(1, 'doliprane', NULL, NULL, 80, 45, 1200, 1500, '', NULL, NULL, '25g', 1, 2, 1, 2, '2022-07-22 08:43:43', '2022-07-22 08:43:43'),
	(2, 'paracetamol', NULL, NULL, 40, 32, 1500, 2500, '', NULL, NULL, '65g', 1, 2, 1, 2, '2022-07-22 08:44:25', '2022-07-22 08:44:25'),
	(3, 'ziagen', NULL, NULL, 50, 30, 1500, 2500, '', NULL, NULL, '10', 1, 2, 1, 2, '2022-07-22 10:25:40', '2022-07-22 10:25:40'),
	(4, 'zovirax', NULL, NULL, 50, 10, 13200, 12500, '', NULL, NULL, '2g', 1, 1, 1, 1, '2022-07-22 10:28:05', '2022-07-22 10:28:05'),
	(5, 'reopro', NULL, NULL, 0, 10, 1500, 1500, '', NULL, NULL, NULL, 2, 2, NULL, 2, '2022-07-22 10:52:31', '2022-07-22 10:52:31'),
	(6, 'diamox', NULL, NULL, 0, 1250, 1580, 2500, '', NULL, NULL, NULL, 1, NULL, NULL, 1, '2022-07-22 10:54:36', '2022-07-22 10:54:36');
/*!40000 ALTER TABLE `produits` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. produit_commande
CREATE TABLE IF NOT EXISTS `produit_commande` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `qte` int(11) NOT NULL,
  `pu` int(11) NOT NULL,
  `fournisseur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_commande` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_livraison` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reglement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pourcentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tva` int(11) NOT NULL,
  `remise` int(11) DEFAULT NULL,
  `produit_id` bigint(20) unsigned NOT NULL,
  `commande_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produit_commande_produit_id_foreign` (`produit_id`),
  KEY `produit_commande_commande_id_foreign` (`commande_id`),
  CONSTRAINT `produit_commande_commande_id_foreign` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `produit_commande_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.produit_commande : ~4 rows (environ)
/*!40000 ALTER TABLE `produit_commande` DISABLE KEYS */;
INSERT INTO `produit_commande` (`id`, `qte`, `pu`, `fournisseur`, `date_commande`, `date_livraison`, `status`, `reglement`, `pourcentage`, `unite`, `tva`, `remise`, `produit_id`, `commande_id`, `created_at`, `updated_at`) VALUES
	(1, 50, 1500, 'bano', '2022-07-22', '2022-07-31', 'validé', 'espece', '', 'boite', 0, NULL, 2, 1, '2022-07-22 08:51:28', '2022-07-22 08:52:53'),
	(2, 90, 1500, 'bano', '2022-07-22', '2022-07-31', 'validé', 'espece', '', 'boite', 0, NULL, 1, 1, '2022-07-22 08:51:50', '2022-07-22 08:53:03'),
	(3, 50, 1500, 'bano', '2022-07-22', '2022-07-31', 'validé', 'espece', '', 'carton', 0, NULL, 3, 1, '2022-07-22 10:33:22', '2022-07-22 10:37:47'),
	(4, 50, 1900, 'bano', '2022-07-22', '2022-07-31', 'validé', 'mobile', '', 'carton', 0, NULL, 4, 1, '2022-07-22 10:33:38', '2022-07-22 10:38:01');
/*!40000 ALTER TABLE `produit_commande` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. produit_pharmacie
CREATE TABLE IF NOT EXISTS `produit_pharmacie` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `qte` int(11) NOT NULL,
  `pu` int(11) NOT NULL,
  `produit_id` bigint(20) unsigned NOT NULL,
  `pharmacie_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produit_pharmacie_produit_id_foreign` (`produit_id`),
  KEY `produit_pharmacie_pharmacie_id_foreign` (`pharmacie_id`),
  CONSTRAINT `produit_pharmacie_pharmacie_id_foreign` FOREIGN KEY (`pharmacie_id`) REFERENCES `pharmacies` (`id`),
  CONSTRAINT `produit_pharmacie_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.produit_pharmacie : ~0 rows (environ)
/*!40000 ALTER TABLE `produit_pharmacie` DISABLE KEYS */;
/*!40000 ALTER TABLE `produit_pharmacie` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. rayons
CREATE TABLE IF NOT EXISTS `rayons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.rayons : ~2 rows (environ)
/*!40000 ALTER TABLE `rayons` DISABLE KEYS */;
INSERT INTO `rayons` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
	(1, 'secteur1', '2022-07-22 08:11:27', '2022-07-22 08:11:27'),
	(2, 'secteur2', '2022-07-22 08:11:35', '2022-07-22 08:11:35');
/*!40000 ALTER TABLE `rayons` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.roles : ~2 rows (environ)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `nom`, `created_at`, `updated_at`) VALUES
	(1, 'admin', NULL, NULL),
	(3, 'utilisateur', NULL, NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. type_articles
CREATE TABLE IF NOT EXISTS `type_articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.type_articles : ~2 rows (environ)
/*!40000 ALTER TABLE `type_articles` DISABLE KEYS */;
INSERT INTO `type_articles` (`id`, `nom`) VALUES
	(1, 'carton'),
	(2, 'boite');
/*!40000 ALTER TABLE `type_articles` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pieceIdentite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numeroPieceIdentite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nom`, `prenom`, `sexe`, `telephone1`, `telephone2`, `pieceIdentite`, `numeroPieceIdentite`, `email`, `password`, `status`, `photo`, `role_id`, `created_at`, `updated_at`) VALUES
	(1, 'njankouo', 'dairou', 'masculin', '699072561', '658464951', '1', '100095998', 'dairounjankouo2019@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'actif', 'https://via.placeholder.com/640x480.png/00dd77?text=laudantium', 1, NULL, NULL),
	(2, 'dairou', 'ndam', 'masculin', '658748965', NULL, 'cni', NULL, 'dairounjankouo@gmaul.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'actif', NULL, 3, '2022-07-22 07:55:37', '2022-07-22 07:55:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_role_user_id_foreign` (`user_id`),
  KEY `user_role_role_id_foreign` (`role_id`),
  CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.user_role : ~0 rows (environ)
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. ventes
CREATE TABLE IF NOT EXISTS `ventes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `date_vente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventes_user_id_foreign` (`user_id`),
  CONSTRAINT `ventes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.ventes : ~0 rows (environ)
/*!40000 ALTER TABLE `ventes` DISABLE KEYS */;
INSERT INTO `ventes` (`id`, `user_id`, `date_vente`, `created_at`, `updated_at`) VALUES
	(1, 1, '2022-07-22', '2022-07-22 08:05:46', '2022-07-22 08:05:46');
/*!40000 ALTER TABLE `ventes` ENABLE KEYS */;

-- Listage de la structure de la table pharmacie. vente_produits
CREATE TABLE IF NOT EXISTS `vente_produits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `qte_sortie` int(11) NOT NULL,
  `pu` int(11) NOT NULL,
  `date_vente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tva` int(11) NOT NULL,
  `vente_id` bigint(20) unsigned NOT NULL,
  `produit_id` bigint(20) unsigned NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reglement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remise` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vente_produits_vente_id_foreign` (`vente_id`),
  KEY `vente_produits_produit_id_foreign` (`produit_id`),
  CONSTRAINT `vente_produits_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE,
  CONSTRAINT `vente_produits_vente_id_foreign` FOREIGN KEY (`vente_id`) REFERENCES `ventes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table pharmacie.vente_produits : ~2 rows (environ)
/*!40000 ALTER TABLE `vente_produits` DISABLE KEYS */;
INSERT INTO `vente_produits` (`id`, `qte_sortie`, `pu`, `date_vente`, `tva`, `vente_id`, `produit_id`, `client`, `user`, `reglement`, `unite`, `remise`, `created_at`, `updated_at`) VALUES
	(1, 10, 1600, '2022-07-22', 0, 1, 2, 'salomon', 'njankouo', 'espèce', 'boite', NULL, '2022-07-22 08:56:35', '2022-07-22 08:56:35'),
	(2, 10, 1600, '2022-07-22', 0, 1, 1, 'salomon', 'njankouo', 'espèce', 'boite', NULL, '2022-07-22 08:57:43', '2022-07-22 08:57:43');
/*!40000 ALTER TABLE `vente_produits` ENABLE KEYS */;

-- Listage de la structure de déclencheur pharmacie. annule_vente
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER annule_vente
AFTER delete ON pharmacie.vente_produits
FOR EACH ROW 
BEGIN
UPDATE produits SET produits.qtestock=produits.qtestock+old.qte_sortie
WHERE produits.id=old.produit_id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Listage de la structure de déclencheur pharmacie. decrement_vente
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER decrement_vente
AFTER insert ON pharmacie.vente_produits
FOR EACH ROW 
BEGIN
UPDATE produits SET produits.qtestock=produits.qtestock-new.qte_sortie
WHERE produits.id=new.produit_id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Listage de la structure de déclencheur pharmacie. increment_stock
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER increment_stock
AFTER insert ON pharmacie.livraisons_tabls
FOR EACH ROW 
BEGIN
UPDATE produits SET produits.qtestock=produits.qtestock+new.qte
WHERE produits.id=new.produit_id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
