<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in(array(__DIR__.'/src'))
;

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->fixers(array(
        '-unalign_double_arrow',
        '-unalign_equals',
        'align_double_arrow',
        'newline_after_open_tag',
        'ordered_use',
    ))
    ->setUsingCache(false)
    ->finder($finder)
;
