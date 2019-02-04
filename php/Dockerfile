FROM php

WORKDIR /usr/app
COPY . .
RUN php composer.phar dumpautoload

CMD ["php", "run.php"]
