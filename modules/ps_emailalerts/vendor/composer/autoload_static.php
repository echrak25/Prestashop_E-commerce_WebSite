<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbab6c3a9d6ddcb10b7b4edc27bfac913
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitbab6c3a9d6ddcb10b7b4edc27bfac913::$classMap;

        }, null, ClassLoader::class);
    }
}
