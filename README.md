# Devoir

Application web Symfony dédiée à la gestion d'auteurs et de bâtiments. Le projet utilise Doctrine ORM pour la persistance, Twig pour les vues et Symfony Forms pour la création et la modification des données.

## Fonctionnalités

### Gestion des auteurs

- Affichage de la liste des auteurs.
- Consultation du détail d'un auteur.
- Recherche d'un auteur par nom d'utilisateur.
- Création, modification et suppression d'un auteur.
- Gestion de l'adresse e-mail, de l'image et du nombre de livres.

### Gestion des bâtiments

- Affichage de la liste des bâtiments.
- Consultation du détail d'un bâtiment.
- Création, modification et suppression d'un bâtiment.
- Gestion du nom, du nombre d'étages, de la disponibilité et de la date de construction.

### Routes principales

| Fonction | Route |
| --- | --- |
| Accueil | `/home` |
| Liste des auteurs | `/author/list` |
| Détail d'un auteur | `/author/details/{id}` |
| Recherche d'un auteur | `/author/search/{username}` |
| Création d'un auteur | `/author/create` |
| Mise à jour d'un auteur | `/author/update/{id}` |
| Suppression d'un auteur | `/author/delete/{id}` |
| Liste des bâtiments | `/batiment/list` |
| Détail d'un bâtiment | `/batiment/details/{id}` |
| Création d'un bâtiment | `/batiment/create` |
| Mise à jour d'un bâtiment | `/batiment/update/{id}` |
| Suppression d'un bâtiment | `/batiment/delete/{id}` |

## Technologies utilisées

- PHP 8.1 ou supérieur
- Symfony 6.4
- Doctrine ORM et Doctrine Migrations
- Twig
- Symfony Forms et Validator
- Symfony AssetMapper, Stimulus et UX Turbo
- PHPUnit et Symfony Web Profiler pour le développement
- MySQL/MariaDB pour les migrations actuellement générées

## Prérequis

- PHP 8.1 ou supérieur avec les extensions `ctype` et `iconv`
- Composer
- Un serveur MySQL ou MariaDB
- Node.js n'est pas nécessaire pour l'installation courante : les assets sont gérés par Symfony AssetMapper

## Installation

1. Cloner le dépôt et entrer dans le projet :

   ```bash
   git clone https://github.com/ahmedmhirsi/devoir.git
   cd devoir
   ```

2. Installer les dépendances PHP :

   ```bash
   composer install
   ```

3. Configurer les variables d'environnement dans un fichier `.env.local` non versionné. Ne pas publier les secrets :

   ```dotenv
   APP_ENV=dev
   APP_SECRET=change-this-secret
   DATABASE_URL="mysql://user:password@127.0.0.1:3306/devoir?serverVersion=8.0&charset=utf8mb4"
   ```

4. Créer la base de données et appliquer les migrations :

   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

5. Démarrer le serveur Symfony :

   ```bash
   php -S 127.0.0.1:8000 -t public
   ```

   L'application est ensuite accessible à l'adresse [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Docker

Le fichier `compose.yaml` fournit un service de base de données PostgreSQL pour le développement. Les migrations actuellement présentes dans `migrations/` ont été générées avec une syntaxe MySQL/MariaDB. Il faut donc utiliser une base compatible avec ces migrations ou régénérer les migrations avant d'utiliser PostgreSQL.

Pour démarrer les services Docker :

```bash
docker compose up -d
```

La configuration de connexion doit être définie dans `.env.local` via `DATABASE_URL`.

## Commandes utiles

```bash
# Afficher les routes disponibles
php bin/console debug:router

# Vérifier l'état des migrations
php bin/console doctrine:migrations:status

# Vider le cache
php bin/console cache:clear

# Lancer les tests
php bin/phpunit
```

## Structure du projet

```text
src/
├── Controller/       Contrôleurs HTTP et routes
├── Entity/           Entités Doctrine Author et Batiment
├── Form/             Types de formulaires Symfony
└── Repository/       Requêtes et accès aux données
templates/            Vues Twig
assets/               JavaScript et styles front-end
config/               Configuration Symfony
migrations/           Migrations Doctrine
public/               Point d'entrée et fichiers publics
tests/                Configuration des tests
```

## Sécurité et configuration

Les fichiers `.env.local` et `.env.*.local` sont destinés aux valeurs propres à chaque environnement et ne doivent pas être commités. En production, utilisez des secrets Symfony ou des variables d'environnement dédiées et désactivez les outils de développement.
