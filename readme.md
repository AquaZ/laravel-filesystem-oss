<h1 align="center">Oss Filesystem for Laravel</h1>

## 扩展包要求

-   PHP >= 7.0

## 安装命令

```shell
$ composer require "aquaz/laravel-filesystem-oss" -vvv
```

## 配置

1. laravel5.5以下版本需手动注册服务提供者`config/app.php`

```php
'providers' => [
    \AquaZ\LaravelFilesystemOss\OssStorageServiceProvider::class,
],
```

2. 添加oss配置 `config/filesystems.php` 

```php
   'disks' => [
        'oss' => [
            'driver' => 'oss',
            'key_id' => env('oss_id'),
            'key_secret' => env('oss_key'),
            'end_point' => env('oss_point'),
            'bucket' => env('oss_bucket'),
            'isCName' => env('oss_iscname', false)
        ],
    ],
```

## 基本使用

- 参考官方文档，实例化一个oss的磁盘后，storage方法基本通用(https://learnku.com/docs/laravel/5.8/filesystem/3918)

    `
        Storage::disk('oss')->put('test/1.log', 'Test put a file');
    `
