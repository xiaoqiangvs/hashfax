�������� ����������� �����������
============================

�������� ����� ������ ���������� � �� ������� ��� ����� `form.php` � `Generator.php`.
������ - ��� �����, ������ - ����� ����������. ��� ����, ����� ������� ���� ??���������,
��� ���������� ������� ��� ���������� ��� ������ � �����-������ ������ �����. �����, ���
������� � ���������� �������, ������� ��������� � ������������:

```php
//config/web.php ��� basic-����������
//..
if (YII_ENV_DEV) {    
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',      
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'],  
         'generators' => [
            'myCrud' => [
                'class' => 'app\myTemplates\crud\Generator',
                'templates' => [
                    'my' => '@app/myTemplates/crud/default',
                ]
            ]
        ],
    ];
}
```

```php
// @app/myTemplates/crud/Generator.php
<?php
namespace app\myTemplates\crud;

class Generator extends \yii\gii\Generator
{
    public function getName()
    {
        return 'MY CRUD Generator';
    }

    public function getDescription()
    {
        return '��� crud-���������. ����� �� ��� � ���������, �� ���� ���...';
    }
    
    // ...
}
```

�������� Gii Module � ���������, ��� � ��� �������� ����� ���������.
