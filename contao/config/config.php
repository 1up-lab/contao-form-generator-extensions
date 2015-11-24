<?php

$GLOBALS['TL_HOOKS']['prepareFormData'][] = [
    'Oneup\Contao\FormGeneratorExtensions\EventListener\FormListener',
    'onPrepare'
];

$GLOBALS['TL_HOOKS']['processFormData'][] = [
    'Oneup\Contao\FormGeneratorExtensions\EventListener\FormListener',
    'onProcess'
];
