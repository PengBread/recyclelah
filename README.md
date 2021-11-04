# BB PROJECT

## New clone

For a fresh copy, please do the following to get all the required modules, packages, environment settings and encryption key for the server.

```

    copy .env.example .env (Windows)

    composer install

    npm install

    php artisan key:generate

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=465
    MAIL_USERNAME= (your email)
    MAIL_PASSWORD= (your password)
    MAIL_ENCRYPTION=ssl
    MAIL_FROM_ADDRESS= (your email)
    MAIL_FROM_NAME="${APP_NAME}"

```
