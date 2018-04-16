���������
============

## ��������� composer-������

���������������� ���������� ��� ���������� ����� [composer](http://getcomposer.org/download/).

���� ���������

```
php composer.phar require --dev --prefer-dist yiisoft/yii2-gii
```

���� ��������

```
"yiisoft/yii2-gii": "~2.0.0"
```

� require-dev ������ ������ ����� `composer.json`.


## ������������ ����������

����� ����, ��� ���������� Gii ���� �����������, �� ������ ������������ ��, ������� ���� ��� � ���������������� ���� ����������:

```php
return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
        ],
        // ...
    ],
    // ...
];
```

������ Gii �������� �� ������:

```
http://localhost/path/to/index.php?r=gii
```

���� �� ����������� "��������" ������ (pretty URLs), �� ����������� ����� URL:

```
http://localhost/path/to/index.php/gii
```

> Note: ��-���������, ���� �� ���������� gii � ip-������, ��������� �� localhost, ������ � ���� ����� ������.
> ����� �������� ��� ���������, �������� ip-������, ������� �������� ������, � ������������:
>
```php
'gii' => [
    'class' => 'yii\gii\Module',
    'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'] // ���������, ��� ��� ����� �����
],
```

���� �� ��������� Gii ����������� ������� � ���������� ����������, �� ������� ����� ������� ����� ������� ��������� Gii:

```
# �������� ���� �� ������� ������ ����������
cd path/to/AppBasePath

# ��� ������� ������� ������� Gii
yii help gii

# ��� ������� ������� ������� �� ���������� ������� � Gii
yii help gii/model

# ����������� ������ City �� ������� city
yii gii/model --tableName=city --modelClass=City
```

### Basic-����������

� ������� Basic-���������� ��������� ������������ ��������� ����������, ������� Gii ������ ����
�������� � `config/web.php`:

```php
// ...
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    // ��������� ������������ ��� ����������
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module'; // <--- �����
}
```

� ��� ��������� ip-������� ���� ������� ���������:

```php
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    // ��������� ������������ ��� ����������
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'],
    ];
}
```
