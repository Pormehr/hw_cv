<?php

$_SESSION['isOk'] = update_db($conn,
    'users',
    ['name', 'slogan', 'picture'],
    [$_REQUEST['name'], $_REQUEST['slogan'], $_FILES['picture'] ?? ''],
    '`id` = 1',
);

header('location:/admin/profile');
