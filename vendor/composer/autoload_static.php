<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4a05a13949b6d9a540ecafa6a63fcb0f
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4a05a13949b6d9a540ecafa6a63fcb0f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4a05a13949b6d9a540ecafa6a63fcb0f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4a05a13949b6d9a540ecafa6a63fcb0f::$classMap;

        }, null, ClassLoader::class);
    }
}