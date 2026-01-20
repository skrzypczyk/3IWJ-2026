# Utilise l'image officielle PHP + Apache
FROM php:8.2-apache

# Installer les dépendances nécessaires pour PostgreSQL et activer modules
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpq-dev \
    unzip \
    git \
    libyaml-dev \
    && pecl install yamL \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && docker-php-ext-enable yaml \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# Copier un php.ini personnalisé si besoin (monté via docker-compose)
# WORKDIR /var/www/html

# Permettre à Apache d'écrire sur le dossier (utile pour uploads / sessions)
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
