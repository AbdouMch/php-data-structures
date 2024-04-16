FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    curl \
    wget  \
    unzip;

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

ARG MAIN_DIR=/usr/src/myapp

WORKDIR ${MAIN_DIR}

COPY . ${MAIN_DIR}
RUN chmod -R a+rwx ${MAIN_DIR};


VOLUME ${MAIN_DIR}