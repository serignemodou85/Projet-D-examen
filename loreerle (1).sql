-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 17 fév. 2025 à 01:32
-- Version du serveur : 8.0.30
-- Version de PHP : 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `loreerle`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int NOT NULL,
  `role` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `nom`, `prenom`, `email`, `password`, `telephone`, `role`, `created_at`, `updated_at`) VALUES
(3, 'BEYE', 'Balla', 'admin@gmail.com', 'Passer123', 770000000, 'superadmin', '2025-01-22 17:17:03', '2025-01-22 17:17:03'),
(13, 'FALL', 'Balla', 'modoufall@gmail.com', '$2y$12$GRudHOy1fLO9nD/8GqI7J.HwxK9JAkzA.Uj4KCyICDpA4AMse163q', 776566554, 'admin', '2025-02-17 00:37:21', '2025-02-17 00:37:21');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(9, 'accessoires'),
(10, 'electroniques'),
(11, 'transport'),
(12, 'documents'),
(13, 'divers');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `nom` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`nom`, `email`, `message`, `id`, `updated_at`, `created_at`) VALUES
('DIAW', 'admin@gmail.com', 'DDDDDDDDDDDDDDDDDDD', 1, '2025-02-16 23:25:38', '2025-02-16 23:25:38'),
('ROKHAYA DIAW', 'dof@gmail.com', 'Je suis folle et je veux être guérie. Donne moi des solutions svp sinon je vais être plus folle', 2, '2025-02-17 00:34:08', '2025-02-17 00:34:08');

-- --------------------------------------------------------

--
-- Structure de la table `discussion`
--

CREATE TABLE `discussion` (
  `id` int NOT NULL,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('unread','read') COLLATE utf8mb4_general_ci DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_18_152653_create_objets_table', 1),
(5, '2024_12_19_191028_create_administrateurs_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

CREATE TABLE `objet` (
  `id` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  `titre_anonce` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `lieu_perte` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_perte` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` enum('perdu','retrouve') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'retrouve',
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_categorie` int DEFAULT NULL,
  `id_sous_categorie` int DEFAULT NULL,
  `photo` varchar(2048) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `objet`
--

INSERT INTO `objet` (`id`, `id_utilisateur`, `titre_anonce`, `description`, `lieu_perte`, `date_perte`, `statut`, `image`, `created_at`, `updated_at`, `id_categorie`, `id_sous_categorie`, `photo`) VALUES
(25, 34, 'J\'ai ramacer un sac a dos', 'NN', 'Dakar', '2025-01-31 00:00:00', 'perdu', NULL, '2025-02-03 22:43:13', '2025-02-03 22:43:13', 11, 14, 'photos/G1rzf35SgeBRKdSr3loqa3iA4L2lu7JR04Q6GHQB.png'),
(35, 44, 'J\'ai retrouver un sac', 'Couleur Noire', 'Mermoz', '2025-02-14 00:00:00', 'retrouve', NULL, '2025-02-16 21:37:57', '2025-02-16 21:37:57', 9, 15, 'photos/lwy4pxHluW75p8vu5FnkHZOAhHDGDhKCB4nCqiyC.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('yqWIodhrwT1Twy8xqZM6OWlHQNfvcOQrzAyHanzp', 13, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YToxMTp7czo2OiJfdG9rZW4iO3M6NDA6IkIzcVNEcU5kRGRJVEpvazRNYnJ3ZVdjZ2tZVHEydU1mWnJMRXNVYksiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjI6ImlkIjtpOjM7czozOiJub20iO3M6NDoiQkVZRSI7czo2OiJwcmVub20iO3M6NToiQmFsbGEiO3M6NToiZW1haWwiO3M6MTU6ImFkbWluQGdtYWlsLmNvbSI7czo5OiJ0ZWxlcGhvbmUiO2k6NzcwMDAwMDAwO3M6NDoicm9sZSI7czoxMDoic3VwZXJhZG1pbiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMDg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbj9zdWNjZXNzPTEmbWVzc2FnZT1CaWVudmVudWUrZGFucytsJTI3YWRtaW5pc3RyYXRpb24mdGl0cmU9Q29ubmV4aW9uK3IlQzMlQTl1c3NpZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEzO30=', 1739755691);

-- --------------------------------------------------------

--
-- Structure de la table `sous_categories`
--

CREATE TABLE `sous_categories` (
  `id` int NOT NULL,
  `id_categorie` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sous_categories`
--

INSERT INTO `sous_categories` (`id`, `id_categorie`, `nom`) VALUES
(12, 9, 'bijoux'),
(13, 10, 'ordinateur-portable'),
(14, 11, 'vélo'),
(15, 9, 'sac-à-main-ou-sac-à-dos'),
(16, 12, 'permis-de-conduire'),
(17, 10, 'tablette'),
(18, 9, 'lunettes'),
(19, 12, 'carte-d\'identité'),
(20, 13, 'parapluie'),
(21, 10, 'appareils-photo'),
(22, 11, 'valise-ou-bagage');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `nom` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` text COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `adresse`, `telephone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(33, 'GUEYE', 'Moussa', 'NNNNN', '770004051', '2025-02-03 22:22:14', '2025-02-12 00:07:28', NULL),
(34, 'BEYE', 'Balla', 'NNNNN', '770004050', '2025-02-03 22:43:13', '2025-02-03 22:43:13', NULL),
(35, 'BEYE', 'Balla', 'NNNNN', '770004050', '2025-02-03 22:43:52', '2025-02-12 00:09:24', '2025-02-12 00:09:24'),
(42, 'DIAW', 'Rokhaya', 'Mbao', '772304556', '2025-02-12 00:16:08', '2025-02-13 22:45:50', '2025-02-13 22:45:50'),
(43, 'DIAW', 'Rokhaya', 'Mbao', '77777777', '2025-02-12 00:19:15', '2025-02-13 22:45:42', '2025-02-13 22:45:42'),
(44, 'DIAW', 'Rokhaya', 'Mbao', '786566554', '2025-02-16 21:37:57', '2025-02-16 21:37:57', NULL),
(45, 'FALL', 'Modou', 'FASS', '776544554', '2025-02-16 21:50:52', '2025-02-17 00:43:21', '2025-02-17 00:43:21'),
(46, 'DIAW', 'Rokhaya', 'Mbao', '776566554', '2025-02-16 21:52:25', '2025-02-17 00:04:47', '2025-02-17 00:04:47'),
(48, 'THIAM', 'Samba', 'Mbao', '787655454', '2025-02-16 22:58:55', '2025-02-17 00:41:53', '2025-02-17 00:41:53'),
(49, 'DIAW', 'Rokhaya', 'Mbao', '773434556', '2025-02-17 00:12:14', '2025-02-17 00:42:00', '2025-02-17 00:42:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `administrateurs_email_unique` (`email`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `objet`
--
ALTER TABLE `objet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_sous_categorie` (`id_sous_categorie`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `objet`
--
ALTER TABLE `objet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `discussion_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `discussion_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `objet_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `objet_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `objet_ibfk_3` FOREIGN KEY (`id_sous_categorie`) REFERENCES `sous_categories` (`id`);

--
-- Contraintes pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD CONSTRAINT `sous_categories_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
