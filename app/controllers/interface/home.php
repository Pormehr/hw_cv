<?php

$user_information = select_from_db($conn, "SELECT * FROM `users` WHERE `id` = 1");
$user_information = $user_information[0];
$user_information['picture'] ??= 'https://psmag.com/.image/c_limit%2Ccs_srgb%2Cq_auto:good%2Cw_600/MTI3NTgxNjQzMjg3NDE0Nzk0/brain-on-math.webp';

$projects_information = select_from_db($conn, "SELECT * FROM `projects` WHERE `user_id` = 1");

include base_dir('views/profile.php');
