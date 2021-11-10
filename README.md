# BB PROJECT

## New clone

For a fresh copy, please do the following to get all the required modules, packages, environment settings and encryption key for the server.

```

    copy .env.example .env (Windows)

    composer install

    npm install

    php artisan key:generate

    --------------------------------------------------------------------------------------------------------------------
    Inside .env:

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=465
    MAIL_USERNAME= (your email)
    MAIL_PASSWORD= (your password)
    MAIL_ENCRYPTION=ssl
    MAIL_FROM_ADDRESS= (your email)
    MAIL_FROM_NAME="${APP_NAME}"

    https://m.youtube.com/watch?v=J0CxA54z-3A&t=392s    -> follow the steps until 2.15


    ---------------------------------------------------------------------------------------------------------------------
    Reference from https://stackoverflow.com/questions/58078757/class-illuminate-support-facades-input-not-found/64583451

    Step 1: Access the link: yourproject\vendor\laravel\framework\src\Illuminate\Support\Facades
    Step 2: Create a file with the file name: Input.php
    Step 3: Paste the code below into the file you just created and save


    <?php

namespace Illuminate\Support\Facades;

/**
 * @method static \Illuminate\Http\Request instance()
 * @method static string method()
 * @method static string root()
 * @method static string url()
 * @method static string fullUrl()
 * @method static string fullUrlWithQuery(array $query)
 * @method static string path()
 * @method static string decodedPath()
 * @method static string|null segment(int $index, string|null $default = null)
 * @method static array segments()
 * @method static bool is(...$patterns)
 * @method static bool routeIs(...$patterns)
 * @method static bool fullUrlIs(...$patterns)
 * @method static bool ajax()
 * @method static bool pjax()
 * @method static bool secure()
 * @method static string ip()
 * @method static array ips()
 * @method static string userAgent()
 * @method static \Illuminate\Http\Request merge(array $input)
 * @method static \Illuminate\Http\Request replace(array $input)
 * @method static \Symfony\Component\HttpFoundation\ParameterBag|mixed json(string $key = null, $default = null)
 * @method static \Illuminate\Session\Store session()
 * @method static \Illuminate\Session\Store|null getSession()
 * @method static void setLaravelSession(\Illuminate\Contracts\Session\Session $session)
 * @method static mixed user(string|null $guard = null)
 * @method static \Illuminate\Routing\Route|object|string route(string|null $param = null)
 * @method static string fingerprint()
 * @method static \Illuminate\Http\Request setJson(\Symfony\Component\HttpFoundation\ParameterBag $json)
 * @method static \Closure getUserResolver()
 * @method static \Illuminate\Http\Request setUserResolver(\Closure $callback)
 * @method static \Closure getRouteResolver()
 * @method static \Illuminate\Http\Request setRouteResolver(\Closure $callback)
 * @method static array toArray()
 * @method static bool offsetExists(string $offset)
 * @method static mixed offsetGet(string $offset)
 * @method static void offsetSet(string $offset, $value)
 * @method static void offsetUnset(string $offset)
 *
 * @see \Illuminate\Http\Request
 */
class Input extends Facade
{
    /**
     * Get an item from the input data.
     *
     * This method is used for all request verbs (GET, POST, PUT, and DELETE)
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    public static function get($key = null, $default = null)
    {
        return static::$app['request']->input($key, $default);
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'request';
    }
}

```
