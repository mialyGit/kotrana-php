# Installation du projet

## Prérequis

Pour pouvoir installer le projet, vous avez besoin de:
- Git,
- Composer 2,
- PHP 7/8

## Clôner le dépot sur Github

- `git clone https://github.com/mialyGit/kotrana-php.git`
- `cd kotrana-php`

## Configuration de l'environnement

- `cp .env.example .env`
- Modifier les paramètres `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` selon votre configuration.
- Importer la base de données dans `db/excel_php.sql`

## Installer les packages
`composer install`

## Lancer le projet 
`php -S localhost:8000 -t src/ `
