# Usar a imagem oficial do PHP 8 com Apache
FROM php:8.1-apache

# Instalar dependências necessárias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \  
    && rm -rf /var/lib/apt/lists/*

# Instalar extensões do PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql  # Inclui o driver do PostgreSQL

# Habilitar o módulo de reescrita do Apache
RUN a2enmod rewrite

# Aumentar os limites de upload
COPY config/php.ini /usr/local/etc/php/conf.d/custom.ini

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Expor a porta 80 (padrão do Apache)
EXPOSE 80

# Definir o comando de inicialização do Apache
CMD ["apache2-foreground"]
