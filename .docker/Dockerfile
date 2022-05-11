FROM php:8-fpm-alpine as runtime

RUN apk update \
  && apk add --no-cache coreutils


# install composer for building
RUN echo "$(curl -sS https://composer.github.io/installer.sig) -" > composer-setup.php.sig \
    && curl -sS https://getcomposer.org/installer | tee composer-setup.php | sha384sum -c composer-setup.php.sig \
    && php composer-setup.php && rm composer-setup.php* \
    && chmod +x composer.phar && mv composer.phar /usr/local/bin/composer 

RUN apk add --no-cache $PHPIZE_DEPS 

# add xdebug, see https://xdebug.org/docs/install#source
RUN curl -sS https://xdebug.org/files/xdebug-3.1.4.tgz | tar xz \
    && cd xdebug-3.1.4 \
    && phpize \
    && ./configure --enable-xdebug \
    && make && make install \
    && docker-php-ext-enable xdebug

RUN apk add --no-cache bash git sudo

ARG USERID
ARG USER

# if user with id uid doesnt exist add her
RUN id -u $USERID > /dev/null 2>&1 || adduser -D -s /bin/bash -u $USERID $USER \
    && echo "$user  ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers

COPY --chown=$USER:$USER bashrc /home/$USER/.bashrc
COPY docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d
COPY docker-php-ext-opcache.ini /usr/local/etc/php/conf.d

USER $USER