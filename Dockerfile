FROM php:8.4-cli

WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip libpq-dev libpng-dev libjpeg-dev libfreetype6-dev nodejs npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Build frontend
RUN npm install --ignore-scripts && npm run build

# Permissions
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 10000

RUN php artisan route:clear && php artisan config:clear && php artisan view:clear

CMD php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=10000