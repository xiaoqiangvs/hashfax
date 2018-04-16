<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'img_host' => 'img.zfbtc.com',
    'front_host' => 'home.zfbtc.com',
    'admin_host' => 'admin.zfbtc.com',
    'captcha_expire' => 600,
    //文件上传
    'upload'=>[
        'tmp_dir'=>'/tmp/files',
        'move_dir'=>'../../data/upload',
        'max_size'=>1024*50,
        'allowed'=>array("image/jpeg", "image/jpg", "image/png", "image/gif", "text/plain", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/octet-stream", "application/excel", "application/vnd.ms-excel", "application/msexcel", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"),
        'image_type'=>array("jpeg", "jpg", "png", "gif", "pdf"),
        'file_type'=>array("xls", "xlsx", "txt", "docx"),
        'file_dir'=>'../../data/upload'
    ],
];
