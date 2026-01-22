# Utilise l'image officielle PHP + Apache
FROM php:8.2-apache

# Installer les dépendances nécessaires pour PostgreSQL et activer modules
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install \
    intl \
    pdo \
    pdo_mysql \
    zip \
    opcache

# Copier un php.ini personnalisé si besoin (monté via docker-compose)
# WORKDIR /var/www/html

# Permettre à Apache d'écrire sur le dossier (utile pour uploads / sessions)
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
