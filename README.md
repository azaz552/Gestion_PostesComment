Blog App Laravel

Application web développée avec Laravel 10, permettant la création de posts et vidéos, avec commentaires polymorphiques, gestion des droits, filtres et pagination. L’interface est réalisée avec Blade et TailwindCSS, et l’authentification est gérée via Laravel Breeze.

Table des matières
Fonctionnalités
Prérequis
Installation
Structure du projet
Fonctionnalités détaillées
Routes principales
Sécurité et policies
Pagination et filtres
Contributions
Auteur
Fonctionnalités
Authentification complète avec Laravel Breeze
Gestion de posts et vidéos (CRUD complet)
Système de commentaires polymorphiques (un commentaire peut appartenir à un post ou une vidéo)
Gestion des droits avec Policies & Gates
Filtres de recherche sur les posts par titre
Pagination (5 éléments par page)
Interface responsive et intuitive avec Blade et TailwindCSS
Prérequis
PHP >= 8.1
Composer
Node.js & NPM
MySQL ou PostgreSQL
Laravel 10
Installation
Cloner le projet
git clone <repo_url>
cd blog-app
Installer les dépendances PHP
composer install
Installer les dépendances front-end
npm install
npm run dev
Configurer l’environnement
cp .env.example .env
php artisan key:generate

Modifier .env pour la configuration de la base de données.

Lancer les migrations
php artisan migrate
Démarrer le serveur
php artisan serve
Structure du projet
app/
├─ Http/
│  ├─ Controllers/
│  │  ├─ PostController.php
│  │  └─ CommentController.php
│  └─ Policies/
│     └─ PostPolicy.php
├─ Models/
│  ├─ Post.php
│  ├─ Video.php
│  └─ Comment.php
resources/
├─ views/
│  ├─ layouts/app.blade.php
│  ├─ partials/nav.blade.php
│  ├─ posts/index.blade.php
│  └─ posts/show.blade.php
Fonctionnalités détaillées
Posts
Création, lecture, mise à jour et suppression (CRUD)
Chaque post appartient à un utilisateur
Possibilité de mettre une image
Vidéos
CRUD simplifié
Chaque vidéo appartient à un utilisateur
Possibilité de mettre une miniature
Commentaires
Polymorphiques : un commentaire peut être associé à un post ou une vidéo
Chaque commentaire appartient à un utilisateur
Interface
Layout principal avec @yield('content')
Navbar incluse via partial Blade
Formulaires sécurisés avec CSRF et validation
Routes principales
Méthode	URL	Contrôleur	Description
GET	/posts	PostController@index	Liste des posts avec filtre et pagination
GET	/posts/{post}	PostController@show	Afficher un post avec commentaires
POST	/posts	PostController@store	Créer un nouveau post
GET	/posts/{post}/edit	PostController@edit	Modifier un post
PUT	/posts/{post}	PostController@update	Mettre à jour un post
DELETE	/posts/{post}	PostController@destroy	Supprimer un post
POST	/comments	CommentController@store	Ajouter un commentaire (posts ou vidéos)

Toutes les routes sont protégées par le middleware auth.

Sécurité et policies
Seul le propriétaire peut modifier ou supprimer un post
Utilisation de @can dans les vues pour afficher les boutons de modification ou suppression
Validation des formulaires côté serveur
Pagination et filtres
Filtre sur le titre des posts (search)
Pagination avec 5 posts par page
Fonctionnalité AJAX possible pour filtrer sans recharger la page
Contributions
Fork le projet
Créer une branche feature (git checkout -b feature/ma-feature)
Committez vos modifications (git commit -m 'Add new feature')
Push sur la branche (git push origin feature/ma-feature)
Créer une Pull Request
