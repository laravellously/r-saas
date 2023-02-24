FROM webdevops/php-nginx:8.2

ENV WEB_DOCUMENT_ROOT /app/public

WORKDIR /app

COPY . .

RUN composer install --no-interaction --optimize-autoloader --no-dev

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -

RUN apt-get install -y nodejs

RUN npm i && npm run build

RUN chown -R application:application .

RUN php artisan storage:link
