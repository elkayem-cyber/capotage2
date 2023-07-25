# Capotage Application

Bienvenue dans l'application Capotage ! Avant de démarrer, assurez-vous que votre environnement est correctement configuré. L'application nécessite PHP version 7.4.33 pour fonctionner correctement.

## Configuration de l'environnement

1. Assurez-vous d'avoir PHP version 7.4.33 installée sur votre système.

2. Si vous voulez temporairement changer la version PHP utilisée dans votre terminal Mac, vous pouvez utiliser la commande suivante :

```bash
PATH=/Applications/MAMP/Library/bin:/Applications/MAMP/bin/php/php7.4.33/bin:$PATH
```

## Installation et démarrage du projet

Suivez les étapes ci-dessous pour cloner et démarrer le projet en local :

1. Clonez le projet en utilisant la commande `git pull` :

```bash
git pull https://github.com/elkayem-cyber/Capotage.git
```

2. Installez les dépendances avec Composer :

```bash
composer install
```

3. Renommez le fichier `.env.example` en `.env` :

```bash
cp .env.example .env
```

4. Générez une nouvelle clé pour l'application :

```bash
php artisan key:generate
```

5. Migrer la base de données :

```bash
php artisan migrate:fresh
```

6. Lancez le serveur de développement :

```bash
php artisan serve
```

## Connexion à la base de données

Voici un exemple de configuration de connexion à la base de données utilisée par l'application :

```plaintext
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=capotage_db
DB_USERNAME=root
DB_PASSWORD=root
```

## Tester les fonctionnalités

Vous pouvez tester toutes les fonctionnalités du site en vous inscrivant en tant que vendeur et en tant qu'acheteur. N'hésitez pas à explorer et à utiliser toutes les fonctionnalités disponibles.

Amusez-vous bien ! Si vous avez des questions ou des problèmes, n'hésitez pas à nous contacter. Bonne utilisation de l'application Capotage !
