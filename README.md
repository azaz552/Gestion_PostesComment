📝 Blog App Laravel
Application web moderne développée avec Laravel 10, permettant la gestion de posts et vidéos, avec un système de commentaires polymorphiques, une gestion avancée des droits d’accès, des filtres de recherche et une pagination optimisée.
L’interface utilisateur est construite avec Blade et TailwindCSS, et l’authentification est gérée via Laravel Breeze.
🚀 Aperçu du projet
Cette application simule une plateforme de blog où les utilisateurs peuvent :
Créer et gérer des publications
Ajouter des vidéos
Commenter différents contenus
Rechercher des posts
Naviguer facilement grâce à la pagination
Accéder uniquement aux actions autorisées
🧰 Technologies utilisées
Laravel 10
PHP 8.1+
Blade
TailwindCSS
Laravel Breeze
MySQL / PostgreSQL
JavaScript
AJAX (optionnel)
📚 Table des matières
Fonctionnalités
Prérequis
Installation
Structure du projet
Fonctionnalités détaillées
Routes principales
Sécurité et Policies
Pagination et filtres
Contributions
Auteur
✨ Fonctionnalités principales
🔐 Authentification
Inscription
Connexion
Déconnexion
Protection des routes avec middleware
Gestion des utilisateurs via Laravel Breeze
📝 Gestion des Posts
Création de posts
Affichage des posts
Modification des posts
Suppression des posts
Upload d'image
Association avec l'utilisateur
CRUD complet.
🎬 Gestion des Vidéos
Création de vidéos
Affichage de vidéos
Modification de vidéos
Suppression de vidéos
Upload de miniature
💬 Système de commentaires polymorphiques
Un commentaire peut être lié à :
un Post
une Vidéo
Chaque commentaire :
appartient à un utilisateur
est sécurisé
est validé côté serveur
🔎 Recherche et filtres
Les utilisateurs peuvent :
rechercher des posts par titre
filtrer dynamiquement
améliorer la navigation
📄 Pagination
5 éléments par page
Navigation simple
Performance optimisée
🎨 Interface utilisateur
Interface :
Responsive
Moderne
Intuitive
Basée sur TailwindCSS
Composants :
Navbar
Layout principal
Formulaires sécurisés
Messages d’erreur
⚙️ Prérequis
Avant d’installer le projet, assurez-vous d’avoir :
PHP >= 8.1
Composer
Node.js
NPM
MySQL ou PostgreSQL
Laravel 10
🛠️ Installation
1️⃣ Cloner le projet
git clone <repo_url>
cd blog-app
2️⃣ Installer les dépendances PHP
composer install
3️⃣ Installer les dépendances Frontend
npm install
npm run dev
4️⃣ Configurer l'environnement
cp .env.example .env
php artisan key:generate
Modifier :
DB_DATABASE=blog
DB_USERNAME=root
DB_PASSWORD=
5️⃣ Lancer les migrations
php artisan migrate
6️⃣ Démarrer le serveur
php artisan serve
Puis ouvrir :
http://127.0.0.1:8000
📁 Structure du projet
app/
├── Http/
│   ├── Controllers/
│   │   ├── PostController.php
│   │   └── CommentController.php
│   │
│   └── Policies/
│       └── PostPolicy.php
│
├── Models/
│   ├── Post.php
│   ├── Video.php
│   └── Comment.php
resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php
│   │
│   ├── partials/
│   │   └── nav.blade.php
│   │
│   ├── posts/
│   │   ├── index.blade.php
│   │   └── show.blade.php
🧩 Fonctionnalités détaillées
Posts
Chaque post :
appartient à un utilisateur
contient un titre
contient un contenu
peut contenir une image
peut être commenté
Vidéos
Chaque vidéo :
appartient à un utilisateur
contient un titre
contient un lien vidéo
peut contenir une miniature
peut être commentée
Commentaires
Système polymorphique :
commentable_id
commentable_type
Cela permet :
un seul modèle Comment
plusieurs types de contenu
🌐 Routes principales
Méthode	URL	Contrôleur	Description
GET	/posts	PostController@index	Liste des posts
GET	/posts/{post}	PostController@show	Afficher un post
POST	/posts	PostController@store	Créer un post
GET	/posts/{post}/edit	PostController@edit	Modifier un post
PUT	/posts/{post}	PostController@update	Mettre à jour un post
DELETE	/posts/{post}	PostController@destroy	Supprimer un post
POST	/comments	CommentController@store	Ajouter un commentaire
🔐 Sécurité et Policies
L’application utilise :
Policies
Gates
Middleware
Validation serveur
CSRF Protection
Règles :
seul le propriétaire peut modifier un post
seul le propriétaire peut supprimer un post
Exemple :
@can('update', $post)
⚡ Pagination et filtres
Pagination :
Post::paginate(5);
Filtre :
Post::where('title', 'like', '%' . $search . '%');
Option avancée :
filtrage AJAX
recherche dynamique
amélioration UX
🤝 Contributions
Pour contribuer :
git fork
git checkout -b feature/ma-feature
git commit -m "Add new feature"
git push origin feature/ma-feature
Puis :
Créer une Pull Request.
