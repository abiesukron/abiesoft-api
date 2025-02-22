<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit76ce019d5c20ef28f240e104118dd77a
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Component\\Yaml\\' => 23,
        ),
        'A' => 
        array (
            'App\\Service\\' => 12,
            'App\\Schema\\' => 11,
            'App\\Model\\' => 10,
            'Abiesoft\\Resources\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
        'App\\Service\\' => 
        array (
            0 => __DIR__ . '/../..' . '/service',
        ),
        'App\\Schema\\' => 
        array (
            0 => __DIR__ . '/../..' . '/schema',
        ),
        'App\\Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Abiesoft\\Resources\\' => 
        array (
            0 => __DIR__ . '/..' . '/abiesoft',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit76ce019d5c20ef28f240e104118dd77a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit76ce019d5c20ef28f240e104118dd77a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit76ce019d5c20ef28f240e104118dd77a::$classMap;

        }, null, ClassLoader::class);
    }
}
