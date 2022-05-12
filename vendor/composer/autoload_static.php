<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7b6d988f7e4ede752526a5a8777a6739
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'ImageHoverEffect\\Widgets\\' => 25,
            'ImageHoverEffect\\PageSettings\\' => 30,
            'ImageHoverEffect\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ImageHoverEffect\\Widgets\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes/widgets',
        ),
        'ImageHoverEffect\\PageSettings\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes/page-settings',
        ),
        'ImageHoverEffect\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7b6d988f7e4ede752526a5a8777a6739::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7b6d988f7e4ede752526a5a8777a6739::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7b6d988f7e4ede752526a5a8777a6739::$classMap;

        }, null, ClassLoader::class);
    }
}
