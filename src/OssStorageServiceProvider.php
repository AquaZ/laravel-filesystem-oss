<?php
namespace AquaZ\LaravelFilesystemOss;

use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;

class OssStorageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        app('filesystem')->extend('oss', function ($app, $config) {

            $adapter = new OssAdapter(
                $config['key_id'],
                $config['key_secret'],
                $config['end_point'],
                $config['bucket'],
                $config['is_cname'],
                $config['security_token'],
                $config['request_proxy']
            );

            $filesystem = new Filesystem($adapter);

            return $filesystem;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}