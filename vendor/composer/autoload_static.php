<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4e23f854969577b6b9526adb5b4ce60f
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Observer\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Observer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/observer',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4e23f854969577b6b9526adb5b4ce60f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4e23f854969577b6b9526adb5b4ce60f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
