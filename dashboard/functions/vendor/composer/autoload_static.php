<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7a5bb8c497be915e77f4d77654a4ef39
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7a5bb8c497be915e77f4d77654a4ef39::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7a5bb8c497be915e77f4d77654a4ef39::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7a5bb8c497be915e77f4d77654a4ef39::$classMap;

        }, null, ClassLoader::class);
    }
}