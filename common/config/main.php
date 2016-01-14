<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '<span class="label label-danger">NO DATA</span>',
            'decimalSeparator' => '.',
            'thousandSeparator' => ',',
            'currencyCode' => 'RM',

        ],
    ],
];
