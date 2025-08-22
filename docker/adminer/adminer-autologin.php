<?php
if(!count($_GET)) {
    $_POST['auth'] = [
        'server' => 'mariadb',
        'username' => 'root',
        'password' => getenv('DATABASE_PASS'),
        'driver' => 'server',
        'db'    => 'app'
    ];
}

include 'adminer.php';
