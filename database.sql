-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 30 juil. 2021 à 10:05
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetdev`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_tips`
--

CREATE TABLE `categorie_tips` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_tips`
--

INSERT INTO `categorie_tips` (`id`, `nom`) VALUES
(1, 'News'),
(3, 'Astuce'),
(4, 'Info'),
(5, 'Expérience'),
(6, 'Demande');

-- --------------------------------------------------------

--
-- Structure de la table `demande_pro`
--

CREATE TABLE `demande_pro` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `demande_pro`
--

INSERT INTO `demande_pro` (`id`, `id_user`, `message`) VALUES
(10, 8, 'apporter du contenu');

-- --------------------------------------------------------

--
-- Structure de la table `outil`
--

CREATE TABLE `outil` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `outil`
--

INSERT INTO `outil` (`id`, `nom`, `resume`) VALUES
(5, 'PhpStorm', 'PhpStorm est un éditeur pour PHP, HTML, CSS et JavaScript, édité par JetBrains. Il permet d\'éditer du code PHP pour les versions allant de la 5.3 à la 8.'),
(6, 'Visual Studio code', 'Visual Studio Code est un éditeur de code extensible développé par Microsoft pour Windows, Linux et macOS. Les fonctionnalités incluent la prise en charge du débogage, la mise en évidence de la syntaxe, la complétion intelligente du code, les snippets, la refactorisation du code et Git intégré.'),
(7, 'Git', 'Git est un logiciel de gestion de versions décentralisé. C\'est un logiciel libre créé par Linus Torvalds, auteur du noyau Linux, et distribué selon les termes de la licence publique générale GNU version 2. Le principal contributeur actuel de git et depuis plus de 16 ans est Junio C Hamano.');

-- --------------------------------------------------------

--
-- Structure de la table `outil_techno`
--

CREATE TABLE `outil_techno` (
  `outil_id` int(11) NOT NULL,
  `techno_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `outil_techno`
--

INSERT INTO `outil_techno` (`outil_id`, `techno_id`) VALUES
(6, 10),
(7, 10),
(7, 11),
(7, 12),
(7, 13),
(7, 14),
(7, 15),
(7, 16),
(7, 17),
(7, 18),
(7, 19),
(7, 20);

-- --------------------------------------------------------

--
-- Structure de la table `techno`
--

CREATE TABLE `techno` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domaine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `techno`
--

INSERT INTO `techno` (`id`, `nom`, `domaine`, `intro`, `doc`, `photo`) VALUES
(10, 'HTML', 'Front', 'HTML signifie « HyperText Markup Language » qu\'on peut traduire par « langage de balises pour l\'hypertexte ». Il est utilisé afin de créer et de représenter le contenu d\'une page web et sa structure. D\'autres technologies sont utilisées avec HTML pour décrire la présentation d\'une page (CSS) et/ou ses fonctionnalités interactives (JavaScript).', 'https://developer.mozilla.org/fr/docs/Web/HTML', '2021072610130460fe8ab07a0541-HTML.png'),
(11, 'CSS', 'Front', 'CSS est l’acronyme de « Cascading Style Sheets » ce qui signifie « feuille de style en cascade ».\r\n\r\nLe CSS correspond à un langage informatique permettant de mettre en forme des pages web (HTML ou XML).\r\n\r\nCe langage est donc composé des fameuses « feuilles de style en cascade » également appelées fichiers CSS (.css) et contient des éléments de codage.', 'https://developer.mozilla.org/fr/docs/Web/CSS', '202107282140366101ced4881e52-CSS.png'),
(12, 'Javascript', 'Front', 'JavaScript est un langage de programmation de scripts principalement employé dans les pages web interactives et à ce titre est une partie essentielle des applications web. Avec les technologies HTML et CSS, JavaScript est parfois considéré comme l\'une des technologies cœur du World Wide Web.', 'https://developer.mozilla.org/fr/docs/orphaned/Web/JavaScript', '202107282141596101cf279a5c31-JS.png'),
(13, 'Angular', 'Front', 'Angular est un cadriciel côté client, open source, basé sur TypeScript, et co-dirigé par l\'équipe du projet « Angular » à Google et par une communauté de particuliers et de sociétés. Angular est une réécriture complète de AngularJS, cadriciel construit par la même équipe.', 'https://angular.io/', '202107291351566102b27c416451-Angular.png'),
(14, 'React', 'Front', 'React est une bibliothèque JavaScript libre développée par Facebook depuis 2013. Le but principal de cette bibliothèque est de faciliter la création d\'application web monopage, via la création de composants dépendant d\'un état et générant une page HTML à chaque changement d\'état.', 'https://fr.reactjs.org/', '202107291353286102b2d80a2ef0-REACT.png'),
(15, 'Vue JS', 'Front', 'Vue.js, est un framework JavaScript open-source utilisé pour construire des interfaces utilisateur et des applications web monopages. Vue a été créé par Evan You et est maintenu par lui et le reste des membres actifs de l\'équipe principale travaillant sur le projet et son écosystème.', 'https://vuejs.org/', '202107291354596102b3337da860-VUE.webp'),
(16, 'PHP', 'Back', 'PHP: Hypertext Preprocessor, plus connu sous son sigle PHP, est un langage de programmation libre, principalement utilisé pour produire des pages Web dynamiques via un serveur HTTP, mais pouvant également fonctionner comme n\'importe quel langage interprété de façon locale. PHP est un langage impératif orienté objet.', 'https://www.php.net/', '202107291356196102b3833dcd90-PHP.png'),
(17, 'MySQL', 'Back', 'MySQL est la base de données open source la plus populaire au monde. Bien qu\'elle soit avant tout connue pour son utilisation par des sociétés Web, telles que Google, Facebook et Yahoo!, MySQL est également une base de données embarquée très populaire. Plus de 3000 éditeurs de logiciels et fabricants de matériel lui font confiance, parmi lesquels sept des dix plus grandes entreprises logicielles au monde.', 'https://www.mysql.com/fr/', '202107291400576102b499b25cbMySQL.png'),
(18, 'Python', 'Back', 'Créé en 1991, le langage de programmation Python apparu à l’époque comme une façon d’automatiser les éléments les plus ennuyeux de l’écriture de scripts ou de réaliser rapidement des prototypes d’applications. Depuis quelques années, toutefois, ce langage de programmation s’est hissé parmi les plus utilisés dans le domaine du développement de logiciels, de gestion d’infrastructure et d’analyse de données. Il s’agit d’un élément moteur de l’explosion du Big Data.', 'https://www.python.org/', '20210729220340610325bc5388e0-Python.jpg'),
(19, 'Node JS', 'Back', 'Node.js est une plateforme logicielle libre en JavaScript, orientée vers les applications réseau événementielles hautement concurrentes qui doivent pouvoir monter en charge. Elle utilise la machine virtuelle V8, la librairie libuv pour sa boucle d\'évènements, et implémente sous licence MIT les spécifications CommonJS.', 'https://nodejs.org/fr/', '2021072922055761032645ab8891-NodeJS.png'),
(20, 'Symfony', 'Back', 'Symfonyest un framework PHP qui propose entre autres :\r\n\r\nune séparation du code en trois couches, selon le modèle MVC, pour une plus grande maintenabilité et évolutivité ;\r\ndes performances optimisées et un système de cache afin d\'assurer des temps de réponse optimaux ;\r\nune gestion des URL parlante, permettant à une page d\'avoir une URL distincte de sa position dans l\'arborescence ;\r\nun système de configuration en cascade utilisant pleinement le langage de description YAML ;\r\nun générateur de back-office et un lanceur de module (scaffolding) ;\r\nl\'internationalisation native ;\r\nle support d\'AJAX ;\r\nune architecture extensible permettant créations et utilisations de plugins.\r\nSymfony fournit une interface en ligne de commande pour améliorer la productivité en créant un code de base modifiable à volonté.\r\n\r\nLa version 5.0 est sortie en novembre 2019.', 'https://symfony.com/', '20210729221250610327e26e624symfony.png');

-- --------------------------------------------------------

--
-- Structure de la table `tips`
--

CREATE TABLE `tips` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_tips_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaires` json DEFAULT NULL,
  `likes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tips`
--

INSERT INTO `tips` (`id`, `nom`, `resume`, `categorie_tips_id`, `user_name`, `commentaires`, `likes`) VALUES
(10, 'Nouveauté Symfony', 'Je vous partage deux nouveautés sur Symfony = D !\r\n\r\nString sert à gérer des chaînes de caractères orientées objet et à assurer une gestion complète d’unicode, permettant ainsi d’assurer une compatibilité avec tous les caractères disponibles dans tous les langages. \r\n\r\nNotifier facilite l’envoi de notifications sur différents types de canaux (emails, SMS, canaux Slack, etc.) depuis une application Symfony. C’est un composant que je qualifierais de « haut niveau », c’est-à-dire qu’il se construit par-dessus d’autres composants existants.', 1, 'Mirandas', '[{\"auteur\": \"David-samp\", \"contenu\": \"Merci pour l\'info ! Ce sera très utiles pour mes futurs projets.\"}]', 1),
(11, 'GitHub lance GitHub Copilot', 'Bonne nouvelle pour les développeurs : GitHub lance un outil qui va faciliter l’écriture de lignes de code et apporter un gain de temps considérable aux développeurs.\r\n\r\nGitHub Copilot est alimenté par Codex, le nouveau système d’IA créé par OpenAI, la structure « à but lucratif plafonné » spécialisée dans l’intelligence artificielle et dans laquelle Microsoft a investi 1 milliard de dollars. En s’appuyant sur OpenAI Codex, considéré comme le descendant de GPT-3, l’algorithme de génération de langage aux 175 milliards de paramètres, GitHub Copilot comprend plus de contexte que la plupart des assistants de code.', 4, 'Mirandas', '[{\"auteur\": \"David-samp\", \"contenu\": \"Top!\"}]', 4),
(12, 'Nouveau type Union en php', 'Les types Union (PHP 8)\r\n\r\nLes types Union peuvent être utiles dans plusieurs cas. Les types Union sont une collection de deux ou plusieurs types qui indiquent que l\'un ou l\'autre peut être utilisé. Cependant, le type “void” ne peut pas faire partie d\'un type Union, puisqu\'il n’indique aucune valeur de retour. De plus, les unions annulables peuvent être écrites en utilisant | null, ou en utilisant la notation “?”.', 4, 'Mirandas', '[]', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tips_techno`
--

CREATE TABLE `tips_techno` (
  `tips_id` int(11) NOT NULL,
  `techno_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tips_techno`
--

INSERT INTO `tips_techno` (`tips_id`, `techno_id`) VALUES
(10, 20),
(11, 10),
(11, 11),
(11, 12),
(11, 13),
(11, 14),
(11, 15),
(11, 16),
(11, 17),
(11, 18),
(11, 19),
(11, 20),
(12, 16),
(12, 20);

-- --------------------------------------------------------

--
-- Structure de la table `tutoriel`
--

CREATE TABLE `tutoriel` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` int(11) NOT NULL,
  `lien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tutoriel`
--

INSERT INTO `tutoriel` (`id`, `nom`, `resume`, `niveau`, `lien`) VALUES
(12, 'Introduction à Symfony', 'Cette vidéo est une bonne introduction au framework Symfony. Elle a été créée par le youtuber Lior Chamla et possède des suites pour approfondir la découverte du framework.', 2, 'https://www.youtube.com/watch?v=UTusmVpwJXo'),
(13, 'Introduction à Symfony', 'Cette vidéo est une bonne introduction au framework Symfony. Elle a été créée par le youtuberYoanDev et possède des suites pour approfondir la découverte du framework.', 2, 'https://www.youtube.com/watch?v=HViLTaLQ1AQ'),
(14, 'Découverte de Symfony UX', 'Dans ce tutoriel Grafikart propose de découvrir Symfony UX. Une initiative de la part de l\'équipe symfony qui permet de donner un accès simple à des composants d\'interface avancés.', 3, 'https://www.youtube.com/watch?v=0PrtmE0IcoI');

-- --------------------------------------------------------

--
-- Structure de la table `tutoriel_techno`
--

CREATE TABLE `tutoriel_techno` (
  `tutoriel_id` int(11) NOT NULL,
  `techno_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tutoriel_techno`
--

INSERT INTO `tutoriel_techno` (`tutoriel_id`, `techno_id`) VALUES
(12, 20),
(13, 20),
(14, 20);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `reset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tutofavoris` json DEFAULT NULL,
  `bio` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `nom`, `prenom`, `roles`, `reset`, `photo`, `linkedin`, `github`, `tutofavoris`, `bio`, `ville`, `occupation`) VALUES
(2, 'Mirandas', 'davidsampaio91@gmail.com', '$2y$13$P14DBgKgWnbmduXBzepXZ.KDBMQwKiP/OGA5vvKuhWodBj7VupjrS', 'Sampaio', 'David', '[\"ROLE_ADMIN\"]', '6101ddd36530c', '202107291601526102d0f01cff61-NodeJS.png', NULL, 'https://github.com/David-samp', '[]', 'Administrateur DicoWeb', 'Paris', 'En Formation'),
(6, 'David-samp', 'esia.esia@esia.fr', '$2y$13$v2pFGts1sH.Oml3qgFruzehe.kls4R4/yuCYCqezusA1YIUP7CO1m', 'Samp', 'David', '[\"ROLE_PRO\"]', NULL, '202107291440226102bdd636c6e0-REACT.png', 'https://www.linkedin.com/in/sampaio-david-893342149/', NULL, '[\"12\", \"14\", \"13\"]', 'On fait de son mieux avec ce que l\'on a!', 'Paris', 'Etudiant'),
(7, 'Alex', 'alex.alex@alex.com', '$2y$13$ta/dzIjVJGttweDdweWUmulROfgWFq2Rr3YpPd043HAkO0UyCaVbq', 'Palm', 'Alex', '[\"ROLE_USER\"]', NULL, '2021072907355361025a59004e71-MySQL.png', NULL, NULL, '[]', '', '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie_tips`
--
ALTER TABLE `categorie_tips`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demande_pro`
--
ALTER TABLE `demande_pro`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `outil`
--
ALTER TABLE `outil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `outil_techno`
--
ALTER TABLE `outil_techno`
  ADD PRIMARY KEY (`outil_id`,`techno_id`),
  ADD KEY `IDX_7B98BA6F3ED89C80` (`outil_id`),
  ADD KEY `IDX_7B98BA6F51F3C1BC` (`techno_id`);

--
-- Index pour la table `techno`
--
ALTER TABLE `techno`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_642C4108EC6B28E9` (`categorie_tips_id`);

--
-- Index pour la table `tips_techno`
--
ALTER TABLE `tips_techno`
  ADD PRIMARY KEY (`tips_id`,`techno_id`),
  ADD KEY `IDX_872A3CA0B3E8864B` (`tips_id`),
  ADD KEY `IDX_872A3CA051F3C1BC` (`techno_id`);

--
-- Index pour la table `tutoriel`
--
ALTER TABLE `tutoriel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tutoriel_techno`
--
ALTER TABLE `tutoriel_techno`
  ADD PRIMARY KEY (`tutoriel_id`,`techno_id`),
  ADD KEY `IDX_5260E7DD7CB6CDBB` (`tutoriel_id`),
  ADD KEY `IDX_5260E7DD51F3C1BC` (`techno_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie_tips`
--
ALTER TABLE `categorie_tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `demande_pro`
--
ALTER TABLE `demande_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `outil`
--
ALTER TABLE `outil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `techno`
--
ALTER TABLE `techno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `tips`
--
ALTER TABLE `tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `tutoriel`
--
ALTER TABLE `tutoriel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `outil_techno`
--
ALTER TABLE `outil_techno`
  ADD CONSTRAINT `FK_7B98BA6F3ED89C80` FOREIGN KEY (`outil_id`) REFERENCES `outil` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7B98BA6F51F3C1BC` FOREIGN KEY (`techno_id`) REFERENCES `techno` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tips`
--
ALTER TABLE `tips`
  ADD CONSTRAINT `FK_642C4108EC6B28E9` FOREIGN KEY (`categorie_tips_id`) REFERENCES `categorie_tips` (`id`);

--
-- Contraintes pour la table `tips_techno`
--
ALTER TABLE `tips_techno`
  ADD CONSTRAINT `FK_872A3CA051F3C1BC` FOREIGN KEY (`techno_id`) REFERENCES `techno` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_872A3CA0B3E8864B` FOREIGN KEY (`tips_id`) REFERENCES `tips` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tutoriel_techno`
--
ALTER TABLE `tutoriel_techno`
  ADD CONSTRAINT `FK_5260E7DD51F3C1BC` FOREIGN KEY (`techno_id`) REFERENCES `techno` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5260E7DD7CB6CDBB` FOREIGN KEY (`tutoriel_id`) REFERENCES `tutoriel` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
