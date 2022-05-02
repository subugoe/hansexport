<?php

declare(strict_types=1);

use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\SymfonySetList;

return static function (Rector\Config\RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__.'/src',
        __DIR__.'/public',
        __DIR__.'/tests',
        __DIR__.'/*.php',
    ]);

    $rectorConfig->sets([
        SetList::CODE_QUALITY,
        SetList::PHP_81,
        SymfonySetList::SYMFONY_60,
    ]);
};
