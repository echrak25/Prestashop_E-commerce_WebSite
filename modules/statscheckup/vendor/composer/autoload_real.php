<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit6d7adbb9bd19fed943f64efce90d2ceb
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit6d7adbb9bd19fed943f64efce90d2ceb', 'loadClassLoader'), true, false);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit6d7adbb9bd19fed943f64efce90d2ceb', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit6d7adbb9bd19fed943f64efce90d2ceb::getInitializer($loader));

        $loader->setClassMapAuthoritative(true);
        $loader->register(false);

        return $loader;
    }
}
