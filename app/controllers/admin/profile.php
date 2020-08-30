<?php

$profile = select_from_db($conn, 'SELECT * FROM `users` WHERE `id` = 1');

include_once (base_dir('views/admin/profile.php'));
unset($_SESSION['isOk']);