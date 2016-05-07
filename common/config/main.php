<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'language' => 'es_ES',
    'components' => [
    'reCaptcha' => [
        'name' => 'reCaptcha',
        'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
        'siteKey' => '6LfD6hITAAAAAGcfqyVwxtpOnvUHXsYWrv0pSgnJ',
        'secret' => '6LfD6hITAAAAAEdV6MQ8zDX3emwQY4bVYyw-L3nz',
    ],
];


