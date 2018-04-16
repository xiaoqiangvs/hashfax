<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'aliyun' => [
            'class' => 'saviorlv\aliyun\Sms',
            'accessKeyId' => 'LTAIddnbLMDMiLBa',
            'accessKeySecret' => '77OXM5Bdrw3kMEfSVRdUHbRmGqIoNv'
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    // 'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'mail' => [
            'class' => 'zyx\phpmailer\Mailer',
            'viewpath' => '@common/mail',
            'useFileTransport' => false,
            'config' => [
                'mailer' => 'smtp',
                'host' => 'smtp.exmail.qq.com',
                'port' => '465',
                'smtpsecure' => 'ssl',
                'smtpauth' => true,
                'username' => 'jason@hashfax.com',
                'password' => 'LjDw1985'
            ]
        ]
    ],
];
