FROM php:8.1-apache-buster

RUN apt-get update \
    && apt-get install -y \
      zip \
      libzip-dev \
      zlib1g-dev \
      libmagickwand-dev \
      libmagickcore-dev \
      libjpeg-dev \
      libonig-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN mkdir -p  /var/www/html/app/public

COPY ./ /var/www/html/app/

WORKDIR /var/www/html/app

RUN rm -rf vendor \
    && rm -rf var

RUN mkdir -p var/log \
    && touch var/log/prod.deprecations.log \
    && chmod -R 777 var

RUN ./composer.phar install --no-plugins --no-scripts --no-autoloader \
    && ./composer.phar dump-autoload --optimize \
    && ./composer.phar run-script post-install-cmd

CMD ["./bin/console", "demo:hello-world"]