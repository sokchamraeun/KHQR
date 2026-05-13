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

# Install & build frontend
RUN npm install --ignore-scripts && npm run build

# Storage link (IMPORTANT for images)
RUN php artisan storage:link || true

# Permissions
RUN chmod -R 775 storage bootstrap/cache

# Optimize Laravel (safe)
RUN php artisan config:cache \
    && php artisan route:cache || true \
    && php artisan view:cache || true

EXPOSE 10000

# ONLY start server (no migrate/seed here)
CMD php -S 0.0.0.0:10000 -t public