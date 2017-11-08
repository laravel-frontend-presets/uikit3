<?php

namespace LaravelFrontendPresets\UIKit3Preset;

use Artisan;
use Illuminate\Support\Arr;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset;

class UIKit3Preset extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::removeOtherFrameworks();
        static::updatePackages();
        static::updateWebpackConfiguration();
        static::updateBootstrapping();
        static::removeNodeModules();
    }

    /**
     * Runs the "none" preset to clean up stuff first
     *
     * @return void
     */
    protected static function removeOtherFrameworks()
    {
        Artisan::call('preset', [
            'type' => 'none'
        ]);
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return ['uikit' => '^3.0.0-beta.34'] + Arr::except($packages, [
            'bootstrap-sass'
        ]);
    }

    /**
     * Update the Webpack configuration.
     *
     * @return void
     */
    protected static function updateWebpackConfiguration()
    {
        $mixPath = base_path('vendor/laravel/framework/src/Illuminate/Foundation/Console/Presets/vue-stubs/webpack.mix.js');
        copy($mixPath, base_path('webpack.mix.js'));
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/stubs/app.scss', resource_path('assets/sass/app.scss'));
        copy(__DIR__.'/stubs/bootstrap.js', resource_path('assets/js/bootstrap.js'));
    }

    /**
     * Copies in UIKit auth templates
     *
     * @return void
     */
    public static function addAuthTemplates()
    {
        tap(new Filesystem, function ($filesystem) {
            $filesystem->copyDirectory(__DIR__.'/stubs/views', resource_path('views'));
        });
    }
}
