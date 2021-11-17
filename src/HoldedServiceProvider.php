<?php

/**
 * Part of the Holded Laravel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Holded Laravel
 * @version    1.0.0
 * @author     Juan Solá
 * @license    BSD License (3-clause)
 * @copyright (c) 2021, Homedoctor Smart Medicine
 */

namespace HomedoctorEs\Laravel\Holded;

use Illuminate\Support\ServiceProvider;


class HoldedServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/holded.php' => config_path('holded.php'),
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $this->app->singleton('holded', function ($app) {
            $config = $app['config']->get('holded');
            return new Holded(
                isset($config['api_key']) ? $config['api_key'] : null,
                isset($config['base_url']) ? $config['base_url'] : null
            );
        });

        $this->app->alias('holded', Holded::class);
    }

    /**
     * {@inheritDoc}
     */
    public function provides()
    {
        return [
            'holded',
            Holded::class
        ];
    }

}
