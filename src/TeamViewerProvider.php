<?php

namespace RemoteMethod\Socialite\TeamViewer;

use Laravel\Socialite\SocialiteManager;
use Laravel\Socialite\SocialiteServiceProvider;

class TeamViewerProvider extends SocialiteServiceProvider
{
    public function register()
    {
        $this->app->singleton('Laravel\Socialite\Contracts\Factory', function($app)
        {
            $socialiteManager = new SocialiteManager($app);

            $socialiteManager->extend('teamviewer', function() use($socialiteManager)
            {
                $config = $this->app['config']['services.teamviewer'];

                return $socialiteManager->buildProvider(
                    'RemoteMethod\Socialite\TeamViewer\TeamViewer', $config
                );
            });

            return $socialiteManager;
        });
    }
}
