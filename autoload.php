<?php
$isPhpUnitRunning = defined('PHPUNIT_COMPOSER_INSTALL') && !defined('__PHPUNIT_PHAR__');

spl_autoload_register(static function(string $className) use ($isPhpUnitRunning) {
    $filePath = __DIR__.'/'.$className.'.php';
    if (is_file($filePath))
    {
        include $filePath;
    }
    else
    {
        if (!$isPhpUnitRunning)
        {
            // ha nem Phpunit-ból fut, akkor kivételt kell dobjon, máskülönben nem szabad!
            throw new \RuntimeException('Autoload.file not found: '.$filePath);
        }
    }
});

if ($isPhpUnitRunning)
{
    if (!class_exists('DG\BypassFinals', false))
    {
        require __DIR__.'/BypassFinals.php';
        \DG\BypassFinals::enable();
    }
}