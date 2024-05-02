# Stage 1: Build Laravel Application
FROM php:8.2-fpm AS builder

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel application files
COPY . .

#update PHP dependencies
RUN compose update

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN docker-php-ext-install pdo pdo_pgsql

# Stage 2: Production Environment
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install runtime dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

RUN docker-php-ext-install pdo pdo_pgsql

# Copy only necessary files from builder stage
COPY --from=builder /var/www/html .

#Copy env production
COPY env.production .env

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 9000
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
