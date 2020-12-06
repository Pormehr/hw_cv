<?php

include_once __DIR__ . '/functions.php';

$env = env_parser();

$conn = connect_to_db($env['DB_HOST'], $env['DB_USER'], $env['DB_PASS'], $env['DB_NAME']);

drop_table($conn, 'users');
create_table($conn, 'users', [
    '`id` INT(2) AUTO_INCREMENT PRIMARY KEY',
    '`name` VARCHAR(150) NOT NULL',
    '`password` VARCHAR(255) NOT NULL',
    '`slogan` TEXT',
    '`picture` VARCHAR(255)',
    '`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    '`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']);
insert_into_db($conn, 'users', ['name', 'password'], ['admin', hash('md5', hash('md5','1234'))]);

drop_table($conn, 'projects');
create_table($conn, 'projects', [
    '`id` INT(5) AUTO_INCREMENT PRIMARY KEY',
    '`name` VARCHAR(200) NOT NULL',
    '`user_id` INT(2) NOT NULL',
    '`picture` VARCHAR(255)',
    '`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    '`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']);
for ($i = 1; $i <= 10; $i++){
    insert_into_db($conn, 'projects', ['name', 'user_id'], ['project-'.$i, 1]);
}




