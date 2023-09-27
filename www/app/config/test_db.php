<?php
$db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases
$db['class'] = 'yii\db\Connection';
$db['dsn'] = 'mysql:host=yii_mysql;dbname=yii_test';
$db['username'] = 'root';
$db['password'] = 'yii';

return $db;
