# Laravel Socialite TeamViewer (OAuth2)

## Introduction

Laravel Socialite provides an expressive, fluent interface to OAuth authentication with TeamViewer. It handles almost all of the boilerplate social authentication code you are dreading writing.

## License

Laravel Socialite TeamViewer is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

## Official Documentation Laravel Socialite

#### Install Laravel Socialite, if not previously was the establishment

In addition to typical, form based authentication, Laravel also provides a simple, convenient way to authenticate with OAuth providers using [Laravel Socialite](https://github.com/laravel/socialite). Socialite currently supports authentication with Facebook, Twitter, LinkedIn, Google, GitHub and Bitbucket.

### Install with Composer

To get started with Socialite TeamViewer, add to your `composer.json` file as a dependency:
```
    composer require remotemethod/socialite-teamviewer
```

### Configuration

After installing the Socialite library, register the `RemoteMethod\Socialite\TeamViewer\TeamViewerProvider` in your `config/app.php` configuration file:
```php
    'providers' => [
        // Other service providers...

        RemoteMethod\Socialite\TeamViewer\TeamViewerProvider::class,
    ],
```
You will also need to add credentials for the OAuth services your application utilizes. These credentials should be placed in your `config/services.php` configuration file, and should use the key `teamviewer` depending on the providers your application requires. For example:
```php
    'teamviewer' => [
        'client_id' => 'your-teamviewer-app-id',
        'client_secret' => 'your-teamviewer-app-secret',
        'redirect' => 'http://your-callback-url',
    ],
```
### Basic Usage

Next, you are ready to authenticate users! You will need two routes: one for redirecting the user to the OAuth provider, and another for receiving the callback from the provider after authentication. We will access Socialite using the `Socialite` facade:
```php
    <?php

    namespace App\Http\Controllers;

    use Socialite;

    class AuthController extends Controller
    {
        /**
         * Redirect the user to the TeamViewer authentication page.
         *
         * @return Response
         */
        public function redirectToProvider()
        {
            return Socialite::driver('teamviewer')->redirect();
        }

        /**
         * Obtain the user information from TeamViewer.
         *
         * @return Response
         */
        public function handleProviderCallback()
        {
            $user = Socialite::driver('teamviewer')->user();

            // $user->token;
        }
    }
```