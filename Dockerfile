FROM webdevops/php-nginx:8.2

ENV WEB_DOCUMENT_ROOT /app/public
ENV APP_ENV development

WORKDIR /app
COPY . .

RUN composer install --no-interaction --optimize-autoloader --no-dev
# Optimizing Configuration loading
RUN php artisan config:cache
# Optimizing Route loading
RUN php artisan route:cache
# Optimizing View loading
RUN php artisan view:cache

RUN chown -R application:application .
