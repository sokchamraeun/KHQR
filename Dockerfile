FROM php:8.4-cli

WORKDIR /var/www

# System dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip \
    libpq-dev \
    libpng-dev libjpeg-dev libfreetype6-dev \
    nodejs npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql gd

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install frontend
RUN npm install --ignore-scripts && npm run build

# IMPORTANT: ensure storage exists
RUN mkdir -p storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views

# Storage link (safe for KHQR images)
RUN php artisan storage:link || true

# Permissions
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 10000

# Production server - migrate + seed at runtime (env vars are available)
CMD php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=10000