<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('cache')
    ->exclude('var')
    ->exclude('vendor')
    ->in(__DIR__);

$config = (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder);

return $config;
