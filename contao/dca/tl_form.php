<?php

$GLOBALS['TL_DCA']['tl_form']['subpalettes']['sendViaEmail'] = str_replace(
    'recipient,',
    'sender,senderName,recipient,',
    $GLOBALS['TL_DCA']['tl_form']['subpalettes']['sendViaEmail']
);

$GLOBALS['TL_DCA']['tl_form']['fields']['sender'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_form']['sender'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [
        'mandatory' => false,
        'maxlength' => 1022,
        'rgxp' => 'emails',
        'tl_class'=>'w50'
    ],
    'sql' => "varchar(1022) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_form']['fields']['senderName'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_form']['senderName'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [
        'mandatory' => false,
        'maxlength' => 1022,
        'tl_class'=>'w50'
    ],
    'sql' => "varchar(1022) NOT NULL default ''",
];
