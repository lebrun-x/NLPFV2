<?php
/**
 * Created by PhpStorm.
 * User: supercanard
 * Date: 08/01/17
 * Time: 09:38
 */

// app/config/config.php

$configuration->loadFromExtension('doctrine', array(
    'dbal' => array(
        'driver'   => 'pdo_mysql',
        'host'     => 'localhost',
        'dbname'   => 'NLPF',
        'user'     => 'root',
        'password' => 'root',
       ),
));