<?php
use Todo\Models\Task;
use Todo\Storage\MysqlDatabaseTaskStorage;
require("vendor/autoload.php");

$db = new PDO("mysql:host=localhost;dbname=test", "root", "");

$storage = new MysqlDatabaseTaskStorage($db);

$task = $storage->get(1);

$task->setDescription("finish course update")->setDue(new DateTime("+2 hours"))->setComplete();

var_dump( $storage->update($task));
